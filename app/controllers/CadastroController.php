<?php

namespace app\Controllers;

use app\src\Validate;

class CadastroController extends Controller {

    public function create() {
        $this->view('cadastro', [
            'title' => 'Cadastro'
        ]);
    }

    public function store() {
        $validate = new Validate;

        $data = $validate->validate([
            'name' =>  'required:max@5',
            'email' =>  'required:email:unique@users',
            'phone' =>  'required:phone',
        ]);

        if($validate->hasErrors()) {
            return back();
        }
    }

}