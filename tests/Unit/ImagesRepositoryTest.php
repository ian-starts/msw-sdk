<?php

namespace IanKok\MSWSDK\Test\Unit;

use IanKok\MSWSDK\Client\MSWClient;
use IanKok\MSWSDK\Forecasts\ForecastMapper;
use IanKok\MSWSDK\Forecasts\ForecastRepository;
use IanKok\MSWSDK\Images\ImagesMapper;
use IanKok\MSWSDK\Images\ImagesRepository;
use IanKok\MSWSDK\Test\TestCase;

class ForecastRepositoryTest extends TestCase
{
    /**
     * @var MSWClient
     */
    protected $client;

    /**
     * @var ImagesRepository
     */
    protected $repo;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new MSWClient('https://magicseaweed.com/');
        $this->repo   = new ImagesRepository($this->client, new ImagesMapper());
    }

    /**
     * @test
     */
    public function itCanListWaveBreaks()
    {
        $response = $this->repo->getBySpotId('685');
        $this->assertGreaterThan(0, count($response));
    }
}
