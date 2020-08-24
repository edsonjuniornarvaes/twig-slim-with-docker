<?php

namespace app\src;

use app\models\Model;
use app\src\Password;

class Login {
	public function login($data, Model $model) {
        $user = $model->findBy('email', $data->email);

        if(!user) {
            return false;
        }

        if(Password::verify($data->password, $user->password)) {
            return true;
        }

        return false;
	}
}
