<?php

$clientId = $_GET['clientId'];
$client = get_client_byId($clientId);
$address = get_address_byId($client['address_id']);
$phone = get_phone_byId($client['phone_id']);
$email = get_email_byId($client['email_id']);

//print_r($email);

 ?>

 <div class='col-md-12' id='updateClient'>
    <div class='col-md-9'>
      <h2><?php echo $client[name]; ?></h2>
      <h4><?php echo $address[street1]; ?></h4>
      <p><?php echo $address[street2]; ?></p>
      <p><?php echo $address[city] . ", " . $address[state] . " " . $address[zip]; ?></p>
      <p><?php echo $phone[number]; ?></p>
      <p><?php echo $email[email]; ?></p>
    </div>
    <div class='col-md-3'>
      <a href="editClient.php?clientId=<?php echo $client[id]; ?>" class='btn btn-success pull-right' style='margin: 5px;'>Edit</a>
    </div>
</div>
