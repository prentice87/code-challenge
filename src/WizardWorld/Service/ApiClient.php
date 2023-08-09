<?php
declare(strict_types=1);

namespace App\WizardWorld\Service;

use App\WizardWorld\Common\ValueObject\Uuid;
use App\WizardWorld\House\House;
use App\WizardWorld\House\HouseCollection;
use Exception;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{
    private HttpClientInterface $httpClient;
    private ParameterBagInterface $params;

    public function __construct(HttpClientInterface $httpClient, ParameterBagInterface $params)
    {
        $this->httpClient = $httpClient;
        $this->params = $params;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function fetchHouses(): HouseCollection
    {
        $apiUrl = $this->params->get('api_url') . '/Houses';

        $response = $this->httpClient->request('GET', $apiUrl);

        $responseArray = $response->toArray();

        $houseCollection = new HouseCollection();

        foreach ($responseArray as $house)
        {
            $houseCollection->add(
                House::create(
                    $house['id'],
                    $house['name'],
                    $house['houseColours'],
                    $house['founder'],
                    $house['animal'],
                    $house['element'],
                    $house['ghost'],
                    $house['commonRoom'],
                    $house['heads'],
                    $house['traits']
                )
            );
        }

        return $houseCollection;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    public function fetchHouse(Uuid $uuid): House
    {
        $apiUrl = $this->params->get('api_url') . '/Houses/' . $uuid->asString();
        $response = $this->httpClient->request('GET', $apiUrl);
        $house = $response->toArray();

        return House::create(
            $house['id'],
            $house['name'],
            $house['houseColours'],
            $house['founder'],
            $house['animal'],
            $house['element'],
            $house['ghost'],
            $house['commonRoom'],
            $house['heads'],
            $house['traits']
        );
    }
}