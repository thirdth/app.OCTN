<?php

$allClerks = get_all_clerks();

if ($_POST['clerk_Id']) {
  $clerkId = $_POST['clerk_Id'];
  $clerkInfo = get_clerk_byId($clerkId);
  $clksCourts = get_courts_byClerk($clerkId);
}
if ($_GET['clerk_Id']) {
  $clerkId = $_GET['clerk_Id'];
  $clerkInfo = get_clerk_byId($clerkId);
  $clksCourts = get_courts_byClerk($clerkId);
}

?>

<div class='col-md-6'>
  <h4>Select:</h4>
  <form class="form-group" method="POST" action"#">
    <select class='form-control' type='text' name='clerk_Id'>
      <?php
      if ($clerkId) {
        echo "<option value='" . $clerkId . "'>". $clerkInfo[0][clerk_name] . "</option>";
      } else {
        echo "<option value=''>Please Select a Clerk</option>";
      }
      foreach ($allClerks as $row) {
        echo "<option value='" . $row[id] . "'>" . $row[clerk_name] . "</option>";
      };
      ?>
    </select>
    <button class="btn btn-primary" type="submit">Select</button>
  </form>
</div>
<div class="col-md-6">
  <h4>Edit:</h4>
  <form class="form-group" method="POST" action="changeClerk.php">
    <input type="hidden" name="clerk_Id" value="<?php echo $clerkId; ?>">
    <input class="form-control" type="text" name="clerk_name" value="<?php echo $clerkInfo[0][clerk_name]; ?>">
    <button class="btn btn-success" type="submit">Edit</button>
  </form>
</div>
</hr>
<div class="col-md-12" style="border-top: 1px dashed grey;">
    <h3><strong>Associated Courts:</strong></h3>
      <?php
      if ($clksCourts)  {
        foreach ($clksCourts as $row) {
          echo "<div class='col-md-4'>
                  <h4>" . $row[court_name] . "</h4>
                </div>";
        }
      }
      ?>
</div>
