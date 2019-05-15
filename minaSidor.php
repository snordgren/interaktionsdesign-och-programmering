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
  <script type="text/javascript" src="image.js"></script>


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
          <a class="nav-link" href="./laddaUppBild.php"><b>Ladda upp</b></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link" href="./orderhantering.php"><b>Orderhantering </b></a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link active" href="./minaSidor.php"><b>Mina sidor</b></a>
        </li>

      </ul>
    </div>
  </div>

  <div class="container col-lg-6 col-md-6 col-sm-12">
    <div class="card">
      <div class="card-header text-center">
        <h3 class=""> Min Profil </h3>
      </div>
      <br>

      <div class="minInfo card-body">

        <form action="" method="">
          <!-- inputs för all information som vi vill ha -->
          <label> Förnamn: </label>


          <input id="forNamnID" type="text" class="txt5" value="Jolex" readonly=""> <br> <br>
          <label> Efternamn: </label>
          <input id="efterNamnID" type="text" class="txt5" value="Tinggren" readonly> <br> <br>

          <label> Email:* </label>

          <input id="eMailID" type="text" class="txt4" value="elmman@hotmail.com"> <br><br>


          <label> Telefonnummer:* </label>
          <input id="telefonNummerID" type="text" class="txt4" value="070-1122334"> <br><br>

          <button class="btn btn-secondary btn-sm " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Byt Lösenord
          </button>

          <div class="collapse" id="collapseExample">
            <div class="card-body">

              <div class="form-check form-check-inline">
                <input class="txt9" type="password" id="password1" placeholder="Nuvarande Lösenord">


              </div>
              <input class="txt9" type="password" id="password2" placeholder="Nytt Lösenord">
              <input class="txt9" type="password" id="password3" placeholder="Bekräfta Lösenord">
              <button id="btn2" class="btn btn-secondary btn-sm" onclick="resetPw()">Spara</button>
            </div>
          </div>


        </form>
      </div>

      <div class="card-footer">
        <button id="btn1" class="btn btn-secondary btn " onclick="sparaProfil()">
          Spara Profil
        </button>

      </div>


    </div>



  </div>



  <div class="container">

    <div class="d-flex justify-content-center"> <a class="nav-link" href="./index.php" onClick="logOut()"><b>LOGGA UT</a></b> </div>

  </div>


  <script>
    function logOut() {
      alert("Loggar ut..");
    }
  </script>



  <!-- END of webbpage -->


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>