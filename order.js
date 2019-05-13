
//********************************************AddToOrder******************************************** */
function addToOrder(){

  var requestId = "addToOrder";
  
  if(document.getElementById("statusInTable").innerHTML == "Ägd"){

        //Hämtar Id från bilden som man klickat på.
      var imgId = document.getElementById("IdInTable").textContent;

      var xhttp = new XMLHttpRequest();

        //Denna funktion körs vid förändring i "ready-state"
        xhttp.onreadystatechange = function() {

          if (this.readyState == 4 && this.status == 200) {

            

            
            //Behövs egentligen ingen "respons" men detta är bevis att servern lagt till ordern 
            var x = this.responseText;

            //Sedan ska användaren få en box med 2 val, 1) Fortsätt på ordern 2) gå till order
            //Vid val 2) tas användarn tas sedan till Orderhanterings-sidan.
            alert(x);

            

          }
        };

        //GET is better than POST cuz GET can be cached and the data isnt sensitive.
        //Open request

        xhttp.open("GET", "order.php?q=" + imgId + "&requestId=" + requestId, true);
        //send request
        xhttp.send();

  }else{

    alert("ERROR - LÅNAD BILD");
    

  }
 

}

//********************************************RemoveFromOrder******************************************** */

//Funktion som tar bort 1 bild från order
function removeFromOrder(imgId){

  var requestId = "removeFromOrder";

  var xhttp = new XMLHttpRequest();

    //Denna funktion körs vid förändring i "ready-state"
    xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        

        
        //Behövs egentligen ingen "respons" men detta är bevis att servern lagt till ordern 
        var x = this.responseText;

        //Sedan ska användaren få en box med 2 val, 1) Fortsätt på ordern 2) gå till order
        //Vid val 2) tas användarn tas sedan till Orderhanterings-sidan.
        alert(x);
        //Laddar om sidan
        location.reload();
        

      }
    };

    //GET is better than POST cuz GET can be cached and the data isnt sensitive.
    //Open request

    xhttp.open("GET", "order.php?q=" + imgId + "&requestId=" + requestId, true);
    //send request
    xhttp.send();

      
}

//******************************************ResetOrder************************************************** */

//Funktion som tar bort allt från order
function resetOrder(){

  var requestId = "resetOrder";

  var xhttp = new XMLHttpRequest();

    //Denna funktion körs vid förändring i "ready-state"
    xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        

        
        //Behövs egentligen ingen "respons" men detta är bevis att servern lagt till ordern 
        var x = this.responseText;

        //Sedan ska användaren få en box med 2 val, 1) Fortsätt på ordern 2) gå till order
        //Vid val 2) tas användarn tas sedan till Orderhanterings-sidan.
        alert(x);
        //Laddar om sidan
        location.reload();
        

      }
    };

    //GET is better than POST cuz GET can be cached and the data isnt sensitive.
    //Open request

    xhttp.open("GET", "order.php" + "?requestId=" + requestId, true);
    //send request
    xhttp.send();

}

//**************************************************************************************** */