<?php


namespace IanKok\MSWSDK\Forecasts;


use GuzzleHttp\Promise\PromiseInterface;
use IanKok\MSWSDK\Client\AuthenticatedMSWClient;
use IanKok\MSWSDK\Contracts\Mapperable;
use Psr\Http\Message\ResponseInterface;

class ForecastRepository
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
     * @param string $slug
     *
     * @return mixed
     */
    public function getBySlug(string $slug): array
    {
        return $this->getBySlugAsync($slug)->wait();
    }

    /**
     * @param string $slug
     *
     * @return PromiseInterface
     */
    public function getBySlugAsync(string $slug): PromiseInterface
    {
        return $this->client->requestAsync('GET', $slug)->then(
            function (ResponseInterface $response) {
                return $this->mapper->mapResponse($response);
            }
        );
    }
}
