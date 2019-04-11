<?php

namespace IanKok\MSWSDK\Entities;

class Spot
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $lat;

    /**
     * @var float
     */
    protected $lon;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var bool
     */
    protected $hasNetcam;

    /**
     * @var Region;
     */
    protected $region;

    /**
     * @var Country
     */
    protected $country;

    /**
     * Spot constructor.
     *
     * @param string  $id
     * @param string  $name
     * @param string  $description
     * @param float   $lat
     * @param float   $lon
     * @param string  $url
     * @param bool    $hasNetcam
     * @param Region  $region
     * @param Country $country
     */
    public function __construct(
        string $id,
        string $name,
        string $description,
        float $lat,
        float $lon,
        string $url,
        bool $hasNetcam,
        Region $region,
        Country $country
    ) {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->lat         = $lat;
        $this->lon         = $lon;
        $this->url         = $url;
        $this->hasNetcam   = $hasNetcam;
        $this->region      = $region;
        $this->country     = $country;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return bool
     */
    public function isHasNetcam(): bool
    {
        return $this->hasNetcam;
    }

    /**
     * @return Region
     */
    public function getRegion(): Region
    {
        return $this->region;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }


}
