<?php

namespace IanKok\MSWSDK\Contracts;

use Psr\Http\Message\ResponseInterface;

interface Mapperable
{
    /**
     * @param ResponseInterface $response
     *
     * @return array
     */
    public function mapResponse(ResponseInterface $response): array;
}
