<?php

namespace App\Http;

use App\Http\Middlewares\CoreMiddleware;

class Kernel
{
    public static array $middlewares = [
        'cors'  => CoreMiddleware::class,
        'cors1' => CoreMiddleware::class,
    ];
}