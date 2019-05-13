<?php

$a = $_REQUEST['image-title'];
$b = $_REQUEST['image-description'];
$c = $_REQUEST['image-ownership'];
$d = $_REQUEST['usage-number'];       

$response = $a . ", " . $b . ", " . $c . ", " . $d;

echo $response;