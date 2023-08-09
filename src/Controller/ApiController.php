<?php
declare(strict_types=1);

namespace App\Controller;

use App\WizardWorld\Common\UuidCollection;
use App\WizardWorld\Common\ValueObject\Uuid;
use App\WizardWorld\Service\ApiClient;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ApiController extends AbstractController
{
    public function __construct(
        private ApiClient $apiClient
    ){}

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function index(Request $request): Response
    {
        $houses = $this->apiClient->fetchHouses();
        $traitCollection = $houses->getAllTraitsCollection();

        return $this->render('index.html.twig',['traits' => $traitCollection->all()]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function houses(Request $request): Response
    {
        $traits = $request->request->all('traits');
        $selectedTraitsUuidCollection = UuidCollection::createFromRequestPostArray($traits);
        $houses = $this->apiClient->fetchHouses();
        $filteredHouses = $houses->getFilteredByTraitsUuidCollection($selectedTraitsUuidCollection);

        return $this->render('houses.html.twig',['houses' => $filteredHouses, 'selectedTraits' => $selectedTraitsUuidCollection]);
    }

    /**
     * @throws Exception
     */
    public function house(Request $request): Response
    {
        $id = $request->attributes->get('id');
        $uuid = Uuid::createFromString($id);

        $house = $this->apiClient->fetchHouse($uuid);

        return $this->render('house.html.twig',[]);
    }
}