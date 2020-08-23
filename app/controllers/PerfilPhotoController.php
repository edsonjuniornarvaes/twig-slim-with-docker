<?php

namespace app\controllers;
use app\src\Image;
use app\models\Users;

class PerfilPhotoController extends Controller {

    public function store() {

        $user = new Users;
        $userEncontrado = $user->select()->where('id', 1)->first();

        $imagem = new Image('file');
        $imagem->delete($userEncontrado->photo);
        $imagem->size('user')->upload();

        $user->find('id', 1)->update([
            'photo' => "/assets/imgs/photos/{$imagem->getName()}",
        ]);

        flash('message', success('Upload feito com sucesso'));

        back();
    }   

}