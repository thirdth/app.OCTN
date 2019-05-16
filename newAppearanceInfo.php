<?php
$clients = get_clients();

?>

<div class="col-md-6">
  <?php include 'currentJob.php'; ?>
</div>
<div class="col-md-6">
  <div class="col-md-12">
    <form method="POST" action="insertAppearance.php" class="form-group">
      <label for="client_id">Client</label>
      <select name="client_id" class="form-control">
        <?php
        foreach ($clients as $client) {
          echo "<option value='" . $client[id] . "'>" . $client[name] . "</option>";
        }
        ?>
      </select>
      <label for"num_cases">Number of Cases</label>
      <input class="form-control" name="num_cases" placeholder="amount of cases">
      <input type="hidden" name="jobId" value="<?php echo $jobId; ?>">
      <button type="submit" class="btn btn-primary">Add</button>
      <a href="jobView.php?jobId=<?php echo $jobId; ?>" class="btn btn-warning" style="margin-top: 5px; width: 100px;">Cancel</a>
    </form>
  </div>
</div>
