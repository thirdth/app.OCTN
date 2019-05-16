<?php
$jobId = $_POST['jobId'];
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
if(isset($_POST['g-recaptcha-response'])) {
  $captcha=$_POST['g-recaptcha-response'];
}
if(!$captcha){
  header("Location: contact.php?&error=4");
  die();
}
include 'garble_cnfg.php';
include 'header.php';
$company = $_POST['company'];
$contact = $_POST['contact'];

$body = $_POST['body'];
$to = 'ashley@theglaserfirm.com';
$from = 'From:' . $_POST['email'];
$subject = ' New message from: ' . $contact . " at " . $company;
$message = " Company Name: " . $company . "\r\n Body: " . $body;
$all = get_court_info($jobId);
?>
<main class="row projects">
  <section class="col-md-12">
    <div class="row info">
      <div class="col-md-3 leftColumn">
        <?php include 'searchColumn.php'; ?>
      </div>
      <div class="col-md-9 infoBox" id="results">
        <?php if (mail ($to , $subject , $message, $from )) {
                echo "<div class='col-md-12 text-center'><h3>Your message has been sent. You should receive a receipt email shortly. You will receive an answer to your request within one business day.</h3></div>";
              }else {
                echo "<div class='col-md-12 text-center'>Something went wrong. Please send your request again. If you continue to have trouble, please contact our office directly.</div>";
              }
        ?>
      </div>
    </div>
  </section>
  <section class="col-md-12">
    <div class="col-md-12">
      <?php include 'calImage.php'; ?>
    </div>
  </section>
</main>

<?php include 'footer.php';?>
