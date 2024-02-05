<?php

namespace App\Domain\Event\ValueObject;

use Core\Exceptions\MainException;

class ColorValueObject
{
    private string $value;

    /**
     * @param string $hash
     * @throws MainException
     */
    public function __construct(string $hash)
    {
        if(!preg_match('/([0-9A-Da-d])+/', $hash)){
            throw new MainException('Invalid Color hash');
        }
        $this->value = $hash;
    }
}