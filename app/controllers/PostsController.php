<?php

namespace app\controllers;

use app\models\Posts;

class PostsController extends Controller{

	protected $post;

    public function __construct()
    {
        $this->post = new Posts;
    }

    public function index(){

        $posts = $this->post->postsWithIdGreaterThan2();

        $this->view('posts',[
            'title' => 'Lista de posts',
            'posts' => $posts
        ]);
    }

}