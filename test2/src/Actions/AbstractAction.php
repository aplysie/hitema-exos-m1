<?php

namespace Actions;

use Container\ContainerInterface;

/**
 * Class AbstractAction
 *
 */
abstract class AbstractAction
{
    /**
     * @var ContainerInterface $container
     */
    protected $container;

    /**
     * AbstractAction constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    abstract public function render();
}
