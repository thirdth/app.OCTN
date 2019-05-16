<?php

$allCounties = get_all_counties();
$allClerks = get_all_clerks();
$allTypes = get_court_types();

?>
<div class='col-md-12' id='newCourt'>
        <form method='POST' action='insertCourt.php'>
          <div class='row'>
            <div class='col-md-3'>
              <label for='courtName'>Court Name:</label>
              <input class='form-control' name='courtName'>
            </div>
            <div class='col-md-3'>
              <label for='street1'>Address 1:</label>
              <input class='form-control' name='street1'>
            </div>
            <div class='col-md-3'>
              <label for='street2'>Address 2:</label>
              <input class='form-control' name='street2'>
            </div>
            <div class='col-md-3'>
              <label for='city'>City:</label>
              <input class='form-control' name='city'>
            </div>
            <div class='col-md-3'>
              <label for='state'>State:</label>
              <input class='form-control' name='state'>
            </div>
            <div class='col-md-3'>
              <label for='zip'>Zip:</label>
              <input class='form-control' name='zip'>
            </div>
            <div class='col-md-3'>
              <label for='type'>Court Type</label>
              <select class='form-control' type='text' name='type'>
                <?php
                foreach ($allTypes as $row) {
                  echo "<option value='" . $row[type] . "'>" . $row[type] . "</option>";
                };
                ?>
              </select>
            </div>
            <div class='col-md-3'>
              <label for='county'>County</label>
              <select class='form-control' type='text' name='county'>
                <?php
                foreach ($allCounties as $row) {
                  echo "<option value='" . $row[name] . "'>" . $row[name] . "</option>";
                };
                ?>
              </select>
            </div>
            <div class='col-md-3'>
              <label for='clerk'>Clerk</label>
              <select class='form-control' type='text' name='clerk'>
                <?php
                foreach ($allClerks as $row) {
                  echo "<option value='" . $row[clerk_name] . "'>" . $row[clerk_name] . "</option>";
                };
                ?>
              </select>
              <a href="newClerk.php">add clerk</a>
            </div>
            <div class='col-md-3'>
              <label for='date'>Time</label>
              <input class='form-control' type='text' name='time' placeholder='HH:MM am/pm'>
            </div>
            <div class='col-md-3 text-right'>
              <button class='btn btn-success' style='margin-top: 25px;' type='submit'>Add</button>
            </div>
          </div>
        </form>
      </div>
