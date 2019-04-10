<?php


namespace IanKok\MSWSDK\Images;


use GuzzleHttp\Promise\PromiseInterface;
use IanKok\MSWSDK\Client\AuthenticatedMSWClient;
use IanKok\MSWSDK\Contracts\Mapperable;
use Psr\Http\Message\ResponseInterface;

class ImagesRepository
{
    /**
     * @var AuthenticatedMSWClient
     */
    protected $client;

    /**
     * @var Mapperable
     */
    protected $mapper;

    /**
     * ForecastRepository constructor.
     *
     * @param AuthenticatedMSWClient $client
     * @param Mapperable             $mapper
     */
    public function __construct(AuthenticatedMSWClient $client, Mapperable $mapper)
    {
        $this->client = $client;
        $this->mapper = $mapper;
    }

    /**
     * @param string $id
     *
     * @return array
     */
    public function getBySpotId(string $id): array
    {
        return $this->getBySpotIdAsync($id)->wait();
    }

    /**
     * @param string $id
     *
     * @return PromiseInterface
     */
    public function getBySpotIdAsync(string $id): PromiseInterface
    {
        return $this->client->requestAsync(
            'GET',
            'api/mdkey/photo?limit=6&fields=_id,images.*,&order_by=dateAdded&order_direction=DESC&approved=true&removed=false&depth=1&spot_id=' . $id
        )->then(
            function (ResponseInterface $response) {
                return $this->mapper->mapResponse($response);
            }
        );
    }
}
