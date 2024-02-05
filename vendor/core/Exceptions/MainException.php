<?php

namespace Core\Exceptions;

use Core\Logger\LoggerStrategy;

class MainException extends \Exception implements \Throwable
{
    public function __construct(string $message = "", int $code = 500, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $msg = "[".date('Y-m-d h:i:s')."]  : {$this->getMessage()}";
        LoggerStrategy::log($msg);
    }
}