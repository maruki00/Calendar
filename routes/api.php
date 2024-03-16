<?php

use App\Presentation\Requests\AddEventRequest;
use Core\Router\Router;
use App\Presenter\Controllers\EventController;

Router::get('/', function(){
    dd(123445);
});

Router::group(['prefix'=>'api/event'], function(){

    Router::get('/add', [EventController::class, 'store']);
    Router::get('/', [EventController::class, 'store']);
});
