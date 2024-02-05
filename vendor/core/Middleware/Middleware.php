<?php

namespace Core\Middleware;

use Core\Requests\IRequest;

interface Middleware
{
    public function handle(IRequest $request);
}