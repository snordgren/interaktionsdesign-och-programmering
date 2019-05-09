<?php

//För att kunna använda PDO
include 'pdo.php';


//Get the input
$q = $_REQUEST["q"];

//The response string
$response="";

//Formaterar
$qt = strtolower($q);

$qt = trim($qt);

//En array med varje ord separerat med " "
$qArray = explode(" ", $qt);

//itererar igenom arrayen
for ($x = 0; $x < count($qArray); $x++) {

    //letar efter "och" och tar bort det
   if($qArray[$x] == 'och'){
        //Tar bort "och" från arrayen
        unset($qArray[$x]);
        //Omordnar arryens indexering
        $qArray = array_values($qArray);

   }

}

//itererar igenom arrayen
for ($x = 0; $x < count($qArray); $x++) {

    //letar efter "med" och tar bort det
   if($qArray[$x] == 'med'){
        //Tar bort "och" från arrayen
        unset($qArray[$x]);
        //Omordnar arryens indexering
        $qArray = array_values($qArray);

   }

}

//Räknar hur många separata ord som söktes efter (antal element i arrayen)
$count = count($qArray);



  //To avoid duplicates we create an array
$usedBilder= array("test");


      
    //1 sökord
    if($count === 1){

        //SÄtter i till första (och enda) positionen i arryen
        $i = $qArray[0];
        //Lägger till en SQL-term för att funka med LIKE
        $i = $i . "%"; 
        
        /*   $stmt1 = $pdo->query( "SELECT * 
                                FROM orginalbild ob 
                                JOIN kategorirad kr on ob.orginalbild_ID = kr.f_key_orginalbild 
                                JOIN kategori k on kr.f_key_kategori = k.kategori_ID 
                                WHERE k.KategoriNamn 
                                LIKE '$i%'; ");                               
        */
        
        $sql1 = "SELECT * 
                    FROM orginalbild ob 
                    JOIN kategorirad kr on ob.orginalbild_ID = kr.f_key_orginalbild 
                    JOIN kategori k on kr.f_key_kategori = k.kategori_ID 
                    WHERE k.KategoriNamn 
                    LIKE '$i';";

        $stmt1 = $pdo->prepare($sql1);
        $stmt1->execute([$i]);

        //Går igenom alla rows som quarin gav en efter en
        while ($row = $stmt1 -> fetch (PDO::FETCH_ASSOC)){

            //Kollar ifall bilden (ID) redan blivit tillagd
            if (($key = array_search($row['orginalbild_ID'], $usedBilder)) == false){

                    //Om svars-stängen är tom så läggs bara ordet till..
                    if ($response === "") {
                        $response = $row['orginalbild_ID'];

                        //..annars så läggs ett , till innan ordet.
                    } else {
                        $response .= "," . $row['orginalbild_ID'];
                    }

                    //Sparar bilden som lades till i listan av usedBilder
                    array_push($usedBilder, $row['orginalbild_ID']);
            }
    }

         
    // 2 sökord
    }else if($count === 2){

        //Förbereder för SQL "LIKE"
        $i = $qArray[1] . "%";

        //Denna tar emot 2 ord. Endast det sista ordet ska behandlas med LIKE, medans orden innan är ===
        $sql2 = "SELECT kategorirad.f_key_orginalbild, count(distinct kategorirad.f_key_kategori) as antalKategorier 
                    FROM orginalbild 
                    INNER JOIN kategorirad ON kategorirad.f_key_orginalbild = orginalbild.orginalbild_ID 
                    INNER JOIN kategori ON kategorirad.f_key_kategori = kategori.kategori_ID WHERE kategori.KategoriNamn = ? OR kategori.KategoriNamn LIKE ? 
                    GROUP BY kategorirad.f_key_orginalbild 
                    HAVING (antalKategorier) = 2 ";

            $stmt2 = $pdo->prepare($sql2);
            //Tar första ordet i arrayen OCH $i som är sista positionen i arrayen behandlad för att klara av SQL's "LIKE"
            $stmt2->execute([$qArray[0], $i]);

            while ($row = $stmt2 -> fetch (PDO::FETCH_ASSOC)){

                //Kollar ifall bilden (ID) redan blivit tillagd
                if (($key = array_search($row['f_key_orginalbild'], $usedBilder)) == false){

                        //Om svars-stängen är tom så läggs bara ordet till..
                        if ($response === "") {
                            $response = $row['f_key_orginalbild'];

                            //..annars så läggs ett , till innan ordet.
                        } else {
                            $response .= "," . $row['f_key_orginalbild'];
                        }

                        //Sparar bilden som lades till i listan av usedBilder
                        array_push($usedBilder, $row['f_key_orginalbild']);
                }
            }
        
    //3 sökord
      }else if($count === 3){


      }
  
        
    //Echoar ut i URL'n 
    echo $response === "" ? "" : $response;
