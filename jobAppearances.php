<?php
$jobId = get_jobId();
$appearances = get_appearances_byJobId($jobId)

 ?>

<div class="col-md-12">
  <h3 class="text-center"><strong>Job Information:</strong></h3>
  <div class="col-md-6">
    <h4 class="text-center">Associated Appearances</h4>
      <?php
        foreach ($appearances as $appearance) {
          $client = get_client_byId($appearance[client_id]);
          $clientAddress = get_address_byId($client[address_id]);
          echo  "<div class='col-md-6 jobView'>
                  <div class='col-md-12 jobHeader text-left'>
                    <h3>" . $client[name] . " County</h3>
                  </div>
                  <div class='col-md-12'>
                    <p>" . $clientAddress[street1] . "</p>
                    <p>" . $clientAddress[street2] . "</p>
                    <p>" . $clientAddress[city] . ", " . $clientAddress[state] . " " . $clientAddress[zip] . "</p>
                  </div>
                  <div class='col-md-12'>
                    <a href='editClient.php?clientId=" . $client[id] . "' class='btn btn-success pull-right' style='margin: 5px;'>Edit</a>
                  </div>
                </div>";
        }
        ?>
  </div>
</div>
