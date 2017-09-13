<?php
/*
$postTable = App::getInstance()->getTable('Post');

$categories = App::getInstance()->getTable('Category')->extract('id','titre');

$post= $postTable->find($_GET['id']);

if(!isset($post)){
	echo 'l\'article n\'existe pas';
}
	
$form = new \core\HTML\BootstrapForm($post);

//var_dump($form);

if(!empty($_POST)){
	$result = $postTable->update($_GET['id'],['titre' => $_POST['titre'],'contenu' => $_POST['contenu'], 'categorie_id' => $_POST['categorie_id']]);

	$post= $postTable->find($_GET['id']);

	$form = new \core\HTML\BootstrapForm($post);

	//var_dump($result);

	if(!$result){
		?>
			<div class="alert alert-danger">La requete ne s'est pas dérouler comme prévu</div>
		<?php
	}else{
		?>
			<div class="alert alert-success">L'article a été mise à jour</div>
		<?php
	}
}

//var_dump($post);
//var_dump($form);


*/
?>
<?php if($errors && $errors_file): ?>
	<div class="alert alert-danger">La requete ne s'est pas dérouler comme prévu</div>

	<?php elseif($errors===false && $errors_file===false): ?>
		<div class="alert alert-success">L'article a été ajouté.</div>
<?php endif; ?>


<h1>Edition de l'article</h1><br>


<form method="post">
	<?= $form->input('titre', 'Tire de l\'article'); ?>
	<?= $form->input('description', 'Description de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
	<?= $form->select('categorie_id', 'Categorie', $categories); ?>
	<?= $form->submit('Sauvegarder'); ?>
</form>