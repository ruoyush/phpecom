<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . "/header.php"); ?>

<?php 
    
    if(!isset($_SESSION['current_username'])){

        redirect("../index.php");
    }


?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
  
                <!-- /.row -->
                <?php 

                    if((($_SERVER['REQUEST_URI']=="/ecom/admin/")||($_SERVER['REQUEST_URI']=="/ecom/admin/index.php"))){
                
                        include(TEMPLATE_BACK . "/admin_content.php");
                        
                    }

                    if(isset($_GET['orders'])){
                
                        include(TEMPLATE_BACK . "/orders.php");
                        
                    }

                    if(isset($_GET['update_profile'])){
                
                        include(TEMPLATE_BACK . "/update_profile.php");
                        
                    }

                    if(isset($_GET['view_products'])){
                
                        include(TEMPLATE_BACK . "/view_products.php");
                        
                    }

                    if(isset($_GET['add_product'])){
                
                        include(TEMPLATE_BACK . "/add_product.php");
                        
                    }

                    if(isset($_GET['edit_products'])){
                
                        include(TEMPLATE_BACK . "/orders.php");
                        
                    }


                    if(isset($_GET['sales'])){
                
                        include(TEMPLATE_BACK . "/sales.php");
                        
                    }

                    if(isset($_GET['view_trans'])){
                
                        include(TEMPLATE_BACK . "/view_trans.php");
                        
                    }

                    if(isset($_GET['edit_product'])){
                
                    include(TEMPLATE_BACK . "/edit_product.php");
                        
                    }

                    if(isset($_GET['view_store'])){
                
                    include(TEMPLATE_BACK . "/view_store.php");
                        
                    }

                    if(isset($_GET['edit_store'])){
                
                    include(TEMPLATE_BACK . "/edit_store.php");
                        
                    }

                    if(isset($_GET['add_store'])){
                
                        include(TEMPLATE_BACK . "/add_store.php");
                        
                    }

                    if(isset($_GET['view_consumer'])){
                
                    include(TEMPLATE_BACK . "/view_consumer.php");
                        
                    }

                    if(isset($_GET['edit_consumer'])){
                
                    include(TEMPLATE_BACK . "/edit_consumer.php");
                        
                    }

                    if(isset($_GET['add_consumer'])){
                
                        include(TEMPLATE_BACK . "/add_consumer.php");
                        
                    }

                    if(isset($_GET['inventory'])){
                
                        include(TEMPLATE_BACK . "/inventory.php");
                        
                    }

                    if(isset($_GET['assign_stock'])){
                
                        include(TEMPLATE_BACK . "/assign_stock.php");
                        
                    }

                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
</div>

<?php include(TEMPLATE_BACK . "/footer.php"); ?>
