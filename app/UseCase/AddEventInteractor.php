<?php

namespace App\UseCase;



use App\Domain\Event\Contracts\IEventRepository;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;

class AddEventInteractor implements AddEventInputPort
{
    public function __construct(private readonly IEventRepository $repository)
    {
    }
    public function add(AddEventRequestModel $model)
    {
        return $this->repository->create([

        ]);
    }
}