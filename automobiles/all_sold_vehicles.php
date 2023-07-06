<?php
    include 'includes/header.php';
?>


<div class="directional_class">

  <!-- start banner -->
  <section class="banner-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="banner-head">
            <h2><?= to_hebrew("All Sold Vehicles",$language_array) ?></h2>
           <!--  <nav aria-label="breadcrumb" class="nav-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
              </ol>
            </nav> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end banner -->

  <input type="hidden" id="head_json" value="<?php echo to_hebrew("Results Found",$language_array); ?>">
   <input type="hidden" id="head_json_not_found" value="<?php echo to_hebrew("Results Not Found",$language_array); ?>">
  <input type="hidden" id="head__detail_json" value="<?php echo to_hebrew("Your query has been saved, we will inform you if we found your desired vehicle",$language_array);   ?>">
  <!-- start browse model -->
    <div class="used-car">
    <div class="container">
      <div class="row" id="filter_applier_results">
        
        <?php
            $ForSale = to_hebrew("Sold",$language_array);
            // $seller_name_keyword  = to_english("seller name");
            // $seller_address_keyword  = to_english("seller address");
            // $view_details_btn =  to_english("more details");
             $seller_name_keyword  = to_hebrew("Seller Name",$language_array);
            $seller_address_keyword  = to_hebrew("Seller Address",$language_array);
            $view_details_btn =  to_hebrew("more details",$language_array);
            $test_t0_date = to_hebrew("Test To Date",$language_array);
                ////////////// fetch all the vehicles for the sold

            $sql = "SELECT * FROM `vehicles_ads`  join customers on  vehicles_ads.customer_id = customers.customer_id  and vehicles_ads.vehicle_ad_sold_status=1  and customers.customer_block=0 order by vehicles_ads.vehicle_ad_id desc";
          $fetch_all_queries = mysqli_query($conn,$sql);
          if(mysqli_num_rows($fetch_all_queries)>0){
                while($row  = mysqli_fetch_array($fetch_all_queries)){
                  $vehicle_ad_id = $row['vehicle_ad_id'];
                              $vehicle_type_id_db =$row['vehicle_type_id'];
                              $vehicle_ad_sold_status  =$row['vehicle_ad_sold_status'];
                             // $vehicle_ad_sold_status_words = "Not Sold";
                              //if($vehicle_ad_sold_status==1){
                                 // $vehicle_ad_sold_status_words = "Sold";
                             // }
                              $vehicle_manufacture_id =$row['vehicle_manufacture_id'];
                              $vehicle_ad_added_timestamp = date("d-m-Y",strtotime($row['vehicle_ad_added_timestamp']));
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

                                ///////////////fetch ad image only one

                                $ad_img_query = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id= $vehicle_ad_id limit 1");
                                $ad_img_row = mysqli_fetch_array($ad_img_query);
                                $ad_img = "uploads/vehicles_images/".$ad_img_row['vehicle_image_name'];

                                ////////////////////////fetch seller details /////////////////
                               $seller_name = $row['customer_name'];
                              $seller_address = $row['customer_address'];
                               $customer_business_logo_img ="";
                               // $customer_business_logo= $row['customer_business_logo'];

                                
                                if(strlen($row['customer_business_logo'])>0){
                                    $customer_business_logo_img= "uploads/customer_business_logos/".$row['customer_business_logo'];
                                }
                              //////////////////match with type id
                               $show = 0;

                              if (in_array($vehicle_type_id_db, $single_access_arr_with_type_ids)){
                                $show = 1;
                              }
                            if($show==1){
                                if($show==1){
                                                              echo '<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 w-100 abc">
                                          <div class="card sc_car-items">
                                            <div class="top-box-badge">'.$ForSale.'</div>
                                            <div class="card-image" style="">
                                              <img alt="'.$vehicle_type_name.'"  class="img-fluid vehicle_img" src="'.$ad_img.'">
                                            </div>

                                            <div class="card-body sc_car-info">
                                              <div class="sc_car-header">
                                                

                                              <div class="div1_header_items">
                                                     <h4 class="sc_car_item_title">
                                                        <a href="#">'.$vehicle_type_name.'</a>
                                                    </h4>
                                                     <span class="sc_car_item_type">
                                                        <p href="#" title="'.$vehicle_manufacture_name.'">'.$vehicle_manufacture_name.'</p>
                                                        <p href="#" title="'.$vehicles_model_name.'" > '.$vehicles_model_name.'</p>
                                                          <p href="#" > '.$vehicle_ad_year.'</p>
                                                      </span>
                                                      <div class="sc_car_item_price">
                                                        <span class="cars_price">
                                                          <span class="cars_price_label">'.$ForSale.'</span>
                                                          <span class="cars_price_data_large"><strong>'.$vehicle_ad_price.'</strong></span>
                                                          
                                                        </span>
                                                      </div>
                                               </div>';

                                              if(strlen($customer_business_logo_img)>0)
                                                echo '<div class="busiess_lgo_shower">
                                                <img src="'.$customer_business_logo_img.'" class="business_logo_of_seller">
                                               </div>';


                                               echo '


                                              </div>

                                              <div class="sc_cars_items_params">
                                                <span class="sc_cars_items_milistone">
                                                  <span class="sc_cars_icon"><i class="fas fa-tachometer-alt"></i></span>
                                                  <span class="sc_cars_text">'.$vehicle_ad_km.'</span>
                                                </span>
                                                <span class="sc_cars_items_milistone">
                                                  <span class="sc_cars_icon"><i class="fas fa-user"></i></span>
                                                  <span class="sc_cars_text">'.$vehicle_ad_hand.'</span>
                                                </span>
                                                <span class="sc_cars_items_milistone">
                                                  <span class="sc_cars_icon">'.$test_t0_date.'</span>
                                                  <span class="sc_cars_text">'.$vehicle_ad_test_to_date.'</span>
                                                </span>
                                                
                                              </div>

                                              <div class="sc_cars_items_footer">
                                                <span class="sc_cars_items_address ">
                                                  <span class="sc_cars_items_label formatter">'.$seller_name_keyword.'</span>
                                                  <span class="sc_cars_optional_link ">'.$seller_name.'</span>
                                                </span>


                                                <span class="sc_cars_items_address">
                                                  <span class="sc_cars_items_label formatter">'.$seller_address_keyword.'</span>
                                                  <span class="sc_cars_optional_link">'.$seller_address.'</span>
                                                </span>

                                                
                                                    <div class="button mt-5 text-center w-100" >
                                                      <a href="view_vehicle_details.php?vehicle_ad_id='.$vehicle_ad_id.'" class="btn btn-primary"><span>
                                                          '.$view_details_btn.'  
                                                        </span></a>
                                                    

                                                    </div>
                                                


                                              </div>
                                            </div>

                                          </div>
                                        </div>';
                                      }//end if here to show types of access
                                      }///end if check here

                }//end while loop here
          }
        ?>
     

        

<!--         <div class="col-md-12">
          <div class="button mt-5 text-center">
            <a href="#" class="btn btn-primary"><span>Show All</span></a>
          </div>
        </div> -->


      </div>
    </div>
  </div>    
  <!-- end browse model -->

  <!-- start customer review -->
<!--   <section class="customer-review">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2><span class="bold">Ads</span> of Vehicles</h2>
          </div>

          <div class="customer-slide">
            <div class="swiper-container customer-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testimonial-author-content">
                    <div class="testimonial-author-profile">
                      <img src="assets/images/testimonials/profile1.jpeg" class="img-fluid testimonial__image" alt="">
                    </div>
                    <div class="testimonial-author-data">
                      <h4 class="author-title"><span>Car 1</span></h4>
                    </div>
                    <div class="testimonial-author-title">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testimonial-author-content">
                     <div class="testimonial-author-profile">
                      <img src="assets/images/testimonials/profile2.jpeg" class="img-fluid testimonial__image" alt="">
                    </div>
                    <div class="testimonial-author-data">
                      <h4 class="author-title"><span>Car 2</span></h4>
                    </div>
                    <div class="testimonial-author-title">
                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>

                    <div class="testimonial-author-date">06 Jan. 2020</div>
                  </div>
                </div>


                  <div class="swiper-slide">
                  <div class="testimonial-author-content">
                     <div class="testimonial-author-profile">
                      <img src="assets/images/testimonials/profile2.jpeg" class="img-fluid testimonial__image" alt="">
                    </div>
                    <div class="testimonial-author-data">
                      <h4 class="author-title"><span>Car 2</span></h4>
                    </div>
                    <div class="testimonial-author-title">
                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </div>
                      <div class="testimonial-author-date">06 Jan. 2020</div>
                  </div>
                </div>

                


              </div>

              <div class="swiper-pagination customer-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- end customer review -->

  <!-- start quality video -->
<!--   <div class="quality-video">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="columns-right-content">
            <h6 class="subtitle">Wide Variety of</h6>
            <h2 class="item-title-head">Quality Used <span class="yellow-item">Cars</span></h2>

            <div class="video-image">
              <img src="assets/images/video-image.jpg" class="img-fluid" alt="Video Image">
              <a href="https://www.youtube.com/watch?v=LVDUbfdfBPk" data-fancybox class="video-popup"><i class="fas fa-play"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- end quality video -->

  <section class="promo-layouts">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="promo-title abc">
              <h4 class="subtitle"><?= to_hebrew("Quality Cars At Very",$language_array); ?></h4>
            <h1 class="item-title-head"><?= to_hebrew("Reasonable",$language_array); ?> <span><?= to_hebrew("Prices",$language_array); ?> </span></h1>

            <div class="title-small">
              <!-- <p><span>Discover a Car Dealership that cares</span> <span>about our customers</span></p> -->

              <div class="button mt-3 text-right">
                <a href="index.php" class="btn btn-primary"><span><?= to_hebrew("Back To Home Page",$language_array); ?> </span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- start client manage -->
 <!--  <section class="client-manage">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="client-inline">
            <div class="swiper-container client-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="clien-image"><img src="assets/images/logo-1.png" alt=""></div>
                </div>
                <div class="swiper-slide">
                  <div class="clien-image"><img src="assets/images/logo-2.png" alt=""></div>
                </div>
                <div class="swiper-slide">
                  <div class="clien-image"><img src="assets/images/logo-3.png" alt=""></div>
                </div>
                <div class="swiper-slide">
                  <div class="clien-image"><img src="assets/images/logo-7.png" alt=""></div>
                </div>
                <div class="swiper-slide">
                  <div class="clien-image"><img src="assets/images/logo-5.png" alt=""></div>
                </div>
                <div class="swiper-slide">
                  <div class="clien-image"><img src="assets/images/logo-6.png" alt=""></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- end client manage -->

  <!-- start promo background -->
<!--   <section class="promo-layouts">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="promo-title">
            <h4 class="subtitle">Quality Cars At Very</h4>
            <h1 class="item-title-head">Reasonable <span>Prices</span></h1>

            <div class="title-small">
              <p><span>Discover a Car Dealership that cares</span> <span>about our customers</span></p>

              <div class="button mt-3 text-right">
                <a href="#" class="btn btn-primary"><span>Show All</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- end promo background -->

  <!-- start lastest new -->
<!--   <section class="lastest-news">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="heading">
            <h2><span class="bold">Lastest</span> News</h2>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
          <div class="items_blog_list">
            <div class="items_list">
              <a href="#">
                <h5 class="list_small_date">January 10, 2020</h5>
                <h3 class="list_medium_title">Will this be the year used-car price fall?</h3>
              </a>
            </div>
            <div class="items_list">
              <a href="#">
                <h5 class="list_small_date">January 10, 2020</h5>
                <h3 class="list_medium_title">Will this be the year used-car price fall?</h3>
              </a>
            </div>
            <div class="items_list">
              <a href="#">
                <h5 class="list_small_date">January 10, 2020</h5>
                <h3 class="list_medium_title">Will this be the year used-car price fall?</h3>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="swiper-container blog-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="blog-slide">
                  <div class="blog_image_left">
                    <img src="assets/images/image-2-664x902.jpg" class="img-fluid" alt="Blog Image">
                  </div>
                  <div class="blog_text_right">
                    <strong class="items_date">January 10, 2020</strong>

                    <h4>20 years in Business, Still Going</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi adipisci accusamus aperiam ipsum perferendis unde, quas maxime animi id corporis, odio, labore et aliquam vitae excepturi dolorum tempora praesentium eligendi ipsa omnis facere. Autem non aliquam obcaecati cum debitis, ipsam perferendis vitae ea velit, error dolores odit suscipit, ad eligendi.</p>

                    <div class="button mt-3 text-left">
                      <a href="#" class="btn btn-primary"><span>Read More</span></a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 text-center">
          <div class="button mt-5">
            <a href="#" class="btn btn-primary"><span>Show All</span></a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- end lastest new -->

  <!-- start map -->
<!--   <section class="map">
    <div class="container-fluid p-0">
      <div class="col-lg-12 p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9555272.909733938!2d-13.430602410876949!3d54.218492361514244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2s!4v1578163158627!5m2!1sen!2s" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </section> -->
  <!-- end map -->
</div>
<?php
    include 'includes/footer.php';
?>