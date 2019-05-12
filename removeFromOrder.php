<?php
//Inluderar projektfiler
include "sqlite.php";

//Hämtar imdID
$imgId = $_REQUEST["q"];
$response = "";


    $sql1 = "DELETE FROM OrderVagn WHERE OrderVagn.fkey_Orginalbild = ?;";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([$imgId]);

    $response = "BILDEN BORTTAGEN";


echo $response;