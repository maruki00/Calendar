<?php

$start = microtime(1);
ini_set('display_errors',true);
use App\Controllers\MainController;
use Illuminate\Database\Capsule\Manager as Capsule;
require_once '../vendor/autoload.php';
require_once __DIR__.'/../routes/api.php';
$app = require_once __DIR__.'/../app/Kernel.php';



set_exception_handler(function($err){
    dd('global exception ...', $err);
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
    $end = microtime(1);
    dd($end, $start, (int)ceil(($end-$start)*1_000));
} catch (Exception $e) {
    dd('Exception ....', $e->getMessage());
}
