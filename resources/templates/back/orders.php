<?php require_once("../../resources/config.php"); ?>


<div class="col-md-12">

    <div class="row">
    <h1 class="page-header">
       All Transactions Details
    </h1>
    </div>

    <div class="row">
    <table class="table table-hover">
        <thead>

          <tr>
               <th>Order ID</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Price</th>
               <th>Sub Total</th>
               <th>Purchase From Store</th>
               <th>Order Date</th>

          </tr>
        </thead>
        <tbody>
            
            <?php display_transactions(); ?>
            

        </tbody>
    </table>
    </div>

</div>