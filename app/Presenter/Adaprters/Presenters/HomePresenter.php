<?php

namespace App\Presenter\Adaprters\Presenters;

use App\Domain\Event\UseCases\Home\Response\HomeOutputPort;
use App\Presenter\Adaprters\ViewModels\JsonViewModel;

class HomePresenter implements HomeOutputPort
{
    public function success(mixed $data)
    {
        return new JsonViewModel($data, 200);
    }
    public function error(mixed $data)
    {
        return new JsonViewModel($data, 400);
    }
}