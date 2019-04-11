<?php


namespace IanKok\MSWSDK\Entities;


class Image
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var array | ImageDimension[]
     */
    protected $dimensions;

    /**
     * Image constructor.
     *
     * @param string                 $id
     * @param array|ImageDimension[] $dimensions
     */
    public function __construct(string $id, $dimensions)
    {
        $this->id         = $id;
        $this->dimensions = $dimensions;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array|ImageDimension[]
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }


}
