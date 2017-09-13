




 <h1><em>Page single</em> - Article selectionné </h1>

    <p><a href="index.php?p=home">Home</a></p>

    <?php /*$post = app\App::getDb()->prepare('SELECT * From articles WHERE id = ?',[$_GET['id']],'app\Table\Article',true);*/
    //var_dump($post);
      ?>

     
      <!--<p><?php echo $post->categorie ?></p>-->

<?php

		use app\App;
		use app\Table\Article;
		//use app\Table\Categorie;

      $post = Article::find($_GET['id']);

      if($post === false){
      		App::notFound();
      }

      App::setTitle($post->titre);

 ?>

<h1><?php echo $post->titre; ?></h1>

<h4><em><?php echo $post->categorie; ?></em></h4>

<p><h2><?php echo $post->contenu; ?></h2></p>



