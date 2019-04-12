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
use Illuminate\Support\ServiceProvider;

class MSWSDKServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            AuthenticatedMSWClient::class,
            function ($app) {
                return new MSWClient(
                    'https://magicseaweed.com//'
                );
            }
        );

        $this->app->bind(
            SpotsRepository::class,
            function ($app) {
                return new SpotsRepository($app[AuthenticatedMSWClient::class], new SpotsMapper());
            }
        );

        $this->app->bind(
            ImagesRepository::class,
            function ($app) {
                return new ImagesRepository($app[AuthenticatedMSWClient::class], new ImagesMapper());
            }
        );

        $this->app->bind(
            ForecastRepository::class,
            function ($app) {
                return new ForecastRepository($app[AuthenticatedMSWClient::class], new ForecastMapper());
            }
        );
    }
}
