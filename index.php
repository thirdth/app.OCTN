<?php
require_once 'garble_cnfg.php';
header_check();
if (check_logged_in() == false) {
  include 'Views/Users/login.php';
} else {
  include 'Views/Admin/Dashboard.php';
};
require_once 'Views/Structure/footer.php'; ?>
