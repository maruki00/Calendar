<?php

namespace Core\Logger;

class LoggerStrategy
{
    public static function log(string $data):void
    {

        $type = env("LOG_TYPE", 'file');
        $context  = match ($type) {
            'file' => new FileLogger(),
            default => die('Invalid Logger Type'),
        };
        $context->log($data);
    }
}