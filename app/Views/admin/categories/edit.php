<?php
/*
$categoryTable = App::getInstance()->getTable('Category');

$post= $categoryTable->find($_GET['id']);

if(!empty($_POST)){
    $result = $categoryTable->update($_GET['id'],['titre' => $_POST['titre']]);

    $post= $categoryTable->find($_GET['id']);

    if($result){
        ?>
            <div class="alert alert-success">La catégorie a bien été ajouter.</div>
        <?php
    }else{
        ?>
            <div class="alert alert-danger">La requête a échoué.</div>
        <?php
    }
}

$form = new \core\HTML\BootstrapForm($post);

*/
?>

<form method="post">
    <?= $form->input('titre','Titre') ?>
    <?= $form->submit('Sauvegarder') ?>
</form>
