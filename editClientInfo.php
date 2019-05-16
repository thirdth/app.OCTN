<?php

$clientId = $_GET['clientId'];
$client = get_client_byId($clientId);
$address = get_address_byId($client['address_id']);
$phone = get_phone_byId($client['phone_id']);
$email = get_email_byId($client['email_id']);

//print_r($email);

 ?>

 <div class='col-md-12' id='updateClient'>
         <form method='POST' action='changeClient.php'>
           <input type='hidden' name='clientId' value='<?php echo $clientId; ?>'>
           <input type='hidden' name='email_id' value='<?php echo $email[id]; ?>'>
           <input type='hidden' name='phone_id' value='<?php echo $phone[id]; ?>'>
           <input type='hidden' name='address_id' value='<?php echo $address[id]; ?>'>
           <div class='row'>
             <div class="col-md-6">
               <div class='col-md-12'>
                 <label for='client_name'>Client Name:</label>
                 <input class='form-control' name='client_name' value='<?php echo $client[name]; ?>'>
               </div>
               <div class='col-md-12'>
                 <label for='street1'>Address 1:</label>
                 <input class='form-control' name='street1' value='<?php echo $address[street1]; ?>'>
               </div>
               <div class='col-md-12'>
                 <label for='street2'>Address 2:</label>
                 <input class='form-control' name='street2' value='<?php echo $address[street2]; ?>'>
               </div>
               <div class='col-md-5'>
                 <label for='city'>City:</label>
                 <input class='form-control' name='city' value='<?php echo $address[city]; ?>'>
               </div>
               <div class='col-md-3'>
                 <label for='state'>State:</label>
                 <input class='form-control' name='state' value='<?php echo $address[state]; ?>'>
               </div>
               <div class='col-md-4'>
                 <label for='zip'>Zip:</label>
                 <input class='form-control' name='zip' value='<?php echo $address[zip]; ?>'>
               </div>
             </div>
             <div class="col-md-6">
               <div class='col-md-12'>
                 <label for='contact'>Contact Name:</label>
                 <input class='form-control' name='contact' value='<?php echo $client[contact_name]; ?>'>
               </div>
               <div class='col-md-12'>
                 <label for='email'>Email</label>
                 <input type="email" class="form-control" name="email" value='<?php echo $email[email]; ?>'>
               </div>
               <div class='col-md-6'>
                 <label for='phone'>Phone</label>
                 <input class="form-control" name="phone" value='<?php echo $phone[number]; ?>'>
               </div>
               <div class='col-md-12 text-right'>
                 <button class='btn btn-success' style='margin-top: 25px;' type='submit'>Edit</button>
               </div>
             </div>
           </div>
         </form>
       </div>
