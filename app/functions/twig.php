<?php

use app\models\admin\Admin;
use app\src\Flash;

$message = new \Twig_SimpleFunction('message', function ($index) {
	echo Flash::get($index);
});

$admin = new \Twig_SimpleFunction('admin', function () {
	return Admin::getUser();
});

return [
	$message, $admin,
];
