

    <!-- Navigation -->
<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT) . DS . ("header.php"); ?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Search</h1>
            <h4 class="text-center bg-warning"><?php display_message() ?></h4>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">

                <?php search(); ?>

                <div class="form-group"><label for="">
                    Product Name<input type="text" name="name" class="form-control"></label>
                </div>



                <br/>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
<?php include(TEMPLATE_FRONT) . DS . ("footer.php"); ?>