    <!-- MODAL CONTENT STARTS HERE -->

    <!-- Inkluderar projektfiler-->
    <script type="text/javascript" src="order.js"></script>


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
                  <p class="text-left" id="bildBeskrivning"> Blablablabla </p>
                </div>
                <!-- KNAPP FÖR VARIANTER -->
                <div>
                  <button type="button" class="btn-showVariants btn btn-secondary float-left">Visa Varianter Av Denna Bild</button>
                </div>

              </div>

              <div class="col-sm-6">

                <div id="imgInfo" class="card"> </div>

                <!-- METAINFORMATION-->

                <div id="collapseExample">
                  <div class="card card-body">
                    <p> <b> Metadata </b> </p>

                    <div class="metaData container" id="metaData">
                      <div class="row"> <div class="col-6"> <p class="text"> <b> Titel: </b> </p> </div> <div class="col-6"> <p id="metaTitel">-</p> </div> </div>
                       
                      <div class="row"> <div class="col-sm-6"> <p class="text"> <b> Fotograf: </b> </p> </div> <div class="col-sm-6"> <p id="metaFotograf">-</p>  </div> </div>
                        
                      <div class="row"> <div class="col-sm-6"> <p class="text"> <b> Datum: </b> </p> </div> <div class="col-sm-6"> <p id="metaDatum">-</p> </div> </div>
                        
                      <div class="row"> <div class="col-sm-6"> <p class="text"> <b> Plats: </b> </p> </div> <div class="col-sm-6"> <p id="metaPlats">-</p> </div> </div>
                        
                      <div class="row"> <div class="col-sm-6"> <p class="text"> <b> GPS-koord: </b> </p> </div> <div class="col-sm-6"><p id="metaGPS">-</p> </div> </div>
                      
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