<?php

namespace App\Presenter\Adaprters\Presenters;

use App\Domain\Event\UseCases\AddEvent\Response\AddEventOutputPort;
use App\Domain\Shared\ViewModel;
use App\Presenter\Adaprters\ViewModels\JsonViewModel;

class AddEventPresenter implements AddEventOutputPort
{

    public final function success(mixed $data):ViewModel
    {
        return new JsonViewModel(['data'=>$data]);
    }

    public final function error(mixed $data):ViewModel
    {
        return new JsonViewModel(['data'=>'Error'], 400);
    }
}