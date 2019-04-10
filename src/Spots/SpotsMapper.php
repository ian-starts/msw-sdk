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
                substr(explode('jQuery1102022892981717069716_1554795982566(', (string)$response->getBody())[1], 0, -1)
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
