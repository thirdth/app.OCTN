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
              <?php include 'jobResults.php';  ?>
            </div>
          </div>
        </section>
        <section class="col-md-12">
          <div class="col-md-12">
            <?php include 'calImage.php'; ?>
          </div>
        </section>
      </main>
      <!--start footer TODO: place footer in separate file for reuse-->


<?php include 'footer.php'; ?>
