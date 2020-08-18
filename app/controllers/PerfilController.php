<?php

namespace app\controllers;

class PerfilController extends Controller {
    public function index() {
        $this->view('perfil', [
            'title' => 'Upload de imagens com resize'
        ]);
    }
}