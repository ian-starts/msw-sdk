<?php

namespace IanKok\MSWSDK\Client;

use GuzzleHttp\Client;

class MSWClient extends Client implements AuthenticatedMSWClient
{
    /**
     * MSWClient constructor.
     *
     * @param string $base
     * @param array  $config
     */
    public function __construct(
        string $base,
        array $config = []
    ) {
        $config = array_merge(
            $config,
            [
                'base_uri' => $base
            ]
        );

        parent::__construct($config);
    }
}
