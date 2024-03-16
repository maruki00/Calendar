<?php


namespace App\Presenter\Controllers;

use App\Domain\Event\UseCases\AddEvent\Request\AddEventInputPort;
use App\Domain\Event\UseCases\AddEvent\Request\AddEventRequestModel;
use App\Domain\Event\UseCases\Home\Request\HomeInputPort;
use App\Presenter\Requests\HomeRequest;
use App\UseCase\HomeInteractor;
use Core\Controller\Controller;




class HomeController extends Controller
{

    public function __construct(private readonly HomeInputPort $inputPort)
    {
        $this->inputPort = new HomeInteractor();
    }

    public final function index():bool|string
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
        $view =  $this->inputPort->index(new AddEventRequestModel($data));
        return false;
    }
}