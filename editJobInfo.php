<?php
$error = $_GET['error'];
if ($error) {
  $msg = "Please enter a date in the future.";
}
$jobId = get_jobId();
$allCourts = get_courts();
$job = get_job_info($jobId);
$court = get_court_info($jobId);
$courtAddy = get_court_address($court[0][court_id]);
$courtDate = date('l, M jS, Y', strtotime($job[0][jobDate]));
echo  "<div class='col-md-6 jobView'>
        <div class='col-md-12 jobHeader text-left'>
          <h3>" . $court[0][name] . " County</h3>
        </div>
        <div class='col-md-12''>
          <p>" . $court[0][court_name] . "</p>
        </div>
        <div class='col-md-12'>
          <p>" . $courtAddy[0][street1] . "</p>
          <p>" . $courtAddy[0][street2] . "</p>
          <p>" . $courtAddy[0][city] . ", " . $courtAddy[0][state] . " " . $courtAddy[0][zip] . "</p>
        </div>
        <div class='col-md-12'>
          <p>" . $courtDate . " at " . $court[0][time] . "</p>
        </div>
      </div>";
echo "<div class='col-md-6' id='editJob'>
        <h4 class='error'>" . $msg . "</h4>
        <h4>Change To:</h4>
        <form method='POST' action='changeJob.php'>
          <div class='row'>
            <div class='col-md-12'>
              <label for='ctName'>Court</label>
              <select class='form-control' name='ctName'>
                <option value='" . $court[0][court_name] . "'>" . $court[0][court_name] . "</option>";
              foreach ($allCourts as $row) {
                echo "<option value='" . $row[court_name] . "'>" . $row[court_name] . "</option>";
              };
  echo "      </select>
              </div>
            <div class='col-md-6'>
              <label for='date'>Date</label>
              <input class='form-control datepick' name='date' value='" . $job[0][jobDate] . "' id='datepicker2'>
              <input type='hidden' value='" . $jobId . "' name='jobId'>
            </div>
            <div class='col-md-6 text-right'>
              <button class='btn btn-success' style='margin-top: 25px;' type='submit'>Edit Job</button>
            </div>
            <div class='col-md-12 text-right'>
              <a href='jobView.php?jobId=" . $jobId . "' class='btn btn-warning' style='width: 100px; margin: 5px;'>Cancel</a>
            </div>
          </div>
        </form>
      </div>";

 ?>
