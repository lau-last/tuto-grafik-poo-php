<?php

namespace App\Controller;

use Core\Controller\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = \App\App::getInstance()->getTable(\App\Table\PostTable::class)->last();
        $categories = \App\App::getInstance()->getTable(\App\Table\CategoryTable::class)->all();
        $this->render('posts.index');
    }

    public function categories()
    {

    }

    public function show()
    {

    }
}