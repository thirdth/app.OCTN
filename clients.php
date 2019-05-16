<?
$clients = get_clients();

?>

<div class="col-md-12">
  <h3 class="text-center"><strong>Clients:</strong></h3>
  <?php
  foreach ($clients as $client) {
    $phone = get_phone_byId($client[phone_id]);
    $address = get_address_byId($client[address_id]);
    $email = get_email_byId($client[email_id]);
    echo "<div class='col-md-4'>
            <div class='col-md-12' style='border: .5px dotted grey; padding: 5px; margin-top: 20px; border-radius: 8px;'>
              <div class='col-md-12'>
                <div class='col-md-12' style='min-height: 290px'>
                    <h3>" . $client[name] . "</h3>
                    <hr>
                    <p>Contact: " . $client[contact_name] , "</p>
                    <p>" . $address[street1] . "</p>
                    <p>" . $address[street2] . "</p>
                    <p>" . $address[city] . ", " . $address[state] . ", " . $address[zip] . "</p>
                    <p>" . $phone[number] . "</p>
                    <p>" . $email[email] . "</p>
                </div>
              </div>
              <div class='col-md-12'>
                  <a href='viewClient.php?clientId=" . $client[id] . "' class='btn btn-info pull-right' style='margin: 5px;'>View</a>
                  <a href='editClient.php?clientId=" . $client[id] . "' class='btn btn-primary pull-right' style='margin: 5px;'>Edit</a>
              </div>
            </div>
          </div>";
  }
  ?>
</div>
