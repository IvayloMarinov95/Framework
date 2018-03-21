<?php
error_reporting(E_ALL ^ E_NOTICE);
include '..\App.php';
use MVC\App;


$app = App::getInstance();


$app->run();
