<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">

                             <?php
                                    info_message("Welcome To Instant Energy Admin Dashboard!");

                                        // $total1  = mysqli_num_rows(mysqli_query($conn,"select* from electricity_energy_suppliers"));
                                        // $total2  = mysqli_num_rows(mysqli_query($conn,"select* from gas_energy_suppliers")); 
                                        // $total = $total1+$total2;
                                        //                                echo '<div class="col-sm-6 col-lg-3">
                                        //                         <div class="mini-stat clearfix bx-shadow bg-white">
                                        //                             <div class="mini-stat-info text-right text-dark">
                                        //                              <span class="counter text-dark">'.$total.'</span>
                                        //                                     <a href="#">Total Suppliers</a>
                                        //                             </div>
                                        //                         </div>
                                        //                     </div>';


                                        //                 echo '<div class="col-sm-6 col-lg-3">
                                        //                         <div class="mini-stat clearfix bx-shadow bg-white">
                                        //                             <div class="mini-stat-info text-right text-dark">
                                        //                              <span class="counter text-dark">'.$total1.'</span>
                                        //                                     <a href="all_electricity_providers.php">Total Electricity Suppliers</a>
                                        //                             </div>
                                        //                         </div>
                                        //                     </div>';  
                                       
                                        //                   echo '<div class="col-sm-6 col-lg-3">
                                        //                         <div class="mini-stat clearfix bx-shadow bg-white">
                                        //                             <div class="mini-stat-info text-right text-dark">
                                        //                              <span class="counter text-dark">'.$total2.'</span>
                                        //                                     <a href="all_energy_providers.php">Total Gas Suppliers</a>
                                        //                             </div>
                                        //                         </div>
                                        //                     </div>'; 

                                                        $configured_post_codes_for_gas = mysqli_num_rows(mysqli_query($conn,"select* from county_with_suppliers"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$configured_post_codes_for_gas.'</span>
                                                                            <a href="#">Total Configured Counties</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                            //  $configured_post_codes_for_electricity = mysqli_num_rows(mysqli_query($conn,"select* from county_with_suppliers where county_service_type=2"));
                                                            //  echo '<div class="col-sm-6 col-lg-3">
                                                            //     <div class="mini-stat clearfix bx-shadow bg-white">
                                                            //         <div class="mini-stat-info text-right text-dark">
                                                            //          <span class="counter text-dark">'.$configured_post_codes_for_electricity.'</span>
                                                            //                 <a href="#">Configured Postcode for Electricity</a>
                                                            //         </div>
                                                            //     </div>
                                                            // </div>'; 
                                    
                            ?>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>