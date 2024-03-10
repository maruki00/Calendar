<?php

use Core\Router\Router;
use App\Presenter\Controllers\EventController;

Router::get('/', function(){
    
});

Router::group(['prefix'=>'api/event'], function(){
    Router::post('/add', [EventController::class, 'store']);
});

