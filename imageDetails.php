<?php

include "pdo.php";

//Get the input
$ID = $_REQUEST["q"];

//The response array
$response = "";


    $sql1 = "SELECT * FROM orginalbild ob WHERE ob.orginalbild_ID = ?;";

    $stmt1 = $pdo->prepare($sql1);
    $stmt1->execute([$ID]);

    while ($row = $stmt1 -> fetch (PDO::FETCH_ASSOC)){

      $response = $row['Titel'];

    }


 //Echoar ut i URL'n 
 echo $response === "" ? "" : $response;
