<?php
declare(strict_types=1);

namespace App\Controller;

use App\WizardWorld\Service\ApiClient;
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

    public function index(Request $request): Response
    {
        return $this->render('index.html.twig',[]);
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function houses(Request $request): Response
    {
        $houses = $this->apiClient->fetchHouses();

        $data = print_r($houses, true);

        return $this->render('houses.html.twig',['data' => $data]);
    }

    public function house(Request $request): Response
    {

    }
}