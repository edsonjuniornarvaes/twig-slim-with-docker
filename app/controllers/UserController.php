<?php

namespace app\controllers;

use app\models\Users;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends Controller {

   public function edit($request, $response, $args) {
        $user = new Users;
        $user = $user->select()->where('id', $args['id'])->first();

        $this->view('user', [
            'title' => 'Editar user',
            'user' => $user
        ]);
   }

   public function edit($request, $response, $args) {
        dd($args);   
   }

}