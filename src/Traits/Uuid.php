<?php

namespace Jmoati\HelperBundle\Traits;

trait Uuid
{
    /**
     * @var string
     *
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\Column(type="guid")
     * @Doctrine\ORM\Mapping\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }
}
