<?php

namespace Jmoati\HelperBundle\Traits;

trait Id
{
    /**
     * @var integer
     *
     * @Doctrine\ORM\Mapping\Column(name="id", type="integer")
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return int
     */
    public function getId() : int
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
