<?php

namespace App\Presenter\Adaprters\ViewModels;

use App\Domain\Shared\ViewModel;

class JsonViewModel implements ViewModel
{
    public  function __construct(private mixed $data,private int $code=200)
    {}


    public function getResponse(): string
    {
        http_response_code($this->code);
        return json_encode($this->data);
    }

    public function __toString(): string
    {
        return $this->getResponse();
    }
}