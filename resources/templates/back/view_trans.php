

             <div class="row">

<h1 class="page-header">
   All Transactions

</h1>

<h4 class="bg-success"><?php display_message(); ?></h4>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Order ID</th>
           <th>Customer ID</th>
           <th>Product</th>
           <th>Quantity</th>
           <th>Price</th>
           <th>Sub Total</th>
           <th>Store</th>
           <th>Date</th>
           <th>Operations</th>
      </tr>
    </thead>
    <tbody>



           <?php display_transactions_admin(); ?>
      


  </tbody>
</table>











                
                 


             </div>
