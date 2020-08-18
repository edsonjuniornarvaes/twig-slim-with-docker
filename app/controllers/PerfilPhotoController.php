<?php

namespace app\controllers;
use app\src\Image;

class PerfilPhotoController extends Controller {
    public function store() {
        $imagem = new Image('file');
        $imagem->size('user')->upload();
    }   
}