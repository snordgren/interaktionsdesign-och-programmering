<?php
//Inluderar projektfiler
include "sqlite.php";

//Hämtar imdID
$imgId = $_REQUEST["q"];
$response = "1";

//******* Här kommer bilden läggas till i aktuella ordern *******/

//Kollar först ifall bilden redan finns i Ordervagnen
    $check = "";

    $sql1 = "SELECT COUNT(1) AS result FROM OrderVagn WHERE OrderVagn.fkey_Orginalbild = ?;";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([$imgId]);
    //Om bilden redan finns så kommer 
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $check = $row['result'];
      }

if ($check >= 1) {

    $response = "ERROR - FINNS REDAN I ORDER";
    
   
} else { 

    $sql2 = "INSERT INTO OrderVagn (fkey_Orginalbild) VALUES (?);";

    $stmt2 = $db->prepare($sql2);
    $stmt2->execute([$imgId]);

    $response = "BILDEN TILLAGD";
}


echo $response;
