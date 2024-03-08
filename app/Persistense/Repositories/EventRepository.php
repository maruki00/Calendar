<?php

namespace App\Persistense\Repositories;


use App\Domain\Event\Contracts\IEventRepository;
use App\Persistense\Models\Event;

class EventRepository implements IEventRepository
{
    public final function create(array $attributes):mixed
    {
        return Event::create($attributes);
    }
}