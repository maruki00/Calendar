<?php


namespace Core\Logger;


class FileLogger implements ILogger
{
    public final function log(string $msg):void
    {
        $logPath = env('LOG_PATH', __DIR__.'/../../../storage/logs/main.txt');
        file_put_contents($logPath, "$msg\n", FILE_APPEND);
    }
}