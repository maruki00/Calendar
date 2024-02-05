<?php

namespace Core\Router;

class RouteItem implements RouteBuilder
{

    private string $route       = '';
    private string $action      = '';
    private string $controller  = '';
    private array  $middlwares  = [];
    private string $httpMethod  = '';
    private        $callback   = null;

    public function route(string $route):RouteBuilder{
        $this->route = $route;
        return $this;
    }
    public function action(string $action):RouteBuilder{
        $this->action = $action;
        return $this;
    }
    public function controller(string $controller):RouteBuilder
    {
        $this->controller = $controller;
        return $this;
    }
    public function middlwares(array $middlewares):RouteBuilder{
        $this->middlwares = $middlewares;
        return $this;
    }
    public function method(string $method):RouteBuilder{

        $this->httpMethod = $method;
        return $this;
    }
    public function callback(?callable $callback):RouteBuilder{
        $this->callback = $callback;
        return $this;
    }
    public final function params(array $params)
    {

    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getMiddlwares(): array
    {
        return $this->middlwares;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @return null
     */
    public function getCallback()
    {
        return $this->callback;
    }
}