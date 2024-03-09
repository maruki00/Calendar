<?php

namespace App\Domain\Event\UseCases\AddEvent\Request;

interface HomeInputPort
{
    public function index(HomeRequestModel $model);
}