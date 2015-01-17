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
    public function getId()
    {
        return $this->id;
    }
}
