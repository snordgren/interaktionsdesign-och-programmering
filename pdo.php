<?php


$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'test';

//Set DSN
$dsn = 'mysql:host='. $host .';dbname='. $dbname ;

//Create a PDO instance
$pdo = new PDO ($dsn, $user, $password);

?>