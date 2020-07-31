<?php

namespace app\controllers;

use app\models\Users;

class HomeController extends Controller 
{

	public function index() 
	{
		$users = new Users;
		
		$users = $users->select()->paginate(3)->get();

		dd($user->links());

		$this->view('home', [
			'users' => $users,
			'title' => 'Home',
			'links' => $user->links()
		]);
	}

}