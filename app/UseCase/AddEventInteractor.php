<?php

namespace App\UseCase;

use App\Domain\Event\Entities\EventEntity;
use App\Domain\Event\Ports\Request\AddEventInputPort;
use App\Domain\Event\Ports\Request\CreateEventRequestModel;
use App\Persistense\Models\Event;
use App\Presentation\Requests\MainRequest;

class AddEventInteractor implements AddEventInputPort
{
    public function __construct(private readonly IEventRepository $repository)
    {

    }
    public function add(CreateEventRequestModel $model)
    {
        Event::create($request->validated());
    }
}