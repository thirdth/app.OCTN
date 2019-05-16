<?php
include 'garble_cnfg.php';
$conn = get_connected();

$jobsID = $_POST['jobsID'];
$date = date("Y-m-d", strtotime($_POST['date']));
$ctName = $_POST['ctName'];


$getIds = "SELECT id, county_id from court where court_name = '" . $ctName . "'";

$results = mysqli_query( $conn, $getIds );
$all = mysqli_fetch_all($results, MYSQLI_ASSOC);

$courtID = $all[0][id];
$countyID = $all[0][county_id];

$sql = "INSERT into jobs (jobDate, county_id_job, court_id_job)
          VALUES ('$date', '$countyID', '$courtID')";

if ($conn->query($sql) === TRUE) {
    header("Location: newJob.php");
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

?>
