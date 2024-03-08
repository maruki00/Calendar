<?php

namespace App\Persistense\Respositories;

use App\Domain\Event\Entities\EventEntity;
use App\Persistense\Models\Event;

class EventRepository
{
    public final function create(array $attributes):mixed
    {
        return Event::create($attributes);
    }
}