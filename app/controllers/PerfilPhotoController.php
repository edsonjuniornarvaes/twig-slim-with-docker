<?php

namespace app\controllers;

class PerfilPhotoController extends Controller {
    public function store() {
        $imagem = new Image;
        $imagem->size('post')->upload();
    }   
}