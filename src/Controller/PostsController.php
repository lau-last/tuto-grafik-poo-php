<?php

namespace App\Controller;

use App\Table\CategoryTable;
use App\Table\PostTable;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel(PostTable::class);
        $this->loadModel(CategoryTable::class);
    }

    public function index()
    {
        $posts = \App\App::getInstance()->getTable(\App\Table\PostTable::class)->last();
        $categories = \App\App::getInstance()->getTable(\App\Table\CategoryTable::class)->all();
        $this->render('posts.index', \compact('posts', 'categories'));
    }

    public function categories()
    {
        $app = \App\App::getInstance();
        $categorie = $app->getTable(\App\Table\CategoryTable::class)->find($_GET['id']);

        if ($categorie === false) {
            App\App::notFound();
        }

        $articles = $app->getTable(\App\Table\PostTable::class)->lastByCategory($_GET['id']);
        $categories = $app->getTable(\App\Table\CategoryTable::class)->all();

    }

    public function show()
    {

    }
}