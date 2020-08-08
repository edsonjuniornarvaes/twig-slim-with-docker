<?php

namespace app\models;

use app\models\Connection;
use app\traits\Create;
use app\traits\Delete;
use app\traits\Read;
use app\traits\Update;

abstract class Model {

	use Create, Read, Update, Delete;

	protected $connect;
	protected $field;
	protected $value;
	protected $sql;

	public function __construct() {
		$this->connect = Connection::connect();
	}

	public function all() {
		$this->sql = "select * from {$this->table}";

		return $this;
	}

	public function find($field, $value) {
		$this->field = $field;

		$this->value = $value;

		return $this;
	}

	public function destroy($field, $value) {
		$sql = "delete from {$this->table} where {$field} = :{$field}";
		$delete = $this->connect->prepare($sql);
		$delete->bindValue($field, $value);
		$delete->execute();

		return $delete->rowCount();
	}

}