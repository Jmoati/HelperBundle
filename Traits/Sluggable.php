<?php

namespace Jmoati\HelperBundle\Traits;

trait Sluggable
{

    /**
     * @var string $name
     *
     * @Doctrine\ORM\Mapping\Column(type="string")
     * @Symfony\Component\Validator\Constraints\NotBlank()
     */
    protected $name;
    /**
     * @var string $slug
     *
     * @Doctrine\ORM\Mapping\Column(type="string", unique=true)
     * @Gedmo\Mapping\Annotation\Slug(fields={"name"})
     */
    protected $slug;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug() : string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     *
     * @return $this
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;

        return $this;
    }

}
