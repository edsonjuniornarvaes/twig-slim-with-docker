<?php

require "vendor/autoload.php";

use Slim\App;

$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];


$app = new App($config);