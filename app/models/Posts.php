<?php

namespace app\models;

class Posts extends Model 
{
	protected $table = 'posts';

	public function posts() {
		$this->sql = "select * from {$this->table} inner join users on users.id = posts.user";

		return $this;
	}

}