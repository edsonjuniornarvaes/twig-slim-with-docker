<?php

namespace app\controllers;

use app\models\Users;
use app\src\Validate;

class CadastroController extends Controller {

	public function create() {
		$this->view('cadastro', [
			'title' => 'Cadastro',
		]);
	}

	public function store() {

		$validate = new Validate;

		$data = $validate->validate([
			'name' => 'required',
			'email' => 'required:email:unique@users',
			'phone' => 'required:phone',
		]);

		if ($validate->hasErrors()) {
			return back();
		}

		$user = new Users;
		$user = $user->create((array)$data);

		if($user){

			flash('message',success('Cadastrado com sucesso !'));
			return back();
			
		}

	}

}