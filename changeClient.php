<?php
include "garble_cnfg.php";
$clientId = $_POST['clientId'];
$client_name = $_POST['client_name'];
$contact = $_POST['contact'];
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$email = $_POST['email'];

//print_r($_POST);

$phone_id = update_phone($phone, $clientId);
if (!$phone_id) {
  print($phone);
  print($clientId);
  print("no phone");
  die();
}
$email_id = update_email($email, $clientId);
$address_id = update_address($street1, $street2, $city, $state, $zip, $clientId);

$result = update_client($clientId, $client_name, $contact, $address_id, $phone_id, $email_id);



if ($result)  {
  header("Location: editClient.php");
} else {
  echo "something went wrong" . mysqli_error($conn) . $phone_id . $email_id . $address_id;
}

 ?>
