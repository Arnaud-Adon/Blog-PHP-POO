<?php
/*
if(!empty($_POST)){

	$auth = new \core\Auth\DBAuth(App::getInstance()->getDb());

	if($auth->login($_POST['username'], $_POST['password'])){

		header('Location:admin.php');
		
	}else{
		?>
		<div class="alert alert-danger">Identifiant incorrect</div>
		<?php
	}
	
}
	
$form = new \core\HTML\BootstrapForm($_POST);
*/
?>

<?php if($errors): ?>
	<div class="alert alert-danger">Identifiant incorrect</div>
<?php endif; ?>




<h1>Connexion</h1>



<form method="post">
	<?= $form->input('username','Pseudo', false); ?>
	<?= $form->input('password','Mot de passe',['type'=>'password'], false);?>
	<?= $form->submit('Envoyer');?>
</form>