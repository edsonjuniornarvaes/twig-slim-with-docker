<?php

require "../bootstrap.php";

$app->get('/', 'app\controllers\HomeController:index');
$app->get('/cadastro', 'app\controllers\CadastroController:create');
$app->post('/cadastro/store', 'app\controllers\CadastroController:store');
$app->get('/user/edit/{id}', 'app\controllers\UserController:edit');
$app->post('/user/update/{id}', 'app\controllers\UserController:update');
$app->get('/user/delete/{id}', 'app\controllers\UserController:destroy');

$app->run();