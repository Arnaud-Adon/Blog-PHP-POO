<?php
/*
$app = App::getInstance();
$post = $app->getTable('Post')->findWithCategory($_GET['id'])[0];
if($post === false){
    $app->notFound();
}
phpinfo();
var_dump($post);
$app->title = $post->titre;
var_dump($app);
var_dump($post);
*/
?>


<div id="post-show">
	<h1><?= $post->titre; ?></h1>

	<p><em>Ecrit le <?= $post->date ?>    |    <?= $post->categorie; ?></em></p>

	<p class="content-show"><?= $post->contenu; ?></p>

	<a href="http://twitter.com/share" class="twitter-share-button" 
  	data-count="vertical" data-via="InfoWebMaster">Tweet</a><br>
	<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

	<a name="fb_share" type="box_count" share_url="http://www.example.com/page.html"></a>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

	

	<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>
	<script type="in/share" data-counter="top"></script>
</div>

