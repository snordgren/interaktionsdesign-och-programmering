    <!-- MODAL CONTENT STARTS HERE -->

    <!-- Inkluderar projektfiler-->
    <script type="text/javascript" src="order.js"></script>
    <?php include 'modalConfirm.php'; ?>


    <div class="modal fade text-center" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"> </h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

          </div>
          <div class="modal-body">
            <div class="row" id="imgModalContent">

              <div class="col-sm-6">

                <div class="card cardimg" id="imgDetails">

                </div>

                <!-- BESKRIVING AV BILD -->
                <div class="bildBeskrivning card">
                  <div class="card-header"> <b> Beskrivning </b> </div>
                  <div class="card-body">
                    <p class="text-left" id="bildBeskrivning"> Blablablabla </p>
                  </div>
                </div>
                <!-- KNAPP FÖR VARIANTER -->
                <div class="d-flex justify-content-center">
                  <button type="button" class="btn-showVariants btn btn-secondary float-left">Visa Varianter Av Denna Bild</button>
                </div>

              </div>

              <div class="col-sm-6">

                <div class="card">

                  <div class="card-header">
                    <h4 id="imgModalLabel"> Title </h4>
                  </div>

                  <div id="imgInfo" class="card">
                    
                  </div>
                  
                </div>

                <!-- METAINFORMATION-->

                <div class="infoDiv card">
                  <div class="card-header"> <b> Metadata </b> </div>

                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <p class="text"> <b> Titel: </b> </p>
                      </div>
                      <div class="col-6">
                        <p id="metaTitel">-</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <p class="text"> <b> Fotograf: </b> </p>
                      </div>
                      <div class="col-sm-6">
                        <p id="metaFotograf">-</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <p class="text"> <b> Datum: </b> </p>
                      </div>
                      <div class="col-sm-6">
                        <p id="metaDatum">-</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <p class="text"> <b> Plats: </b> </p>
                      </div>
                      <div class="col-sm-6">
                        <p id="metaPlats">-</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-6">
                        <p class="text"> <b> GPS-koord: </b> </p>
                      </div>
                      <div class="col-sm-6">
                        <p id="metaGPS">-</p>
                      </div>
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
            <button type="button" class="btn btn-primary" onclick="addToOrder()" data-dismiss="modal" data-toggle="modal" data-target="#confirmModal">Lägg Till i Order</button>

          </div>
        </div>
      </div>
    </div>

    <!-- END MODAL CONTENT -->