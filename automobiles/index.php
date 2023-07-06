<?php
    include 'includes/header.php';
?>
     <!-- start home hero -->
  <section class="home-hero">
    
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-md-12">
          <div class="swiper-container hero-container">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="home-slide-banner">
                  <img src="assets/images/slides/slide_1.jpeg" class="img-fluid slide__image" alt="GBH2">
                  <div class="text-left">
                    <div class="container pos-r">
                      <h2>
                        <span class="med abc"><?php echo to_english("Affordable"); ?></span>
                        <span class="large abc"> <?php echo to_english("USED"); ?><strong><?php echo to_english("CARS"); ?></strong></span>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>


              <div class="swiper-slide">
                <div class="home-slide-banner">
                  <img src="assets/images/slides/slide_2.jpeg" class="img-fluid slide__image" alt="GBH2">
                  <div class="text-left">
                    <div class="container pos-r">
                      <h2>
                        
                          <span class="med abc"><?php echo to_english("Find A Car At The"); ?></span>
                          
                          <span class="large abc"> <?php echo to_english("Best"); ?><strong><?php echo to_english("Price"); ?></strong></span>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>


               <div class="swiper-slide">
                <div class="home-slide-banner">
                  <img src="assets/images/slides/slide_3.jpg" class="img-fluid slide__image" alt="GBH2">
                  <div class="text-left">
                    <div class="container pos-r">
                      <h2>
                        
                          <span class="med abc"><?php echo to_english("Find A Moto At The"); ?></span>
                          
                          <span class="large abc"> <?php echo to_english("Best"); ?><strong><?php echo to_english("Price"); ?></strong></span>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>


               <div class="swiper-slide">
                <div class="home-slide-banner">
                  <img src="assets/images/slides/slide_4.jpeg" class="img-fluid slide__image" alt="GBH2">
                  <div class="text-left">
                    <div class="container pos-r">
                      <h2>
                        
                          <span class="med abc"><?php echo to_english("Find Any Two Wheels Vehicle At The"); ?></span>
                          
                          <span class="large abc"> <?php echo to_english("Best"); ?><strong><?php echo to_english("Price"); ?></strong></span>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>


               <div class="swiper-slide">
                <div class="home-slide-banner">
                  <img src="assets/images/slides/slide_5.jpeg" class="img-fluid slide__image" alt="GBH2">
                  <div class="text-left">
                    <div class="container pos-r">
                      <h2>
                        
                          <span class="med abc"><?php echo to_english("Find Any Motorcycle Model At The"); ?></span>
                          
                          <span class="large abc"> <?php echo to_english("Best"); ?><strong><?php echo to_english("Price"); ?></strong></span>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="swiper-pagination hero-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end home hero -->

<div class="directional_class">

  <!-- start form filter -->
  <section class="filter-form">
    <div class="container">
      <div class="row">
        <div class="filter-field w-100">
          
          <form class="filterForm-field" method="POST" id="first_filters">
            <div class="row align-items-end flex-lg-nowrap">
               <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 directional_class">
                <div class="form-group w-100 ">
                 <label for="type" ><?php echo  to_hebrew("Vehicle Type",$language_array);?></label>
                  <select name="vehicle_type" id="vehicle_type" class="form-control">
                  <option selected disabled><?php echo to_hebrew("Nothing Selected",$language_array)?></option>
                   <?php
                       for($i=0;$i<count($access_arr);$i++){
                          $aa = $access_arr[$i];
                          $vehicle_type_id = $aa['vehicle_type_id'];
                          $vehicle_type_name = $aa['vehicle_type_name'];
                          echo'<option value="'.$vehicle_type_id.'">'.$vehicle_type_name.'</option>';
                       }  //end for loop
                  ?>
                  </select>
                </div>
              </div>


            
              <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 directional_class">
                 <div class="form-group w-100 " id="vehicle_manufacture_div" >
                    <label><?php echo to_hebrew("Vehicle Manufacture",$language_array); ?></label>
                    <select name="vehicle_manufacture" id="vehicle_manufacture" class="form-control" required></select>
                </div>
              </div>

                <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 directional_class">
                <div class="form-group w-100" id="vehicle_model_div">
                    <label> <?php echo to_hebrew("Vehicle Model",$language_array); ?></label>

                    <select name="vehicle_model" id="vehicle_model" class="form-control">
                       
                     </select>
                </div>
              </div>
             
              <div class="col-lg-3 col-md-2 col-xs-12 col-sm-12">
                <div class="form-group w-100">
                  <button type="submit" class="btn btn-default btn-block" name="filter_applier_btn"><?=  to_hebrew("Apply Filters",$language_array); ?></button>
                </div>
              </div>
            </div>

           <!--  <div class="hide-filter-form">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 col-form-lg-3">
                  <div class="form-group w-100">
                    <label for="type">Select City</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">-City-</option>
                      <option value="">City 1t</option>
                      <option value="">City 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 col-form-lg-3">
                  <div class="form-group w-100">
                    <label for="type">Select Transmission</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">-Transmission-</option>
                      <option value="">Transmission 1t</option>
                      <option value="">Transmission 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 col-form-lg-3">
                  <div class="form-group w-100">
                    <label for="type">Type of drive</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">-Drive-</option>
                      <option value="">Drive 1t</option>
                      <option value="">Drive 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 col-form-lg-3">
                  <div class="form-group w-100">
                    <label for="type">Select Feul</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">-Feul-</option>
                      <option value="">Feul 1</option>
                      <option value="">Feul 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12 col-sm-12 col-form-lg-3">
                  <div class="form-group w-100">
                    <label for="type">Select Order</label>
                    <select name="status" id="status" class="form-control">
                      <option value="">-Order-</option>
                      <option value="">Order 1</option>
                      <option value="">Order 2</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
                  <div class="form-group">
                    <label for="">Mileage</label>
                    <div id="slider-range" data-price-min="230" data-price-max="1233"></div>
                      <p class="price-filters">
                       
                        <input type="number" id="price-filter-min" class="price-filter-minimum" placeholder=230 aria-label="Minimum price for filtering products" >
                       
                        <input type="number" id="price-filter-max" class="price-filter-maximum" placeholder=1233>
                      </p>
                  </div>
                </div>


              </div>

              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Air conditioning</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                      <label class="custom-control-label" for="customCheck2">Heated seats</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck3">
                      <label class="custom-control-label" for="customCheck3">Electro-lifts of glasses</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck4">
                      <label class="custom-control-label" for="customCheck4">Leather cases</label>
                    </div>
                  </div>
                </div>
              </div>


            </div> -->




          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end form filter -->
  <input type="hidden" id="head_json" value="<?php echo to_hebrew("Results Found",$language_array); ?>">
   <input type="hidden" id="head_json_not_found" value="<?php echo to_hebrew("Results Not Found",$language_array); ?>">
  <input type="hidden" id="head__detail_json" value="<?php echo to_hebrew("Your query has been saved, we will inform you if we found your desired vehicle",$language_array);   ?>">
  <!-- start browse model -->
    <div class="used-car">
    <div class="container">
      <div class="row" id="filter_applier_results">
        
        <?php
            $ForSale = to_hebrew("For Sale",$language_array);
            $seller_name_keyword  = to_hebrew("Seller Name",$language_array);
            $seller_address_keyword  = to_hebrew("Seller Address",$language_array);
            $view_details_btn =  to_hebrew("more details",$language_array);
            $test_t0_date = to_hebrew("Test To Date",$language_array);
            $top_corner = to_hebrew("Top Sale",$language_array);   //client send
                ////////////// fetch all the vehicles for the sold
            $sql = "SELECT * FROM `vehicles_ads`  join customers on  vehicles_ads.customer_id = customers.customer_id    and customers.customer_block=0  and vehicles_ads.vehicle_ad_sold_status=0 order by vehicles_ads.vehicle_ad_id desc ";
          $fetch_all_queries = mysqli_query($conn,$sql);
          if(mysqli_num_rows($fetch_all_queries)>0){
                while($row  = mysqli_fetch_array($fetch_all_queries)){
                  $vehicle_ad_id = $row['vehicle_ad_id'];
                     $vehicle_type_id_db =$row['vehicle_type_id'];
                              $show = 0;
                              if (in_array($vehicle_type_id_db, $single_access_arr_with_type_ids)){
                                $show = 1;
                              }
                             // $vehicle_ad_sold_status  =$row['vehicle_ad_sold_status'];
                              $vehicle_ad_sold_status_words = $ForSale;
                              // if($vehicle_ad_sold_status==1){
                              //     $vehicle_ad_sold_status_words = "Sold";
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
                                $customer_business_logo_img ="";
                                
                                 if(strlen($row['customer_business_logo'])>0){
                                    $customer_business_logo_img= "uploads/customer_business_logos/".$row['customer_business_logo'];
                                }

                                ////////////////////////fetch seller details /////////////////
                               $seller_name = $row['customer_name'];
                              $seller_address = $row['customer_address'];
                              if($show==1){
                                                              echo '<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 w-100 abc">
                                          <div class="card sc_car-items">
                                            <div class="top-box-badge">'.$top_corner.'</div>
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
                                                          <span class="cars_price_label">'.$vehicle_ad_sold_status_words.'</span>
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

  <!-- start used car -->
  
  <!-- end used car -->


  <section class="promo-layouts">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="promo-title abc">
            <h4 class="subtitle"><?= to_hebrew("Quality Cars At Very",$language_array); ?></h4>
            <h1 class="item-title-head"><?= to_hebrew("Reasonable",$language_array); ?> <span><?= to_hebrew("Prices",$language_array); ?> </span></h1>

            <div class="title-small">
             <!--  <p><span>Discover a Car Dealership that cares</span> <span>about our customers</span></p> -->

              <div class="button mt-3 text-right">
                <a href="all_sold_vehicles.php" class="btn btn-primary"><span><?= to_hebrew("All Sold Vehicles",$language_array) ?></span></a>
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
<script type="text/javascript" src="assets/js/insert.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $(document).on('submit','#first_filters',function(){
          let datastring = $(this).serialize()+"&filter_home_page=1";
          $.ajax({
            url:'actions/fetch.php',
            data:datastring,
            method:'post',
            dataType:'json',
            success:function(d){
              if(d.shown_results==1){
                let res = $("#head_json").val();
                 let str="<h2><span class='bold'>"+res+"</span></h2>";
                let heading = '<div class="col-md-12 abc"><div class="heading">'+str+'</div></div>';
                let html = d.html;
                $("#filter_applier_results").empty().append(heading+html);
              }else{
                  if(d.success==1){
                    let res = $("#head_json_not_found").val();
                     let str="<h2><span class='bold'>"+res+"</span></h2>";
                     let detail = $("#head__detail_json").val();
                      let alert ='<div class="alert alert-warning text-center">'+detail+'</div>';
                      let heading = '<div class="col-md-12 abc"><div class="heading">'+str+'</div>'+alert+'</div>';
                      $("#filter_applier_results").empty().append(heading);
                  }else{
                    console.log("Error in fetching");
                  }
              }
            }
          });
          return false;
      });

    });
</script>