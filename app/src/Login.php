<?php

namespace app\src;

use app\models\Model;
use app\src\Password;

class Login {

    private $type;

    public function type($type) {
        $this->type = $type;

        return $this;
    }

	public function login($data, Model $model) {

        $config = (object) Load::file('/config.php')['login'][$this->type];
        $user = $model->findBy('email', $data->email);

        if(!user) {
            return false;
        }

        if(Password::verify($data->password, $user->password)) {
            $_SESSION[$config->idLoggedIn] = $user->id;
            $_SESSION[$config->loggedIn] = true;
            return true;
        }

        return false;
	}
}
