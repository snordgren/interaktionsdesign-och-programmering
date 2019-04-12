<?php

    function display_images(){

      //Vilka bilder vill jag visa:
      $images = array(2,6,4,3,1,5);

      for ($i = 1; $i <= 10; $i++) {
        $result = $i;
        //Skriver bara ut de index som vi vill ha (som finns i arrayen)
        if(in_array($result, $images)){
          echo '<div class="col-3" >
                <div class="float-left">
                <a href="/www/images/';
                echo $result;
                echo '" data-toggle="modal" data-target="#imgModal" id="';
                echo $result;
                echo 'link" onclick="myFunction(';
                echo $result;
                echo');">
                <img class="rounded-border img-fluid border" src="/www/images/';
                echo $result;
                echo '.jpg" width="500" length="500"/>
                </a>
                </div>
                </div>';
        } else if(empty($images)){
          echo'<div class= container>';
          echo"No results";
          echo'</div>';
          break;
          }
        }
    }

    $q = $_REQUEST["q"];
    $hint = $q;
    //echo $hint === "Amanda" ? "amanda was clicked" : $hint;
    echo $hint === "" ? "no suggestion" : $hint;
?>
