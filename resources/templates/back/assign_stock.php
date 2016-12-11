<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Assgin Inventory

</h1>
</div>
               
<h4><?php display_message(); ?></h4>

<form action="" method="post" enctype="multipart/form-data">

<?php assign_stock(); ?>

<div class="col-md-8">

     <div class="form-group">
    <label for="store-title">Store ID</label>
        <input type="number" name="store" class="form-control" >
       
    </div>
    <div class="form-group">
    <label for="store-title">Product ID </label>
        <input type="number" name="product" class="form-control" >
       
    </div>
    <div class="form-group">
    <label for="store-title">Quantity </label>
        <input type="number" name="stock" class="form-control" >
       
    </div>

    <div class="form-group">
    <label for="flag">Update? Please input on</label>
        <input type="text" name="update_on" class="form-control">
       
    </div>


</div><!--Main Content-->

<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
       <!--<input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">-->
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
    </div>

</aside><!--SIDEBAR-->

<hr/>




    
</form>



                