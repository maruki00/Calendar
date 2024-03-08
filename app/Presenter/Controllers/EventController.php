<?php


namespace App\Presenter\Controllers;

use App\Presenter\Requests\MainRequest;
use Core\Controller\Controller;
use Core\Exceptions\MainException;
use Core\Response\Response;


class EventController extends Controller
{

    public function __construct()
    {
    }

    public final function store(MainRequest $request):bool|string
    {
        return Response::json(['result'=> 'blah blah not found'], 500);
    }
}