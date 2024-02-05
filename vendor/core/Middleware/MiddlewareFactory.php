<?php

namespace Core\Middleware;

use App\Http\Kernel;
use Core\Exceptions\MainException;

class MiddlewareFactory
{
    public static final function create(string $key):Middleware
    {
        $m = Kernel::$middlewares[$key];
        if(is_null($m))
        {
            throw new MainException("Middleware Not found");
        }
        return new $m() ?? throw new MainException("Invalid Middleware");
    }
}