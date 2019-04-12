<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <!--  Latest rendering engine-->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>title</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="modalStyles.css"> -->

    <!-- SOURCE FILES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
  <body>


<!-- START of webbpage -->

<div class="jumbotron jumbotron-fluid">
   <h1 style="background-color:#bdbdbd; color:#FFFFFF; font-family:Courier New, Courier, monospace;"> &nbsp Bothniabladet </h1>
  <div class="container">
  </div>
</div>

    <div class=container>


              <div class="jumbotron">

                <h3>Bildsök</h3>
                <br>
                  <form action="">
                   <input type="text" id="txt1" onkeyup="showImage(this.value)">
                  </form>
            </div>


                <!-- <p> <span id="txtHint"></span></p> -->
                <div id="imgSuggestion"> </div>

    </div>


<!-- END of webbpage -->

    <!-- MODAL CONTENT STARTS HERE -->
    <div class="modal fade text-center" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imgModalLabel">Detaljer</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">
            <div class="row" id="imgModalContent">

                <div class="col-sm-6" id="imgDetails"> </div>

                <div class="col-sm-6" id="imgInfo"> </div>

            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Stäng</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
    <!-- END MODAL CONTENT -->



    <!-- JAVASCRIPT -->
        <script>


              function showImage(str) {
                var xhttp;
                if (str.length == 0) {
                  document.getElementById("imgSuggestion").innerHTML = "";
                  return;
                }
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {

                    var x = this.responseText;
                    //document.getElementById("imgSuggestion").innerHTML = x;
                    //split up the results and store in array
                    var array = x.split(",");
                    //going thtough the array
                    var htmlText = "";
                    if(x === "no suggestion"){

                      htmlText = "No results found.."

                    }else{
                      for (var i = 0; i < array.length; i++) {
                          htmlText += '<div class=float-left id="test'
                          htmlText += array[i];
                          htmlText += '" onmouseover="aFunctionOver(this.id)" onmouseout="aFunctionOut(this.id)"> <a id='
                          htmlText += array[i];
                          htmlText += ' href= "" onclick="showImageDetails(this.id)" data-toggle="modal" data-target="#imgModal"> <img class="rounded img-fluid border" src="/projects/test/img/';
                          htmlText += array[i];
                          htmlText += '.jpg" hspace="20" width="330" length="330"> </a> </div>';

                        }
                    }

                      document.getElementById("imgSuggestion").innerHTML = htmlText;

                  }
                };
                xhttp.open("GET", "answer.php?q="+str, true);
                xhttp.send();
              }


              function showImageDetails(str) {
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

                    var x = this.responseText;

                    //alert("response is: "+ x);
                    //document.getElementById("txtHint").innerHTML = x;
                    //split up the results and store in array
                    var array = x.split(",");
                    //going thtough the array
                    var htmlImg = "";
                    var htmlText = "";
                    if(x === "no suggestion"){

                      htmlText = "No results found.."

                    }else{
                      //The image
                      htmlImg = '<img class="rounded img-fluid border" src="/projects/test/img/'
                      htmlImg += x;
                      htmlImg += '.jpg" hspace="20" width="300" length="300">'
                      //The information about the picture
                      //htmlText = 'Photographer: ';
                      //htmlText += '<br>Date taken: ';
                      //htmlText += '<br>Times left to be used: ';
                      htmlText = '<div class=container> <table class="table"> <thead> <tr> <th scope="col" bgcolor="#bdbdbd"> </th> <th scope="col" bgcolor="#bdbdbd"> </th> </tr> </thead> <tbody> <tr> <th scope="row">Title: </th> <td>'
                      htmlText += x;
                      htmlText += '</td> </tr> <tr> <th scope="row">Photographer: </th><td> ? </td> </tr><tr><th scope="row">Times left to be used: </th><td> ? </td></tr></tbody></table> </div>';
                    }

                      document.getElementById("imgDetails").innerHTML = htmlImg;
                      document.getElementById("imgInfo").innerHTML = htmlText;


                  }
                };
                xhttp.open("GET", "site.php?q="+str, true);
                xhttp.send();
              }

              //ON HOVER, input=id
            function aFunctionOver(x){

              document.getElementById(x).style.backgroundColor ="#bdbdbd";

            }
          //Change color back to white
            function aFunctionOut(x){

              document.getElementById(x).style.backgroundColor ="#FFFFFF";
            }

        </script>
  </body>
</html>
