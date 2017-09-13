<?php
/*
$categoryTable = App::getInstance()->getTable('Category');

if(!empty($_POST)){
    $result = $categoryTable->create(['titre' => $_POST['titre']]);

    //$id = App::getInstance()->getDb()->lastInsertId();

    header('Location:admin.php?page=categories.index');
}

$form = new \core\HTML\BootstrapForm($_POST);

*/
?>
<form method="post">
    <?= $form->input('titre','Titre') ?>
    <?= $form->submit('Sauvegarder') ?>
</form>
