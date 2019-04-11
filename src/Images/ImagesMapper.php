<?php


namespace IanKok\MSWSDK\Images;


use IanKok\MSWSDK\Contracts\Mapperable;
use IanKok\MSWSDK\Entities\Image;
use IanKok\MSWSDK\Entities\ImageDimension;
use Psr\Http\Message\ResponseInterface;

class ImagesMapper implements Mapperable
{
    public function mapResponse(ResponseInterface $response): array
    {
        return $this->map(
            json_decode(
                (string)$response->getBody()
            )
        );
    }

    private function map(array $data)
    {

        return array_map(
            function ($image) {
                return $this->mapEach($image);
            },
            $data
        );
    }

    private function mapEach($image)
    {
        $imageDimensions = [];
        foreach($image->images as $size => $dimensions)
        {
            $imageDimensions[] = new ImageDimension($size, $dimensions->width, $dimensions->height, $dimensions->cdnUrl);
        }
        return new Image($image->_id, $imageDimensions);
    }
}
