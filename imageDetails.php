<?php

include "sqlite.php";

//Get the input
$ID = $_REQUEST["q"];

//The response array
$response = "";



    $sql1 = "SELECT * FROM Orginalbild WHERE Orginalbild.orginalbild_Id = ?;";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([$ID]);

    while ($row = $stmt1 -> fetch (PDO::FETCH_ASSOC)){

      $response = $row['Orginalbild_Id'] . "," . $row['Titel'] . "," . $row['Upplösning'];

    }


 //Echoar ut i URL'n 
 echo $response === "" ? "" : $response;
