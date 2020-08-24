<?php

namespace app\controllers;
use app\src\Image;
use app\src\Validate;

class PerfilPhotoController extends Controller {

    public function store() {
        $validate = new Validate;
        $validate->validate([
            'file' => 'image'
        ]);

        if($validate->hasErrors()) {
            return back();
        }

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