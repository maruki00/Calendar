<?php

namespace Core\Response;

use Core\Helpers\Json;
use Core\Http\Server;
use JetBrains\PhpStorm\NoReturn;

class Response
{
    private static array $headers = [];
    public static function headers(array $headers):mixed
    {
        self::$headers = array_merge(self::$headers, $headers);
        return new self;
    }

    public final function redirect(string $url):void
    {
        if(!headers_sent())
        {
            header('Location: '.$url);
            exit;
        }
    }

    public static function json(array|object $data, int $code , array $headers = []):bool|string
    {
        self::$headers = array_merge(self::$headers, $headers);

        foreach (static::$headers as $header)
        {
            header($header);
        }
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($code);
        return Json::encode($data);
    }

    public static final function html(string $data, int $code, array $headers=[]):string
    {

        self::$headers = array_merge(self::$headers, $headers);
        foreach (self::$headers as $header)
        {
            header($header);
        }
        header('Content-Type: text/html; charset=UTF-8');
        http_response_code($code);
        return $data;
    }
}