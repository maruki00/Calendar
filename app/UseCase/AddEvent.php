<?php

namespace App\UseCase;

use App\Domain\Event\Entities\EventEntity;
use App\Persistense\Models\Event;
use App\Presentation\Requests\MainRequest;

class AddEvent
{
    public function addEvent(MainRequest $request): void
    {
        Event::create($request->validated());
    }
}