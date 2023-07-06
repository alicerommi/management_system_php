<?php
  include 'includes/header.php';
?>
  <!--========================= Start: Banner Section ===========================-->
 <!--  <div class="banner-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>My Dashboard</h2>
        </div>
      </div>
    </div>
  </div> -->
    <!-- start banner -->
<div class="directional_class"> 
  <section class="banner-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-head">
           <!--  <h2></h2> -->
             <h2> <?php    echo to_hebrew("Sold Vehicles",$language_array);?></h2>
          <!--   <nav aria-label="breadcrumb" class="nav-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">About</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
              </ol>
            </nav> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end banner -->
  <!--========================= End: Banner Section ===========================-->



  <!--========================= Start: Dasboard Buyer Section ===========================-->
  <div class="buyer-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-list">
                <ul class="link-nav">
                   <li class=""><a href="customer_dashboard.php" class="btn btn-primary nav-links"> <?php    echo to_hebrew("Dashboard",$language_array); ?> <?php 
                    if($active_page=="customer_dashboard.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-address-card"></i> </a></li>
                  <li><a href="add_vehicle.php" class="btn btn-primary nav-links">  <?php    echo to_hebrew("Add Vehicles",$language_array);?> <?php 
                    if($active_page=="add_vehicle.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-plus"></i></a></li>
                  <li><a href="my_vehicles.php" class="btn btn-primary nav-links"><?php    echo to_hebrew("My Vehicles",$language_array);?>  <?php 
                    if($active_page=="my_vehicles.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-truck-moving"></i> </a></li>
                  <li><a href="sold_vehicles.php" class="btn btn-primary nav-links"> <?php    echo to_hebrew("Sold Vehicles",$language_array);?>  <?php 
                    if($active_page=="sold_vehicles.php"){
                      echo '<span class="active"></span>';
                    }
                  ?> <i class="fas fa-shopping-cart"></i></a></li>
                    
                  <li><a href="profile_settings.php" class="btn btn-primary nav-links"> <?php    echo to_hebrew("Settings",$language_array); ?> <?php 
                    if($active_page=="profile_settings.php"){
                      echo '<span class="active"></span>';
                    }
                  ?><i class="fas fa-archive"></i></a></li>

                 <!--  <li><a href="product-bids.html" class="btn btn-primary nav-links"><i class="fa fa-gavel"></i>Porduct Bids</a></li> -->
                </ul>
          </div>
          <div class="dashboard-area">
            <div class="card">
                  <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive  auction-table" style="width: 100%;">
                  <thead>
                     <tr>
                          

                           <th>#</th>
                          <th><?php echo to_hebrew("Vehicle Type",$language_array); ?></th>
                                <th><?php echo to_hebrew("Manufacture",$language_array); ?></th>
                          <th><?php echo to_hebrew("Model",$language_array); ?></th>
                          <th><?php echo to_hebrew("Price",$language_array); ?></th>
                          <th><?php echo to_hebrew("Posted Date",$language_array); ?></th>
                          <th><?php echo to_hebrew("Sold Date Time",$language_array); ?></th>

                            <th><?php echo to_hebrew("Actions",$language_array); ?></th>
                         
                      </tr>
                  </thead>
                  <tbody>
                     <?php
                    //select* from vehicles_ads  join vehicle_types on vehicle_types.vehicle_type_id  = vehicles_ads.vehicle_type_id and vehicles_ads.customer_id =$gbh2_customer_id
                    #
                      $query = mysqli_query($conn,"select* from vehicles_ads  where customer_id =$gbh2_customer_id and vehicle_ad_sold_status=1");
                         $count = 0;

                      while($row = mysqli_fetch_array($query)){
                        $vehicle_ad_id = $row['vehicle_ad_id'];
                         $count = $count+1;
                        // $vehicles_model_name =$row['vehicles_model_name'];
                        // $vehicle_manufacture_name = $row['vehicle_manufacture_name'];
                        // $vehicle_type_name = $row['vehicle_type_name'];
                        $vehicle_ad_price = $row['vehicle_ad_price'];
                        $vehicle_ad_added_timestamp = date("d-m-Y",strtotime($row['vehicle_ad_added_timestamp']));
                         
                          $vehicle_manufacture_id = $row['vehicle_manufacture_id'];
                        $vehicle_type_id = $row['vehicle_type_id'];
                        $vehicle_model_id = $row['vehicle_model_id'];
                        //$vehicle_manufacture_name = $row['vehicle_manufacture_name'];
                                         //     $vehicle_type_name = $row['vehicle_type_name'];


                        $query1 = mysqli_query($conn,"select* from vehicles_manufacture where vehicle_manufacture_id=$vehicle_manufacture_id");
                                $row1 = mysqli_fetch_array($query1);
                                $vehicle_manufacture_name = $row1['vehicle_manufacture_name'];


                                $querey2 = mysqli_query($conn,"select * from vehicles_models where vehicles_model_id=$vehicle_model_id and vehicle_manufacture_id=$vehicle_manufacture_id");
                                
                              
                                 $row2 = mysqli_fetch_array($querey2);
                                 
                                $vehicles_model_name = $row2['vehicles_model_name'];

                                $querey3 = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id=$vehicle_type_id");
                                   $row3 = mysqli_fetch_array($querey3);
                                $vehicle_type_name = $row3['vehicle_type_name'];

                                $view_icon = ' <a href="view_vehicle_details.php?vehicle_ad_id='.$vehicle_ad_id.'" class="view-btn btn-sm view-btn btn-top-red hider_class00">
                                <i class="fas fa-eye"></i></a>';

                        $vehicle_ad_sold_date = date("d-m-Y",strtotime($row['vehicle_ad_sold_date']));
                        $vehicle_ad_sold_time = $row['vehicle_ad_sold_time'];
                      
                        
                            echo '<tr>
                          <td>'.$count.'</td>
                          <td>'.$vehicle_type_name.'</td>
                            <td>'.$vehicle_manufacture_name.'</td>
                           <td>'.$vehicles_model_name.'</td>
                          <td>'.$vehicle_ad_price.'</td>
                          <td>'.$vehicle_ad_added_timestamp.'</td>
                          <td>'.$vehicle_ad_sold_date." ".$vehicle_ad_sold_time.'</td>
                          <td>'.$view_icon.'</td>
                          </tr>'; 
                      }
                    ?>

                  </tbody>
              </table>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--========================= End: Dashboard Buyer Section =============================-->
<?php
  include 'includes/footer.php';
?>