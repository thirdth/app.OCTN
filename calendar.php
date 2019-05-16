<?php
include 'garble_cnfg.php';
header_check();
?>
      <main class="row projects">
        <section class="col-md-12">
          <div class="row info">
            <div class="col-md-3 leftColumn">
              <?php include 'searchColumn.php'; ?>
            </div>
            <div class="col-md-9 infoBox" id="results">
              <?php include 'results.php';  ?>
            </div>
          </div>
        </section>
        <section class="col-md-12">

            <?php include 'calImage.php'; ?>

        </section>
      </main>
<?php include 'footer.php'; ?>
