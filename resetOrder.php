<?php
//Inluderar projektfiler
include "sqlite.php";

$response = "";


    $sql1 = "DELETE FROM OrderVagn";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute();

    $response = "Ordern tömd";


echo $response;