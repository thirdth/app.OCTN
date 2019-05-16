<?php
if ($_POST['clerk_name'] == '')  {
  header("Location: editClerk.php?msg=2");
}
include 'garble_cnfg.php';
$clerkName = $_POST['clerk_name'];
$clerkId = $_POST['clerk_Id'];

$query = "UPDATE clerk SET clerk_name='$clerkName' WHERE id='$clerkId'";
$conn = get_connected();

$result = mysqli_query($conn, $query);

if (!$result) {
  echo "There was an error: " . mysqli_error();
} else {
  header("Location: editClerk.php?msg=1");
}

mysqli_close($conn);

?>
