<?
$clerks = get_all_clerks();

?>

<div class="col-md-12">
  <h3 class="text-center"><strong>Clerks:</strong></h3>
  <?php
  foreach ($clerks as $clerk) {
    $courts = get_courts_byClerk($clerk[id]);
    echo "<div class='col-md-4'>
            <div class='col-md-12'style='border: .5px dotted grey; padding: 5px; margin-top: 20px; border-radius: 8px;'>
              <div class='col-md-12' style='min-height: 240px'>
                <div class='col-md-12'>
                  <h3>" . $clerk[clerk_name] . "</h3>
                  <hr>
                </div>
                  <div class='col-md-12'>
                  <h4><strong><u>Associated Courts:</u></strong></h4>
                  ";
                  foreach ($courts as $court) {
                    echo "<p>" . $court[court_name] . "</p>";
                  }
                  echo "
                  </div>
                </div>
              <div class='col-md-12'>

                  <a href='editClerk.php?clerk_Id=" . $clerk[id] . "' class='btn btn-primary pull-right' style='margin: 5px;'>Edit</a>
              </div>
            </div>
          </div>";
  }
  ?>
</div>
