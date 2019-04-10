<?php

namespace IanKok\MSWSDK\Entities;

class Country
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $iso;

    /**
     * Country constructor.
     *
     * @param string $url
     * @param string $name
     * @param string $iso
     */
    public function __construct(string $url, string $name, string $iso)
    {
        $this->url  = $url;
        $this->name = $name;
        $this->iso  = $iso;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
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
    public function getIso(): string
    {
        return $this->iso;
    }

}
