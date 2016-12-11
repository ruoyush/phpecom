                 <!-- FIRST ROW WITH PANELS -->
<?php if($_SESSION['user_role'] == 1) : ?>

<?php 

$query_orders = query("SELECT COUNT(order_id) FROM orders WHERE c_id =" . $_SESSION['current_userid'] ."");
confirm($query_orders);
$result_orders = fetch_query($query_orders);

$query_price = query("SELECT ROUND(SUM(total_price),0) FROM orders WHERE c_id =" . $_SESSION['current_userid'] ."");
confirm($query_price);
$result_price = fetch_query($query_price);

?>
                <!-- /.row -->
                <div class="row">

                              <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-3x"></i>
                                    </div>
                                    <div class="col-xs-3 ">
                                        <div class="huge"><?php echo "{$result_orders['COUNT(order_id)']}" ?></div>
                                        <div>Orders!</div>
                                    </div>

                                    <div class="col-xs-3">
                                        <div class="huge"><?php echo "{$result_price['ROUND(SUM(total_price),0)']}" ?></div>
                                        <div>Dollars Spent!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../../ecom/admin/index.php?orders">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>



        
                <!-- /.row -->

<?php endif; ?>


<?php if($_SESSION['user_role'] == 2 || $_SESSION['user_role']  ==3) : ?>

<?php 

$query_orders1 = query("SELECT COUNT(order_id) FROM orders;");
confirm($query_orders1);
$result_orders1 = fetch_query($query_orders1);

$query_price1 = query("SELECT ROUND(SUM(total_price),0) FROM orders;");
confirm($query_price);
$result_price1 = fetch_query($query_price1);

?>
               <!-- /.row -->
                  <div class="row">

                              <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-3x"></i>
                                    </div>
                                    <div class="col-xs-3 ">
                                        <div class="huge"><?php echo "{$result_orders1['COUNT(order_id)']}" ?></div>
                                        <div>Orders!</div>
                                    </div>

                                    <div class="col-xs-3">
                                        <div class="huge"><?php echo "{$result_price1['ROUND(SUM(total_price),0)']}" ?></div>
                                        <div>Dollars Spent!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="../../ecom/admin/index.php?orders">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                <!-- /.row -->
<?php endif; ?>