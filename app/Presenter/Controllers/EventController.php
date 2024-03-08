<?php


namespace App\Presentation\Controllers;

use App\Presentation\Requests\MainRequest as RequestsMainRequest;
use Core\Controller\Controller;
use Core\Response\Response;


class EventController extends Controller
{

    public final function __invoke(RequestsMainRequest $request, string $name, int $id)
    {
        return Response::json(['result'=> 'blah blah not found'], 404);
    }
}