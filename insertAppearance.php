<?php
include 'garble_cnfg.php';
$clientId = $_POST['client_id'];
$jobId = $_POST['jobId'];
$numCases = $_POST['num_cases'];

$result = insert_appearance($clientId, $jobId, $numCases);
if ($result)  {
  header("Location: calendar.php");
  die();
} else {
  echo "something went wibbly wobbly";
}

 ?>
