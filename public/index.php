<?php

ini_set('display_errors',true);
use App\Controllers\MainController;
use Illuminate\Database\Capsule\Manager as Capsule;
require_once '../vendor/autoload.php';
$app = require_once __DIR__.'/../app/Kernel.php';
require_once __DIR__.'/../routes/api.php';

set_exception_handler(function($err){
    dd($err);
});


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();



$capsule = new Capsule;
$capsule->addConnection([
    "driver" => env('DB_CONNECTION', 'mysql'),
    "host" =>   env('DB_HOST', '127.0.0.1'),
    "database" => env('DB_DATABASE', 'app_statistics'),
    "username" => env('DB_USERNAME', 'app_statistics'),
    "password" => env('DB_PASSWORD')
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


try {
    $app->run();
} catch (Exception $e) {
    dd('Exception ....', $e->getMessage());
}
