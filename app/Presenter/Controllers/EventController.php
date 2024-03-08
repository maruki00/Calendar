<?php


namespace App\Presenter\Controllers;

use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;
use App\Presenter\Requests\MainRequest;
use Core\Controller\Controller;



class EventController extends Controller
{

    public function __construct(private readonly AddEventInputPort $inputPort)
    {
    }

    public final function store(MainRequest $request):bool|string
    {
        $view =  $this->inputPort->add(new AddEventRequestModel($request->validated()));
        return false;
    }
}