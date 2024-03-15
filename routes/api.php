<?php

use App\Presentation\Requests\AddEventRequest;
use Core\Router\Router;
use App\Presenter\Controllers\EventController;



Router::group(['prefix'=>'api/event'], function(){
    Router::get('/', function(){
        $x = new AddEventRequest();
    });
    // Router::get('/add', [EventController::class, 'store']);
    // Router::get('/', [EventController::class, 'store']);
});
