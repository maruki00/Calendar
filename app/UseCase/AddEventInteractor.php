<?php

namespace App\UseCase;



use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;

class AddEventInteractor implements AddEventInputPort
{
    public function __construct(private readonly AddEventInputPort $inputPort)
    {
        $this->$inputPort = new AddEventInteractor();
    }
    public function add(AddEventRequestModel $model)
    {
        return $this->inputPort->add(new AddEventR)
    }
}