<?php

namespace app\controllers\admin;

use app\controllers\Controller;
use app\models\admin\Admin;
use app\src\Login;
use app\src\Validate;


class AdminController extends Controller {
	public function index() {
		$this->view('admin.login', []);
	}

	public function store() {
		$validate = new Validate;
		$data = $validate->validate([
			'email' => 'required:email',
			'password' => 'required',
		]);

		if ($validate->hasErrors()) {
			return back();
		}

		$login = new Login('admin');
		$loggedIn = $login->login($data, new Admin);

		if ($loggedIn) {
			redirect('/painel');
		}
	}

	public function destroy() {
		$login = new Login('admin');
		return $login->logout();

	}
}
