<?php

namespace IanKok\MSWSDK\Spots;

use GuzzleHttp\Promise\PromiseInterface;
use IanKok\MSWSDK\Client\AuthenticatedMSWClient;
use IanKok\MSWSDK\Contracts\Mapperable;
use Psr\Http\Message\ResponseInterface;

class SpotsRepository
{
    /**
     * @var AuthenticatedMSWClient
     */
    protected $client;

    /**
     * @var Mapperable $mapper
     */
    protected $mapper;

    /**
     * SpotsRepository constructor.
     *
     * @param AuthenticatedMSWClient $client
     * @param Mapperable             $mapper
     */
    public function __construct(AuthenticatedMSWClient $client, Mapperable $mapper)
    {
        $this->client = $client;
        $this->mapper = $mapper;
    }

    public function list(): array
    {
        return $this->listAsync()->wait();
    }

    /**
     * @return PromiseInterface
     */
    public function listAsync(): PromiseInterface
    {
        return $this->client->requestAsync(
            'GET',
            '/api/mdkey//spot/?callback=jQuery1102022892981717069716_1554795982566&ne=46.55886030311719,3.3837890625000004&limit=-1&depth=1&fields=_id,name,description,lat,lon,url,hasNetcam,country.iso,country.name,country.url,region.name,region.url&_=1554795982568'
        )->then(
            function (ResponseInterface $response) {
                return $this->mapper->mapResponse($response);
            }
        );
    }
}
