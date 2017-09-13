<?php

$categoryTable = App::getInstance()->getTable('Category');

if(!empty($_POST)){
    $result = $categoryTable->delete($_POST['id']);

    if($result){
        header('Location: admin.php?page=categories.index');
    }
}

?>
