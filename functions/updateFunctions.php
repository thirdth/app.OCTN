<?php

// Update functions
// TODO: check these functions to make sure they still work in the codebase
// TODO: sanitize queries
function update_client_phone($phone, $clientId)  {
  $phone = $phone;
  $clientId = $clientId;
  $conn = get_connected();
  $query = "UPDATE clientPhones
              SET number='$phone' WHERE clientID = '$clientId'";
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  if ($result)  { //this was changed when rewriting database
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function update_client_email($email, $clientId)  {
  $email = $email;
  $clientId = $clientId;
  $conn = get_connected();
  $query = "UPDATE clientEmails
              SET address ='$email'
              WHERE clientID = '$clientId'";
  $result = mysqli_query($conn, $query);
  mysqli_close($conn);
  if ($result)  { //these were changed when rewriting database
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function update_client_address($street1, $street2, $city, $state, $zip, $clientId)  {
  $street1 = $street1;
  $street2 = $street2;
  $city = $city;
  $state = $state;
  $zip = $zip;
  $clientId = $clientId;
  $conn = get_connected();
  $query = "UPDATE clientAddresses
              SET street1='$street1', street2='$street2', city='$city', state='$state',
              zip='$zip'
              WHERE clientID = '$clientId'";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  mysqli_close($conn);
  if ($result)  {  // changed when rewriting database
    return $result;
  } else {
    print(mysqli_error($conn));
  }
}

function update_client($clientId, $clientName, $contact, $memo) {
  $clientId = $clientId;
  $clientName = $clientName;
  $contact = $contact;
  $memo = $memo;
  $conn = get_connected();
  $query = "UPDATE client
              SET name='$clientName',
                  contact_name='$contact',
                  memo = '$memo'
              WHERE id='$clientId'";
  $result = mysqli_query($conn, $query);
  $last_id = mysqli_insert_id($conn);
  if ($result)  {
    return $last_id;  // should return the Client ID that was just used
  } else {
    print(mysqli_error($conn));
  }
}

// TODO: write updates for clerks, coverAttorneys, county, jobs, matters, plaintiffs, defendants, deputyClerks

 ?>
