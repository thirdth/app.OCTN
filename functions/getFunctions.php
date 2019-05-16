<?php

//TODO: sanitize queries just in case

// Get Functions

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// appearance Functions
function get_appearances_byClientId($clientId)  {
  $clientId = $clientId;
  $conn = get_connected();
  $query = "SELECT * from appearances where clientID='$clientId'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_appearances_byJobId($jobId)  {
  $jobId = $jobId;
  $conn = get_connected();
  $query = "SELECT * from appearances where jobID='$jobId'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// clerk functions
function get_all_clerks() {
  $conn = get_connected();
  $query = "SELECT * from clerks order by clerkName";
  $results = mysqli_query( $conn, $query );
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_clerk_byId($clerkId) {
  $clerkId = $clerkId;
  $conn = get_connected();
  $query = "SELECT * from clerks WHERE id ='" . $clerkId . "'";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// client Functions
// TODO: check on this function to distrubute phone queries
function get_client_phone_byId($clientId) {
  $clientId = $clientId;
  $conn = get_connected();
  $query = "SELECT * from clientPhones where clientID='$clientId'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_clientAddress_byId($clientId) {
  $clientId = $clientId;
  $conn = get_connected();
  $query = "SELECT * from clientAddresses where clientID='$clientId'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_clientEmail_byId($clientId) {
  $clientId = $clientId;
  $conn = get_connected();
  $query = "SELECT * from clientEmails where clientID='$clientId'";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

function get_clients()  {
  $conn = get_connected();
  $query = "SELECT * from client ORDER by name asc";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_client_byId($clientId)  {
  $conn = get_connected();
  $query = "SELECT * from client where id='$clientId' limit 1";
  $result = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all[0];
}

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// county functions
function get_county_byId($countyId) {
  $countyId = $countyId;
  $conn = get_connected();
  $query = "SELECT * from county WHERE id ='" . $countyId . "'";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_all_counties() {
  $conn = get_connected();
  $query = "SELECT * from county";
  $results = mysqli_query( $conn, $query );
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// court functions
function get_courtId() {
  if (isset($_POST['courtId']))  {
   $courtId = $_POST['courtId'];
 } elseif (isset($_GET['courtId'])){
   $courtId = $_GET['courtId'];
  }
  return $courtId;
}

function get_courtInfo_byId($courtId) {
  $courtId = $courtId;
  $conn = get_connected();
  $query = "SELECT court.courtName, court.courtType, court.countyID,
              court.time, court.clerkID, courtAddresses.courtID,
              courtAddresses.street1, courtAddresses.street2,
              courtAddresses.city, courtAddresses.state, courtAddresses.zip
              from court
              inner join courtAddresses
              on court.id=courtAddresses.courtID
              where court.id ='" . $courtId . "' limit 1";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_courtType($number) {
  $number = $number;
  $conn = get_connected();
  $query = "SELECT * from courtType WHERE id ='" . $number . "'";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_courts()  {
  $conn = get_connected();
  $getCourt = "SELECT * from court order by courtName asc";
  $resultsCourt = mysqli_query( $conn, $getCourt );
  $allCourts = mysqli_fetch_all($resultsCourt, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $allCourts;
}

function get_courts_byClerk($clerkId) {
  $conn = get_connected();
  $clerkId = $clerkId;
  $query = "SELECT * from court where clerkID = '$clerkId'";
  $results = mysqli_query($conn, $query);
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_court_info($jobId) {
  $conn = get_connected();
  $jobId = $jobId;
  $query = "SELECT jobs.jobDate, jobs.id, FullCourt.courtName, FullCourt.time,
              FullCourt.name, FullCourt.id as court_id FROM jobs
              RIGHT JOIN FullCourt ON jobs.courtIDJob = FullCourt.id
              where jobs.id = '" . $jobId . "' limit 1";
  $results = mysqli_query( $conn, $query );
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_court_address($courtId)  {
  $conn = get_connected();
  $court_id = $court_id;
  $queryCourt = "SELECT * from courtAddresses where courtID = $courtId";
  $resultsCourt = mysqli_query( $conn, $queryCourt );
  $allCourt = mysqli_fetch_all($resultsCourt, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $allCourt;
}

function get_court_types()  {
  $conn = get_connected();
  $query = "SELECT * from courtType";
  $results = mysqli_query( $conn, $query );
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_ct_cty_ids($ctName)  {
  $conn = get_connected();
  $ctName = $ctName;
  $query = "SELECT id, countyID from court where courtName = '" . $ctName . "'";
  $results = mysqli_query( $conn, $query );
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// coverAttorneys functions



////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////// defendants functions



////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////// deputyClerks functions




////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////  jobs functions
function get_job_info($jobId) {
  $conn = get_connected();
  $jobId = $jobId;
  $query = "SELECT * from jobs where id ='" . $jobId . "' limit 1";
  $results = mysqli_query( $conn, $query );
  $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
  mysqli_close($conn);
  return $all;
}

function get_jobId () {
  if (isset($_POST['jobId']))  {
   $jobId = $_POST['jobId'];
  } elseif (isset($_GET['jobId'])){
   $jobId = $_GET['jobId'];
  }
  return $jobId;
}

////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////// matter functions




////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////// messages functions



////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////// plaintiffs functions

 ?>
