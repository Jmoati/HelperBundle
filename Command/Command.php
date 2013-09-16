<?php

namespace Jmoati\HelperBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

abstract class Command extends ContainerAwareCommand
{

    protected function get($service)
    {
        return $this->getContainer()->get($service);
    }

    protected function has($service)
    {
        return $this->getContainer()->has($service);
    }

    protected function getParameter($name)
    {
        return $this->getContainer()->getParameter($name);
    }

    protected function hasParameter($name)
    {
        return $this->getContainer()->hasParameter($name);
    }

}