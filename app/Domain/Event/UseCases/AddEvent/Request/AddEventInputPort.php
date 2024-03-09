<?php

namespace App\Domain\Event\UseCases\AddEvent\Request;

use App\Domain\Shared\ViewModel;

interface AddEventInputPort
{
    public function add(AddEventRequestModel $model): ViewModel;
}