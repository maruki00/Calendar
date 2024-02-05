<?php

namespace Core\Requests;

class Request implements IRequest
{

    public function __construct()
    {
        $this->data = $_REQUEST;
    }

    public final function all(){
        return $this->data;
    }

    public function __call(string $name, array $arguments)
    {
        return $this->data[$name] ?? null;
    }

    public final function input(string $key)
    {
        return $this->{$key}();
    }

    public final function has(string $key):bool
    {
        return isset($this->data[$key]);
    }

}