<?php

namespace App\Domain\Event\UseCases\Home\Response;

interface HomeOutputPort
{
    public function success(mixed $data);
    public function error(mixed $data);
}