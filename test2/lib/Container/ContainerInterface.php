<?php

namespace Container;

/**
 * Interface ContainerInterface
 *
 */
interface ContainerInterface
{
    /**
     * @param string $name
     */
    public function get($name);
}
