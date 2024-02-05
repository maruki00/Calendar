<?php

namespace Core\Validation;

abstract class Validator
{
    protected function required(string $key,array $data):bool|string
    {
        return $data[$key] ?? false;
    }
}