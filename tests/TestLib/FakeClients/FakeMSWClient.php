<?php

namespace IanKok\MSWSDK\Test\TestLib\FakeClients;

use IanKok\MSWSDK\Client\MSWClient;

class FakeMSWClient extends MSWClient
{
    protected $fakeClient;
    protected $queryFactory;
    protected $paths = [
        'GET' => [
            '/api/mdkey//spot/?callback=jQuery1102022892981717069716_1554795982566&ne=46.55886030311719,3.3837890625000004&limit=-1&depth=1&fields=_id,name,description,lat,lon,url,hasNetcam,country.iso,country.name,country.url,region.name,region.url&_=1554795982568'
            => 'tests/Data/spots.json',
        ],

    ];

    public function __construct(string $baseUrl, array $config = [])
    {
        parent::__construct($baseUrl, $config);

        $this->fakeClient = new FakeGuzzleClient($this->getConfig(), $this->paths);
    }

    public function request($method, $uri = '', array $options = [])
    {
        return $this->requestAsync($method, $uri, $options)->wait();
    }

    public function requestAsync($method, $uri = '', array $options = [])
    {
        return $this->fakeClient->requestAsync($method, $uri, $options);
    }
}
