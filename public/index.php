<?php

require "../bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

// $app->get('/', function(Request $request, Response $response, array $args) {
//     dd($request);
// });

$app->get('/','app\controllers\HomeController:index');
$app->get('/cadastro','app\controllers\CadastroController:create');
$app->post('/cadastro/store','app\controllers\CadastroController:store');

$app->run();

