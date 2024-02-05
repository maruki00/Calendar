<?php

namespace Core\Http\Url;

use Core\Requests\Request;
use Core\Router\RouteItem;

class UrlParam
{
    public static final function getParams(RouteItem $route, string $url):?array
    {
        $params = [];
        $route  = explode('/', trim($route->getRoute(),'/'));
        $val    = explode('/', trim($url,'/'));

        if(!(is_array($route) and is_array($val)))
        {
            return [];
        }
        foreach ($route as $key => $value)
        {
            if(empty($route[$key]) || empty($val[$key]))
            {
                continue;
            }
            if(preg_match('#^\{(.)+\}$#', $value))
            {
                $param = str_replace(['{','}'], '', $value);
                $params[$param] = $val[$key];
            }
        }
        return $params;
    }
}