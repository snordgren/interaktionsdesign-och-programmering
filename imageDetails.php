<?php

include "sqlite.php";

//Get the input
$ID = $_REQUEST["q"];

//The response array
$response = "";



    $sql1 = "SELECT rowid, * FROM Orginalbild WHERE Orginalbild.orginalbild_Id = ?;";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([$ID]);

    while ($row = $stmt1 -> fetch (PDO::FETCH_ASSOC)){

      $response = $row['rowid'] . "," . $row['Titel'] . "," . $row['AntalKategorier'] . "," . $row['Upplösning'] . "," . $row['BildStatus'] . "," . $row['AntalAnvändningar'] . "," . $row['Fotograf'] . "," . $row['Datum'] . "," . $row['Plats'] . "," . $row['GPS'] . "," . $row['Beskrivning'];

    }
    

 //Echoar ut i URL'n 
 echo $response === "" ? "" : $response;
