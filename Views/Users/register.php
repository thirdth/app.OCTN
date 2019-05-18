<?php
if(!isset($_SESSION)) {
  session_start();
}
$error = $_GET['error'];
header_check();

include 'registerTemplate.php';
include 'footer.php'; ?>
