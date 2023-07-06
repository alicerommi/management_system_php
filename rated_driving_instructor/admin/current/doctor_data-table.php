
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Table</h3>
                            <p class="text-muted m-b-30">Data table example</p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>


                                        <?php

                                            $sql = "SELECT * FROM doctor";
                                            $records = mysql_query($sql);
                                            ?>




                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Specialization </th>
                                            
                                            <th>Date of Birth</th>
                                            <th>Image</th>
                                            <th>Url</th>

                                            <th>Gender</th>
                                            <th>Update</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                         <?php

                                            while($doctor = mysql_fetch_assoc($records))
                                            {
                                                $id= $doctor['ID'];
                                                $name= $doctor['name'];
                                                $special= $doctor['special'];
                                                $image= $doctor['image'];
                                                $dob= $doctor['dob'];
                                                $url= $doctor['url'];
                                                $gender= $doctor['gender'];



                                        ?>


                                                <tr>

                                                <td><?php echo $id; ?></td>

                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $special; ?></td>
                                                <td><?php echo $dob; ?></td>
                                                <td><?php echo $image; ?></td>
                                                <td><?php echo $url; ?></td>
                                                <td><?php echo $gender; ?></td>
                                                
                                                <td> <button class="dt-button buttons-csv buttons-html5">Update</button> </td>
                                                <td><a href="delete_datatable.php?delete = <?php echo $id; ?>" onclick="return confirm('Are you sure?');" class="dt-button buttons-csv buttons-html5" role="button">DELETE</a> </td>

                                            
                                                </tr>

                                                <?php  } 

                        
                                            ?>
                                          





                                            
                                          


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

