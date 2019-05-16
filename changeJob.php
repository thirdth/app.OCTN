<?php
include 'garble_cnfg.php';
$jobId = $_POST['jobId'];
$jobDate = date("Y-m-d", strtotime($_POST['date']));
$date = date("Y-m-d", strtotime('today'));

if ($jobDate < $date) {
  header("location: editJob.php?jobId=" . $jobId . "&error=error");
  die();
}
$ctName = $_POST['ctName'];
$all = get_ct_cty_ids($ctName);
$courtID = $all[0][id];
$countyID = $all[0][county_id];


$sql = "UPDATE jobs SET jobDate='$jobDate', county_id_job='$countyID', court_id_job='$courtID' WHERE id='$jobId' limit 1";
$conn = get_connected();
if ($conn->query($sql) === TRUE) {
    header("Location: calendar.php?msg=updated");
    die();
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

?>
