<?php


namespace App\Presenter\Controllers;

use App\Presenter\Requests\MainRequest;
use Core\Controller\Controller;
use Core\Exceptions\MainException;
use Core\Response\Response;


class EventController extends Controller
{

    public function __construct(MainRequest $request)
    {
    }

    public final function store(MainException $exceptiojn , int $a, string $b):bool|string
    {
        dd(__FUNCTION__);
        return Response::json(['result'=> 'blah blah not found'], 200);
    }
}