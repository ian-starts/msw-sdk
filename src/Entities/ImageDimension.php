<?php


namespace IanKok\MSWSDK\Entities;


class ImageDimension
{
    /**
     * @var string
     */
    protected $dimension;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $height;

    /**
     * @var string
     */
    protected $url;

    /**
     * ImageDimension constructor.
     *
     * @param string $dimension
     * @param string $width
     * @param string $height
     * @param string $url
     */
    public function __construct(string $dimension, string $width, string $height, string $url)
    {
        $this->dimension = $dimension;
        $this->width     = $width;
        $this->height    = $height;
        $this->url       = $url;
    }

    /**
     * @return string
     */
    public function getDimension(): string
    {
        return $this->dimension;
    }

    /**
     * @return string
     */
    public function getWidth(): string
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function getHeight(): string
    {
        return $this->height;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }


}
