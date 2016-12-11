

    <!-- Navigation -->
<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT) . DS . ("header.php"); ?>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Login</h1>
            <h4 class="text-center bg-warning"><?php display_message() ?></h4>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">

                <?php login_user(); ?>

                <div class="form-group"><label for="">
                    E-mail<input type="text" name="username" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>
                <div class="form-group">
                <label for="sel1">Select role:</label>
                <select class="form-control" name="roleselect">
                    <option value="1">Customer</option>
                    <option value="2">Manager</option>
                    <option value="3">Sales</option>
    
                </select>
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