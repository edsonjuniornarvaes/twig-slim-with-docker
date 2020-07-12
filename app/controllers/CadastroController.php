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
            'name' =>  'required',
            'email' =>  'required:email',
            'phone' =>  'required:phone',
        ]);

        // $validate->errors();

        if($validate->hasErrors()) {
            return back();
        }
    }

}