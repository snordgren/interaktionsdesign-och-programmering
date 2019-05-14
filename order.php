<?php

//Inluderar projektfiler
include "sqlite.php";

//Hämtar ett requestId för att kunna veta vilken response vi ska köra
$requestId = $_REQUEST["requestId"];

//*********************************************ADD TO ORDER*********************************************** */
//ADD TO ORDER
if ($requestId == "addToOrder") {

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

    //***********************************************REMOVE FROM ORDER********************************************* */
    //REMOVE FROM ORDER
} else if ($requestId == "removeFromOrder") {

    //Hämtar imdID
    $imgId = $_REQUEST["q"];
    $response = "";


    $sql1 = "DELETE FROM OrderVagn WHERE OrderVagn.fkey_Orginalbild = ?;";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([$imgId]);

    $response = "BILDEN BORTTAGEN";


    echo $response;


    //********************************************RESET ORDER (REMOVE ALL)************************************************ */
    //RESET ORDER (REMOVE ALL)
} else if ($requestId == "resetOrder") {

    $response = "";


    $sql1 = "DELETE FROM OrderVagn";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute();

    $response = "Ordern tömd";


    echo $response;
}


//******************************************************************************************** */
