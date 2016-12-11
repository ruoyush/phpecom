<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Customer

</h1>
<h4><?php display_message(); ?></h4>
</div>
            


<form action="" method="post" enctype="multipart/form-data">

<?php  

edit_consumer();

if(isset($_GET['update_consumer'])){
$query = query("SELECT * FROM customers where customer_id =" . escape($_GET['update_consumer']) . "");
confirm($query);

while($row_c = fetch_query($query)){
  $name = $row_c['customer_name'];
  $address = $row_c['customer_street'];
  $city = $row_c['customer_city'];
  $region = $row_c['customer_state'];
  $zip = $row_c['customer_zip'];
  $password = $row_c['customer_pass'];
  $contact = $row_c['customer_contact'];
} 
}


?>


<div class="col-sm-5 col-md-6">


  <div class="control-group">
      <label class="control-label">Full Name</label>
      <div class="controls">
          <input id="full-name" name="full-name" type="text" placeholder="full name"
          class="input-xlarge" value="<?php 
           echo "{$name}";
           ?>">
          <p class="help-block"></p>
      </div>
  </div>

  <!-- address-line input-->
  <div class="control-group">
      <label class="control-label">Address Line</label>
      <div class="controls">
          <input id="address" name="address" type="text" placeholder="address line"
          class="input-xlarge" value="<?php echo "{$address}"; ?>">
          <p class="help-block">Street address, P.O. box, company name, c/o</p>
      </div>
  </div>

  <!-- city input-->
  <div class="control-group">
      <label class="control-label">City / Town</label>
      <div class="controls">
          <input id="city" name="city" type="text" placeholder="city" class="input-xlarge" value="<?php echo "{$city}"; ?>">
          <p class="help-block"></p>
      </div>
  </div>
  <!-- region input-->
  <div class="control-group">
      <label class="control-label">State / Province / Region</label>
      <div class="controls">
          <input id="region" name="region" type="text" placeholder="state"
          class="input-xlarge" value="<?php echo "{$region}"; ?>">
          <p class="help-block"></p>
      </div>
  </div>
  <!-- postal-code input-->
  <div class="control-group">
      <label class="control-label">Zip / Postal Code</label>
      <div class="controls">
          <input id="postal-code" name="postal-code" type="text" placeholder="zip or postal code"
          class="input-xlarge" value="<?php echo "{$zip}"; ?>">
          <p class="help-block"></p>
      </div>
  </div>


</div>


<!--Main Content-->



<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">

    <div class="control-group">
      <label class="control-label">Password</label>
      <div class="controls">
          <input id="password" name="password" type="password" placeholder="change password here"
          class="input-xlarge" value="<?php echo "{$password}"; ?>">
          <p class="help-block"></p>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label">Contact</label>
      <div class="controls">
          <input id="contact" name="contact" type="text" placeholder="phome number"
          class="input-xlarge" value="<?php echo "{$contact}"; ?>">
          <p class="help-block"></p>
      </div>
    </div>
     
     <div class="form-group">
       <!--<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">-->
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
    </div>


     <!-- Product Categories-->



    <!-- Product Brands-->

<!--
    <div class="form-group">
      <label for="product-title">Product Brand</label>
         <select name="product_brand" id="" class="form-control">
            <option value="">Select Brand</option>
         </select>
    </div>

-->
<!-- Product Tags -->
<!--

    <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div>
-->
    <!-- Product Image -->



</aside><!--SIDEBAR-->


    
</form>



                