<?php

namespace Jmoati\HelperBundle\Traits;

trait Timestampable
{

    /**
     * @var \DateTime $created
     *
     * @Doctrine\ORM\Mapping\Column(type="datetime")
     * @Gedmo\Mapping\Annotation\Timestampable(on="create")
     */
    protected $created;
    /**
     * @var \DateTime $updated
     *
     * @Doctrine\ORM\Mapping\Column(type="datetime")
     * @Gedmo\Mapping\Annotation\Timestampable(on="update")
     */
    protected $updated;

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     *
     * @return Entity
     */
    public function setCreated(\DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     *
     * @return Entity
     */
    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }

}
