<?php

namespace app\Controller;

use core\Controller\Controller;
use core\Auth\DBAuth;
use App;

class UsersController extends AppController{

    public function login(){

        $errors = false;
        
        if(!empty($_POST)){

	    $auth = new DBAuth(App::getInstance()->getDb());

	    if($auth->login($_POST['username'], $_POST['password'])){

		    header('Location:index.php?page=admin.posts.index');
		
	    }   else{
                $errors = true;
	        }
	
        }       
	
        $form = new \core\HTML\BootstrapForm($_POST);

        $this->render('users.login', compact('form','errors'));
    }


}