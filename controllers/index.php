<?php

namespace Controllers;
class Index extends \MVC\DefaultController{
    public function index2(){
        $view = \MVC\View::getInstance();
        $view->username = 'dev';
        $view->appendToLayout('body', 'admin.index');
        $view->appendToLayout('body2', 'index');
        $view->display('layouts.default', array('c'=>array(1,2,3,4,8)), false);
    }
}