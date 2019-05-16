<?php include 'header.php'; ?>
      <!--End reusable header-->
      <main class="row projects">
        <section class="col-md-12">
          <div class="row info">
            <div class="col-md-3 leftColumn">
              <div class="col-md-12 text-center">
                <h3 class="text-center" style="margin-top: 0px;">Select:</h3>
                <a href="newJob.php" class="btn btn-primary">New Job</a>
                <button class="btn btn-success">Edit Job</button>
              </div>
              <div class="col-md-12 text-center">
                <a href="newCourt.php" class="btn btn-primary">New Court</a>
                <button class="btn btn-success">Edit Court</button>
              </div>
              <div class="col-md-12 text-center">
                <a href="newClerk.php" class="btn btn-primary">New Clerk</a>
                <button class="btn btn-success">Edit Clerk</button>
              </div>
            </div>
            <div class="col-md-9" id="results">
              <h3 class="text-center" style="margin-top: 0px">Edit:</h3>
              <?php include 'editResults.php';  ?>
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
