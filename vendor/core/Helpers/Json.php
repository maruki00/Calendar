<?php

namespace Core\Helpers;

class Json
{
    public static function encode(mixed $data, int $flag = JSON_UNESCAPED_UNICODE):false|string
    {
        return json_encode($data, $flag);
    }

    public static function decode(string $data, bool $associative=true):?array
    {
        return json_decode($data, true);
    }
}