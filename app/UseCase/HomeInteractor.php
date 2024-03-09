<?php

namespace App\UseCase;



use App\Domain\Event\Contracts\IEventRepository;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;
use App\Domain\Event\UseCases\AddEvent\Request\HomeInputPort;
use App\Domain\Shared\ViewModel;
use function App\app;

class HomeInteractor implements HomeInputPort
{
    private readonly IEventRepository $repository;
    public function __construct()
    {
        $this->repository = app(IEventRepository::class);
    }
    public final function index(): ViewModel|false
    {
        return false;
    }
}