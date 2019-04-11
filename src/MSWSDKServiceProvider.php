<?php

namespace IanKok\MSWSDK;

use IanKok\MSWSDK\Client\AuthenticatedMSWClient;
use IanKok\MSWSDK\Client\MSWClient;
use IanKok\MSWSDK\Forecasts\ForecastMapper;
use IanKok\MSWSDK\Forecasts\ForecastRepository;
use IanKok\MSWSDK\Images\ImagesMapper;
use IanKok\MSWSDK\Images\ImagesRepository;
use IanKok\MSWSDK\Spots\SpotsMapper;
use IanKok\MSWSDK\Spots\SpotsRepository;
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

        $this->app->bind(
            SpotsRepository::class,
            function (Application $app) {
                return new SpotsRepository($app[AuthenticatedMSWClient::class], new SpotsMapper());
            }
        );

        $this->app->bind(
            ImagesRepository::class,
            function (Application $app) {
                return new ImagesRepository($app[AuthenticatedMSWClient::class], new ImagesMapper());
            }
        );

        $this->app->bind(
            ForecastRepository::class,
            function (Application $app) {
                return new ForecastRepository($app[AuthenticatedMSWClient::class], new ForecastMapper());
            }
        );
    }
}
