 <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Sales Person
                         
                        </h1>
                          <p class="bg-success">
                            <?php echo $message; ?>
                        </p>

                        <a href="add_user.php" class="btn btn-primary">Add Sales Person</a>


                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Region</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($users as $user): ?>

                                    <tr>

                                        <td>1</td>

                                        
                                        <td>Frank
                                              <div class="action_links">

                                                <a href="">Delete</a>
                                                <a href="">Edit</a>
                    
                                                
                                            </div>
                                        </td>
                                        
                                        
                                        <td>frank@lxx.com</td>
                                       <td>CA</td>
                                    </tr>


                                <?php endforeach; ?>


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        

                        </div>










                        
                    </div>