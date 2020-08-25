<?php

require "../bootstrap.php";

$app->get('/', 'app\controllers\HomeController:index');
$app->get('/cadastro', 'app\controllers\CadastroController:create');
$app->post('/cadastro/store', 'app\controllers\CadastroController:store');
$app->get('/user/edit/{id}', 'app\controllers\UserController:edit');
$app->post('/user/update/{id}', 'app\controllers\UserController:update');
$app->get('/user/delete/{id}', 'app\controllers\UserController:destroy');
$app->get('/contato', 'app\controllers\ContatoController:index');
$app->post('/contato/store', 'app\controllers\ContatoController:store');
$app->get('/perfil', 'app\controllers\PerfilController:index');
$app->post('/user/photo/update', 'app\controllers\PerfilPhotoController:store');


$app->get('/admin', 'app\controllers\admin\AdminController:index');
$app->post('/login', 'app\controllers\admin\AdminController:store');

$app->run();