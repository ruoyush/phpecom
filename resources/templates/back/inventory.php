

             <div class="row">

<h1 class="page-header">
   All Inventory

</h1>

<h4 class="bg-success"><?php display_message(); ?></h4>
<table class="table table-hover">


    <thead>

      <tr>
           <th>store ID</th>
           <th>name</th>
           <th>address</th>
           <th>product ID</th>
           <th>product name</th>
           <th>Stock</th>

           <th>Operations</th>
      </tr>
    </thead>
    <tbody>



           <?php display_inventory(); ?>
      


  </tbody>
</table>

             </div>
