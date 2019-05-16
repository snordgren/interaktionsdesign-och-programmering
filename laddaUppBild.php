<?php require_once 'vendor/autoload.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bothniabladet</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="modalStyles.css"> -->
  <link rel="stylesheet" href="./css/styles.css">

</head>

<body>
  <!-- Inkluderar projektfiler -->
  <?php include 'modal.php'; ?>
  <?php include 'modalKeywords.php'; ?>
  <?php include 'sqlite.php'; ?>

  <script type="text/javascript" src="image.js"></script>

  <script>
    //FUNKTION SOM GÖMMER OCH VISAR INPUT FÖR ANTAL GÅNGER BILDEN FÅR ANVÄNDAS - beror på om den är ägd eller inte.
    function onStatusChange() {

      if (document.getElementById('select-ownership').value == "1") {

        document.getElementById('antalGångerDiv').innerHTML = "<label for='Antalggr'> Användningar: </label> <input type='text' name='usage-number' id='antalGångerInput' class='col-1' placeholder='Antal'  required />";
        document.getElementById("antalGångerInput").type = "text";

      } else if (document.getElementById('select-ownership').value == "0") {

        document.getElementById('antalGångerDiv').innerHTML = "<input type='hidden' name='usage-number' id='antalGångerInput' class='col-1' placeholder='Antal' value='0' required />";

      }
    }

    function test() {
      document.getElementById('submited-Words').value = allWords.toString();
      document.getElementById('sparade-ord').innerHTML = allWords.toString();

    }
  </script>


  <!-- START of webbpage -->

  <div class="jumbotron jumbotron-fluid">
    <h1 style="background-color:#7ABDFF; color:#FFFFFF; font-family:Courier New, Courier, monospace;">
      <p class="text-center"> Bothniabladets Bildbyrå <p>
    </h1>

    <div class="navContainer container d-flex justify-content-center">
      <ul class="nav nav-pills">
        <li class="nav-item mx-2">
          <a class="nav-link" href="./adminIndex.php"><b>Sök</b></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active" href="./laddaUppBild.php"><b>Ladda upp</b></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="./orderhantering.php"><b>Orderhantering </b></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="./minaSidor.php"><b>Mina sidor</b></a>
        </li>

      </ul>
    </div>
  </div>


  <div class="container col-lg-8 col-md-6 col-sm-12">

    <div class="card">
      <div class="card-header text-center">
        <h3> Ladda upp en bild </h3>
      </div>

      <div class="card-body">

        <form method="POST" class="container" enctype="multipart/form-data" id="img-upload-form">

          <div class="col-12">
            <input type="text" id="title-input" class="col-12" placeholder="Titel" name="image-title" required />
          </div>

          <div class="col-12 mt-4">
            <input type="text" id="fotograf-input" class="col-12" placeholder="Fotograf" name="image-fotograf" required />
          </div>

          <div class="col-12 mt-4">
            <textarea form="img-upload-form" class="form-control rounded-0 col-12" placeholder="Beskrivning..." name="image-description" required></textarea>
          </div>

          <div class="col-12 mt-4">
            <select class="custom-select col-12" name="image-ownership" id="select-ownership" onChange="onStatusChange()">
              <option value="0" form="img-upload-form" selected>Ägd</option>
              <option value="1" form="img-upload-form">Ej ägd</option>
            </select>
          </div>
          <!-- Antal gånger bilden får användas av Bothniabladet -->
          <div class="col-12 mt-4" id="antalGångerDiv">
            <input type='hidden' name='usage-number' id='antalGångerInput' class='col-1' placeholder='Antal' value='0' required />
          </div>

          <div class="col-12 mt-4">
            <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
            <input type="file" name="pictures" accept="image/*" required />
          </div>

          <div class="col-12 mt-5">
            <input class="btn btn-secondary" type="button" value="Lägg Till Nyckelord" data-toggle="modal" data-target="#keywordsModal" />
            <!-- Här sparas nyckelorden -->
            <input type="hidden" id="submited-Words" name="keywords" required />
          </div>
          <div class="col-12 mt-1">
            <b>Sparade Nyckelord:</b>
            <p id="sparade-ord" style="word-wrap: break-word;"> </p>
          </div>


          <?php
          $Keywords_ = array('Test');

          //Genererar ett eget random namn
          $n = rand(1, 1000000);
          $Name = "IMG-" . $n;

          $image = new Bulletproof\Image($_FILES);
          $image->setLocation('./img/uploaded');
          $image->setSize(0, 100000000);
          $image->setName($Name);

          if ($image["pictures"]) {
            $upload = $image->upload();

            if ($upload) {

              echo $upload->getFullPath();
              echo $_POST['image-title'];
              echo $_POST['image-description'];
              echo $_POST['image-ownership'];
              echo $_POST['usage-number'];
              echo $_POST['keywords'];
              echo $_POST['image-fotograf'];

              $titel = $_POST['image-title'];
              $desc = $_POST['image-description'];
              $ownship = $_POST['image-ownership'];
              $usgNr = $_POST['usage-number'];
              $fotograf = $_POST['image-fotograf'];

              $keywords = $_POST['keywords'];

              //**********INSERTS******************* */

              //(1)Insert Orginalbild
              $sql = "INSERT INTO Orginalbild (Titel, Beskrivning, BildStatus, AntalAnvändningar, Fotograf) 
                  VALUES (?, ?, ?, ?, ?)";

              $stmt = $db->prepare($sql);
              $stmt->execute([$titel, $desc, $ownship, $usgNr, $fotograf]);

              //**********GET ID AND RENAME******************* */

              $imgId = "";

              //$db -> SELECT highest ID (most recent) in Orginalbild

              $sql = "SELECT MAX(rowid) AS maxValue
                  FROM Orginalbild";

              $stmt = $db->prepare($sql);
              $stmt->execute();
              //Om bilden redan finns så kommer 
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $imgId = $row['maxValue'];
              }


              //(2)Insert Nyckelord
              $nyckelord = explode(",", $keywords);

              //Sätter in fotografen som matades in
              $fotograf= strtolower($fotograf);
              array_push($nyckelord, $fotograf);

              //Sätter in Titel som matades in
              $titel= strtolower($titel);
              array_push($nyckelord, $titel);

              //En array som håller koll på vilka nyckelordid's som associeras med bilden
              $nyckelordIds = array('test');


              //Sätter in i Nyckelord
              for ($x = 0; $x < count($nyckelord); $x++) {

                //Kollar om ordet redan finns
                $sql = "SELECT rowid, * FROM Nyckelord
              WHERE Nyckelord.Ord = ?";

                $stmt = $db->prepare($sql);
                $stmt->execute([$nyckelord[$x]]);

                //Går igenom alla rows som quarin gav en efter en
                if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                  if ($nyckelord[$x] == $row['Ord']) {
                    //Tar bort från arrayen
                    unset($nyckelord[$x]);
                    //Omordnar arryens indexering
                    $qArray = array_values($nyckelord);
                    //Om inte hittas, så görs en insert

                    //Sparar id't
                    array_push($nyckelordIds, $row['rowid']);
                  }
                } else {
                  $sql = "INSERT INTO Nyckelord (Ord) 
              VALUES (?)";

                  $stmt = $db->prepare($sql);
                  $stmt->execute([$nyckelord[$x]]);

                  //Sparar id't för nya nyckelordet
                  $sql = "SELECT MAX(rowid) AS maxValue
               FROM Nyckelord";

                  $stmt = $db->prepare($sql);
                  $stmt->execute();

                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //Sparar id't
                    array_push($nyckelordIds, $row['maxValue']);
                  }
                }
              }

              //(3)Sätter in i nyckelordrad all ord som (börjar på 1, då första ordet i arrayen är ett random ord)
              for ($x = 1; $x < count($nyckelordIds); $x++) {

                $sql = "INSERT INTO Nyckelordrad (fkey_Orginalbild, fkey_Nyckelord)
                    VALUES (?, ?)";

                $stmt = $db->prepare($sql);
                $stmt->execute([$imgId, $nyckelordIds[$x]]);
              }

              //rename ($name, To highest ID);
              $oldName = "./img/uploaded/" . $Name . ".jpeg";
              $newName = "./img/" . $imgId . ".jpeg";
              rename($oldName, $newName);
            } else {
              echo $image->getError();
            }
          }
          ?>

          <!-- SUBMIT BUTTON -->
          <div class="col-12 mt-2">
            <input class="btn btn-primary col-12 mt-5" type="submit" value="Ladda upp" />
          </div>

        </form>

      </div>

    </div>
  </div>



  <!-- END of webbpage -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>