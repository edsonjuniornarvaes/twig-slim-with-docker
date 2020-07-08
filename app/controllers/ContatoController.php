<?php

namespace app\controllers;

class ContatoController extends Controller {
    public function show() {
        $this->view('contato', [
            'title'=> 'Contato'
        ]);
    }
}