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
                <h2> <?php    echo to_hebrew("Add Vehicles",$language_array); ?></h2>
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
          <div class="input-area">
            <div class="card">
                <?php
                          if(isset($_GET['added'])){
                            if($_GET['added']==1){ $str =  to_hebrew("Your Ad details has been saved successfully",$language_array);
                              echo '<div class="alert alert-success text-center">'.$str.'</div>';
                            }else if($_GET['added']==0){
                              $str =  to_hebrew("Error in saving ad details",$language_array);
                               echo '<div class="alert alert-danger text-center">'.$str.'</div>';
                            }
                          }
                      ?>
                  <div class="row">
                    
                    <div class="col-md-12">
                    <?php
                   
                        $check_query = mysqli_query($conn,"select* from vehicles_ads where vehicle_ad_sold_status=0 and  customer_id=$gbh2_customer_id");
                        $total_customer_ads =  mysqli_num_rows($check_query);
                         //$total_customer_ads = 10;
                        if($customer_ads_limit > $total_customer_ads){

                    ?>
                    <form  method="POST" class="area-field" id="" action="actions/insert.php" enctype="multipart/form-data">

                      <div class="col-md-6">
                              
                              <div class="form-group">
                                <lable><?php echo  to_hebrew("Vehicle Type",$language_array );?></lable>
                                    <select name="vehicle_type" id="vehicle_type" class="form-control" >
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

                            <!--   <input type="hidden"  id = "vehicle_manufacture_id" name="vehicle_manufacture_id"> -->

                             

                              <div class="form-group" id="vehicle_manufacture_div" >
                                <lable><?php echo to_hebrew("Vehicle Manufacture",$language_array); ?></lable>
                               <!--  <input name="vehicle_manufacture" id="vehicle_manufacture" class="form-control" readonly> --> 
                                 <select name="vehicle_manufacture" id="vehicle_manufacture" class="form-control" required> 

                                </select>
                              </div>

                               <div class="form-group"  id="vehicle_model_div">
                                <lable> <?php echo to_hebrew("Vehicle Model",$language_array); ?></lable>
                                <select name="vehicle_model" id="vehicle_model" class="form-control" required> 

                                </select>
                              </div>

                              <div class="form-group">
                                  <lable for="name"> <?php echo to_hebrew("Year",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="year" id="year" required>
                              </div>


                              <div class="form-group">
                                  <lable for="name"><?php echo to_hebrew("Hand",$language_array); ?></lable>
                                  <input type="number" class="form-control" name="hand" id="hand" required>
                              </div>
                              <div class="form-group">
                                  <lable for=""><?php echo to_hebrew("KM",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="km" id="km" required>
                              </div>

                              <div class="form-group">
                                  <lable for=""><?php echo to_hebrew("Test To Date",$language_array); ?></lable>
                                  <input type="date" class="form-control" name="test_to_date" id="test_to_date" required>
                              </div>
                             
                              <div class="form-group">
                                  <lable for=""> <?php echo to_hebrew("License Level",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="license_level" id="license_level">
                              </div>

                                 <div class="form-group">
                                  <lable for="">   <?php echo to_hebrew("Current Ownership",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="current_own" id="current_own" required>
                              </div>

                                  <div class="form-group">
                                      <lable> <?php echo to_hebrew("Video",$language_array); ?></lable>
                                      <input type="file" id="video_file" name="video_file" class="form-control">
                                      <p>
                                          <?php echo to_hebrew("Please choose a video shorter than 75 seconds and smaller than 50MB",$language_array); ?>
                                      </p>
                                  </div>
                               

                             
                              

                              </div>


                          <div class="col-md-6">
                             <div class="form-group">
                                  <lable for=""> <?php echo to_hebrew("Previous Ownership",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="previous_own" id="previous_own" required>
                              </div>
                             
                            <div class="form-group">
                                  <lable for="category"> <?php echo to_hebrew("Ownership",$language_array); ?></lable>
                                  <select name="ownership" id="ownership" class="form-control" required>
                                     <!--  <option value="Trade Character">Trade Character</option>
                                      <option value="Private">Private</option>
                                      <option value="Company">Company</option> -->
                                       <option value="<?php   echo to_hebrew("trade character",$language_array); ?>"><?php   echo to_hebrew("trade character",$language_array); ?></option>
                                          <option value="<?php   echo to_hebrew("private",$language_array); ?>"><?php   echo to_hebrew("private",$language_array); ?></option>
                                           <option value="<?php   echo to_hebrew("company",$language_array); ?>"><?php   echo to_hebrew("company",$language_array); ?></option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <lable for=""><?php echo to_hebrew("Tire Condition",$language_array); ?></lable>
                                  <select name="tire_condition" id="tire_condition" class="form-control" required>
                                     <!--  <option value="New">New</option>
                                      <option value="Fair">Fair</option>
                                      <option value="Replacement required">Replacement required</option> -->

                                       <option value="<?php   echo to_hebrew("New",$language_array); ?>"><?php    echo to_hebrew("New",$language_array);  ?></option>
                                          <option value="<?php   echo to_hebrew("Fair",$language_array); ?>"><?php    echo to_hebrew("Fair",$language_array); ?></option>
                                           <option value="<?php   echo to_hebrew("replacement required",$language_array); ?>"><?php   echo to_hebrew("replacement required",$language_array); ?></option>
                                  </select>

                              </div>


                              <div class="form-group">
                                  <lable for=""><?php echo to_hebrew("Accidents",$language_array); ?></lable>
                                  <select name="accidents" id="accidents" class="form-control" required>
                                     <!--  <option value="Known">Known</option>
                                      <option value="Unknown">Unknown</option> -->
                                    <?php
                                   // $yes_no_value = to_hebrew("Yes",$language_array); 
                                    ?>


                                      <option value="<?php   echo to_hebrew("Yes",$language_array); ?>"><?php   echo to_hebrew("Yes",$language_array); ?></option>
                                          <option value="<?php   echo to_hebrew("No",$language_array); ?>"><?php   echo to_hebrew("No",$language_array); ?></option>
                                  </select>
                              </div>

                              <div class="form-group">
                                <lable><?php echo to_hebrew("After treatment with oils",$language_array); ?></lable>
                                <select name="after_treatment_with_oil" id="after_treatment_with_oil" class="form-control" required>
                                      <option value="<?php   echo to_hebrew("Yes",$language_array); ?>"><?php   echo to_hebrew("Yes",$language_array); ?></option>
                                          <option value="<?php   echo to_hebrew("No",$language_array); ?>"><?php   echo to_hebrew("No",$language_array); ?></option>
                                </select>
                              </div>

                                 <div class="form-group">
                                    <lable><?php echo to_hebrew("Seller Invoice Is Avaiable",$language_array); ?></lable>
                                    <select name="seller_invoice" id="seller_invoice" class="form-control" required>
                                         <option value="<?php   echo to_hebrew("Yes",$language_array); ?>"><?php   echo to_hebrew("Yes",$language_array); ?></option>
                                          <option value="<?php   echo to_hebrew("No",$language_array); ?>"><?php   echo to_hebrew("No",$language_array); ?></option>
                                    </select>
                              </div>

                                  <div class="form-group">
                                      <lable for="checkbox-signup">
                                      
                                        <?php echo to_hebrew("Known deficiencies such as: liquidity noise blows vacations",$language_array); ?>
                                      </lable>
                                       <textarea type="text" class="form-control" name="v_issue" id="v_issue" rows="2" maxlength="500" required></textarea>

                                  </div>  
                                 

                                  <div class="form-group">
                                      <lable for="price"><?php echo to_hebrew("Price",$language_array); ?></lable>
                                      <input type="number" class="form-control input-lg" name="price" id="price" required>
                                  </div>
                                  
                                  <div class="preview"></div>

                                  <div class="form-group" id="vehicle_image_container">
                                        <lable><?php echo to_hebrew("Upload Images",$language_array); ?></lable>
                                        <input type="file" name="" id="vehicles_images" multiple class="form-control uploaderrr" accept="image/*" required>
                                  </div>

                                  <input type="hidden" id="counter_val" value="0">

                                    
                          </div>

                          <div class="col-md-12 form-group">
                                        <lable for="free_text"><?php echo to_hebrew("Free Text",$language_array); ?></lable>
                                        <textarea type="text" class="form-control" name="free_text" id="free_text" maxlength="500" rows="4" required></textarea>
                          </div>
                        <!-- </div> -->
                        <div class="form-group col-md-12 text-right">
                            <button class="btn btn-primary btn-save" type="submit" name="add_vehicle_form"><?php echo to_hebrew("Save vehicle details",$language_array); ?></button>
                        </div>
                        <input type="hidden" id="alert_of_img_types" value="<?php 
                               $str = "PNG, JPEG, JPG formats are supported";
                              echo to_hebrew($str,$language_array); 
                        ?>" >

                        <input type="hidden" id="video_size_err" value="<?php 
                               $str = "Please choose a video smaller than 50MB";
                              echo to_hebrew($str,$language_array); 
                        ?>" >

                        <input type="hidden" id="video_type_arr" value="<?php 
                            $str = "mpg,mpeg,avi,wmv,mov,rm,flv,ogg,webm,mp4 video formats are supported";
                            echo to_hebrew($str,$language_array);
                        ?>">

                    </form>
                    <?php
                }else{
                    $str = to_hebrew("Your Ads Quota has Been Completed. You can not upload any ad.",$language_array);
                    echo '<div class="alert alert-danger text-center">'.$str.'</div>';
                }
                ?>
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
<script type="text/javascript" src="assets/js/insert.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 let count=$("#counter_val").val();

          $(document).on('click','.btn_img',function(){
              let img_id = $(this).attr('id');
              let id = img_id.replace("del_btn_","");
              $(this).remove();
              $("#input_"+id).remove();
              $("#img_"+id).remove();
              $("#counter_val").val(parseInt($("#counter_val").val())-1);
          });



                $(document).on('change','#vehicles_images',function(){
                var fileExtension = ['png', 'jpeg', 'jpg'];
                var selection = document.getElementById('vehicles_images');
                var size = selection.files.length;
               /// var count = $("#counter_img").val();
               $(this).removeAttr('required');
                let p=0;

                        for (var i=0; i<selection.files.length; i++) {
                            var file = selection.files[i];
                             if($.inArray(file.name.split('.').pop().toLowerCase(), fileExtension) == -1) {
                               // alert(fileExtension+join(" ,")+" are supported");
                               $("#vehicles_images").val('');
                              let str = $("#alert_of_img_types").val();
                               alert(str);
                               
                               //$(this).focus();
                               // $("#img_err").html("");
                               return false;
                              }else{
                                
                                p=1;
                                // let a = parseInt(size)+parseInt(count);
                                // $("#counter_img").val(a);
                              }



                          }// //end for here
                          if(p==1){

                                   var form_data = new FormData();

                                   // Read selected files
                                   var totalfiles = document.getElementById('vehicles_images').files.length;
                                   for (var index = 0; index < totalfiles; index++) {
                                      form_data.append("insert_v_images[]", document.getElementById('vehicles_images').files[index]);
                                   }
                                   //form_data.append('vehicle_ad_id',$("#vehicle_ad_id").val());
                                      $.ajax({
                                         url: 'actions/insert.php', 
                                         type: 'post',
                                         data: form_data,
                                         dataType: 'json',
                                         contentType: false,
                                         processData: false,
                                         success: function (response) {
                                            if(response.success==1){
                                             // $("#img_err").html("Uploaded successfully");
                                              $(".preview").append(response.html);
                                             // $("#img_err").html("");
                                             $("#vehicles_images").val('');
                                              $("#counter_val").val(parseInt($("#counter_val").val())+response.total_uploaded_files);
                                            }
                                            
                                         }
                                       });

                          }
                


        //         // }else{
        //         //       $("#vehicles_images").val('');
        //         //       $(this).focus();
                    
        //         //       alert("Please Upload Only "+count+" Valid Images");
        //         // }
       });



        $(document).on('change','#video_file',function(){
           var video_files_extensions = ["mpg","mpeg","avi","wmv","mov","rm","flv","ogg","webm","mp4"];
           var video_file = document.getElementById('video_file');
            var file = video_file.files[0];
            if($.inArray(file.name.split('.').pop().toLowerCase(), video_files_extensions) == -1) {
                              alert($("#video_type_arr").val());
                              $("#video_file").val('');
                               $(this).focus();
                               return false;

            }
            if($(this)[0].files[0].size/1024/1024 > 50 ){
                              alert($("#video_size_err").val());
                              $("#video_file").val('');
                               $(this).focus();
                               return false;
            }
           
        });



});
</script>