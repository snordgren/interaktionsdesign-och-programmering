
function showImages(str) {

  var requestId = "showImages";

  /* Om strängen är tom.. */
  if (str.length == 0) {
    document.getElementById("imgSuggestion").innerHTML = "";

    //KÖR MATCHING WORDS FUNKTION
    showMatchingWords(str);

    return;
  }

  var xhttp = new XMLHttpRequest();

  //Denna funktion körs vid förändring i "ready-state"
  xhttp.onreadystatechange = function () {

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

  xhttp.open("GET", "image.php?q=" + str + "&requestId=" + requestId, true);
  //send request
  xhttp.send();


  //KÖR MATCHING WORDS FUNKTION
  showMatchingWords(str);

}

//**************************************************************************************** */

function showImageDetails(x) {

  var requestId = "showImageDetails";

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      //Fångar responsen
      var y = this.responseText;

      //Delar upp svars-strängen i en array
      var ImageProperties = y.split(',')

      //Skriver ut för test
      //alert(ImageProperties.toString());

      //RENDERING

      var htmlImg = "";
      var htmlText = "";

      //Ändrar status från boolean till text
      var statusString = "";
      if (ImageProperties[4] == 0) {
        statusString = "Ägd";
      } else {
        statusString = "Lånad" + " (" + ImageProperties[5] + " gånger kvar)";
      }

      if (x === "") {

        htmlText = "No results found.."

      } else {
        //THE IMAGE
        htmlImg = '<div class="card-body cardimg"><img class="rounded img-fluid border" src="./img/'
        htmlImg += x;
        htmlImg += '.jpg"> </div>'

        //INFO TO THE RIGHT OF THE IMAGE
        htmlText = ' <table class="table">  <tbody> <tr> <th scope="row">ID: </th> <td id="IdInTable">'
        htmlText += ImageProperties[0];
        htmlText += '</td> </tr> <tr> <th scope="row">Upplösning: </th><td>'
        htmlText += ImageProperties[3];
        htmlText += '</td> </tr><tr><th scope="row">Status: </th><td id="statusInTable">'
        htmlText += statusString;
        htmlText += '</td></tr></tbody></table>'
      }


      /* Manipulerar element i modalen */
      document.getElementById("imgDetails").innerHTML = htmlImg;
      document.getElementById("imgInfo").innerHTML = htmlText;
      document.getElementById("imgModalLabel").innerHTML = ImageProperties[1];
      document.getElementById("metaTitel").innerHTML = ImageProperties[1];
      document.getElementById("metaFotograf").innerHTML = ImageProperties[6];
      document.getElementById("metaDatum").innerHTML = ImageProperties[7];
      document.getElementById("metaPlats").innerHTML = ImageProperties[8];
      document.getElementById("metaGPS").innerHTML = ImageProperties[9];
      document.getElementById("bildBeskrivning").innerHTML = ImageProperties[10];


    }
  };

  xhttp.open("GET", "image.php?q=" + x + "&requestId=" + requestId, true);
  xhttp.send();

}


//**************************************************************************************** */

function showMatchingWords(x) {

  var requestId = "m";

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {

      //Fångar responsen
      var y = this.responseText;

      //Delar upp svars-strängen i en array
      var ImageProperties = y.split(',')

      var z = ImageProperties.slice(0, 5);

      //RENDERING

      if (x == "") {

        document.getElementById("txtSuggestion").innerHTML = "";


      } else {

        document.getElementById("txtSuggestion").innerHTML = z.toString();

      }

    }
  };

  xhttp.open("GET", "image.php?q=" + x + "&requestId=" + requestId, true);
  xhttp.send();

}

//**************************************************************************************** */


//ON HOVER, input=id
function aFunctionOver(x) {

  document.getElementById(x).classList.add('hoverShadow');

}

//Change color back to white
function aFunctionOut(x) {

  document.getElementById(x).classList.remove('hoverShadow');

}


