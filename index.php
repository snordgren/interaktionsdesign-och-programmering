<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!--  Latest rendering engine-->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
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
    <?php include 'showImages.php'; ?>


    <!-- START of webbpage -->
    
    <div class="jumbotron jumbotron-fluid">
      <h1 style="background-color:#bdbdbd; color:#FFFFFF; font-family:Courier New, Courier, monospace;"> &nbsp Bothniabladet </h1>
    </div>

    <div class=container>


        <div class="jumbotron">

            <h3>Bildsök</h3>

            <br>

            <form action="">
            <!-- Vid "onkeyup" så körs funktionen showImages med inparamentern = värdet man skrivit -->
              <input type="text" id="txt1" onkeyup="showImages(this.value)">
            </form>
              
        </div>

          <!-- I denna div så visas bild-resultaten -->
          <div id="imgSuggestion"> </div>

    </div>


    <!-- END of webbpage -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  </body>

</html>
