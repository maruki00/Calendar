<?php


use App\Controllers\MainController;
use Core\App;
$d = function($name){
    echo $name;
};

require_once '../vendor/autoload.php';
$app = require_once __DIR__.'/../app/Kernel.php';
require_once __DIR__.'/../routes/api.php';

set_exception_handler(function($err){
    dd($err);
});
dd(2345);


$d('abdullah');
dd(gettype($d));

ini_set('display_errors',true);
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

try {
    $app->run();
} catch (Exception $e) {
    dd('Exception ....');
}
