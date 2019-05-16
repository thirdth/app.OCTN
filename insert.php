<?php
// Create connection
$conn = mysqli_connect("mysql.ofcounseltn.com", "ofcounseltncom", "dkKBVJHx", "ofcounseltn_com");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

$name = $_POST['name'];
$jobsID = $_POST['jobsID'];
$date = $_POST['date'];
$time = $_POST['time'];
$ctName = $_POST['ctName'];


$getcounty = "SELECT id from county where name = '" . $name . "'";
$getcourt = "SELECT id from court where court_name ='" . $ctName . "'";

print_r($getcourt);

$results = mysqli_query( $conn, $getcounty );
$all = mysqli_fetch_all($results, MYSQLI_ASSOC);

$countyID = $all[0][id];

$resultsCt = mysqli_query( $conn, $getcourt );
$allCt = mysqli_fetch_all($resultsCt, MYSQLI_ASSOC);

$ctID = $allCt[0][id];

print(mysqli_error($conn));

$sql = "UPDATE jobs
          SET jobDate='" . $date . "', county_id_job='" . $countyID . "', court_id_job='" . $ctID . "' WHERE id = '" . $jobsID . "'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully <a href='edit.php'>Back to Edit</a>";
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

?>
