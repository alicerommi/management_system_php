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
            <!-- <h2></h2> -->
            <h2> <?php    echo to_hebrew("Customer Profile Settings",$language_array);?></h2>
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
                    <div class="row">
                        <div class="col-md-6">
                          <?php
                              if(isset($_GET['udpated_pass'])){
                               $str1 =  to_english("The account password has been changed.");
                                $str2 =  to_english("Error in updating password.");
                                if($_GET['udpated_pass']==1){
                                  echo '<div class="alert alert-success">'.$str1.'</div>';
                                }else if($_GET['udpated_pass']==0){
                                   echo '<div class="alert alert-warning">'.$str2.'</div>';
                                }
                              }
                              if(isset($_GET['new_pass_lenght_not_greater'])){
                                  if($_GET['new_pass_lenght_not_greater']==1){
                                     $str2 =  to_english("New password Length must be greater than 7.");
                                     echo '<div class="alert alert-warning">'.$str2.'</div>';
                                  }
                              }

                              if(isset($_GET['old_not_match'])){
                                  if($_GET['old_not_match']==1){
                                      $str2 =  to_english("Old Password does not matched.");
                                    echo '<div class="alert alert-warning">'.$str2.'</div>';
                                  }
                              }

                              if(isset($_GET['new_not_match'])){
                                  if($_GET['new_not_match']==1){
                                    $str2 =  to_english("New password combinations does not matched.");
                                          echo '<div class="alert alert-warning">'.$str2.'</div>';
                                  }
                              }
                          ?>
                             <h3 class="wel-area abc" style="margin-bottom: 20px;"><?php echo to_hebrew("CHANGE YOUR PASSWORD",$language_array); ?></h3>
                              <form action="actions/update.php" method="POST" class="area-field" >
                                     
                                        <div class="form-group">
                                           <!--  <lable for="name"></lable> -->
                                            <input type="password" class="form-control"  name="current_pass" placeholder="<?php echo to_hebrew("Current Password",$language_array); ?>" maxlength="50">
                                        </div>
                                        <div class="form-group">
<!--                                             <lable for="pass">New Password</lable> -->
                                            <input type="password" class="form-control"  name="new_pass" placeholder="<?php echo to_hebrew("New Password",$language_array); ?>" maxlength="50">
                                        </div>

                                         <div class="form-group">
                                            <!-- <lable  for="confirm_pass">Confirm New Password</lable>  -->
                                            <input type="password" class="form-control"  name="confi_new_pass" placeholder="<?php echo to_hebrew("Confirm New Password",$language_array); ?>" maxlength="50">
                                            <p><?php echo to_hebrew("Hint: New Password Length Must Be Greater Than 7!",$language_array); ?></p>
                                        </div>
                                    
                                   
                                  <div class="form-group text-right">
                                      <button class="btn btn-primary btn-save" name="update_customer_password" type="submit"><?php echo to_hebrew("Update Password",$language_array); ?></button>
                                  </div>
                              </form>
                        


                  </div>
                  <div class="col-md-6">
                    <?php
                        $action = "actions/insert.php";
                    ?>

                    <h3 class="wel-area abc" style="margin-bottom: 20px;"><?php echo to_hebrew("CHANGE BUSINESS DETAILS",$language_array); ?></h3>
                      <form method="post" action="<?=$action; ?>" enctype="multipart/form-data">
                              <?php
                                if(strlen($customer_business_logo)>0){
                                  $customer_business_logo = "uploads/customer_business_logos/".$customer_business_logo;
                                    echo ' <div class="form-group">
                                  <div class="col-md-3">
                                      <img src="'.$customer_business_logo.'" width="200px;" height="150px" id="">
                                  </div>
                                  <a class="delete btn btn-danger" type="button" href="actions/update.php?remove_logo=1"><i class="fas fa-times"></i></a>
                                  </div>';
                                }
                              ?>
                           
                              <div class="form-group">
                                <lable><?php echo to_hebrew("Upload Business Logo",$language_array); ?></lable>
                                <input type="file" name="business_logo" id="business_logo" class="form-control"  >
                              </div>

                              <div class="form-group">
                                  <lable> <?php echo to_hebrew("Business Address",$language_array); ?></lable>
                                <input name="business_address" type="text" class="form-control" maxlength="500" value="<?=$customer_business_address; ?>">
                              </div>
                               <div class="form-group text-right">
                                      <button class="btn btn-primary btn-save" name="savesettings" type="submit"><?php echo to_hebrew("Update Details",$language_array); ?></button>
                                </div>

                      </form>
                         <input type="hidden" id="alert_of_img_types" value="<?php 
                               $str = "PNG, JPEG, JPG formats are supported";
                              echo to_english($str); 
                        ?>" >
                  </div>
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
<script type="text/javascript">
   $("#business_logo").change(function () {
                    var fileExtension = ['png', 'jpg', 'jpeg'];
                    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                        $(this).val('');
                        //alert("Supported Files Are: "+fileExtension.join(', '));
                        alert($("#alert_of_img_types").val());
                    }
               });
</script>