<?php
/*
$app= App::getInstance();

$category = $app->getTable('Category')->find($_GET['id']);

$posts= $app->getTable('Post')->LastByCategory($_GET['id']);

$categories = $category->all();

if($category === false){
	
	$app->notFound();

}
*/
?>

<h1>Dans la categorie </h1>

<div class="row">
	<div class="col-sm-8">
	<?php foreach($posts as $post): ?>

		<h2><a href="<?php echo $post->url;  ?> "><?php echo $post->titre; ?></a></h2>

		<p><em><?php echo $post->categorie; ?></em></p>

		<p><?= $post->extrait; ?></p>


	<?php endforeach; ?>
	</div>
	
	<div class="col-sm-4">
		<?php foreach ($categories as $categorie): ?>
			<ul>
				<li><a href="<?php echo $categorie->url; ?>"><?php echo $categorie->titre; ?></a></li>
				
			</ul>

		<?php endforeach; ?>
	</div>
	


</div>