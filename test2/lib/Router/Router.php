<?php

namespace Router;

/**
 * Class Router
 *
 */
class Router
{
    /**
     * @var RouteCollection
     */
    private $routeCollection;

    /**
     * Router constructor.
     *
     * @param RouteCollection $routeCollection
     */
    public function __construct(RouteCollection $routeCollection)
    {
        $this->routeCollection = $routeCollection;
    }

    /**
     * @param string $uri
     *
     * @return Route
     */
    public function resolve($uri)
    {
        $uri = rtrim($uri, '/');

        $uri = empty($uri) ? '/' : $uri;

        /** @var Route $route */
        foreach ($this->routeCollection->all() as $route) {
            var_dump($route->getPattern(), $uri);
            if ($route->getPattern() === $uri) {
                return $route;
            }
        }

        throw new RouteNotFoundException();
    }
}
