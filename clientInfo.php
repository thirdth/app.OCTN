<?php
$clientId = $_GET['clientId'];
$appearances = get_appearances_byClientId($clientId)

 ?>

<div class="col-md-12">
  <h3 class="text-center"><strong>Client Information:</strong></h3>
  <div class="col-md-4">
    <h4 class="text-center">Upcoming Appearances</h4>
      <?php
        foreach ($appearances as $appearance) {
          $jobInfo = get_job_info($appearance[job_id]);
          $courtInfo = get_court_info($jobInfo[0][court_id_job]);
          $courtAddress = get_court_address($jobInfo[0][court_id_job]);
          $courtDate = date('l, M jS, Y', strtotime($jobInfo[0][jobDate]));
          echo  "<div class='col-md-12 jobView'>
                  <div class='col-md-12 jobHeader text-left'>
                    <h3>" . $courtInfo[0][name] . " County</h3>
                  </div>
                  <div class='col-md-12''>
                    <p>" . $courtInfo[0][court_name] . "</p>
                  </div>
                  <div class='col-md-12'>
                    <p>" . $courtAddress[0][street1] . "</p>
                    <p>" . $courtAddress[0][street2] . "</p>
                    <p>" . $courtAddress[0][city] . ", " . $courtAddress[0][state] . " " . $courtAddress[0][zip] . "</p>
                  </div>
                  <div class='col-md-12'>
                    <p>" . $courtDate . " at " . $courtInfo[0][time] . "</p>
                  </div>
                  <div class='col-md-12'>
                    <a href='editClient.php?clientId=" . $client[id] . "' class='btn btn-primary pull-right' style='margin: 5px;'>Edit</a>
                  </div>
                </div>";
        }
        ?>
  </div>
</div>
