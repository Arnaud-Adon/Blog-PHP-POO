<?php

namespace app\Controller;

use core\Controller\Controller;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index($page){

        $nbPost = $this->Post->nbPost();
        $nbByPage = 4;
        $arr = ($nbPost/$nbByPage);
        $nbPage = ceil($arr);

        if($page > 0 && $page <= $nbPage){
            $posts = $this->Post->last($page,$nbByPage);
            $categories = $this->Category->all();
            $cPage = $page;
        }
        $this->render('posts.index', compact('posts', 'categories','nbPage','cPage'));
    }

    public function category(){
        $posts = $this->Post->LastByCategory($_GET['id']);
        $category = $this->Category->find($_GET['id']);
            if($category === false){
	            $this->notFound();
            }
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts', 'category', 'categories'));
    }

    public function show(){
        $post = $this->Post->findWithCategory($_GET['id'])[0];
        if($post === false){
            $this->notFound();
        }
        $this->render('posts.show', compact('post'));
    }

    public function about(){
        $this->render('posts.about');
    }
}