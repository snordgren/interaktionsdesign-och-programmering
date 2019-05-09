<script>
  var hCinderella = false;

  function showImages(str) {


    /* Om strängen är tom.. */
    if (str.length == 0) {
      document.getElementById("imgSuggestion").innerHTML = "";
      return;
    }

    var xhttp = new XMLHttpRequest();

    //Denna funktion körs vid förändring i "ready-state"
    xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        var x = this.responseText;

        //document.getElementById("imgSuggestion").innerHTML = x;

        //split up the results and store in array
        var array = x.split(",");



        //going thtough the array
        var htmlText = "";

        //om arrayen är tom så returneras "No results found.."
        if (x === "") {

          htmlText = "No results found.."

        } else {
          //alert(x);

          for (var i = 0; i < array.length; i++) {

            htmlText += '<div class="col-md-4 imgDiv" id='
            htmlText += array[i];
            htmlText += '" > <a id='
            htmlText += array[i];
            htmlText += ' href= "" onclick="showImageDetails(this.id)" data-toggle="modal" data-target="#imgModal"> <img class="img-thumbnail" src="./img/';
            htmlText += array[i];
            htmlText += '.jpg" id="test2';
            htmlText += array[i];
            htmlText += '" width="345" length="345" onmouseover="aFunctionOver(this.id)" onmouseout="aFunctionOut(this.id)"> </a> </div>';

          }
        }

        document.getElementById("imgSuggestion").innerHTML = htmlText;

      }
    };

    //GET is better than POST cuz GET can be cached and the data isnt sensitive.
    //Open request
    if (hCinderella == true) {

      xhttp.open("GET", "searchEngine.php?q=" + str, true);
      //send request
      xhttp.send();

    } else {

      xhttp.open("GET", "searchEngine.php?q=" + str, true);
      //send request
      xhttp.send();

    }
  }


  /* Denna funktion visar detaljerad information i modalen */
  function showImageDetailsOLD(str) {
    //alert("input is: " + str);
    var xhttp;
    //  if (str.length == 0) {
    //    document.getElementById("txtHint").innerHTML = "";
    //    return;
    //  }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      //Make sure its ready
      if (this.readyState == 4 && this.status == 200) {

        var x = str;

        //alert("response is: "+ x);
        //document.getElementById("txtHint").innerHTML = x;
        //split up the results and store in array
        var array = x.split(",");
        //going thtough the array
        var htmlImg = "";
        var htmlText = "";
        if (x === "") {

          htmlText = "No results found.."

        } else {
          //The image
          htmlImg = '<img class="rounded img-fluid border" src="./img/'
          htmlImg += x;
          htmlImg += '.jpg" hspace="20" width="300" length="300">'

          //The information about the picture
          htmlText = '<div class=container> <table class="table"> <thead> <tr> <th scope="col" bgcolor="#7ABDFF"> </th> <th scope="col" bgcolor="#7ABDFF"> </th> </tr> </thead> <tbody> <tr> <th scope="row">Titel: </th> <td>'
          htmlText += x;
          htmlText += '</td> </tr> <tr> <th scope="row">Fotograf: </th><td> ? </td> </tr><tr><th scope="row">Kategori: </th><td> ? </td></tr><tr><th scope="row">Status: </th><td> ? </td></tr></tbody></table> </div>';
        }

        /* Manipulerar element i modalen */
        document.getElementById("imgDetails").innerHTML = htmlImg;
        document.getElementById("imgInfo").innerHTML = htmlText;


      }
    };
    xhttp.open("GET", "searchEngine.php?q=" + str, true);
    xhttp.send();
  }




  function showImageDetails(x) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        var y = this.responseText;

        alert(y);



      }
    };

    xhttp.open("GET", "imageDetails.php?q=" + x, true);
    xhttp.send();

    //RENDERING

    var htmlImg = "";
    var htmlText = "";

    if (x === "") {

      htmlText = "No results found.."

    } else {
      //The image
      htmlImg = '<img class="rounded img-fluid border" src="./img/'
      htmlImg += x;
      htmlImg += '.jpg" hspace="20" width="300" length="300">'

      //The information about the picture
      htmlText = '<div class=container> <table class="table"> <thead> <tr> <th scope="col" bgcolor="#7ABDFF"> </th> <th scope="col" bgcolor="#7ABDFF"> </th> </tr> </thead> <tbody> <tr> <th scope="row">ID: </th> <td>'
      htmlText += x;
      htmlText += '</td> </tr> <tr> <th scope="row">Fotograf: </th><td> ? </td> </tr><tr><th scope="row">Kategori: </th><td> ? </td></tr><tr><th scope="row">Status: </th><td> ? </td></tr></tbody></table> </div>';
    }

    /* Manipulerar element i modalen */
    document.getElementById("imgDetails").innerHTML = htmlImg;
    document.getElementById("imgInfo").innerHTML = htmlText;

  }



  //ON HOVER, input=id
  function aFunctionOver(x) {


    document.getElementById(x).classList.add('hoverShadow');

  }
  //Change color back to white
  function aFunctionOut(x) {


    document.getElementById(x).classList.remove('hoverShadow');
  }





  function hideCinderella() {

    if (hCinderella == false) {
      hCinderella = true;
      console.log('h is true');

      showImages(document.getElementById("txt1").value);
    } else {
      hCinderella = false;
      console.log('h is false');

      showImages(document.getElementById("txt1").value);
    }



  }
</script>