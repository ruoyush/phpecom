            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse ">
                <ul class="nav navbar-nav side-nav ">

            <?php if($_SESSION['user_role'] == 1) : ?>

                    <li class="">
                        <a href="index.php?orders"><i class="fa fa-fw fa-book"></i> View Transactions</a>
                    </li>

                    <li>
                         <a href="index.php?update_profile"><i class="fa fa-fw fa-user"></i> Update Profile</a>
                    </li>
            <?php endif; ?>

            <?php if($_SESSION['user_role'] == 2 || $_SESSION['user_role']  ==3) : ?>

           
                    <li>
                        <a href="index.php?view_products"><i class="fa fa-fw fa-external-link-square"></i> View Products</a>
                    </li>

                    <li>
                        <a href="index.php?add_product"><i class="fa fa-fw fa-table"></i> Add Product</a>
                    </li>
                    
                    <li>
                        <a href="index.php?view_trans"><i class="fa fa-fw fa-bar-chart-o"></i> View Transactions</a>
                    </li>

                    <li>
                        <a href="index.php?view_store"><i class="fa fa-fw fa-desktop"></i>View Stores</a>
                    </li>

                    <li>
                        <a href="index.php?add_store"><i class="fa fa-fw fa-table"></i> Add Store</a>
                    </li>

                    <li>
                        <a href="index.php?inventory"><i class="fa fa-fw fa-table"></i> Store Inventory</a>
                    </li>

                     <li>
                        <a href="index.php?assign_stock"><i class="fa fa-fw fa-table"></i> Assign Inventory</a>
                    </li>
                    
                    
                    <li>
                        <a href="index.php?view_consumer"><i class="fa fa-fw fa-wrench"></i>View Customers</a>
                    </li>

                    <li>
                        <a href="index.php?add_consumer"><i class="fa fa-fw fa-wrench"></i>Add Customer</a>
                    </li>

                    <!--<li>
                        <a href="index.php?sales"><i class="fa fa-fw fa-wrench"></i>Edit Sales</a>
                    </li>-->


            <?php endif; ?>

                </ul>
            </div>