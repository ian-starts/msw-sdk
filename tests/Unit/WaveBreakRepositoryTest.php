<?php

namespace IanKok\MSWSDK\Test\Unit;

use IanKok\MSWSDK\Client\MSWClient;
use IanKok\MSWSDK\Spots\SpotsMapper;
use IanKok\MSWSDK\Spots\SpotsRepository;
use IanKok\MSWSDK\Test\TestCase;
use IanKok\MSWSDK\Test\TestLib\FakeClients\FakeMSWClient;

class WaveBreakRepositoryTest extends TestCase
{
    protected $client;

    protected $spotsRepo;

    protected $spotsMapper;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->client    = new MSWClient('https://magicseaweed.com/');
        $this->spotsRepo = new SpotsRepository($this->client, new SpotsMapper());
    }

    /**
     * @test
     */
    public function itCanListWaveBreaks()
    {
        $response = $waveBreakData = $this->spotsRepo->list();
        $this->assertGreaterThan(0, count($waveBreakData));
    }
}
