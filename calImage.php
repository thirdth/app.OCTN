<?php
    $conn = get_connected();
if (!$date) {
    $date = date('Y-m-d', strtotime(today));
    $mdate = date('Y-m', strtotime($date));

    $calquery = "SELECT jobs.jobDate, jobs.id, FullCourt.time, FullCourt.name, FullCourt.court_name
                FROM jobs
                  RIGHT JOIN FullCourt on jobs.court_id_job = FullCourt.id
                    WHERE jobs.jobDate LIKE '" . $mdate . "%' ";

    $calresults = mysqli_query( $conn, $calquery );
    $calall = mysqli_fetch_all($calresults, MYSQLI_ASSOC);
}


            /* Set the default timezone */
  date_default_timezone_set("America/Montreal");

  /* Set the date */
  $datecal = strtotime($date);

  if (isset($_GET['jobId']))  {
    $jobId = $_GET['jobId'];
  } elseif (isset($_POST['jobId'])) {
    $jobId = $_POST['jobId'];
  }

  if (isset($_GET['month']))  {
    $day = '1';
    $monthUrl = $_GET['month'];
    $month = sprintf('%02d', $monthUrl);
    $year = $_GET['year'];
    $date = $year . "-" . $month;

    $query = "SELECT jobs.jobDate, jobs.id, FullCourt.time, FullCourt.name, FullCourt.court_name
                FROM jobs
                  RIGHT JOIN FullCourt on jobs.court_id_job = FullCourt.id
                    WHERE jobs.jobDate LIKE '" . $date . "%' ";
    $calresults = mysqli_query( $conn, $query );
    $calall = mysqli_fetch_all($calresults, MYSQLI_ASSOC);
    $calSorted = $calall[0];
  } elseif (isset($_GET['jobId']) or isset($_POST['jobId'])) {
    $day = date('d', strtotime($all[0][jobDate]));
    $month = date('m', strtotime($all[0][jobDate]));
    $year = date('Y', strtotime($all[0][jobDate]));
    $date = $year . "-" . $month;
    $query = "SELECT jobs.jobDate, jobs.id, FullCourt.time, FullCourt.name, FullCourt.court_name
                FROM jobs
                  RIGHT JOIN FullCourt on jobs.court_id_job = FullCourt.id
                    WHERE jobs.jobDate LIKE '" . $date . "%' ";
    $calresults = mysqli_query( $conn, $query );
    $calall = mysqli_fetch_all($calresults, MYSQLI_ASSOC);
    $calSorted = $calall[0];
  } else {
    $day = date('d', $datecal);
    $month = date('m', $datecal);
    $year = date('Y', $datecal);
  };
  mysqli_close($conn);
  $firstDay = mktime(0,0,0,$month, 1, $year);
  $title = strftime('%B', $firstDay);
  $dayOfWeek = date('D', $firstDay);
  $daysInMonth = cal_days_in_month(0, $month, $year);
  $monthLead = date('m', $month - 1);
  /* "next month" control */
  $next_month_link = '<a href="?month='.($month != 12 ?  $month + 1 : 1).'&year='.($month != 12 ? $year : $year + 1).'&jobId=' . $jobId . '" class="control">  &#129094;</a>';
  /* "previous month" control */
  $previous_month_link = '<a href="?month='.($month != 01 ? $month - 1 : 12).'&year='.($month != 1 ? $year : $year - 1).'&jobId=' . $jobId . '" class="control">&#129092;  </a>';
  /* Get the name of the week days */
  $timestamp = strtotime('next Sunday');
  $weekDays = array();
  for ($i = 0; $i < 7; $i++) {
    $weekDays[] = strftime('%a', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
  }
  $blank = date('w', strtotime("{$year}-{$month}-01"));

?>

<table class='table table-bordered' style="table-layout: fixed;">
  <tr>
    <th colspan="7" class="text-center"> <?php echo $previous_month_link.$title ?> <?php echo $year ?> <?php echo $next_month_link ?></th>
  </tr>
  <tr>
    <?php foreach($weekDays as $key => $weekDay) : ?>
      <td class="text-center"><?php echo $weekDay ?></td>
    <?php endforeach ?>
  </tr>
  <tr>
    <?php for($i = 0; $i < $blank; $i++): ?>
      <td></td>
    <?php endfor; ?>
    <?php for($i = 1; $i <= $daysInMonth; $i++): ?>
      <?php if($day == $i): ?>
        <td><strong><?php echo $i;
          for ($x = 0; $x <= count($calall) ; $x++ )  {
            $number = substr($calall[$x][jobDate], -2);
            if ($i == $number) {
              echo "</br><a href='jobView.php?jobId=" . $calall[$x][id] . "'<span class='event'>" . $calall[$x][name] . "</span></a>";
            }
          }
        ?></strong></td>
      <?php else: ?>
        <td><?php echo $i;
          for ($x = 0; $x <= count($calall) ; $x++ )  {
            $number = substr($calall[$x][jobDate], -2);
            if ($i == $number) {
              echo "</br><a href='jobView.php?jobId=" . $calall[$x][id] . "'<span class='event'>" . $calall[$x][name] . "</span></a>";
            }
          }
        ?></td>
      <?php endif; ?>
      <?php if(($i + $blank) % 7 == 0): ?>
        </tr><tr>
      <?php endif; ?>
    <?php endfor; ?>
    <?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>
      <td></td>
    <?php endfor; ?>
  </tr>
</table>
