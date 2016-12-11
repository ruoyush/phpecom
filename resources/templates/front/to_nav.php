<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">LXX Appareal Collections</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="shop.php">Discover</a>
                    </li>

                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                    <?php
                    	if($_SESSION['current_userid']){
                    		echo "<a href='logout.php'>Logout</a>";
                    	}
                    	else{
                    		echo "<a href='login.php'>Login</a>";
                    	}
                    ?>
                   </li>
                   <li>
                   <?php
                    	if(!$_SESSION['current_userid']){
                    		echo "<a href='register.php'>Register</a>";
                    	}
                    ?>
                   </li>
                    <li>
                   <?php
                    	if($_SESSION['current_userid']){
                    		echo "<a href='../ecom/admin/'>Admin</a>";
                    	}
                    ?>
               		
                    </li>
                    <li>
                        <a href="checkout.php">Checkout</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
</div>
        <!-- /.container -->