<?php
include 'garble_cnfg.php';
$jobId = $_POST['jobId'];

$sql = "DELETE FROM jobs WHERE id='$jobId' limit 1";
$conn = get_connected();
if ($conn->query($sql) === TRUE) {
    header("Location: calendar.php?msg=updated");
    die();
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

?>
