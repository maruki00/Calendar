<?php

namespace App\Domain\Event\Contracts;

interface IEventRepository
{
    public function create(array $attributes);
}