<?php

namespace app\Controller;



use core\Controller\Controller;

use App;

class AppController extends Controller{

    protected $template = 'nouveau_default';

    public function __construct(){
        $this->viewPath = ROOT .'/app/Views/';
    }

    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }
}