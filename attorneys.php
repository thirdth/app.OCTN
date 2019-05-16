<?php
include 'garble_cnfg.php';
header_check();
?>
      <!--End reusable header-->
      <main class="row projects">
        <section class="col-md-12">
          <div class="row info">
            <div class="col-md-3 leftColumn">
              <?php include 'searchColumn.php'; ?>
            </div>
            <div class="col-md-9 infoBox" id="results">
              <h2 class="text-center">Appearing Attorneys:</h2>
              <hr>
              <div class='col-md-12'>
                <div class="col-md-4 nameTag">
                  <h3 class="text-center">Terry J. Canady, Esq.</h3>
                </div>
                <div class="col-md-4 nameTag">
                  <h3 class="text-center">Steven F. Glaser, Esq.</h3>
                </div>
                <div class="col-md-4 nameTag">
                  <h3 class="text-center">Arthur Grisham, Esq.</h3>
                </div>
                <div class="col-md-4 nameTag">
                  <h3 class="text-center">Mike Hester, Esq.</h3>
                </div>
                <div class="col-md-4 nameTag">
                  <h3 class="text-center">Bill Shick, Esq.</h3>
                </div>  
                <div class="col-md-4 nameTag">
                  <h3 class="text-center">Eric Sitler, Esq.</h3>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="col-md-12">
          <div class="col-md-12">

          </div>
        </section>
      </main>
      <!--start footer TODO: place footer in separate file for reuse-->


<?php include 'footer.php'; ?>
