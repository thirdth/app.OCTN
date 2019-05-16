<?php
$jobId = filter_var($_POST['jobId'], FILTER_SANITIZE_NUMBER_INT);
if ($_POST['company'] == '')  {
  header("Location: request.php?jobId=" . $jobId . "&error=1");
  die();
}
if ($_POST['contact'] == '')  {
  header("Location: request.php?jobId=" . $jobId . "&error=2");
  die();
}
if ($_POST['email'] == '')  {
  header("Location: request.php?jobId=" . $jobId . "&error=3");
  die();
}
if ($_POST['case_amount'] == '0')  {
  header("Location: request.php?jobId=" . $jobId . "&error=4");
  die();
}
if ($_POST['case_type'] == '0')  {
  header("Location: request.php?jobId=" . $jobId . "&error=5");
  die();
}

if(isset($_POST['g-recaptcha-response'])) {
  $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  header("Location: request.php?jobId=" . $jobId . "&error=6");
  die();
}
include 'garble_cnfg.php';
include 'header.php';
$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
$contact = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
$court = filter_var($_POST['court_name'], FILTER_SANITIZE_STRING);
$date = filter_var($_POST['jobDate'], FILTER_SANITIZE_STRING);
$safeCase = filter_var($_POST['case_amount'], FILTER_SANITIZE_NUMBER_INT);
if ($safeCase == '1')  {
  $cases = '1 to 5';
} elseif ($safeCase == '2') {
  $cases = '6 to 10';
}elseif ($safeCase == '2')  {
  $cases = '11 plus';
} else {
  $cases = '[no cases indicated]';
}
$safeEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$type = filter_var($_POST['case_type'], FILTER_SANITIZE_STRING);
$body = filter_var($_POST['body'], FILTER_UNSAFE_RAW, FILTER_FLAG_HIGH);
$to = 'ashley@theglaserfirm.com';
$from = 'From: Appearance Requests <requests@ofcounseltn.com>' . "\r\n";
$from .= 'Reply-to: ' . $safeEmail . "\r\n";
$subject = ' New Request from: ' . $contact . " at " . $company;
$message = " Company Name: " . $company . "\r\n Court: " . $court . "\r\n Date: " . $date . "\r\n JobID: " . $jobId . "\r\n Number of Cases: " . $cases . "\r\n Case Type: " . ucfirst($type) . "\r\n Body: " . $body;
$all = get_court_info($jobId);

$toThem = $_POST['email'];
$subjectThem = "Request Received";
$messageThem = "Your request for an appearance on " . $date . " in " . $court . " has been recieved. You should have a response within one business day. Thank you for your request. Should you have any questions or comments, please feel free to contact our office.";
$fromThem = 'From: Appearance Requests <requests@ofcounseltn.com>' . "\r\n";

?>
<main class="row projects">
  <section class="col-md-12">
    <div class="row info">
      <div class="col-md-3 leftColumn">
        <?php include 'searchColumn.php'; ?>
      </div>
      <div class="col-md-9 infoBox" id="results">
        <?php if (mail ($toThem , $subjectThem , $messageThem, $fromThem, '-frequests@ofcounseltn.com') and mail ($to , $subject , $message, $from, '-frequests@ofcounseltn.com')) {
                  echo "<div class='col-md-12 text-center'>
                          <h3>Your message has been sent. You should receive a receipt email shortly.
                           You will receive an answer to your request within one business day.</h3>
                           <p> If you do not receive a response shortly, please check your spam folder.</p>
                           </div>";
                } else {
                  echo "<div class='col-md-12 text-center'>Something went wrong. Please send your request again. If you continue to have trouble, please contact our office directly1.</div>";
                }



        ?>
      </div>
    </div>
  </section>
  <section class="col-md-12">
    <div class="col-md-12">

    </div>
  </section>
</main>

<?php include 'footer.php';?>
