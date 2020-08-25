<?php

namespace app\src;

use app\models\Model;
use app\src\Password;

class Login {

	private $type;

	private $config;

	public function __construct($type) {
		$this->type = $type;

		$this->config = (object) Load::file('/config.php')['login'][$this->type];
	}

	public function login($data, Model $model) {

		if (!isset($this->type)) 
		{
			throw new \Exception("Para fazer o login, verifique se esta passando o tipo");
		}

		$user = $model->findBy('email', $data->email);

		if (!$user) 
		{
			return false;
		}

		if (Password::verify($data->password, $user->password)) {
			$_SESSION[$this->config->idLoggedIn] = $user->id;
			$_SESSION[$this->config->loggedIn] = true;
			return true;
		}

		return false;

	}

	public function logout() 
	{

		session_destroy();

		return redirect($this->config->redirect);

	}

}
