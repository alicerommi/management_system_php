<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">

                             <?php
                                    info_message("Welcome To ".$company_name." Admin Dashboard!");

                                $models = mysqli_num_rows(mysqli_query($conn,"select* from vehicles_models"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$models.'</span>
                                                                            <a href="add_model.php" title="Total Models">Total Models</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                             $total_vehicle_types = mysqli_num_rows(mysqli_query($conn,"select* from vehicle_types"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_vehicle_types.'</span>
                                                                            <a href="vehicle_types.php" title="Total Vehicles Types">Total Vehicles Types</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                              $total_vehicles_manufacture = mysqli_num_rows(mysqli_query($conn,"select* from vehicles_manufacture"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_vehicles_manufacture.'</span>
                                                                            <a href="add_manufacture.php" title="Total Manufacture">Total Manufacture</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                             $total_customers = mysqli_num_rows(mysqli_query($conn,"select* from customers"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$total_customers.'</span>
                                                                            <a href="all_users.php" title="Total Customers">Total Customers</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                             $active_total_customers = mysqli_num_rows(mysqli_query($conn,"select* from customers where customer_block=0"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$active_total_customers.'</span>
                                                                            <a href="all_users.php" title="Active Customers">Active Customers</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 

                                                            $blocked_total_customers = mysqli_num_rows(mysqli_query($conn,"select* from customers where customer_block=1"));
                                                             echo '<div class="col-sm-6 col-lg-3">
                                                                <div class="mini-stat clearfix bx-shadow bg-white">
                                                                    <div class="mini-stat-info text-right text-dark">
                                                                     <span class="counter text-dark">'.$blocked_total_customers.'</span>
                                                                             <a href="all_users.php" title="Blocked Customers">Blocked Customers</a>
                                                                    </div>
                                                                </div>
                                                            </div>'; 



                                    
                            ?>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>
      <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>