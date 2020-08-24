<?php

namespace app\controllers;

use app\models\Users;
use app\src\Password;

class HomeController extends Controller {
	public function index() {
		$user = new Users;
		$users = $user->select()->busca('name', 'email')->paginate(2)->get();
		
		$login = new Users;
		$loggedIn = $login->login($data, new Users);

		if($loggedIn) {
			return false;	
		}

		$this->view('home', [
			'users' => $users,
			'title' => 'Home',
			'links' => $user->links()
		]);
	}
}
