<?php

namespace Core\Http;

use Core\App;

class UrlParser extends App
{
    private function generatePattern(string $route, string $url){
        $url = explode('/', trim($url,'/'));
        foreach ($url ?? [] as $key => $value) {
            if(empty($url[$key])){
                unset($url[$key]);
            }else{
                $url[$key] = preg_replace('#^\{(.)+\}$#', '(.)+', $value);
            }
        }
        return implode('/', $url);
    }

    private function getParams(array $params, string $route, string $url):array
    {
        $routePartes = explode('/', trim($route,'/'));
        $val         = explode('/', trim($url,'/'));
        if(!(is_array($routePartes) and is_array($val))) {
            return;
        }
        foreach ($routePartes as $key => $value) {
            if(empty($routePartes[$key]) || empty($val[$key])){
                unset($routePartes[$key]);
                unset($val[$key]);
            }else{
                if(preg_match('#^\{(.)+\}$#', $value)){
                    $param = str_replace(['{','}'], '', $value);
                    $params[$param] = $val[$key];
                }
            }
        }
        return $params;
    }
    public static function parse(string $uri):array
    {

    }
}