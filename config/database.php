<?php
$cnf['default']['connection_uri'] = 'mysql:host=localhost;dbname=test';
$cnf['default']['username'] = 'dev';
$cnf['default']['password'] = 'dev';
$cnf['default']['pdo_oprions'][PDO::MYSQL_ATTR_INIT_COMMAND]="SET NAMES 'UTF8'";
$cnf['default']['pdo_oprions'][PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;

;
$cnf['session']['connect_uri'] = 'mysql:host=localhost;dbnam=sessions';
$cnf['session']['username'] = 'dev';
$cnf['session']['pass'] = 'dev';
$cnf['default']['pdo_oprions'][PDO::MYSQL_ATTR_INIT_COMMAND]="SET NAMES 'UTF8'";
$cnf['default']['pdo_oprions'][PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;


return $cnf;