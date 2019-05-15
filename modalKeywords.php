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

      function removeAll() {

        allWords = [];
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


              <div class="col-12">
                <p class="text-left mb-0"> <b> Tillagda ord: </b> </p>
                <textarea readonly form="img-upload-form" id="Nyckelord-Display" class="form-control rounded col-12 mb-3 mt-0 " rows="2" placeholder="Inget tillagt.."></textarea>

                <div class="row  col-12">

                  <div class="col-6"> <input type="text" id="word-input" placeholder="Nyckelord.." name="image-title" style="text-align:center;" /> </div>
                  <div class="col-3"><input class="btn btn-primary ml-2" type="button" value="Lägg till" onclick='clickOnIt()' /> </div>
                  <div class="col-3"><input class="btn btn-secondary ml-4" type="button" value="Rensa" onclick='removeAll()' /> </div>

                </div>


              </div>


            </div>

          </div>

          <div class="modal-footer">



            <button type="button" class="btn btn-primary" onclick="test()" data-dismiss="modal" data-toggle="modal" data-target="#keywordsModal">Spara</button>

          </div>


        </div>

      </div>
    </div>


    <!-- END MODAL CONTENT -->