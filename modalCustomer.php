    <!-- MODAL CONTENT STARTS HERE -->

    <!-- Inkluderar projektfiler-->
    <script type="text/javascript" src="order.js"></script>


    <script>

    </script>


    <div class="modal fade text-center" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> Kunduppgifter </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>


          </div>
          <div class="modal-body d-flex justify-content-center">

            <div id="ModalContent">


              <div class="row ">

                <div class="card col-">
                  <div class="card-header">
                    <h4> Lägg Till Kund </h4>
                  </div>

                  <div class="card-body p-4">
                    <div class="text-center"> <input class="btn btn-secondary mt-3 mb-4" type="button" value="Skapa ny kund" /> </div>
                    <div class="text-center"> <input class="btn btn-primary mb-2" type="button" value="Sök befintlig kund" /> </div>
                  </div>



                  <div class="card-footer"> </div>


                </div>

                <div class="card col- ml-3">
                  <div class="card-header">
                    <h4> Detaljerad Kundinformation </h4>
                  </div>

                  <div class="card-body p-4">
                    <div class="contentBottom mt-4">

                      
                      <hr>
                      <p> Ingen kund tillagd </p>
                      <hr>

                      

                    </div>
                    
                  </div>
                  <div class="card-footer"> </div>

                </div>
              </div>




            </div>

          </div>

          <div class="modal-footer">


            <button type="button" class="btn btn-secondary" onclick="test()" data-dismiss="modal" data-toggle="modal" data-target="#keywordsModal">Stäng</button>
            <button type="button" class="btn btn-primary" onclick="test()" data-dismiss="modal" data-toggle="modal" data-target="#keywordsModal">Spara</button>

          </div>


        </div>

      </div>
    </div>


    <!-- END MODAL CONTENT -->