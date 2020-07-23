<?php

session_start();

require "vendor/autoload.php";

use Dopesong\Slim\Error\Whoops as WhoopsError;
use Slim\App;

$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];


$app = new App($config);

$container = $app->getContainer();

$container['phpErrorHandler'] = $container['errorHandler'] = function($c) {
    return new WhoopsError();
};