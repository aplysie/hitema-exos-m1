<?php

namespace Container;

/**
 * Class Container
 *
 */
class Container implements ContainerInterface
{
    /**
     * @var array
     */
    private $services = array();

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        if (!array_key_exists($name, $this->services)) {
            throw new \RuntimeException(sprintf("Service %s does not exist.", $name));
        }

        return $this->services[$name];
    }

    /**
     * @param string $name
     * @param mixed  $service
     */
    public function set($name, $service)
    {
        $this->services[$name] = $service;
    }
}
