<?php


namespace IanKok\MSWSDK\Forecasts;


use IanKok\MSWSDK\Contracts\Mapperable;
use Psr\Http\Message\ResponseInterface;

class ForecastMapper implements Mapperable
{
    public function mapResponse(ResponseInterface $response): array
    {
        $responseStrig = explode(
                             'forecast:',
                             explode(')', explode('requirejs.config(', (string)$response->getBody())[1])[0]
                         )[1];
        preg_match('/(,\s*[A-z]+):/',$responseStrig , $matches);
        return json_decode(explode($matches[0],$responseStrig)[0]);
    }
}
