<?php

require __DIR__ . "/../Psr4Autoloader.php";

$autoloader = new Psr4Autoloader();

$autoloader->register();

$autoloader->addNamespace("Container", __DIR__ . "/../lib/Container");
$autoloader->addNamespace("Router", __DIR__ . "/../lib/Router");
$autoloader->addNamespace("Actions", __DIR__ . "/../src/Actions");

$autoloader->loadClass('Container\\Container');

use Container\Container;
use Router\Router;
use Router\RouteCollection;
use Router\Route;
use Actions\AbstractAction;
use Router\RouteNotFoundException;

$container = new Container();

$routes = new RouteCollection();
$routes->add('home', new Route('/', array(
    '_action' => 'Actions\HomeAction'
)));

$router = new Router($routes);

try {
    $route = $router->resolve($_SERVER['REQUEST_URI']);
} catch (RouteNotFoundException $e) {
    $route = new Route('error404', array(
        '_action' => 'Actions\Error404Action'
    ));
}

$actionClass = $route->getDefault('_action');

/** @var AbstractAction $action */
$action = new $actionClass($container);

echo $action->render();