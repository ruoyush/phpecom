<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Edit Product

</h1>
</div>
               
<h4><?php display_message(); ?></h4>

<form action="" method="post" enctype="multipart/form-data">

<?php 

edit_product();

if(isset($_GET['update_product'])){
$query = query("SELECT * FROM products where product_id =" . escape($_GET['update_product']) . "");
confirm($query);

while($row_p = fetch_query($query)){
  $pname = $row_p['product_name'];
  $pshort = $row_p['short_desc'];
  $plong = $row_p['product_desc'];
  $pprice = $row_p['product_price'];
  $pimage = $row_p['product_image'];
  $ptype = $row_p['product_type_id'];

} 
}



?>

<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Product Title </label>
        <input type="text" name="product_title" class="form-control" value="<?php echo "{$pname}"; ?>">
       
    </div>

    <div class="form-group">
           <label for="product-short">Short Description</label>
      <textarea name="product_short" id="" cols="30" rows="2" class="form-control" ><?php echo "{$pshort}"; ?></textarea>
    </div>

    <div class="form-group">
           <label for="product-description">Product Description</label>
      <textarea name="product_description" id="" cols="30" rows="5" class="form-control"><?php echo "{$plong}" ?></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo "{$pprice}"; ?>">
      </div>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <!--<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">-->
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Update">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Product Category</label>
          <hr>
        <select name="product_category" id="" class="form-control">
          <?php

            $query = query("SELECT * FROM product_types");
            confirm($query);

            while($row_type = fetch_query($query)){
              echo "<option value='{$row_type['type_id']}'>{$row_type['type_name']}</option>";
            }

          ?>

           
        </select>


</div>





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
    <div class="form-group">
        <label for="product-title">Product Image</label>
        <input type="file" name="file" value="<?php echo "{$pimage}"; ?>">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                