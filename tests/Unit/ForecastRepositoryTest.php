<?php

namespace IanKok\MSWSDK\Test\Unit;

use IanKok\MSWSDK\Client\MSWClient;
use IanKok\MSWSDK\Forecasts\ForecastMapper;
use IanKok\MSWSDK\Forecasts\ForecastRepository;
use IanKok\MSWSDK\Test\TestCase;

class ForecastRepositoryTest extends TestCase
{
    /**
     * @var MSWClient
     */
    protected $client;

    /**
     * @var ForecastRepository
     */
    protected $repo;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new MSWClient('https://magicseaweed.com/');
        $this->repo   = new ForecastRepository($this->client, new ForecastMapper());
    }

    /**
     * @test
     */
    public function itCanListWaveBreaks()
    {
        $response = $this->repo->getBySlug('Achill-Island-Surf-Report/685/');
        $this->assertGreaterThan(0, count($response));
    }
}
