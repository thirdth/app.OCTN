<?php
login_verify();
?>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-4">
    </div>
    <div class="col-md-4" style="border: 1px solid black; border-radius: 8px; padding: 40px; background-color: 	lightgrey;">
      <h4 class="error"><?php echo $error ?></h4>
      <h2 class="text-center"><strong>Log-In.</strong></h2>
      <hr>
        <form method="POST" action="#" class="form-group">
          <div class="form-group row">
            <label for"username">Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group row">
            <label for"password">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="col-md-6">
            <input type="checkbox" name="remember">Remember me
          </div>
          <div class="col-md-6">
            <input type="submit" class="btn btn-primary pull-right" name="submit" value="Log-in">
          </div>
        </form>
    </div>
    <div class="col-md-4">
    </div>
  </div>
</div>
