<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT) . DS . ("header.php"); ?>

    <!-- Page Content -->
<div class="container">

       <!-- Side Navigation -->

      <?php include(TEMPLATE_FRONT) . DS . ("side_nav.php"); ?>

<?php 

$query = query(" SELECT * FROM products WHERE product_id = " . escape($_GET['product_id']) . " ");
confirm($query);

while($row = fetch_query($query)) :
   
 
?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img width="400" src="<?php echo "../../resources/uploads/{$row['product_image']}" ?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><a href="#"><?php echo $row['product_name']; ?></a> </h4>
        <hr>
        <h4 class=""> <?php echo "$" . $row['product_price']; ?> </h4>

    <div class="ratings">
     
        <p>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star"></span>
            <span class="glyphicon glyphicon-star-empty"></span>
            4.0 stars
        </p>
    </div>
          
       <p><?php echo $row['short_desc']; ?></p>

   
    <form action="">
        <div class="form-group">
            <a href="../resources/cart.php?add=<?php echo $row['product_id']; ?>" class="btn btn-primary">ADD to Cart</a>
        </div>
    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>


  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <?php echo $row['product_desc']; ?>

    </div>
  

 </div>

</div><!--end of row-->



</div><!--Row for Tab Panel-->

<?php endwhile; ?>

</div>


</div>

<?php include(TEMPLATE_FRONT) . DS . ("footer.php"); ?>