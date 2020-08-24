<?php

namespace app\controllers;
use app\models\Users;

class PerfilController extends Controller {

    public function index() {
        $user = new Users;
        $user = $user->select()->where('id', 1)->first();
        $this->view('perfil', [
            'title' => 'Upload de imagens com resize',
            'user' => $user,
        ]);
    }
}