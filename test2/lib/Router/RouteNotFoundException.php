<?php

namespace Router;

/**
 * Class RouteNotFoundException
 *
 * @package Router
 */
class RouteNotFoundException extends \RuntimeException
{
    /**
     * @return int
     */
    public function getStatusCode()
    {
        return 404;
    }
}
