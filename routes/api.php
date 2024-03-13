<?php

use Core\Router\Router;
use App\Presenter\Controllers\EventController;



Router::group(['prefix'=>'api/event'], function(){
    Router::get('/', function(){
        dd(__FILE__);
    });
    Router::get('/add', [EventController::class, 'store']);
    Router::get('/', [EventController::class, 'store']);
});
