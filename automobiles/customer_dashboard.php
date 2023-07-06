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
            <h2> <?php    echo to_hebrew("My Dashboard",$language_array);?></h2>
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
                      <h3 class="wel-area abc"> <?php echo to_hebrew("WELCOME",$language_array);?> <span class="name-area"><?= $customer_name; ?> </span></h3>
                      
                      <div class="row detail_shower" style="margin-top: 10px;">
                          <div class="col-md-3 mb-4">
                                <h4><?php    echo to_hebrew("Email Address",$language_array);?></h4>
                                <p><?=$customer_email; ?></p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <h4> <?php    echo to_hebrew("Contact Man",$language_array);?></h4>
                                <p><?=$customer_contact_man;  ?></p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <h4> <?php    echo to_hebrew("Phone",$language_array);?></h4>
                                <p><?= $customer_phone;?></p>
                            </div>
                            <div class="col-md-3 mb-4">
                                <h4> <?php    echo to_hebrew("Ads Limit",$language_array);?></h4>
                                <p><?php   echo  $customer_ads_limit ?></p>
                            </div>

                            <div class="col-md-3 mb-4">
                                <h4> <?php    echo to_hebrew("Remaining Ads",$language_array);?></h4>
                                <p><?=$customer_ads_limit-mysqli_num_rows(mysqli_query($conn,"select* from vehicles_ads where customer_id = $gbh2_customer_id and vehicle_ad_sold_status=0")) ?></p>
                            </div>

                             <div class="col-md-3 mb-4">
                                <h4> <?php    echo to_hebrew("Business Address",$language_array);?></h4>
                                <p><?=$customer_business_address ?></p>
                            </div>
                            
                      </div>
                      <hr>
                      <h2 class="abc"> <?php    echo to_hebrew("Vehicles Access",$language_array);?></h2>
                       <div class="row detail_shower2" style="margin-top: 10px;">
                            
                            
                              
                              <!--  <h3 class="wel-area">Vehicle &nbsp;<span class="name-area">Access</span></h3>
                            -->
                                <?php
                                // echo sizeof($access_arr);
                                // die;
                              
                                for($i=0;$i<(!empty($access_arr) ? count($access_arr) : 0);$i++){
                                  $aa = $access_arr[$i];
                                   $vehicle_type_name = ucwords($aa['vehicle_type_name']);
                                  
                                     echo ' <div class="col-md-3 mb-4 vehicles_type">';
                                       echo' <h4>'.$vehicle_type_name.'</h4>';
                                        echo'</div>';
                                   
                                }

                              
                                ?>
                            
                      </div>
                       <hr>
                       <h2 class="abc"> <?php    echo to_hebrew("Ads Statistics",$language_array);?></h2>
                       <div class="row detail_shower2" style="margin-top: 10px;">
                        <?php
                      //  $str1 =   to_hebrew("Total Ads (Overall)",$language_array);
                         $str2 =   to_hebrew("Sold Vehicles Ads (Overall)",$language_array);
                          $str3 =   to_hebrew("Unsold Vehicles Ads (Overall)",$language_array);


                        // $total_posted_ads = mysqli_query($conn,"select* from vehicles_ads where customer_id=$gbh2_customer_id and vehicle_ad_sold_status=0");
                        //         if(mysqli_num_rows($total_posted_ads )>0){

                        //             echo ' <div class="col-md-3 mb-4 vehicles_type">';
                        //             echo '<h3>'.$str1.'</h3>';
                        //                echo' <h4>'.mysqli_num_rows($total_posted_ads ).'</h4>';
                        //                 echo'</div>';
                        //         }

                             $sold_v_ads = mysqli_query($conn,"select* from vehicles_ads  where customer_id=$gbh2_customer_id and vehicle_ad_sold_status=1");
                                if(mysqli_num_rows($sold_v_ads )>0){

                                    echo ' <div class="col-md-3 mb-4 vehicles_type">';
                                    echo '<h3>'.$str2.'</h3>';
                                       echo' <h4>'.mysqli_num_rows($sold_v_ads ).'</h4>';
                                        echo'</div>';
                                }


                                $un_sold_v_ads = mysqli_query($conn,"select* from vehicles_ads where customer_id=$gbh2_customer_id and  vehicle_ad_sold_status=0");
                                if(mysqli_num_rows($un_sold_v_ads )>0){

                                    echo ' <div class="col-md-3 mb-4 vehicles_type">';
                                    echo '<h3>'.$str3.'</h3>';
                                       echo' <h4>'.mysqli_num_rows($un_sold_v_ads ).'</h4>';
                                        echo'</div>';
                                }

                                

                        ?>
                      </div>
                       <hr>
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