<?php

use App\Controllers\MainController;
use Core\App;

require_once '../vendor/autoload.php';
require_once __DIR__.'/../routes/api.php';
require_once __DIR__.'/../app/Kernel.php';
ini_set('display_errors',true);
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();
$app = new App;
$app->run();
