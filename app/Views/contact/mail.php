<div id="contact-mail">
	<h1>Contact</h1>

	<p>Vous pouvez obtenir différentes informations ou me contacter en remplissant le formulaire ci-dessous, à bientôt !</p>

	<form method="post">
		<?= $form->input('name','Nom') ?>
		<?= $form->input('email','Email') ?>
		<?= $form->input('message','Message',['type' =>'textarea']) ?>
		<?= $form->submit('Envoyer') ?>
	</form>
</div>