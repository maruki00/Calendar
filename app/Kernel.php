<?php

namespace App;

use App\Domain\Event\Contracts\IEventRepository;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Persistense\Repositories\EventRepository;
use App\Presentation\Middlewares\CoreMiddleware;
use App\UseCase\AddEventInteractor;
use Core\App;

$app = new App;
if (!function_exists('app')){
    function app(string $key){
        global $app;
        return $app->getItem($key);
    }
}

$app->bind(IEventRepository::class,  EventRepository::class);
$app->bind(AddEventInputPort::class, AddEventInteractor::class);

return $app;
