<?php

namespace Router;

/**
 * Class RouteCollection
 *
 * @package Router
 */
class RouteCollection
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * @param string $name
     * @param Route  $route
     */
    public function add($name, Route $route)
    {
        $this->routes[$name] = $route;
    }

    /**
     * @param string $name
     *
     * @return Route
     */
    public function get($name)
    {
        if (!$this->exists($name)) {
            throw new \RuntimeException(sprintf("Route %s does not exist.", $name));
        }
        return $this->routes[$name];
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function exists($name)
    {
        return array_key_exists($name, $this->routes);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->routes;
    }
}
