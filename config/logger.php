<?php



return [
    'LOG_TYPE' => env('LOG_TYPE', 'file'),
    'LOG_PATH' => env('LOG_PATH', __DIR__.'/../storage/logs/main.txt'),
];