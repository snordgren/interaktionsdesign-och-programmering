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
            $db->exec("CREATE TABLE Orginalbild (Orginalbild_Id INTEGER, Titel TEXT, AntalKategorier INTEGER, Upplösning TEXT, BildStatus INTEGER, AntalAnvändningar INTEGER, Fotograf TEXT, Datum TEXT, Plats TEXT, GPS TEXT, Beskrivning TEXT)");
            $db->exec("CREATE TABLE Kategori (Kategori_Id INTEGER, KategoriNamn TEXT)");
            $db->exec("CREATE TABLE Kategorirad (Kategorirad_Id INTEGER, fkey_Orginalbild INTEGER, fkey_Kategori INTEGER)");
            $db->exec("CREATE TABLE OrderVagn (fkey_Orginalbild INTEGER)");
            $db->exec("CREATE TABLE Nyckelord (Ord TEXT)");
            $db->exec("CREATE TABLE Nyckelordrad (fkey_Orginalbild INTEGER, fkey_Nyckelord INTEGER)");

            //INSERT INTO ORGINALBILD
            $db->exec("INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Hund 1', 1, '1920 x 1080', 0, 0, 'Jörgen E','2019-03-22', 'Helsingborg', '59.3124 | 17.9124', 'Detta är en bild på en hund tagen av Jörgen i Helsingborg.');" .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Hund 2', 1, '1920 x 1080', 1, 3, 'Samuel H', '2018-07-12', 'Botkyrka', '59.3124 | 17.9124', 'Detta är en bild på en hund tagen i Botkyrka av Samuel H.'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Hund 3', 1, '3840 × 2160', 0, 0, 'Jörgen E', '2019-03-14', 'Stockholm', '59.3124 | 17.9124', 'Detta är en bild på en hund.'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Hund 4', 1, '3840 × 2160', 0, 0, 'Samuel H', '2018-07-12', 'Botkyrka', '59.3124 | 17.9124', 'En mycket söt hund!'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Katt 1', 1, '1920 x 1080', 0, 0, 'Samuel H', '2018-07-12', 'Västerås', '59.3124 | 17.9124', 'En mycket söt Katt!'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Katt 2', 1, '1920 x 1080', 1, 7, 'Jörgen E', '2019-07-14', 'Luleå', '59.3124 | 17.9124', 'En katt som är en fin liten skatt'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Katt 3', 1, '3840 × 2160', 0, 0, 'Jörgen E', '2019-07-14', 'Malmö', '59.3124 | 17.9124', 'En katt.'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Katt 4', 1, '3840 × 2160', 1, 3, 'Patrik N', '2018-07-22', 'Malmö', '59.3124 | 17.9124', 'En katt.'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Hund+Katt 1', 2, '3840 × 2160', 0, 0, 'Patrik N', '2018-07-22', 'Luleå', '59.3124 | 17.9124', 'En katt och en hund tillsammans.'); " .
                  "INSERT INTO Orginalbild (Titel, AntalKategorier, Upplösning, BildStatus, AntalAnvändningar, Fotograf, Datum, Plats, GPS, Beskrivning) VALUES ('Hund+Katt 2', 2, '3840 × 2160', 0, 0, 'Jörgen E', '2018-07-23', 'Stockholm', '59.3124 | 17.9124', 'En katt och en hund tillsammans igen!'); ");

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

            //INSERT INTO Nyckelord
            $db->exec("INSERT INTO Nyckelord (Ord) VALUES ('helsingborg');" . //1
                  "INSERT INTO Nyckelord (Ord) VALUES ('stockholm');" . //2
                  "INSERT INTO Nyckelord (Ord) VALUES ('luleå');" . //3
                  "INSERT INTO Nyckelord (Ord) VALUES ('malmö');" . //4
                  "INSERT INTO Nyckelord (Ord) VALUES ('botkyrka');" . //5
                  "INSERT INTO Nyckelord (Ord) VALUES ('västerås');" . //6

                  "INSERT INTO Nyckelord (Ord) VALUES ('jörgen e');" . //7
                  "INSERT INTO Nyckelord (Ord) VALUES ('samuel h');" . //8
                  "INSERT INTO Nyckelord (Ord) VALUES ('patrik n');" . //9

                  "INSERT INTO Nyckelord (Ord) VALUES ('2019');" . //10
                  "INSERT INTO Nyckelord (Ord) VALUES ('2018');" . //11

                  "INSERT INTO Nyckelord (Ord) VALUES ('ägd');" . //12
                  "INSERT INTO Nyckelord (Ord) VALUES ('lånad');" . //13

                  "INSERT INTO Nyckelord (Ord) VALUES ('3840 × 2160');" . //14
                  "INSERT INTO Nyckelord (Ord) VALUES ('1920 x 1080');"); //15

            //INSERT INTO Nyckelordrad
            $db->exec("INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (1, 1);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (1, 7);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (1, 10);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (1, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (1, 15);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (2, 5);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (2, 11);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (2, 8);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (2, 13);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (2, 15);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (3, 2);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (3, 7);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (3, 10);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (3, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (3, 14);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (4, 5);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (4, 8);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (4, 11);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (4, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (4, 14);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (5, 6);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (5, 8);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (5, 11);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (5, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (5, 15);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (6, 3);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (6, 7);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (6, 10);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (6, 13);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (6, 15);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (7, 4);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (7, 7);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (7, 10);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (7, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (7, 14);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (8, 4);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (8, 9);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (8, 11);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (8, 13);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (8, 14);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (9, 3);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (9, 9);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (9, 11);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (9, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (9, 14);" .

            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (10, 2);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (10, 7);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (10, 11);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (10, 12);" .
            "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord) VALUES (10, 14);");

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
