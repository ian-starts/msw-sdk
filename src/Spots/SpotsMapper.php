<?php


namespace IanKok\MSWSDK\Spots;


use IanKok\MSWSDK\Entities\Country;
use IanKok\MSWSDK\Entities\Region;
use IanKok\MSWSDK\Entities\Spot;
use IanKok\MSWSDK\Contracts\Mapperable;
use Psr\Http\Message\ResponseInterface;

class SpotsMapper implements Mapperable
{
    public function mapResponse(ResponseInterface $response): array
    {
        return $this->map(
            json_decode(
                (string)$response->getBody()
            )
        );
    }

    public function map(array $data)
    {
        return array_map(
            function ($element) {
                return $this->mapEach($element);
            },
            array_filter(
                $data,
                function ($element) {
                    return !strpos($element->name, 'Buoy');
                }
            )
        );
    }

    public function mapEach($object)
    {
        $country = new Country($object->country->url, $object->country->name, $object->country->iso);
        $region = new Region($object->country->name, $object->region->url);
        return new Spot(
            $object->name,
            $object->description,
            $object->lat,
            $object->lon,
            $object->url,
            $object->hasNetcam,
            $region,
            $country
        );
    }
}
