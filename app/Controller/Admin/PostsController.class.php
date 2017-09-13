<?php

namespace app\Controller\Admin;

use core\Controller\Controller;

use core\HTML\BootstrapForm;

use App;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add(){
        $errors='';
        if(!empty($_POST)){ 
            if(isset($_FILES['image'])){

                $extensions_valides = array('png', 'jpg', 'jpeg', 'gif');
                $maxsize = 100000;

                $result = $this->Post->create(['titre' => $_POST['titre'], 'description'=> $_POST['description'],'contenu' => $_POST['contenu'], 'image' => $_FILES['image']['name'], 'categorie_id' => $_POST['categorie_id']]);
                $dossier = '../public/images/img_posts/';
                $name_file = basename($_FILES['image']['name']);
                $file =  move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $name_file);
            }
	        if($result && $file){
                //$id = App::getInstance()->getDb()->lastInsertId();
                return $this->index();
	        }else{
                $error = true;
            }
        }
        //$postTable=$this->Post;
        $categories = $this->Category->extract('id','titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.add', compact('form','categories','errors'));
    }

    public function edit(){
        $errors='';
        if(!empty($_POST)){
	           $result = $this->Post->update($_GET['id'],[
                    'titre' => $_POST['titre'],
                    'description'=> $_POST['description'],
                    'contenu' => $_POST['contenu'], 
                    'categorie_id' => $_POST['categorie_id']
                ]);
               if($result){
                    return $this->index();
               }
        }

        $post= $this->Post->find($_GET['id']);
        $form = new BootstrapForm($post); 
        $categories = $this->Category->extract('id','titre'); 
        $this->render('admin.posts.edit', compact('categories','form','errors'));
    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Post->delete($_POST['id']);
            return $this->index();  
        }
    }
}