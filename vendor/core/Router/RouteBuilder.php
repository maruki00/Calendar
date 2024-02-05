<?php

namespace Core\Router;

interface RouteBuilder
{
    public function route(string $route):RouteBuilder;
    public function action(string $action):RouteBuilder;
    public function controller(string $controller):RouteBuilder;
    public function middlwares(array $middlewares):RouteBuilder;
    public function method(string $method):RouteBuilder;
    public function callback(callable $callback):RouteBuilder;
}