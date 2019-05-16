<?php
$jobId = get_jobId();
$appearances = get_appearances_byJobId($jobId);
$court_schedule = $all[0][court_schedule];
$court_notes = $all[0][court_notes];
if ($appearances) {
  echo "<div class='col-md-6'>
          <h4 class='text-center'><strong>Requested Appearances</strong></h4>";
              foreach ($appearances as $appearance) {
                $client = get_client_byId($appearance[client_id]);
                $address = get_address_byId($client[address_id]);
                $phone = get_phone_byId($client[phone_id]);
                $email = get_email_byId($client[email_id]);
                echo "
            <div class='col-md-6'>
              <div class='col-md-12'>
                <h4><strong>" . $client[name] . "</strong></h4>
                <h4>" , $address[street1] . "</h4>
                <p>" . $address[street2] . "</p>
                <p>" . $address[city] . ", " . $address[state] . " " . $address[zip] . "</p>
                <p>" . $phone[number] . "</p>
                <p>" .  $email[email] . "</p>
                <p>" . $appearance[case_num] . "</p>
              </div>
              <div class='col-md-12'>
                <a href='editClient.php?clientId=" .  $client[id] . "' class='btn btn-success pull-right' style='margin: 5px;'>Edit</a>
              </div>
            </div>";
      }
    } else {
        echo "<div class='col-md-6'>
                <h4 class='text-center'><strong>Requested Appearances</strong></h4>
                <h4 class='text-center'>There are no appearances associated with this job yet.</h4>
                ";
      }
      ?>
    </div>
    <div class='col-md-6'>
      <form class='form-group' method='POST' action='#'>
        <label for='court_schedule'>Court Schedule Info:</label>
        <textarea rows='2' class='form-control' name='court_schedule' value='<?php echo $court_schedule; ?>'></textarea>
        <label for='court_notes'>Court Notes:</label>
        <textarea rows='6' class='form-control' name='court_notes' value='<?php echo $court_notes; ?>'></textarea>
        <button class='btn btn-primary' type='submit'>Edit</button>
      </form>
    </div>
