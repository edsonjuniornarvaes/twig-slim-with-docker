<?php

namespace app\controllers;
use app\models\Users;

class HomeController extends Controller{

    public function index(){

        $users = new Users;
        $users = $users->select()->where('id', '=', 10)->get();
        
        $this->view('home', [
            'nome' => 'Edson',
            'title' => 'Home'
        ]);
    }

};

