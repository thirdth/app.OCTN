<?php

// Insert functions
//TODO: check on all the insert functions in pages to re-render them
//TODO: sanitize queries

function insert_client_phone($clientId, $phone, $typeId) {
  $clientId = $clientId;
  $phone = $phone;
  $typeId = $typeId;
  $conn = get_connected();
  $query = "INSERT into clientPhones (number, clientID, typeID)
              Values ('$phone', $clientId, $typeId)";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_client_email($email, $clientId, $isMain) {
  $email = $email;
  $clientId = $clientId;
  $isMain = $isMain;
  $conn = get_connected();
  $query = "INSERT into clientEmails (clientID, address, isMain)
              Values ($clientId, '$email', $isMain)";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_client_address($clientId, $street1, $street2, $city, $state, $zip)  {
  $clientId = $clientId;
  $street1 = $street1;
  $street2 = $street2;
  $city = $city;
  $state = $state;
  $zip = $zip;
  $conn = get_connected();
  $query = "INSERT into clientAddresses
              (street1, street2, city, state, zip, clientID)
              VALUES ('$street1', '$street2', '$city', '$state', '$zip', $clientId)";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  return $last_id;
}

function insert_client($client_name, $contact, $address_id, $phone_id, $email_id) {
  $client_name = $client_name;
  $contact = $contact;
  $address_id = $address_id;
  $phone_id = $phone_id;
  $email_id = $email_id;
  $conn = get_connected();
  $query = "INSERT into client
              (name, contact_name, address_id, phone_id, email_id)
              VALUES ('$client_name', '$contact', '$address_id', '$phone_id', '$email_id')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function insert_appearance($clientId, $jobId, $numCases) {
  $clientId = $clientId;
  $jobId  = $jobId;
  $numCases = $numCases;
  $conn = get_connected();
  $query = "INSERT into appearance
              (clientID, jobID, numCases)
              VALUES ('$clientId', '$jobId', '$numCases')";
  $result = mysqli_query($conn, $query);
  if ($result)  {
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}
//TODO: make insert functions for clerks, coverAttorneys, county, jobs, matters, plaintiffs, defendants, deputyClerks

 ?>
