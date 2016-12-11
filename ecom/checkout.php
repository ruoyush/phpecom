<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT) . DS . ("header.php"); ?>


    <!-- Page Content -->
    <div class="container">


<!-- /.row --> 

<div class="row">

      <h1>Checkout</h1>
      <h4 class="text-center"><?php display_message(); ?></h4>
<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php cart(); ?>
        </tbody>
    </table>
</form>

<form class="" action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="store">Which store you would like to purchase from?</label>
        <select name="store">
            <?php 
                show_stores();
            ?>
        </select>
    </div>
    <?php check_order(); ?>

    <div class="form-group">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    </div>
    
</form>


<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>
<p>for 
<?php
echo "Customer ID: ";
echo isset($_SESSION['current_userid']) ? $_SESSION['current_userid'] : $_SESSION['current_userid']="";
echo "<br/>";
echo isset($_SESSION['current_username']) ? $_SESSION['current_username'] : $_SESSION['current_username']="GUEST";
?>
</p>
<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
<?php
echo isset($_SESSION['item_qty']) ? $_SESSION['item_qty'] : $_SESSION['item_qty']="0";
?>
</span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#36;
<?php
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total']="0";
?>
</span></strong> </td>
</tr>



</tbody>

</table>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->



    </div>
    <!-- /.container -->

<?php include(TEMPLATE_FRONT) . DS . ("footer.php"); ?>
