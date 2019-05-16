<?php

$allCounties = get_all_counties();
$allClerks = get_all_clerks();
$allCourts = get_courts();
$allTypes = get_court_types();

if ($_POST['court_Id']) {
  $courtId = $_POST['court_Id'];
  $courtInfo = get_courtInfo_byId($courtId);
  $countyInfo = get_county_byId($courtInfo[0][county_id]);
  $courtType  = get_courtType($courtInfo[0][court_type]);
  $courtClerk = get_clerk_byId($courtInfo[0][clerk_id]);

}
if ($_GET['court_Id']) {
  $courtId = $_GET['court_Id'];
  $courtInfo = get_courtInfo_byId($courtId);
  $countyInfo = get_county_byId($courtInfo[0][county_id]);
  $courtType  = get_courtType($courtInfo[0][court_type]);
  $courtClerk = get_clerk_byId($courtInfo[0][clerk_id]);

}

?>
<div class='col-md-12'>
  <h4 class="error"><?php echo $message; ?></h4>
  <form method="POST" action"#">
    <select class='form-control' type='text' name='court_Id'>
      <?php
      if ($courtId) {
        echo "<option value='" . $courtId . "'>". $courtInfo[0][court_name] . "</option>";
      } else {
        echo "<option value=''>Please Select a Court</option>";
      }
      foreach ($allCourts as $row) {
        echo "<option value='" . $row[id] . "'>" . $row[court_name] . "</option>";
      };
      ?>
    </select>
    <button class="btn btn-primary" type="submit">Select</button>
  </form>
</div>

<div class='col-md-12' id='changeCourt'>
        <form method='POST' action='changeCourt.php'>
          <div class='row'>
            <div class='col-md-3'>
              <input type="hidden" name="courtId" value="<?php echo $courtId; ?>">
              <label for='courtName'>Court Name:</label>
              <input class='form-control' name='courtName' value="<?php echo $courtInfo[0][court_name]; ?>">
            </div>
            <div class='col-md-3'>
              <label for='street1'>Address 1:</label>
              <input class='form-control' name='street1' value="<?php echo $courtInfo[0][street1]; ?>">
            </div>
            <div class='col-md-3'>
              <label for='street2'>Address 2:</label>
              <input class='form-control' name='street2' value="<?php echo $courtInfo[0][street2]; ?>">
            </div>
            <div class='col-md-3'>
              <label for='city'>City:</label>
              <input class='form-control' name='city' value="<?php echo $courtInfo[0][city]; ?>">
            </div>
            <div class='col-md-3'>
              <label for='state'>State:</label>
              <input class='form-control' name='state' value="<?php echo $courtInfo[0][state]; ?>">
            </div>
            <div class='col-md-3'>
              <label for='zip'>Zip:</label>
              <input class='form-control' name='zip' value="<?php echo $courtInfo[0][zip]; ?>">
            </div>
            <div class='col-md-3'>
              <label for='type'>Court Type</label>
              <select class='form-control' type='text' name='type'>
                <option value="<?php echo $courtInfo[0][court_type]; ?>"><?php echo $courtType[0][type]; ?></option>
                <?php
                foreach ($allTypes as $row) {
                  echo "<option value='" . $row[id] . "'>" . $row[type] . "</option>";
                };
                ?>
              </select>
            </div>
            <div class='col-md-3'>
              <label for='county'>County</label>
              <select class='form-control' type='text' name='county'>
                <option value="<?php echo $countyInfo[0][id]; ?>"><?php echo $countyInfo[0][name]; ?></option>
                <?php
                foreach ($allCounties as $row) {
                  echo "<option value='" . $row[id] . "'>" . $row[name] . "</option>";
                };
                ?>
              </select>
            </div>
            <div class='col-md-3'>
              <label for='clerk'>Clerk</label>
              <select class='form-control' type='text' name='clerk'>
                <option value="<?php echo $courtClerk[0][id]; ?>"><?php echo $courtClerk[0][clerk_name]; ?></option>
                <?php
                foreach ($allClerks as $row) {
                  echo "<option value='" . $row[id] . "'>" . $row[clerk_name] . "</option>";
                };
                ?>
              </select>
              <a href="newClerk.php">add clerk</a>
            </div>
            <div class='col-md-3'>
              <label for='date'>Time</label>
              <input class='form-control' type='text' name='time' value="<?php echo $courtInfo[0][time]; ?>">
            </div>
            <div class='col-md-6 text-right'>
              <button class='btn btn-success' style='margin-top: 25px;' type='submit'>Add</button>
              <a href='adminCourt.php' class='btn btn-warning form-control' style='width:100px; margin-top: 25px;'>Cancel</a>
            </div>
          </div>
        </form>
      </div>
