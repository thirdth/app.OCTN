<?php
$allCourts = get_courts();
?>

<div class="col-md-12 text-center">
  <h3 class="text-center" style="margin-top: 0px;">Search:</h3>
  <button class="btn btn-primary" id="byDateButton">By Date</button>
  <button class="btn btn-success" id="byCourtButton">By Court</button>
</div>
<div class="col-md-12 search" id="byDate">
  <form method="POST" action="calendar.php">
    <div class="col-md-12">
      <input type="hidden" autofocus>
      <label for"datepicker">Date:</label>
      <input class="form-control datepick" type="text" id="datepicker" name="datepicker">
    </div>
    <div class="col-md-12" style="margin-top: 7px;">
      <button class="btn btn-default text-center" type:"submit" name="byDate">Search</button>
    </div>
  </form>
</div>
<div class="col-md-12 search" id="byCourt">
  <form method="POST" action="calendar.php">
    <div class="col-md-12">
      <label for='ctName'>Court</label>
      <select class='form-control' name='ctName'>";
      <?php foreach ($allCourts as $row) {
          echo "<option value='" . $row[courtName] . "'>" . $row[courtName] . "</option>";
        };
      ?>
      </select>
    </div>
    <div class="col-md-12" style="margin-top: 7px;">
      <button class="btn btn-default text-center" type="submit" name="byCourt">Search</button>
    </div>
  </form>
</div>
