<?php
if ($_POST['jobId'] == '')  {
  header("Location: editCourt.php?msg=2");
}
include 'garble_cnfg.php';
$courtId = $_POST['courtId'];
$court_name = $_POST['courtName'];
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$type = $_POST['type'];
$countyId = $_POST['county'];
$clerkId = $_POST['clerk'];
$time = $_POST['time'];


$query = "INSERT into addresses (street1, street2, city, state, zip, court_id)
            VALUES ('$street1', '$street2', '$city', '$state', '$zip', '$courtId')
            ON DUPLICATE key
            UPDATE street1='$street1', street2='$street2', city='$city', state='$state', zip='$zip'";

$query2 = "UPDATE court SET court_name='$court_name', court_type='$type', county_id='$countyId', time='$time', clerk_id= '$clerkId' WHERE id='$courtId'";
$conn = get_connected();

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
if (!$result or !$result2) {
  echo "There was an error: " . mysqli_error();
} else {
  header("Location: editCourt.php?msg=1");
}


mysqli_close($conn);

?>
