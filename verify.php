<?php
session_start();
include 'garble_cnfg.php';
if (!empty($_POST['submit']) && 'Log-in' == $_POST['submit']) { //TODO: move this to functions page
  $password = $_POST['password'];
  $username = $_POST['username'];
  $conn = get_connected();
  if (verify_me($username, $password)) {
    create_session($username, $password); // need to privatize this 
    header("Location: calendar.php");
  }else {
    header("Location: login.php?error=1");
    die();
  };
}
print_r($all);

// moving this to a function would probably allow for a # href with a verify_login function at the top of the login page.
?>
