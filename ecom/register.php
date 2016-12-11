


    <!-- Navigation -->
<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT) . DS . ("header.php"); ?>


    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Register</h1>
            <h4 class="text-center bg-warning"><?php display_message() ?></h4>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" id="form-register" name="register" action="" method="post" enctype="multipart/form-data">

                <?php register(); ?>

                <div class="form-group"><label for="">
                    Your name (required)<input type="text" id="name" name="name" class="form-control"></label>
                </div>
                 <div class="form-group"><label for="password">
                    Password (required)<input type="password" id="password" name="password" class="form-control"></label>
                </div>

                <div class="form-group"><label for="email">
                    email (required)<input type="email" id="email" name="email" class="form-control"></label>
                </div>

                <div class="form-group"><label for="age">
                    age (required)<input type="number" id="age" name="age" class="form-control"></label>
                </div>

                <div class="form-group"><label for="gender">
                    gender (required) </label>
                    <input type="radio" name="gender" value="M" checked>Male
                    <input type="radio" name="gender" value="F" checked>Female
                </div>

                <div class="form-group"><label for="income">
                    income (required)<input type="number" id="income" name="income" class="form-control"></label>
                </div>

                <div class="form-group"><label for="married">
                    married (required)</label>
                    <input type="radio" name="married" value="Y" checked>Yes
                    <input type="radio" name="married" value="N" checked>No
                    <input type="radio" name="married" value="na" checked>N/A
                </div>

                <div class="form-group"><label for="street">
                    street (required)<input type="text" id="street" name="street" class="form-control"></label>
                </div>

                <div class="form-group"><label for="city">
                    city (required)<input type="text" id="city" name="city" class="form-control"></label>
                </div>

                <div class="form-group"><label for="state">
                    state (required)<input type="text" id="state" name="state" class="form-control"></label>
                </div>

                <div class="form-group"><label for="zip">
                    zip (required)<input type="number" id="zip" name="zip" class="form-control"></label>
                </div>

                <div class="form-group"><label for="contact">
                    contact (required)<input type="number" id="contact" name="contact" class="form-control"></label>
                </div>

                <div class="form-group"><label for="company">
                    comapny customer? (optional)</label>
                    <input type="checkbox" name="company" id="company" value="0" />
                    <div id="mycheckboxdiv" style="display:none">
                        <div class="form-group"><label for="company_name">
                            company name<input type="text" id="company_name" name="company_name" class="form-control"></label>
                        </div> 

                         <div class="form-group"><label for="company_cate">
                            company category<input type="text" id="company_cate" name="company_cate" class="form-control"></label>
                        </div>           

                        <div class="form-group"><label for="company_income">
                            company incomes<input type="text" id="company_income" name="company_income" class="form-control"></label>
                        </div>                               
                    </div>

                    <script type="text/javascript">
                    $('#company').change(function() {
                        var x = document.getElementById("company").value = "100";
                        $('#mycheckboxdiv').toggle();

                    });
                    </script>

                </div>

                <br/>
                <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>

            </form>


        </div>  


    </header>

    </div>

<?php include(TEMPLATE_FRONT) . DS . ("footer.php"); ?>