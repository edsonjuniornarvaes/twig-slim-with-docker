<?php

require "../bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

// $app->get('/', function(Request $request, Response $response, array $args) {
//     dd($request);
// });

$app->get('/','app\controllers\HomeController:index');
$app->get('/user/update/{id}', 'app\controllers\UserController:update');
$app->get('/contato', 'app\controllers\ContatoController:show');

$app->run();

