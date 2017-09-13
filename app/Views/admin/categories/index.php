
<?php
//$categories = App::getInstance()->getTable('Category')->all();
?>

<h1>Administration des catégories</h1>

<p>
    <a type="submit" class="btn btn-success" href="?page=admin.categories.add">Ajouter une catégorie</a>
</p>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nom de la catégorie</td>
            <td>Actions</td>
            <td>Date</td>
        </tr>
    </thead>
    <tbody> 
    
        <?php foreach($categories as $category): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->titre ?></td>
            <td>
                <a type="submit" class="btn btn-primary" href="?page=admin.categories.edit&id=<?=$category->id?>">Modifier</a>
                <form method="post" action="?page=admin.categories.delete" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $category->id ?>">
                    <button type="submit" class="btn btn-danger" href="?page=admin.categories.delete&id=<?=$category->id?>">Supprimmer</button> 
                </form>
            </td>
            <td><?= $category->date ?></td>
        </tr>
        <?php endforeach; ?>
    
    </tbody>
</table>

 <a href="?page=index" class="btn btn-default">Retour à la gestion des articles</a>


