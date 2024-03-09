<?php


namespace App\Presenter\Controllers;

use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;
use App\Presenter\Requests\MainRequest;
use Core\Controller\Controller;



class EventController extends Controller
{

    public function __construct(private readonly AddEventInputPort $inputPort)
    {
    }

    public final function store(MainRequest $request):bool|string
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