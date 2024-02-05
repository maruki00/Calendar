<?php

namespace Core\Controller;

use Core\Response\Response;

abstract class Controller
{
    protected array $params = [];

    /**
     * @return array
     */
    protected function getParams(string $key): mixed
    {
        return $this->params[$key];
    }

    /**
     * @param array $params
     */
    protected function setParams(array $params): void
    {
        $this->params = $params;
    }
    public function notfound()
    {
        return (new Response())->json(['message' => 'Page Not Found'], 404);
    }
}