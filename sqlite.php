<?php
try {

      //open the database

      $db = new PDO('sqlite:DB_PDO.sqlite');

      //Setting up a check if the database i already created or not
      $check = "";

      $result = $db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='Orginalbild';");
      foreach ($result as $row) {
            //Setting $check as the name of the
            $check = $row['name'];
      }

      if ($check != "Orginalbild") {

            //create the database
            $db->exec("CREATE TABLE Orginalbild (Orginalbild_Id INTEGER, Titel TEXT, AntalKategorier INTEGER, Upplösning TEXT)");
            $db->exec("CREATE TABLE Kategori (Kategori_Id INTEGER, KategoriNamn TEXT)");
            $db->exec("CREATE TABLE Kategorirad (Kategorirad_Id INTEGER, fkey_Orginalbild INTEGER, fkey_Kategori INTEGER)");
            $db->exec("CREATE TABLE OrderVagn (fkey_Orginalbild INTEGER)");

            //INSERT INTO ORGINALBILD
            $db->exec("INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (1, 'Hund 1', 1, '1920 x 1080');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (2 , 'Hund 2', 1, '1920 x 1080'); " .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (3, 'Hund 3', 1, '3840 × 2160');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (4, 'Hund 4', 1, '3840 × 2160');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (5, 'Katt 1', 1, '3840 × 2160');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (6, 'Katt 2', 1, '1920 x 1080');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (7, 'Katt 3', 1, '1920 x 1080');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (8, 'Katt 4', 1, '1920 x 1080');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (9, 'Hund+katt 1', 2, '3840 × 2160');" .
                  "INSERT INTO Orginalbild (Orginalbild_Id, Titel, AntalKategorier, Upplösning) VALUES (10, 'Hund+katt 2', 2, '1920 x 1080');");

            //INSERT INTO KATEGORI
            $db->exec("INSERT INTO Kategori (Kategori_Id, KategoriNamn) VALUES (1, 'Hund');" .
                  "INSERT INTO Kategori (Kategori_Id, KategoriNamn) VALUES (2, 'Katt'); ");

            //INSERT INTO KATEGORIRAD
            $db->exec("INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (1, 1, 1);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (2, 2, 1);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (3, 3, 1);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (4, 4, 1);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (5, 5, 2);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (6, 6, 2);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (7, 7, 2);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (8, 8, 2);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (9, 9, 1);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (10, 9, 2);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (11, 10, 1);" .
                  "INSERT INTO Kategorirad (Kategorirad_Id, fkey_Orginalbild, fKey_Kategori) VALUES (12, 10, 2);");

            //INSERT INTO OrderVagn
            //$db->exec("INSERT INTO OrderVagn (fkey_Orginalbild) VALUES (4);");


            /*
            //FOR TESTING 

            print "<table border=1>";
            print "<tr><td>Id</td><td>Titel</td></tr>";

            $result = $db->query('SELECT * FROM Orginalbild');

            foreach ($result as $row) {

                  print "<tr><td>" . $row['Orginalbild_Id'] . "</td>";
                  print "<td>" . $row['Titel'] . "</td></tr>";
            }
            print "</table>";
            */
      }

      //close the database connection (CANT BE DONE)
      //$db = NULL;
} catch (PDOException $e) {
      print 'Exception : ' . $e->getMessage();
}
