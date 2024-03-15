<?php


namespace App\Presenter\Controllers;

use AddressInfo;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;
use App\Presentation\Requests\AddEventRequest;
use App\Presenter\Requests\MainRequest;
use App\UseCase\AddEventInteractor;
use Core\Controller\Controller;



class EventController extends Controller
{
    private readonly AddEventInputPort $inputPort;
    public function __construct()
    {
        $this->inputPort = new AddEventInteractor();
    }

    public final function store(AddEventRequest $request):mixed
    {
        $data = [
            'id'            => 1,
            'title'         => 'title',
            'start_data'    => '2024-03-04',
            'end_ate'       => '2024-04-04',
            'bg_color'      => 'bg_color',
            'border_color'  => 'border_color',
            'every_day'     => false,
            'created_at'    => 'created_at',
            'updated_at'    => 'updated_at',
        ];
        return   $this->inputPort->add(new AddEventRequestModel($data));
    }
}