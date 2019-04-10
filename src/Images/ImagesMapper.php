<?php


namespace IanKok\MSWSDK\Images;


use IanKok\MSWSDK\Contracts\Mapperable;
use IanKok\MSWSDK\Entities\Image;
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
        $images = [];
        foreach ($data as $element)
        {
            foreach ($element as $key => $value)
            {
                if ($key === 'images')
                {
                    foreach ($value as $size => $details){
                        $images[]= new Image($element->_id, $size, $details->width, $details->height, $details->cdnUrl);
                    }
                }

            }

        }
        return $images;
    }
}
