
<?php 

//$posts=App::getInstance()->getTable('Post')->all();

?>

<h1>Administrer les article</h1>

<p>
	<a href="?page=admin.posts.add" class="btn btn-success">Ajouter un article</a>
</p>

<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
			<td>Date de création</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?= $post->id?></td>
				<td><?= $post->titre?></td>
				<td>
					<a class="btn btn-primary" href="?page=admin.posts.edit&id=<?= $post->id ?>">Editer</a>
					
					<!-- Par défaut les serveurs empeche le cross cripting - appeler un serveur de differentes manieres / par image en url par exemple -->
					<form action="?page=admin.posts.delete" method="post"  style="display:inline;">
						<input type="hidden" name="id" value="<?= $post->id ?>">
						<button type="submit" class="btn btn-danger" href="?page=admin.posts.delete&id=<?= $post->id ?>">Supprimmer</button>
					</form>
					
				</td>
				<td><?= $post->date ?></td>
			</tr>
		
		<?php endforeach; ?>
	</tbody>
</table>

 <a href="index.php" class="btn btn-default">Retour à la lecture des différents articles</a>

 <a href="?page=admin.categories.index" class="btn btn-default">Gestion des catégories</a>
