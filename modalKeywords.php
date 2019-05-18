    <!-- MODAL CONTENT STARTS HERE -->

    <!-- Inkluderar projektfiler-->
    <script type="text/javascript" src="order.js"></script>
    <?php include 'modalConfirm.php'; ?>

    <script>
      var allWords = [];

      function addWord() {
        var word = document.getElementById('word-input').value;
        word = word.trim();
        word = word.toLowerCase();

        if (word != "") {

          if (!allWords.includes(word)) {
            allWords.push(word);
          } else {
            alert("Detta ord är redan tillagt");
          }

        }

        document.getElementById('word-input').value = "";

      }

      function displayWords() {

        document.getElementById('Nyckelord-Display').innerHTML = allWords.toString();


      }

      function clickOnIt() {

        addWord();
        displayWords();

      }

      function remove() {

        allWords.pop();
        displayWords();

      }
    </script>


    <div class="modal fade text-center" id="keywordsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Lägg Till Nyckelord </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>


          </div>
          <div class="modal-body d-flex justify-content-center">

            <div id="ModalContent">

              <div class="card">

                <div class="card-header">
                  <p class="text-left mb-0"> <b> Tillagda ord: </b> </p>
                </div>

                <div class="card-body">

                  <div class="row">

                    <div class="col-7"> <textarea readonly form="img-upload-form" cols="20" wrap="hard" style="width:100%; background-color:white; font-size:18px; padding:5px;" id="Nyckelord-Display" class="form-control rounded col-12 mb-3 mt-0 " rows="4" placeholder="Inget tillagt.."></textarea> </div>
                    <div class="col-5"><input class="btn btn-secondary mt-1" type="button" value="Ta bort senaste" onclick='remove()' /> </div>

                  </div>

                  
                </div>

                <div class="card-footer">
                    <div class="row">

                      <div class="col-8 mt-1"> <input type="text" id="word-input" placeholder="Nyckelord.." name="image-title" style="text-align:center;" /> </div>
                      <div class="col-4"><input class="btn btn-primary " type="button" value="Lägg till" onclick='clickOnIt()' /> </div>


                    </div>
                  </div>

              </div>





            </div>

          </div>

          <div class="modal-footer">


          <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#keywordsModal">Stäng</button>
            <button type="button" class="btn btn-primary" onclick="test()" data-dismiss="modal" data-toggle="modal" data-target="#keywordsModal">Spara</button>

          </div>


        </div>

      </div>
    </div>


    <!-- END MODAL CONTENT -->