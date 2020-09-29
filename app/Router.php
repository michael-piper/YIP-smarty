<?php

namespace App;

use App\Factory\Artifact;
use LogicException;
use FastRoute\Dispatcher;
use FastRoute\Dispatcher\GroupCountBased;
use FastRoute\RouteCollector;
use App\Logger;
use Exception;
use GuzzleHttp\Psr7\Request;
use Smarty;

interface RoutesIn
{
    function register(RouteCollector &$routes);
}
abstract class Routes implements RoutesIn
{
    function __construct(RouteCollector &$routes)
    {
        $this->register($routes);
    }
}
final class Router
{
    private $dispatcher;

    public function __construct(RouteCollector $routes)
    {
        $this->register($routes);
        $this->dispatcher = new GroupCountBased($routes->getData());
    }
    public function register(RouteCollector &$routes)
    {
        foreach (glob('routes/*.php') as $route) {
            $route_name = pathinfo($route, PATHINFO_FILENAME);
            Logger::info("Registering route " . $route_name);
            if ($route_name) {
                $call = "\\Routes\\$route_name";
                new $call($routes);
                Logger::info("Route register");
            }
        }
    }
    public function __invoke(string $method, string $uri)
    {
        $routeInfo = $this->dispatcher->dispatch($method, $uri);
        Logger::warning("Route info", $routeInfo);
        $request = new Request($method, $uri, (array)getallheaders(), file_get_contents("php://input"));
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                return Artifact::notFound('Not found', null, Artifact::responseFromAccept($request->getHeader("Accept")));
            case Dispatcher::METHOD_NOT_ALLOWED:
                return Artifact::methodNotAllowed('Method not allowed', null,  Artifact::responseFromAccept($request->getHeader("Accept")));
            case Dispatcher::FOUND:
                $params = $routeInfo[2];
                $smarty =  new Smarty();
                $smarty->setTemplateDir(__DIR__ . "/../templates");
                $smarty->setCompileDir(__DIR__ . "/../templates_c");
                $request->smarty = $smarty;

                try {
                    Logger::warning('Request header:', getallheaders());
                    if (array_key_exists('Content-Type', $request->getHeaders()) &&  $request->getHeader('Content-Type')[0] == 'application/json') {
                        $request->body = json_decode(\file_get_contents("php://input"));
                    } else {
                        $request->body = (object) $_REQUEST;
                    }
                    $routeInfo[1]($request, ...array_values($params));
                    return;
                } catch (Exception $ex) {
                    Logger::error("Server Error:", $ex->getMessage());
                    echo "BAD Request";
                    return;
                }
        }
        throw new LogicException('Something wrong with routing');
    }
}
