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
  <?php include 'sqlite.php'; ?>
  <script type="text/javascript" src="image.js"></script>

  <script>
    //FUNKTION SOM GÖMMER OCH VISAR INPUT FÖR ANTAL GÅNGER BILDEN FÅR ANVÄNDAS - beror på om den är ägd eller inte.
    function onStatusChange() {

      if (document.getElementById('select-ownership').value == "not-owned") {

        document.getElementById('antalGångerDiv').innerHTML = "<label for='Antalggr'> Användningar: </label> <input type='text' name='usage-number' id='antalGångerInput' class='col-1' placeholder='Antal' Style='text-align: center;' required />";
        document.getElementById("antalGångerInput").type = "text";

      } else if (document.getElementById('select-ownership').value == "owned") {

        document.getElementById('antalGångerDiv').innerHTML = "<input type='hidden' name='usage-number' id='antalGångerInput' class='col-1' placeholder='Antal' value='0' Style='text-align: center;' required />";
      
      }
    }
  </script>


  <!-- START of webbpage -->

  <div class="jumbotron jumbotron-fluid">
    <h1 style="background-color:#7ABDFF; color:#FFFFFF; font-family:Courier New, Courier, monospace;">
      <p class="text-center"> Bothniabladet Bildbyrå <p>
    </h1>

    <div class="navContainer container d-flex justify-content-center">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="./adminIndex.php">Hem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./laddaUppBild.php">Ladda Upp Bild</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./orderhantering.php">Orderhantering</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./minaSidor.php">Mina Sidor</a>
        </li>

      </ul>
    </div>
  </div>


  <form method="POST" class="container" enctype="multipart/form-data" id="img-upload-form">

    <div class="col-12">
      <input type="text" id="title-input" class="col-12" placeholder="Titel" name="image-title" required />
    </div>

    <div class="col-12 mt-2">
      <textarea form="img-upload-form" class="form-control rounded-0 col-12" placeholder="Beskrivning..." name="image-description" required></textarea>
    </div>

    <div class="col-12 mt-2">
      <select class="custom-select col-12" name="image-ownership" id="select-ownership" onChange="onStatusChange()">
        <option value="owned" form="img-upload-form" selected>Ägd</option>
        <option value="not-owned" form="img-upload-form">Ej ägd</option>
      </select>
    </div>
    <!-- Antal gånger bilden får användas av Bothniabladet -->
    <div class="col-12 mt-2" id="antalGångerDiv">
      <input type='hidden' name='usage-number' id='antalGångerInput' class='col-1' placeholder='Antal' value='0' Style='text-align: center;' required />
    </div>

    <div class="col-12 mt-2">
      <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
      <input type="file" name="pictures" accept="image/*" required />
      <input class="btn btn-primary col-12 mt-2" type="submit" value="Ladda upp" />
    </div>

    <?php
    //Genererar ett eget random namn
    $n = rand(1, 1000000);
    $name = "IMG-" . $n;

    $image = new Bulletproof\Image($_FILES);
    $image->setLocation('./img/uploaded');
    $image->setSize(0, 100000000);
    $image->setName($name);

    if ($image["pictures"]) {
      $upload = $image->upload();

      if ($upload) {

        echo $upload->getFullPath();
        echo $_POST['image-title'];
        echo $_POST['image-description'];
        echo $_POST['image-ownership'];
        echo $_POST['usage-number'];

        $titel = $_POST['image-title'];
        $desc = $_POST['image-description'];
        $ownship = $_POST['image-ownership'];
        $usgNr = $_POST['usage-number'];

        //**********INSERTS******************* */

        //(1)Insert Orginalbild

        //(2)Insert Kategorirad (Koppla till kategorier)

        //(2)Insert Nyckelordrad (Koppla till kategorier)


        //**********GET ID AND RENAME******************* */

        //$db -> SELECT highest ID in Orginalbild

        //rename ($name, To highest ID);

      } else {
        echo $image->getError();
      }
    }
    ?>

  </form>


  <!-- END of webbpage -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>