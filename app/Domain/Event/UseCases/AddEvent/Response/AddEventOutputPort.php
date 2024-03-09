<?php

namespace App\Domain\Event\UseCases\AddEvent\Response;

interface AddEventOutputPort
{
    public function success(mixed $data);
    public function error(mixed $data);
}