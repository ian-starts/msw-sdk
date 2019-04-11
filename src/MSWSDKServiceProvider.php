<?php

namespace IanKok\MSWSDK;

use IanKok\MSWSDK\Client\AuthenticatedMSWClient;
use IanKok\MSWSDK\Client\MSWClient;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class MSWSDKServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            AuthenticatedMSWClient::class,
            function (Application $app) {
                return new MSWClient(
                    'https://magicseaweed.com//'
                );
            }
        );

    }
}
