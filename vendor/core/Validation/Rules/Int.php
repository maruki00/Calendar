<?php

namespace Core\Validation\Rules;


class Int
{
    protected static final function validate(mixed $key, array $values)
    {
        return in_array($this->key, $this->values);
    }
}