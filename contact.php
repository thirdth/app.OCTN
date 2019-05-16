<?php
include 'garble_cnfg.php';
header_check();
if (isset($_POST['jobId']))  {
 $jobId = $_POST['jobId'];
} elseif (isset($_GET['jobId'])){
 $jobId = $_GET['jobId'];
}
$errNum = $_GET['error'];
if ($errNum == '1') {
  $error = "**Please fill in a Company or Organization";
} elseif ($errNum =='2')  {
  $error = "**Please fill in a Contact Name";
} elseif ($errNum =='3')  {
  $error = "**We cannot get back to you without an Email address.";
} else if ($errNum =='4')  {
  $error = "**You appear to be a robot.";
}
$all = get_court_info($jobId);
?>
      <!--End reusable header-->
      <main class="row projects">
        <section class="col-md-12">
          <div class="row info">
            <div class="col-md-3 leftColumn">
              <?php include 'searchColumn.php'; ?>
            </div>
            <div class="col-md-9 infoBox" id="results">
              <p class="error"><?php echo $error ?></p>
              <form method="POST" action="mailrequest.php">
                <div class="form-group row">
                  <div class="col-md-6">
                    <div class="col-sm-12">
                      <label for="company">Company/Organization</label>
                      <input type="text" class="form-control" name="company" placeholder="**Required">
                    </div>
                    <div class="col-sm-12">
                      <label for"contact">Contact</label>
                      <input type="text" class="form-control" name="contact" placeholder="**Required">
                    </div>
                    <div class="col-sm-12">
                      <label for"email">Email</label>
                      <input type="email" class="form-control" name="email" placeholder="**Required">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-sm-12">
                      <p>Contacting OfCounselTN or any of its affiliates does not create an attorney-client relationship. Any communication through this website may not be priviledged or confidential. This contact form should not be used to convey private or sensitive information.</p>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="col-sm-12">
                      <label for="body">Body</label>
                      <textarea class="form-control" rows="4" name="body"></textarea>
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                  </div>

                </div>
                <div class="g-recaptcha" data-sitekey="6LfsmTAUAAAAAFHZlu9zej4Yu3kbriNKb_WNLmW5"></div>
              </form>
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
