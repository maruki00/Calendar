<?php



class Command {
    private array $commands = [
        "controller" => [ "make" => "makeController"],
        "model"      => [ "make" => "makeModel"],
        "serve"      => [ "make" => "serve"],
    ];
    private string $requestedCommand;
    private array|string $commandArg;
    public function __construct(array $args){
        $this->requestedCommand=$args[1]??':';
        $this->commandArg=$args[2]??''; //array_chunk($args, 2);
        $this->parseCommand();
    }

    public final function parseCommand():void
    {
        $command = explode(':', $this->requestedCommand);
        if(count($command)!==2){
            $this->help();
            return;
        }
        $cmd = $this->commands[$command[0]][$command[1]];
        $this->$cmd($this->commandArg);
        // // call_user_func($this->$cmd, $this->commandArg);
        // call_user_func_array(array($this, $cmd), $this->commandArg);
    }
    public final function help():void
    {
        print("\ncontroller: php command controller:make {Controller Name}");
        print("\ncontroller: php command model:make      {Model Name}");
        print("\ncontroller: php command request:make    {Request Name}");
        print("\ncontroller: php command enitiy:make     {Entity Name}");
        print("\ncontroller: php command action:make     {action Name}");
        print("\ncontroller: php command repository:make {Repository Name}");
        print("\ncontroller: php command usecase:make    {UseCase Name}");
    }

    /*
    * This function responsable to run server via CLI
    */
    public final function serve(string $host="127.0.0.1", string|int $port=8080):void
    {
        $loadPath = __DIR__.'/../public';
        exec("php -S $host:$port -t $loadPath", NULL, NULL);
    }

    /*
    * This function responsable to create new controller via CLI
    */
    public final function makeController(string $controllerName):void
    {
        $controllerPath = __DIR__."/../app/Presentsation/Controllers";
        echo $controllerPath;
        if (!file_exists($controllerPath))
        {   
            print("Controller path does not exists");
            return;
        }
        $controller = $controllerPath.'/'.$controllerName.'.php';
        if(file_exists($controller)){
            print("Controller already exists");
            return;
        }
        echo $controllerName;
        echo "\n".$controller;
        touch($controller);
        $template = "<?php\n\nnamespace App\Presentation\Controllers;\n\nuse Core\Controller\Controller;\n\nclass $controllerName extends Controller\n{\n\n}";
        file_put_contents($controller, $template);
    }

    /*
    * This function responsable to create new model via CLI
    */
    public final function makeModel(string $modelName):void
    {
        $modelPath = __DIR__."/../app/Persistense/Models";
        if (!file_exists($modelPath))
        {   
            print("Model path does not exists");
            return;
        }
        $model = $modelPath.'/'.$modelName.'.php';
        if(file_exists($model)){
            print("Model already exists");
            return;
        }
        touch($model);
        $template = "<?php\n\nnamespace App\Persistence\Models;\n\nuse Illuminate\Database\Eloquent\Model;\n\nclass $modelName extends Model\n{\n\n}";
        file_put_contents($model, $template);
    }
}

new Command($argv);