<?php
/*
$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)){

	$result = $postTable->create(['titre' => $_POST['titre'],'contenu' => $_POST['contenu'], 'categorie_id' => $_POST['categorie_id']]);
	
	if($result){

        $id = App::getInstance()->getDb()->lastInsertId();

        header('Location: admin.php?page=posts.edit&id='.$id);
		?>
			<div class="alert alert-success">L'article a été ajouté.</div>
		<?php
	}else{
        ?>
			<div class="alert alert-danger">La requete ne s'est pas dérouler comme prévu</div>
		<?php
	}
}

$categories = App::getInstance()->getTable('Category')->extract('id','titre');

$form = new \core\HTML\BootstrapForm($_POST);
*/
?>

<?php if($errors): ?>
	<div class="alert alert-danger">La requete ne s'est pas dérouler comme prévu</div>

	<?php elseif($errors===false): ?>
		<div class="alert alert-success">L'article a été ajouté.</div>
<?php endif; ?>



<h1>Ajout de l'article</h1><br>


<form method="post" enctype="multipart/form-data">
	<?= $form->input('titre', 'Tire de l\'article'); ?>
	<?= $form->input('description', 'Description de l\'article'); ?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->input('MAX_FILE_SIZE', '', ['type' => 'hidden']); ?>
    <?= $form->input('image', 'Image', ['type' => 'file']); ?> 
	<?= $form->select('categorie_id', 'Categorie', $categories); ?>
	<?= $form->submit('Ajouter'); ?>
</form>