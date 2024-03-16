<?php

namespace App\Presenter\Adaprters\ViewModels;

use App\Domain\Shared\ViewModel;
use Core\Helpers\Json;

class JsonViewModel implements ViewModel
{
    public  function __construct(private mixed $data,private int $code=200)
    {}

    public final function getResponse(): string
    {
        http_response_code($this->code);
        return Json::encode($this->data);
    }

    public final function __toString()
    {
        return $this->getResponse();
    }
}