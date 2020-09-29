<?php
require_once __DIR__ . '/vendor/autoload.php';

use FastRoute\DataGenerator\GroupCountBased;
use FastRoute\RouteCollector;
use FastRoute\RouteParser\Std;
use App\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routes = new RouteCollector(new Std(), new GroupCountBased());


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

// start session
\session_start();
$server = new Router($routes);

$server($httpMethod, $uri);
