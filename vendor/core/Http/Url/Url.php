<?php

namespace Core\Http;

use Core\App;
use Core\Exceptions\MainException;

class Url
{

    public function __construct(
        protected App $app
    ){}

    public final function parse():array
    {
        $this->app->setData(Server::all());
        $data = $this->app->getData();
        if(empty($data))
        {
            throw new MainException('Invalid Request');
        }
        $uri = preg_replace('#(/)+#', '/', $data);
        $requestUri = !in_array($uri, ['/','']) ? trim($uri,'/') : '/';
    }
}