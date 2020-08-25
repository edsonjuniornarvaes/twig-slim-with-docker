<?php

namespace app\controllers\admin;

use app\controllers\Controller;

class PainelController extends Controller {

	public function index() {
		$this->view('admin.painel', []);
	}

}
