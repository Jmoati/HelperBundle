<?php

namespace Jmoati\HelperBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

abstract class Command extends ContainerAwareCommand
{
    /**
     * @param string $service
     * @return mixed
     */
    protected function get(string $service)
    {
        return $this->getContainer()->get($service);
    }

    /**
     * @param string $service
     * @return bool
     */
    protected function has(string $service) : bool
    {
        return $this->getContainer()->has($service);
    }

    /**
     * @param string $name
     * @return string
     */
    protected function getParameter(string $name) : string
    {
        return $this->getContainer()->getParameter($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    protected function hasParameter(string $name) : bool
    {
        return $this->getContainer()->hasParameter($name);
    }
}