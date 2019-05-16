<?php
// Create connection
$conn = mysqli_connect("mysql.ofcounseltn.com", "ofcounseltncom", "dkKBVJHx", "ofcounseltn_com");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

$court = $_POST['courtName'];
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$type = $_POST['type'];
$county = $_POST['county'];
$clerk = $_POST['clerk'];
$time = $_POST['time'];


$getcounty = "SELECT id from county where name = '" . $county . "'";
$getclerk = "SELECT id from clerk where clerk_name ='" . $clerk . "'";
$getType = "SELECT id from court_type where type ='" . $type . "'";



$results = mysqli_query( $conn, $getcounty );
$all = mysqli_fetch_all($results, MYSQLI_ASSOC);

$countyID = $all[0][id];

$resultsClerk = mysqli_query( $conn, $getclerk );
$allClerk = mysqli_fetch_all($resultsClerk, MYSQLI_ASSOC);

$clerkID = $allClerk[0][id];

$resultsType = mysqli_query( $conn, $getType );
$allType = mysqli_fetch_all($resultsType, MYSQLI_ASSOC);

$typeID = $allType[0][id];

print(mysqli_error($conn));

$sql = "INSERT into court (court_name, court_type, county_id, time, clerk_id)
          VALUES ('$court', '$typeID', '$countyID', '$time', '$clerkID')";


if ($conn->query($sql) === TRUE) {
    $court_id = $conn->insert_id;
    $sql = "INSERT into addresses (street1, street2, city, state, zip, court_id)
              VALUES ('$street1', '$street2', '$city', '$state', '$zip', '$court_id')";

    if ($conn->query($sql) === TRUE)  {
      header("Location: newJob.php");
    } else {
      echo "Error updating record:" . $conn->error;
    }
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

?>
