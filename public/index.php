<?php

define ('ROOT',dirname(__DIR__));

require ROOT.'/app/App.class.php';

App::load();

if(isset($_GET['page']) && !($_GET['page'] === 'posts.index')){
	$page = $_GET['page'];

	$page = explode('.',$page);

	if($page[0]==='admin'){
		$controller = 'app\Controller\Admin\\'.ucfirst($page[1]).'Controller';

		$action = $page[2];
	}else{
		$controller = 'app\Controller\\'.ucfirst($page[0]).'Controller';
		$action = $page[1];
	}
	$controller = new $controller();

	$controller->$action();

}
else{
	if(isset($_GET['p'])){
		$page ='posts.index';
		$p = $_GET['p'];
	}else{
		$page = 'posts.index';
		$p = 1;
	}

	$controller = new app\Controller\PostsController();
	$controller->index($p);
	
}

	



	








//ob_start();




/*
if($page === 'posts.index'){
	//require ROOT.'/pages/posts/home.php';
	$controller = new \app\Controller\PostsController();
	$controller->index();
}
elseif($page === 'posts.show'){
	//require ROOT.'/pages/posts/show.php';
	$controller = new \app\Controller\PostsController();
	$controller->show();
}

else if($page === 'posts.category'){
	//require ROOT.'/pages/posts/categorie.php';
	$controller = new \app\Controller\PostsController();
	$controller->category();
}

elseif($page === 'users.login'){
	//require ROOT.'/pages/users/login.php';
	$controller = new \app\Controller\Admin\UsersController();
	$controller->login();
}


//ob_start();

// pour les posts d'articles'

if($page === 'admin.posts.index'){
	//require ROOT.'/pages/admin/posts/index.php';
	$controller = new \app\Controller\Admin\PostsController();
	$controller->index();
}

else if($page === 'admin.posts.add'){
	//require ROOT.'/pages/admin/posts/add.php';
	$controller = new \app\Controller\Admin\PostsController();
	$controller->add();
}

else if($page === 'admin.posts.edit'){
	//require ROOT.'/pages/admin/posts/edit.php';
	$controller = new \app\Controller\Admin\PostsController();
	$controller->edit();
}

else if($page === 'admin.posts.delete'){
	//require ROOT.'/pages/admin/posts/delete.php';
	$controller = new \app\Controller\Admin\PostsController();
	$controller->delete();
}

// pour la partie admin categorie

else if($page === 'admin.categories.index'){
	//require ROOT.'/pages/admin/categories/index.php';
	$controller = new \app\Controller\Admin\CategoriesController();
	$controller->index();
}

else if($page === 'admin.categories.edit'){
	//require ROOT.'/pages/admin/categories/edit.php';
	$controller = new \app\Controller\Admin\CategoriesController();
	$controller->edit();
}

else if($page === 'admin.categories.add'){
	//require ROOT.'/pages/admin/categories/add.php';
	$controller = new \app\Controller\Admin\CategoriesController();
	$controller->add();
}

else if($page === 'admin.categories.delete'){
	//require ROOT.'/pages/admin/categories/delete.php';
	$controller = new \app\Controller\Admin\CategoriesController();
	$controller->delete();
}

////////////////////////////////////////////////////////////////////////////////////

/*elseif ($page === 'admin.posts.index') {
	$controller = new \app\Controller\Admin\PostsController();
	$controller->index();
}
*/

//$content = ob_get_clean();

//require ROOT.'/pages/templates/default.php';






//$app = App::getInstance();

//$posts = $app->getTable('Categories');
//$posts = $app->getTable('Categories');
//$posts->all();
//var_dump($posts);

/*
var_dump(app\App::getTable('Posts'));
var_dump(app\App::getTable('User'));
var_dump(app\App::getTable('Categories'));
*/


//$posts = \app\App::getTable('posts');



//$config =new app\Config();
//$config = app\Config::getInstance();

/*if(isset($_GET['p'])){

	$p= $_GET['p'];
}else{
	$p='home';
}
//initialisation des objets
//$db = new app\Database('test');

//Executer et garder  une  variable  

ob_start();

if($p === 'home'){
	require '../pages/home.php';
}

elseif($p === 'article'){
	require '../pages/single.php';
}

elseif($p === 'categorie'){
	require '../pages/categorie.php';
}

$content = ob_get_clean();

require '../pages/templates/default.php';

*/

