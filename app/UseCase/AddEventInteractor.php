<?php

namespace App\UseCase;



use App\Domain\Event\Contracts\IEventRepository;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;
use function App\app;

class AddEventInteractor implements AddEventInputPort
{
    private readonly IEventRepository $repository;
    public function __construct()
    {
        $this->repository = app(IEventRepository::class);
    }
    public function add(AddEventRequestModel $model)
    {
        return $this->repository->create([
            'id'            => $model->getId(),
            'title'         => $model->getTitle(),
            'start_data'    => $model->getStartData(),
            'end_ate'       => $model->getEndAt(),
            'bg_color'      => $model->getBgColor(),
            'border_color'  => $model->getBorderColor(),
            'every_day'     => $model->getEveryDay(),
            'created_at'    => $model->getCreatedAt(),
            'updated_at'    => $model->getUpdatedAt(),
        ]);
    }
}