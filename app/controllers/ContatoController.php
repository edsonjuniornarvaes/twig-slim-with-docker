<?php

namespace app\controllers;

use app\src\Email;
use app\src\Validate;
use app\templates\Contato;

class ContatoController extends Controller{

    public function index(){
        $this->view('contato',[
            'title' => 'Contato',
            'nome' => 'Alexandre'
        ]);
    }

    public function store(){

        $validate = new Validate;

        $data = $validate->validate([
            'name' => 'required',
            'email' => 'required:email',
            'assunto' => 'required',
            'mensagem' => 'required'
        ]);

        if($validate->hasErrors()){
            return back();
        }

        $email = new Email;

        $email->data([
            'fromName' => $data->name,
            'fromEmail' => $data->email,
            'toName' => 'Alexandre Cardoso',
            'toEmail' => 'xandecar@hotmail.com',
            'assunto' => $data->assunto,
            'mensagem' =>$data->mensagem, 
        ])->template(new Contato)->send();

    }

}