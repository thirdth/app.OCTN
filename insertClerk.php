<?php
// Create connection
$conn = mysqli_connect("mysql.ofcounseltn.com", "ofcounseltncom", "dkKBVJHx", "ofcounseltn_com");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

$clerk = $_POST['clerkName'];

// TODO: check to see if clerk already exists

print(mysqli_error($conn));

$sql = "INSERT into clerk (clerk_name)
          VALUES ('$clerk')";

if ($conn->query($sql) === TRUE) {
    header("Location: newCourt.php");
} else {
    echo "Error updating record: " . $conn->error;
}

mysqli_close($conn);

?>
