<?php


?>
<div class='col-md-12' id='newClient'>
        <form method='POST' action='insertClient.php'>
          <div class='row'>
            <div class="col-md-6">
              <div class='col-md-12'>
                <label for='client_name'>Client Name:</label>
                <input class='form-control' name='client_name'>
              </div>
              <div class='col-md-12'>
                <label for='street1'>Address 1:</label>
                <input class='form-control' name='street1'>
              </div>
              <div class='col-md-12'>
                <label for='street2'>Address 2:</label>
                <input class='form-control' name='street2'>
              </div>
              <div class='col-md-5'>
                <label for='city'>City:</label>
                <input class='form-control' name='city'>
              </div>
              <div class='col-md-3'>
                <label for='state'>State:</label>
                <input class='form-control' name='state'>
              </div>
              <div class='col-md-4'>
                <label for='zip'>Zip:</label>
                <input class='form-control' name='zip'>
              </div>
            </div>
            <div class="col-md-6">
              <div class='col-md-12'>
                <label for='contact'>Contact Name:</label>
                <input class='form-control' name='contact'>
              </div>
              <div class='col-md-12'>
                <label for='email'>Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class='col-md-6'>
                <label for='phone'>Phone</label>
                <input class="form-control" name="phone">
              </div>
              <div class='col-md-12 text-right'>
                <button class='btn btn-success' style='margin-top: 25px;' type='submit'>Add</button>
              </div>
            </div>
          </div>
        </form>
      </div>
