<?php

namespace MVC;
class FrontController{
    private static $_instance = null;
    private $ns = null;
    private $controller = null;
    private $method = null;
    private function __construct(){

    }

    public function dispatch(){
        $a = new \MVC\Routers\DefaultRouter();
        $_uri=$a->getURI();
        $routes = \MVC\App::getInstance()->getConfig()->routes;
        if (is_array($routes) && count($routes)>0){
            foreach($routes as $k => $v){
                if(stripos($_uri, $k)===0 && $v['namespace']){
                    $this->ns=$v['namespace'];
                    break;
                }
            }
        } else {
            throw new \Exception('Default route missing', 500);
        }
        if($this->ns == null && $routes['*']['namespace']){
            $this->ns = $routes['*']['namespace'];
            $_rc = $routes['*']['namespace'];
        } else if ($this->ns == null && !$routes['*']['namespace']){
            throw new \Exception ("Default route missing", 500);
        }
    }


    public function getDefaultController(){
        $controller = \MVC\App::getInstance()->getConfig()->app['default_controller'];
        if($controller){
            return $controller;
        }
        return 'Index';
    }

    public function getDefaultMethod(){
        $method = \MVC\App::getInstance()->getConfig()->app['default_method'];
        if($method){
            return $method;
        }
        return 'index';
    }

    public static function getInstance(){
        if(self::$_instance == null){
            self::$_instance = new \MVC\FrontController();
        }
        return self::$_instance;
    }
}