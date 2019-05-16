<?php


$name = $_POST['county'];
$jobsID = $_POST['jobsID'];
$date = $_POST['date'];
$ctName = $_POST['ctName'];
$time = $_POST['time'];

echo "<div class='col-md-12' id='newJob'>
        <form method='POST' action='insert.php'>
          <div class='row'>
            <div class='col-md-3'>
              <label for='name'>County</label>
              <input type='text' name='name' id='name' value='" . $name . "'>
              <input type='hidden' name='jobsID' id='jobsID' value='" . $jobsID . "'>
            </div>
            <div class='col-md-3'>
              <label for='date'>Court</label>
              <input type='text' name='ctName' id='ctName' value='" . $ctName . "'>
            </div>
            <div class='col-md-3'>
              <label for='date'>Date</label>
              <input type='text' name='date' id='date' value='" . $date . "'>
            </div>
            <div class='col-md-3'>
              <label for='time'>Time</label>
              <input type='text' name='time' id='time' value='" . $time . "' readonly='readonly'>
            </div>
          </div>
          <div class='row'>
            <div class='col-md-12 text-right'>
              <button class='btn btn-success' type='submit'>Edit</button>
            </div>
          </div>
        </form>
      </div>"

 ?>
