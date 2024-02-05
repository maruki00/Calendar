<?php

namespace App\Presenter;

use App\Presentation\Middlewares\CoreMiddleware;
use Core\App;

class Kernel extends App {
    private static array $Container = [];
    public static array $middlewares = [
        'cors'  => CoreMiddleware::class,
        'cors1' => CoreMiddleware::class,
    ];

    public final static function singleton(string $key, string $value, ?array $parms=null):void
    {
        $obj = self::$Container[$key] ?? null;
        if(!isset($obj) || !$obj)
        {
            $newObj = is_null($parms) ? new $value : new $value($parms);
            self::$Container[$key] = new $newObj;
        }
    }
    public final static function bind(string $key, string|callable $value):void
    {
        self::$Container[$key] = is_string($value) ? new $value : $value;
    }

    public final static function app(string $key):mixed
    {
        return self::$Container[$key];
    }
}
