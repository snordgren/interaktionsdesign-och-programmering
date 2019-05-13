<!DOCTYPE html>
<html>

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
  <script type="text/javascript" src="order.js"></script>

  <!-- START of webbpage -->

  <div class="jumbotron jumbotron-fluid">
    <h1 style="background-color:#7ABDFF; color:#FFFFFF; font-family:Courier New, Courier, monospace;"> &nbsp Bothniabladet </h1>

    <div class="navContainer container d-flex justify-content-center">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="./adminIndex.php">Hem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./laddaUppBild.php">Ladda Upp Bild</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./orderhantering.php">Orderhantering</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./minaSidor.php">Mina Sidor</a>
        </li>

      </ul>
    </div>
  </div>

  <!-- FETCHING ITEMS IN CURRENT ORDER -->
  <?php
  $ItemsId = array();
  $ItemsTitel = array();

  $sql1 = "SELECT * FROM OrderVagn;";

  $stmt1 = $db->prepare($sql1);
  $stmt1->execute();

  //Går igenom alla rows som quaryn gav en efter en
  while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {

    //Lägger varje rads orginalbild-id i arrayen
    array_push($ItemsId, $row['fkey_Orginalbild']);
    $imgId = $row['fkey_Orginalbild'];

    $sql2 = "SELECT * FROM Orginalbild WHERE Orginalbild.Orginalbild_Id = ?;";

    $stmt2 = $db->prepare($sql2);
    $stmt2->execute([$imgId]);

    while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {

      array_push($ItemsTitel, $row2['Titel']);
    }
  }

  ?>

  <div class="container jumbotron">

    <h2>Pågående Order</h2>

    <div class="currentOrder container card cardimg " id="orderTable">

      <table class="table table-bordered table-striped table-editable ">
        <thead>
          <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Villkor</th>
            <th>Pris</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

          <?php
          //Loopar igenom arrayerna och printar in i tabellen direkt
          for ($x = 0; $x < Count($ItemsId); $x++) {

            echo "<tr ><th class='table-info' width='5%'>";
            echo $ItemsId[$x];
            echo "</th><th>";
            echo $ItemsTitel[$x];
            echo "</th><th width='30%'>";
            echo "<div class='card'><input type='text' > </input> </div>";
            echo "</th><th width='10%'>";
            echo "<input type='text' id='";
            echo $ItemsId[$x];
            echo "'> </input> ";
            echo "</th><th width='15%'>";
            echo "<div class='card'><button type='button' class='btn-taBortUrOrder' id='";
            echo $ItemsId[$x];
            echo "' onclick='removeFromOrder(this.id)'> Ta bort </button> </div>";
            echo "</th></tr>";
          };

          ?>

        </tbody>
      </table>

    </div>

    <!-- BREAK -->
    <br>
    <!-- BREAK -->

    <div class="container" id="orderButtons">

      <button type="button" class="btn-orderhantering btn btn-primary float-right">Bekräfta Order</button>
      <button type="button" class="btn-orderhantering btn btn-secondary float-right" onclick="resetOrder()">Töm Order</button>

    </div>

    <div class="container" id="btnKundUppgifter">
      <button type="button" class="btn-orderhantering btn btn-primary">Visa/Lägg Till Kunduppgifter</button>
    </div>



    <!-- DÖLJER OM TOM -->
    <script>
            var count = <?php echo Count($ItemsId);?>;

            if (count == 0) {

              document.getElementById("orderTable").innerHTML = "<b> Inga bilder tillagda </b>";

              document.getElementById("orderButtons").innerHTML = "";

              document.getElementById("btnKundUppgifter").innerHTML = "";

            }
    </script>


  </div>



  <div class="container jumbotron">
    <div class="container">
      <button type="button" class="btn-orderhantering btn btn-secondary">Visa Historiska Ordrar</button>
    </div>

    <div class="container">
      <button type="button" class="btn-orderhantering btn btn-secondary">Sök Order</button>
    </div>
  </div>



  <!-- END of webbpage -->




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>