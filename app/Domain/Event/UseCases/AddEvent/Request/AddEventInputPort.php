<?php

namespace App\Domain\Event\Ports\Request;

interface AddEventInputPort
{
    public function add(CreateEventRequestModel $model);
}