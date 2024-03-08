<?php

use Core\Router\Router;
use App\Presenter\Controllers\EventController;


Router::group(['prefix'=>'api/event'], function(){
    Router::post('/add', [EventController::class, 'store']);
});


Router::get('/api/event/add', function(){
    dd(123445);
});