<?php
$jobId = get_jobId();
$all = get_court_info($jobId);


  if ($all) {
    $allCourt = get_court_address($all[0][court_id]);

    $courtDate = date('l, M jS, Y', strtotime($all[0][jobDate]));
    echo  "<div class='col-md-9 jobView'>
            <div class='col-md-12 jobHeader text-left'>
              <h3>" . $all[0][name] . " County</h3>
            </div>
            <div class='col-md-12 jobBody'>
              <div class='col-md-12'>
                <p>" . $courtDate . " at " . $all[0][time] . "</p>
              </div>
              <div class='col-md-12''>
                <p>" . $all[0][court_name] . "</p>
              </div>
              <div class='col-md-12'>
                <p>" . $allCourt[0][street1] . "</p>
                <p>" . $allCourt[0][street2] . "</p>
                <p>" . $allCourt[0][city] . ", " . $allCourt[0][state] . " " . $allCourt[0][zip] . "</p>
              </div>
            </div>
          </div>
          ";
  } else {
    echo "<div class='text-center'><h3>No results to show, please choose another search.</h3></div>";
  };

  if (check_logged_in())  {
    echo "<div class='col-md-3'>
            <form method='POST' action='jobInfo.php'>
              <input type='hidden' name='jobId' value='" . $jobId . "'>
              <button type='submit' class='btn btn-primary pull-right'>Job Info</button>
            </form>
          </div>
          <div class='col-md-3 text-left'>
            <a href='newAppearance.php?jobId=" . $jobId . "' class='btn btn-default pull-right' style='width: 100px; margin: 5px;'>Appearance</a>
          </div>
          <div class='col-md-3'>
            <a href='editJob.php?jobId=" . $jobId . "' class='btn btn-success pull-right' style='width: 100px; margin: 5px;'>Edit Job</a>
          </div>
          <div class='col-md-3 text-left'>
            <a href='deleteJob.php?jobId=" . $jobId . "' class='btn btn-danger pull-right' style='width: 100px; margin: 5px;'>Delete Job</a>
          </div>
          ";
  } else {
    echo "<div class='col-md-3'>
            <form method='POST' action='request.php'>
              <input type='hidden' name='jobId' value='" . $jobId . "'>
              <button type='submit' class='btn btn-primary pull-right'>Select</button>
            </form>
          </div>";
  }

 ?>
