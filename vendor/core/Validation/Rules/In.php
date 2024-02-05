<?php

namespace Core\Validation\Rules;


class In
{



    public function __construct(
        protected string $key,
        protected array $values
    )
    {

    }

    protected final function validate()
    {
        return in_array($this->key, $this->values);
    }
}