<?php

namespace app\models\admin;

use app\models\Model;

class Admin extends Model {
	protected $table = 'admin';

	public function user() {
		$id = $_SESSION['id_admin'];

		$this->sql = "select * from {$this->table}";

		$this->where('id', $id);

		return $this->first();
	}

}
