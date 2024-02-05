<?php

namespace Core\Http;

class Server
{
//    private static array $data ;
    public static function all(): array
    {
        return $_SERVER;
    }

    public final static function get(string $key):string
    {
        return $_SERVER[$key] ?? '';
    }
}