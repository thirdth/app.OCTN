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
              <h3 class="text-center" style="margin-top: 0px">New Job:</h3>
              <?php include 'newJobInfo.php';  ?>
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
