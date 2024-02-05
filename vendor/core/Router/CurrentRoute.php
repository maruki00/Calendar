<?php

namespace Core\Router;

use Core\App;
use Core\Controller\ErrorController;
use Core\Http\Server;
use Core\Requests\Request;

class CurrentRoute extends App
{

    private static function getPattern(string $url):string
    {
        if($url === '/')
        {
            return '/';
        }
    
        $url  = explode('/', rtrim($url,'/'));
        $url  = is_array($url) ? $url : [];
    
        foreach ($url as $key => $value) {
            if(!empty($url[$key]))
            {
                $url[$key] = preg_replace('#^\{(.)+\}$#', '(.)+', $value);
            }
        }
    
        $url = implode('/', $url);
        return $url[0] === '/' ? $url : "/$url";
    }

    public static final function current(array $routes, string $requestUri):?RouteItem
    {
        foreach(self::$routes as $key => $route)
        {
            $pattern = self::getPattern($route->getRoute());
            if(preg_match("#^$pattern$#", $requestUri))
            {
                return $route;
            }
        }
        return (new RouteItem())->method(Server::get('REQUEST_METHOD'));
    }
}