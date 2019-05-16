<?php $jobId = get_jobId();
$allCourts = get_courts();
$job = get_job_info($jobId);
$court = get_court_info($jobId);
$courtAddy = get_court_address($court[0][court_id]);
$courtDate = date('l, M jS, Y', strtotime($job[0][jobDate]));
echo  "<div class='col-md-12 jobView'>
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
      ?>
