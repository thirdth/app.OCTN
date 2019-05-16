<?php
$courts = get_courts();


  echo "<div class='col-md-12'>
          <h4 class='text-center'><strong>Courts</strong></h4>";
              foreach ($courts as $court) {
                $address = get_court_address($court[id]);
                echo "
          <div class='col-md-4'>
            <div class='col-md-12' style='margin-bottom: 40px; border: 1px dotted grey; padding: 15px; border-radius: 8px;'>
              <div class='col-md-12' style='min-height: 210px;'>
                <div class='col-md-12'>
                  <h4><strong>" . $court[court_name] . "</strong></h4>
                  <hr>
                  <h4>" , $address[0][street1] . "</h4>
                  <p>" . $address[0][street2] . "</p>
                  <p>" . $address[0][city] . ", " . $address[0][state] . " " . $address[0][zip] . "</p>
                  <p>" . $court[time] . "</p>
                </div>
              </div>
              <div class='col-md-12'>

                <a href='editCourt.php?court_Id=" .  $court[id] . "' class='btn btn-success pull-right' style='margin: 5px;'>Edit</a>
              </div>
            </div>
          </div>";
}
?>
</div>
