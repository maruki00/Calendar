<?php

namespace App\Domain\Event\UseCases\AddEvent\Request;

interface AddEventInputPort
{
    public function add(AddEventRequestModel $model);
}