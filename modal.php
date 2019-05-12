    <!-- MODAL CONTENT STARTS HERE -->

    <!-- Inkluderar projektfiler-->
    <script type="text/javascript" src="Order.js"></script>


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

              <div class="col-sm-6">

                <div id="imgDetails">

                </div>
                <!-- BESKRIVING AV BILD -->
                <div class="bildBeskrivning card card-body">
                  <p> <b> Beskrivning </b> </p>
                  <p class="text"> THis is a picture of a dog that was taken in the beautiful city of gangangang </p>
                </div>
                <!-- KNAPP FÖR VARIANTER -->
                <div>
                  <button type="button" class="btn-showVariants btn btn-secondary float-left">Visa varianter</button>
                </div>

              </div>

              <div class="col-sm-6">

                <div id="imgInfo" class="card"> </div>

                <!-- METAINFORMATION-->

                <div id="collapseExample">
                  <div class="card card-body">
                    <p> <b> Metadata </b> </p>

                    <div class="container" id="metaData">
                      <p class="text">
                        Titel: XXX
                        <br>
                        Fotograf: XXX
                        <br>
                        Upplösning: XXX
                        <br>
                        Datum: XXX
                        <br>
                        Plats: XXX
                        <br>
                        GPS-koordinater: XXX
                      </p>
                    </div>
                  </div>
                </div>

                <!-- EXPANDABLE ENDS -->


              </div>

            </div>


          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Stäng</button>
            <!-- Vid klick så körs funktion från JS fil -->
            <button type="button" class="btn btn-primary" onclick="addToOrder()">Lägg Till i Order</button>

          </div>
        </div>
      </div>
    </div>

    <!-- END MODAL CONTENT -->