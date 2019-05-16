<?php
include 'garble_cnfg.php';
protected_page();
include 'header_logged.php';
?>
      <!--End reusable header-->
      <main class="row projects">
        <section class="col-md-12">
          <div class="row info">
            <div class="col-md-3 leftColumn">
              <?php include 'searchColumn.php'; ?>
            </div>
            <div class="col-md-9 infoBox" id="results">
              <?php include 'deleteJobInfo.php';  ?>
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
