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
  $error = "**Please fill in a Company";
} elseif ($errNum =='2')  {
  $error = "**Please fill in a Contact";
} elseif ($errNum =='3')  {
  $error = "**We cannot get back to you without an Email address.";
} elseif ($errNum =='4')  {
  $error = "**Please estimate the number of cases you need covered.";
} elseif ($errNum =='5')  {
  $error = "**Please indicate what type of cases you need covered.";
} else if ($errNum =='6')  {
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
                      <label for="company">Company/Attorney</label>
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
                  <div class="col-sm-6">
                    <div class="col-sm-12">
                      <label for="court_name">Court</label>
                      <input type="text" class="form-control" name="court_name" readonly="readonly" value="<?php echo $all[0][court_name] ?>">
                    </div>
                    <div class="col-sm-6">
                      <label for="jobDate">Date</label>
                      <input type="text" class="form-control" name="jobDate" readonly="readonly" value="<?php echo $all[0][jobDate] ?>">
                    </div>
                    <div class="col-sm-6">
                      <label for="jobId">Job ID</label>
                      <input type="text" class="form-control" name="jobId" readonly="readonly" value="<?php echo $all[0][id] ?>">
                    </div>
                    <div class="col-sm-6">
                      <label for="case_amount">Number of cases</label>
                      <select class="form-control" name="case_amount">
                        <option value="0">Select one</option>
                        <option value="1">1 to 5</option>
                        <option value="2">6 to 10</option>
                        <option value="3">10 plus</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label for="case_type">Case Type</label>
                      <select class="form-control" name="case_type">
                        <option value="0">Select one</option>
                        <option value="medical">Medical Debt</option>
                        <option value="consumer">Consumer Debt</option>
                        <option value="commercial">Commercial Debt</option>
                        <option value="subrogation">Subrogation</option>
                      </select>
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
