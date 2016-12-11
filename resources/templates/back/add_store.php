<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Store

</h1>
</div>
               
<h4><?php display_message(); ?></h4>

<form action="" method="post" enctype="multipart/form-data">

<?php add_store(); ?>

<div class="col-md-8">

     <div class="form-group">
    <label for="store-title">Store Title </label>
        <input type="text" name="store_title" class="form-control" >
       
    </div>
    <div class="form-group">
    <label for="store-title">Store Address </label>
        <input type="text" name="store_addr" class="form-control" >
       
    </div>
    <div class="form-group">
    <label for="store-title">Store Employee Number </label>
        <input type="number" name="store_emp" class="form-control" >
       
    </div>
    <div class="form-group">
    <label for="store-title">Store Region </label>
        <input type="text" name="store_region" class="form-control" >
       
    </div>

    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <!--<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">-->
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
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



                