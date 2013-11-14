<?php

namespace Jmoati\HelperBundle\Repository;

use Doctrine\ORM\EntityRepository;

abstract class AbstractRepository extends EntityRepository
{
    public function findAllQuery()
    {
        return $this->createQueryBuilder($this->getName())->getQuery();
    }

    protected function getName()
    {
        $path = explode('\\', $this->getEntityName());

        return end($path);
    }
}
