<?php

namespace App;

use App\Domain\Event\Contracts\IEventRepository;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Response\AddEventOutputPort;
use App\Domain\Event\UseCases\Home\Request\HomeInputPort;
use App\Domain\Event\UseCases\Home\Response\HomeOutputPort;
use App\Persistense\Repositories\EventRepository;
use App\Presentation\Middlewares\CoreMiddleware;
use App\Presenter\Adaprters\Presenters\AddEventPresenter;
use App\Presenter\Adaprters\Presenters\HomePresenter;
use App\UseCase\AddEventInteractor;
use App\UseCase\HomeInteractor;
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
$app->bind(AddEventOutputPort::class, AddEventPresenter::class);


$app->bind(HomeInputPort::class, HomeInteractor::class);
$app->bind(HomeOutputPort::class, HomePresenter::class);

return $app;
