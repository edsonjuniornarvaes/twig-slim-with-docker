<?php

namespace app\controllers;

use app\models\Posts;

class PostsController extends Controller {

    protected $post;

    public function __construt()
    {
        $this->post = new Posts;
    }

    public function index() {
        $posts = $this->post->all();

        $this->view('posts', [
            'title' => 'Lista de posts',
            'posts' => $posts
        ]);
    }
}