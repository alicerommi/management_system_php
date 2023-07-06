<?php
      include 'includes/header.php';
?>

<style type="text/css">
  .table td:nth-child(2) {
  text-align: right !important;
   font-size: 18px;
   width: 50%;
  
}
.table td:nth-child(4) {
  text-align: center !important;
   font-size: 18px;
 
}

.table td:nth-child(1) {
  text-align: right !important;
   font-size: 18px;
   font-weight: 600;
   width: 50%;
}

.table td:nth-child(3) {
  text-align: center !important;
   font-size: 18px;
   font-weight: 600;
}
</style>
  <!-- start banner -->
<div class="directional_class"> 
  <section class="banner-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-head">
            <!-- <h2></h2> -->
                <h2> <?php    echo to_hebrew("Vehicle Ad Detail Page",$language_array);?></h2>
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

  <!-- start blog content -->
  <section class="veh_content-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> 
          <div class="text-right headering ">
            <!--  <h2 class="heading_text abc"></h2> -->
              <h2 class="heading_text abc"> <?php    echo to_hebrew("VEHICLE IMAGES",$language_array);?></h2>
          </div>
        </div>
                <?php
                    
                    $img_dir = "uploads/vehicles_images/";
                    $vid_dir = "uploads/vehicles_video/";
                    if(isset($_GET['vehicle_ad_id'])  ){
                      $vehicle_ad_id = intval($_GET['vehicle_ad_id']);
                     // $sql ="select* from vehicles_ads join vehicle_types join vehicles_models on vehicle_types.vehicle_type_id = vehicles_ads.vehicle_type_id and vehicles_ads.vehicle_ad_id=$vehicle_ad_id and vehicles_ads.vehicle_model_id=vehicles_models.vehicles_model_id";

                      
                       $sql = "select* from vehicles_ads where vehicle_ad_id = $vehicle_ad_id";
                      
                      $check = mysqli_query($conn,$sql);
                      if(mysqli_num_rows($check)>0){
                        $row = mysqli_fetch_array($check);
                        // print_r($row);
                        // die;
                        // $vehicles_model_name = $row['vehicles_model_name'];
                            //  $vehicle_type_name = $row['vehicle_type_name'];
                       // $vehicle_manufacture_id = intval($_GET['vehicle_manufacture_id']);
                      //$vehicle_type_id = intval($row['vehicle_type_id']);
                              $vehicle_type_id_db =$row['vehicle_type_id'];
                              $vehicle_ad_sold_status  =$row['vehicle_ad_sold_status'];
                              $vehicle_ad_sold_status_words = to_hebrew("Not Sold",$language_array);
                              if($vehicle_ad_sold_status==1){
                                  $vehicle_ad_sold_status_words = to_hebrew("Sold",$language_array);
                              }
                              $vehicle_manufacture_id =$row['vehicle_manufacture_id'];
                              $vehicle_ad_added_timestamp = date("d-m-Y",strtotime($row['vehicle_ad_added_timestamp']));
                              //$vehicle_manufacture_name =$row['vehicle_manufacture_name'];
                              $vehicle_ad_year = $row['vehicle_ad_year'];
                              $vehicle_ad_hand = $row['vehicle_ad_hand'];
                              $vehicle_ad_km = $row['vehicle_ad_km'];
                              $vehicle_ad_test_to_date = $row['vehicle_ad_test_to_date']; 
                              $vehicle_ad_license_level = $row['vehicle_ad_license_level'];
                              $vehicle_ad_current_ownership = $row['vehicle_ad_current_ownership'];
                              $vehicle_ad_previous_ownership = $row['vehicle_ad_previous_ownership'];
                              $vehicle_ad_ownership_type = $row['vehicle_ad_ownership_type'];
                              $vehicle_ad_tire_condition = $row['vehicle_ad_tire_condition'];
                              $vehicle_ad_accidents = $row['vehicle_ad_accidents'];
                              $vehicle_treatment_with_oil = $row['vehicle_treatment_with_oil'];
                              $vehicle_ad_have_seller_invoice = $row['vehicle_ad_have_seller_invoice'];
                              $vehicle_ad_vehicle_issue = $row['vehicle_ad_vehicle_issue'];
                              $vehicle_ad_free_text = $row['vehicle_ad_free_text'];
                              $vehicle_ad_price = $row['vehicle_ad_price'];
                              $vehicle_model_id =$row['vehicle_model_id'];
                                $query1 = mysqli_query($conn,"select* from vehicles_manufacture where vehicle_manufacture_id=$vehicle_manufacture_id");
                                $row1 = mysqli_fetch_array($query1);
                                $vehicle_manufacture_name = $row1['vehicle_manufacture_name'];


                                $querey2 = mysqli_query($conn,"select * from vehicles_models where vehicles_model_id=$vehicle_model_id and vehicle_manufacture_id=$vehicle_manufacture_id");
                                
                              
                                 $row2 = mysqli_fetch_array($querey2);
                                 
                                $vehicles_model_name = $row2['vehicles_model_name'];

                                $querey3 = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id=$vehicle_type_id_db");
                                   $row3 = mysqli_fetch_array($querey3);
                                $vehicle_type_name = $row3['vehicle_type_name'];






                      }else{
                        $str = to_hebrew("the vehicle ad details does not exists",$language_array);
                        echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                              die;
                      }
                    }else{
                        $str = to_hebrew("the vehicle ad details does not exists",$language_array);
                        echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                              die;
                    }
                ?>
              
                <?php
                  $vehicle_imgs_query = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id=$vehicle_ad_id");
                  if(mysqli_num_rows($vehicle_imgs_query)>0){
                    echo '<div class="col-md-12 row div-center-parent">';
                        while($row = mysqli_fetch_array($vehicle_imgs_query)){
                          $vehicle_image_name = $img_dir.$row['vehicle_image_name'];
                            echo '<div class=" vcol-md-4 vcol-centered div-center-itm"> <a data-toggle="lightbox"  data-gallery="example-gallery"  href="'.$vehicle_image_name.'" > 
                                        <img src="'.$vehicle_image_name.'"  style="width:200px; height:200px;"  />
                                </a>  </div>';

                              
                        }
                        echo '</div>';
                  }

                  $vehicle_video = mysqli_query($conn,"select* from vehicle_videos where vehicle_ad_id=$vehicle_ad_id");
                  $vehicle_video_total = mysqli_num_rows($vehicle_video);
                  if(mysqli_num_rows($vehicle_video)>0)
                    {
                      $rrrr = mysqli_fetch_array($vehicle_video);
                       $vid_dir = "uploads/vehicles_video/";
                      $vehicle_video_name = $vid_dir.$rrrr['vehicle_video_name'];
                  }
             
                ?>


                   



            </div>

            <div class="col-md-12" <?php if($vehicle_video_total==0) echo 'style="display:none;"'  ?> >
               <div class="text-center headering">
                  <!--   <h2 class="heading_text">

                      </h2> -->
                        <h2 class="heading_text abc"> <?php    echo to_hebrew("Video",$language_array);?></h2>
                </div>
                <div class="text-center">
                    
                    <video width="" controls>
                        <source src="<?=$vehicle_video_name ?>" type="video/mp4">
                        <source src="<?=$vehicle_video_name ?>" type="video/ogg">
                          <?php    echo to_english(" Your browser does not support HTML5 video.");?>
                    </video>

                </div>
                <div class="text-center">
                    <a class="btn btn-lg btn-success abc" href="<?php echo $vehicle_video_name; ?>"> <?php    echo to_hebrew("Video",$language_array);?></a>
                </div>
            </div>
     
            <div class="row justify-content-center">
              
              <div class="col-md-6" style="margin-top: 20px;">
                 <div class="text-right headering">
                    <h2 class="heading_text abc">  <?php  echo to_hebrew("VEHICLE DETAILS",$language_array); ?></h2>
                </div>
                
                    <table class="table table-striped">
                        <tbody>
 <tr>
                              
                                   <td> <?php  echo  to_hebrew("Vehicle Manufacture",$language_array).":";?></td>
                                  <td><?= $vehicle_manufacture_name ?></td>
                            </tr>
                         

                          <tr>   <td> <?php  echo to_hebrew("Vehicle Model",$language_array).":";?></td>
                              <td><?=$vehicles_model_name; ?></td>
                            </tr>
 <tr>
                            <td> <?php echo  to_hebrew("Vehicle Type",$language_array ).":";?></td>
                                  <td><?=$vehicle_type_name; ?></td>
                           
                               
                          </tr>
                            <tr>
                                  <!--  <td></td> -->
                                 
                                    <!-- td>Year</td> -->
                                    <td> <?php  echo to_hebrew("Year",$language_array).":";?></td>
                                  <td><?=$vehicle_ad_year ?></td>
                                   
                                 
                            </tr>
                           
                            <tr>
                                <td> <?php  echo to_hebrew("Hand",$language_array).":";?></td> 
                                  <td><?= $vehicle_ad_hand ?></td>
                                 <!--  <td></td> -->
                                
                                        <!--  <td></td> -->
                                 
                                 
                            </tr>
                            <tr>
                                 <td> <?php  echo to_hebrew("KM",$language_array).":";?></td> 
                                  <td><?= $vehicle_ad_km ?></td>
                            </tr>



                            <tr>
                                <!--   <td></td> -->
                                 <td> <?php  echo to_hebrew("Test To Date",$language_array).":";?></td> 
                                  <td><?=$vehicle_ad_test_to_date ?></td>

                               
                                  

                                   <!--   <td></td> -->
                                  
                                
                           
                                  
                            </tr>
                            <tr>
                                   <td> <?php  echo to_hebrew("Sold Status",$language_array).":";?></td>
                                   <td><?=$vehicle_ad_sold_status_words ?></td>
                            </tr>
                              <tr>
                                    <td> <?php  echo to_hebrew("License Level",$language_array).":";?></td> 
                                  <td><?=$vehicle_ad_license_level ?></td>

                            </tr>


                           
                          
                            <tr>
                              
                                   <td> <?php  echo  to_hebrew("Current Ownership",$language_array).":";?></td> 
                                  <td><?=$vehicle_ad_current_ownership ?></td>
                                    
                                  
                            </tr>
                            <tr>
                                     <td> <?php  echo  to_hebrew("Previous Ownership",$language_array).":";?></td> 
                                  <td><?=$vehicle_ad_previous_ownership ?></td>
                                
                                    <!-- <td></td> -->
                                    
                            </tr>

                            <tr>
                                <td> <?php  echo   to_hebrew("Ownership",$language_array).":"; ?></td> 
                                   <td><?=$vehicle_ad_ownership_type ?></td>
                            </tr>
                                <tr>
                                  <td> <?php  echo  to_hebrew("Tire Condition",$language_array).":";?></td> 
                                   <td><?=$vehicle_ad_tire_condition ?></td>
                                  
                                 <!--    <td></td> -->
                                  
                            </tr> 
                            <tr><!-- <td></td> -->
                                   <td> <?php  echo to_hebrew("Accidents",$language_array).":";?></td> 
                                    <td><?=$vehicle_ad_accidents ?></td>
                                  </tr>

                            <tr>
                                <td> <?php  echo to_hebrew("After treatment with oils",$language_array).":";?></td> 
                                   <td><?=$vehicle_treatment_with_oil ?></td>
                                  <!-- <td></td> -->
                             
                                    <!-- <td></td> -->
                                    
                            </tr>

                            <tr>
                                   <td> <?=  to_hebrew("Seller Invoice Is Avaiable",$language_array).":";?></td> 
                                   <td><?=$vehicle_ad_have_seller_invoice ?></td>
                            </tr>


                            <tr>
                                  <td> <?php  echo to_hebrew("Known deficiencies such as: liquidity noise blows vacations",$language_array).":"; ?></td> 
                                   <td><?=$vehicle_ad_vehicle_issue ?></td>

                            </tr>
                             <tr> 
                             
                                 <td> <?php  echo to_hebrew("Ad Posted Date",$language_array).":";?></td> 
                                   <td><?=$vehicle_ad_added_timestamp ?></td>
                           
                                    

                            </tr>


                        

                            
                            <tr>
                                    
                                    <td> <?php  echo to_hebrew("Price",$language_array).":";?></td>
                                  <td><?=$vehicle_ad_price?></td>
                                   <!-- <td></td> -->
                                  
                            </tr>
                            
                            

                            
                           

                        </tbody>
                    </table>
                    <h2 style=" font-weight: 600;" class="abc"> <?php  echo to_hebrew("Free Text",$language_array);?> </h2>
                    <p style="text-align: justify; "><?php echo $vehicle_ad_free_text; ?></p>
            </div>
            </div>
         <!--    customer_name
customer_email
customer_address
customer_contact_man
customer_phone
customer_ads_limit
customer_business_logo
customer_business_address -->


                   <div class="col-md-12" style="margin-top: 20px;">
                     <div class="text-right headering">
                        <h2 class="heading_text abc"> <?php  echo to_hebrew("SELLER DETAILS",$language_array);?></h2>
                    </div>
                      <table class="table table-bordered tbl-sell-address ">
                        <tbody> 
                                      <tr>
                                            <td>
                                              <?php  echo to_hebrew("Seller Name",$language_array);?>
                                            </td>
                                             <td><?=$customer_name ?></td>
                                             <td>
                                              <?php  echo to_hebrew("Seller Email",$language_array);?>
                                             </td>
                                             <td><?=$customer_email ?></td>
                                      </tr>

                                        <tr>
                                            <!-- <td></td> -->
                                             <td>
                                              <?php  echo to_hebrew("Seller Address",$language_array);?>
                                            </td>
                                             <td><?=$customer_address ?></td>
                                            <!--  <td></td> -->
                                              <td>
                                              <?php  echo to_hebrew("Seller Phone",$language_array);?>
                                            </td>
                                             <td><?=$customer_phone ?></td>
                                      </tr>
                          </tbody>
                      </table>
                  </div>
          </div>
      <!--   </div> -->
      <!--   <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="blog-left-content">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="blog-inner-content">
                  <div class="image-blog">
                    <img src="assets/images/video-image.jpg" class="img-fluid" alt="Video Image">
                    <a href="https://www.youtube.com/watch?v=LVDUbfdfBPk" data-fancybox class="video-popup"><i class="fas fa-play"></i></a>
                  </div>
                  <div class="blog-text">
                    <h2><a href="#">Video Post</a></h2>
                    <span class="blog-link">
                      <span class="link"><a href="#">Commercial,</a></span>
                      <span class="link"><a href="#">Blogs,</a></span>
                      <span class="link"><a href="#">Media</a></span>
                      <span class="line"></span>
                      <span class="link"><a href="#">January 10, 2020</a></span>
                      <span class="line"></span>
                      <span class="link"><a href="#"><i class="far fa-comment"></i> <strong class="number">0</strong> Comment</a></span>
                    </span>

                    <div class="text">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit porro, nostrum nam, delectus fugit error. Saepe dicta, sit fugit tempora, nulla hic vel molestiae facere officia dignissimos inventore, minus, magni nostrum blanditiis. Animi eligendi tempora eum quasi adipisci facere quia.</p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div> -->

    <!--     <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
          <div class="right-blog-content">
            

           
            <div class="compare-blog">
              <h2 class="subhead">Cars Compare</h2>
              <p>Select 2+ cars to compare</p>
            </div>

            <div class="comment-blog">
              <h2 class="subhead">Comments</h2>

              <ul>
                <li><p>Philip James on <a href="#">The best car interiors of all time</a></p></li>
                <li><p>Philip James on <a href="#">The best car interiors of all time</a></p></li>
              </ul>
            </div>

          

       

          </div>
        </div> -->


      </div>
       </section>
    </div>
 
  <!-- end blog content -->
<?php
  include 'includes/footer.php';
?>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose:true,
        showArrows:true
      });
    });
  });
</script>