<?php
$conn = get_connected();

$getCounties = "SELECT * from county";
$getClerks = "SELECT * from clerk";

$resultsCounties = mysqli_query( $conn, $getCounties );
$allCounties = mysqli_fetch_all($resultsCounties, MYSQLI_ASSOC);

$resultsClerks = mysqli_query( $conn, $getClerks );
$allClerks = mysqli_fetch_all($resultsClerks, MYSQLI_ASSOC);

mysqli_close($conn);
?>
<div class='col-md-12' id='newCourt'>
        <form method='POST' action='insertClerk.php'>
          <div class='row'>
            <div class='col-md-3'>
              <label for='clerkName'>Clerk Name:</label>
              <input class='form-control' name='clerkName'>
            </div>
            <div class='col-md-3 text-right'>
              <button class='btn btn-success' style='margin-top: 25px;' type='submit'>Add</button>
            </div>
          </div>
        </form>
      </div>
