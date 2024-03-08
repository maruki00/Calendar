<?php
/*
 * Author : Abdellah Oulahyane
 *
 *
 *
 *
 */
namespace Core;

use Core\Controller\ErrorController;
use Core\Exceptions\MainException;
use Core\Http\Server;
use Core\Http\Url\UrlParam;
use Core\Middleware\Middleware;
use Core\Middleware\MiddlewareFactory;
use Core\Requests\FormRequest;
use Core\Requests\IRequest;
use Core\Requests\Request;
use Core\Router\CurrentRoute;
use ReflectionMethod;

class App
{

    protected static array $Container   = [];
    protected static array $middlewares = [];
    protected static array $routes      = [];
    protected array $data;
    protected static array $params;
    protected static int   $statusCode = 200;

    public function __construct(){}

    public final function singleton(string $key, string $value, ?array $params=null):void
    {
        $obj = self::$Container[$key] ?? null;
        if(!isset($obj) || !$obj)
        {
            $newObj = is_null($params) ? new $value : new $value($params);
            self::$Container[$key] = new $newObj;
        }
    }
    public final function bind(string $key, string|callable $value):void
    {
        self::$Container[$key] = is_string($value) ? new $value : $value;
    }

    public final static function app(string $key):mixed
    {
        return self::$Container[$key];
    }

    public final function get(string $key):mixed
    {
        $retObj =  self::$Container[$key] ?? null;
        return match (gettype($retObj)){
            'string' => new $retObj,
            'callable' => $retObj,
            default => null
        };
    }



    private function getRequestUri():string
    {
        return preg_replace('#(/(\.+)?)+#', '/', Server::get('REQUEST_URI'));
    }

    private function runMiddleware(Middleware $middleware, IRequest $request)
    {
        return $middleware->handle($request);
    }


    /**
     * @throws \Exception
     */
    public final function run():void
    {
        try{
            $requestUri     = $this->getRequestUri();
            $currentRoute   = CurrentRoute::current(self::$routes, $requestUri);
            $urlParams      = UrlParam::getParams($currentRoute, $requestUri) ?? [];
            $controller     = $currentRoute->getController();
            $action         = $currentRoute->getAction();
            $isCallback     = is_callable($currentRoute->getCallback());
            $request        = null;
            $reflection     = match($isCallback)
            {
                true    => new \ReflectionFunction($currentRoute->getCallback()),
                default => new ReflectionMethod($currentRoute->getController(), $currentRoute->getAction()),
            };

            collect($reflection->getParameters())->map(function($parameter) use (&$urlParams, &$request){
                if(is_subclass_of($parameter->getType()->getName(), FormRequest::class))
                {
                    $request = new ($parameter->getType()->getName());
                    $urlParams[$parameter->getName()]= $request;
                }
            });
            $request = $request ?? new Request();
            collect($currentRoute->getMiddlwares())->map(function($item) use ($request){
                $middleware = MiddlewareFactory::create($item);
                if(!$this->runMiddleware($middleware, $request)){
                    throw new \Exception("Invalid Middleware or Middleware Not Found");
                }
            });

            if(is_callable($currentRoute->getCallback()))
            {
                call_user_func($currentRoute->getCallback(),...$urlParams);
                die;
            }
            if(!class_exists($controller) || !method_exists($controller, $action))
            {
                echo (new ErrorController())->notfound();
                die;
            }
            $clsReflexion = new \ReflectionClass($currentRoute->getController());
            $constructParams = array_map(function($param){
                return new ($param->getType()->getName()) ?? null;
            }, $clsReflexion->getConstructor()->getParameters());

            $controllerCls  =  new $controller(...$constructParams);
            $response       = $controllerCls->{$action}(...$urlParams);
            echo $response;
            die;
        }catch (\Exception $er)
        {
            throw new \Exception($er->getMessage());
        }

    }

}