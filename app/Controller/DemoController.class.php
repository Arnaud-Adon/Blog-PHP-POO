<?php

namespace app\Controller\Admin;

use core\Database\QueryBuilder;

class DemoController extends AppController {

    public function index(){

        require ROOT.'/Query.class.php';

        $query = new QueryBuilder();

        echo \Query::select('id','titre', 'contenu')
        ->from('articles', 'Post')
        ->where('id = 1')
        ->where('Post.category_id = 1')
        ->where('Post.date > NOW()');

    }

}