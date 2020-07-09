<?php

namespace app\controllers;

use app\models\Posts;

class PostsController extends Controller {

    public function index() {
        $posts = new Posts;
        $posts = $posts->all();

        dd($posts);

    }

}