<?php

//Importerar PDO
include 'sqlite.php';

//Hämtar ett requestId för att kunna veta vilken response vi ska köra
$requestId = $_REQUEST["requestId"];


//************************************************************************ */
//SHOW IMAGE RESULTS
if ($requestId == "showImages") {


    //Get the input
    $q = $_REQUEST["q"];

    //The response string
    $response = "";

    //Formaterar
    $qt = strtolower($q);
    $qt = trim($qt);

    //En array med varje ord separerat med " "
    $qArray = explode(" ", $qt);

    //itererar igenom arrayen
    for ($x = 0; $x < count($qArray); $x++) {

        //letar efter "och" och tar bort det
        if ($qArray[$x] == 'och') {
            //Tar bort "och" från arrayen
            unset($qArray[$x]);
            //Omordnar arryens indexering
            $qArray = array_values($qArray);
        }
    }

    //itererar igenom arrayen
    for ($x = 0; $x < count($qArray); $x++) {

        //letar efter "med" och tar bort det
        if ($qArray[$x] == 'med') {
            //Tar bort "och" från arrayen
            unset($qArray[$x]);
            //Omordnar arryens indexering
            $qArray = array_values($qArray);
        }
    }

    //Räknar hur många separata ord som söktes efter (antal element i arrayen)
    $count = count($qArray);


    //To avoid duplicates we create an array
    $usedBilder = array("test");


    //1 sökord
    if ($count === 1) {

        //SÄtter i till första (och enda) positionen i arryen
        $i = $qArray[0];
        //Lägger till en SQL-term för att funka med LIKE
        $i = $i . "%";
        //$z = "'" . $qArray[0] . "'";




        /*   $stmt1 = $pdo->query( "SELECT * 
                                FROM orginalbild ob 
                                JOIN kategorirad kr on ob.orginalbild_ID = kr.f_key_orginalbild 
                                JOIN kategori k on kr.f_key_kategori = k.kategori_ID 
                                WHERE k.KategoriNamn 
                                LIKE '$i%'; ");                               
        */

        $sql1 = "SELECT * 
                FROM Orginalbild ob 
                INNER JOIN Kategorirad kr on ob.Orginalbild_Id = kr.fkey_Orginalbild 
                INNER JOIN Kategori on kr.fkey_Kategori = Kategori.Kategori_Id 
                WHERE Kategori.KategoriNamn 
                LIKE ?;";

        $stmt1 = $db->prepare($sql1);
        $stmt1->execute([$i]);

        //Går igenom alla rows som quarin gav en efter en
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {

            //Kollar ifall bilden (ID) redan blivit tillagd
            if (($key = array_search($row['Orginalbild_Id'], $usedBilder)) == false) {

                //Om svars-stängen är tom så läggs bara ordet till..
                if ($response === "") {
                    $response = $row['Orginalbild_Id'];

                    //..annars så läggs ett , till innan ordet.
                } else {
                    $response .= "," . $row['Orginalbild_Id'];
                }

                //Sparar bilden som lades till i listan av usedBilder
                array_push($usedBilder, $row['Orginalbild_Id']);
            }
        }


        // 2 sökord 
    } else if ($count === 2) {


        //Förbereder för SQL "LIKE"
        $i = $qArray[1] . "%";


        //Denna tar emot 2 ord. Endast det sista ordet ska behandlas med LIKE, medans orden innan är ===
        $sql2 = "SELECT Kategorirad.fkey_Orginalbild, Orginalbild.Antalkategorier
                    FROM Orginalbild 
                    INNER JOIN Kategorirad ON Kategorirad.fkey_Orginalbild = Orginalbild.Orginalbild_Id 
                    INNER JOIN Kategori ON Kategorirad.fkey_Kategori = Kategori.Kategori_Id 
                    WHERE Kategori.KategoriNamn = ? OR Kategori.KategoriNamn LIKE ? 
                    GROUP BY Kategorirad.fkey_Orginalbild 
                    HAVING AntalKategorier = 2";



        $stmt2 = $db->prepare($sql2);
        //Tar första ordet i arrayen OCH $i som är sista positionen i arrayen behandlad för att klara av SQL's "LIKE"
        $stmt2->execute([$qArray[0], $i]);

        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {

            //Kollar ifall bilden (ID) redan blivit tillagd
            if (($key = array_search($row['fkey_Orginalbild'], $usedBilder)) == false) {

                //Om svars-stängen är tom så läggs bara ordet till..
                if ($response == "") {
                    $response = $row['fkey_Orginalbild'];

                    //..annars så läggs ett , till innan ordet.
                } else {
                    $response .= "," . $row['fkey_Orginalbild'];
                }

                //Sparar bilden som lades till i listan av usedBilder
                array_push($usedBilder, $row['fkey_Orginalbild']);
            }
        }




        //3 sökord EJ TESTAD
    } else if ($count === 3) {

        //Förbereder för SQL "LIKE"
        $i = $qArray[2] . "%";

        //Denna tar emot 2 ord. Endast det sista ordet ska behandlas med LIKE, medans orden innan är ===
        $sql3 = "SELECT Kategorirad.fkey_Orginalbild, Orginalbild.Antalkategorier
                    FROM Orginalbild 
                    INNER JOIN Kategorirad ON Kategorirad.fkey_Orginalbild = Orginalbild.Orginalbild_Id 
                    INNER JOIN Kategori ON Kategorirad.fkey_Kategori = Kategori.Kategori_Id 
                    WHERE Kategori.KategoriNamn = ? OR Kategori.KategoriNamn = ? OR Kategori.KategoriNamn LIKE ? 
                    GROUP BY Kategorirad.fkey_Orginalbild 
                    HAVING AntalKategorier = 3";



        $stmt2 = $db->prepare($sql3);
        //Tar första ordet i arrayen OCH $i som är sista positionen i arrayen behandlad för att klara av SQL's "LIKE"
        $stmt2->execute([$qArray[0], $qArray[1], $i]);

        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {

            //Kollar ifall bilden (ID) redan blivit tillagd
            if (($key = array_search($row['fkey_Orginalbild'], $usedBilder)) == false) {

                //Om svars-stängen är tom så läggs bara ordet till..
                if ($response == "") {
                    $response = $row['fkey_Orginalbild'];

                    //..annars så läggs ett , till innan ordet.
                } else {
                    $response .= "," . $row['fkey_Orginalbild'];
                }

                //Sparar bilden som lades till i listan av usedBilder
                array_push($usedBilder, $row['fkey_Orginalbild']);
            }
        }
    }


    //Echoar ut i URL'n 
    echo $response === "" ? "" : $response;



    //*********************************************************************************************** */
    //SHOW IMAGE DETAILS
} else if ($requestId == "showImageDetails") {


    //Get the input
    $ID = $_REQUEST["q"];

    //The response array
    $response = "";



    $sql1 = "SELECT rowid, * FROM Orginalbild WHERE Orginalbild.orginalbild_Id = ?;";

    $stmt1 = $db->prepare($sql1);
    $stmt1->execute([$ID]);

    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {

        $response = $row['rowid'] . "," . $row['Titel'] . "," . $row['AntalKategorier'] . "," . $row['Upplösning'] . "," . $row['BildStatus'] . "," . $row['AntalAnvändningar'] . "," . $row['Fotograf'] . "," . $row['Datum'] . "," . $row['Plats'] . "," . $row['GPS'] . "," . $row['Beskrivning'];
    }


    //Echoar ut i URL'n 
    echo $response === "" ? "" : $response;
}
