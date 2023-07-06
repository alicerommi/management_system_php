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
          <!--   <h2></h2> -->
            <h2> <?php    echo to_hebrew("Update Vehicle Details",$language_array);?></h2>
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
                 
                </ul>
          </div>
          <div class="input-area">
            <div class="card">
                <?php



                    if(isset($_GET['vehicle_ad_id'])){
                      $vehicle_ad_id = intval($_GET['vehicle_ad_id']);
                      $sql ="select* from vehicles_ads join vehicle_types on  vehicle_types.vehicle_type_id  = vehicles_ads.vehicle_type_id and vehicles_ads.customer_id=$gbh2_customer_id and vehicles_ads.vehicle_ad_sold_status=0 and vehicles_ads.vehicle_ad_id=$vehicle_ad_id";
                        $check = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($check)>0){
                          $row = mysqli_fetch_array($check);

                              $vehicle_type_name = $row['vehicle_type_name'];
                              $vehicle_type_id_db =$row['vehicle_type_id'];
                              $vehicle_model_id_db = $row['vehicle_model_id'];
                              $vehicle_manufacture_id_db = $row['vehicle_manufacture_id'];
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
                        }else{

                            $str = to_hebrew("the vehicle ad details does not exists",$language_array);
                              echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                              die;
                        }
                    }else{
                        $str = to_hebrew("There are some missing parameters",$language_array);
                       echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                       die;
                    }
                          if(isset($_GET['updated'])){
                            if($_GET['updated']==1){
                               $str = to_hebrew("Your Ad details has been updated successfully",$language_array);
                              echo '<div class="alert alert-success text-center">'.$str.'</div>';
                            }else if($_GET['updated']==0){
                               $str = to_hebrew("Error in updating ad details",$language_array);
                               echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                            }
                          }



                      ?>
                  <div class="row">
                    
                    <div class="col-md-12">
                    
                    <form  method="POST" class="area-field" id="" action="actions/update.php" enctype="multipart/form-data">

                      <div class="col-md-6">
                              <div class="form-group">
                               <!--  <lable>Vehicle Type</lable> -->
                                 <lable><?php echo  to_hebrew("Vehicle Type",$language_array );?></lable>
                                    <select name="vehicle_type" id="vehicle_type" class="form-control" >
                                    
                                          <?php
                                              for($i=0;$i<sizeof($access_arr);$i++){
                                                  $aa = $access_arr[$i];
                                                   $vehicle_type_id = $aa['vehicle_type_id'];
                                                   $vehicle_type_name = $aa['vehicle_type_name'];
                                                  if($vehicle_type_id_db==$vehicle_type_id)
                                                  { 
                                                    echo'<option value="'.$vehicle_type_id.'" selected>'.$vehicle_type_name.'</option>';
                                                  }else{
                                                      echo'<option value="'.$vehicle_type_id.'">'.$vehicle_type_name.'</option>';
                                                  }
                                               }  //end for loop

                                               

                                          ?>
                                    </select>
                              </div>
                              

                              <div class="form-group" id="vehicle_manufacture_div" >
                            <!--     <lable>Vehicle Manufacture</lable> -->
                             <lable><?php echo to_hebrew("Vehicle Manufacture",$language_array); ?></lable>
                                
                                 <select name="vehicle_manufacture" id="vehicle_manufacture" class="form-control" required> 
                                      <?php 

                                        $query = mysqli_query($conn,"select DISTINCT(vehicle_manufacture_name),vehicle_manufacture_id from vehicles_manufacture");
                                        while($rrr = mysqli_fetch_array($query)){
                                          $vehicle_manufacture_id = $rrr['vehicle_manufacture_id'];
                                          $vehicle_manufacture_name = $rrr['vehicle_manufacture_name'];
                                          if($vehicle_manufacture_id_db==$vehicle_manufacture_id)
                                          echo '<option value="'.$vehicle_manufacture_id.'" selected>'.$vehicle_manufacture_name.'</option>';
                                        else
                                          echo '<option value="'.$vehicle_manufacture_id.'">'.$vehicle_manufacture_name.'</option>';
                                        }
                                      ?>
                                </select>
                              </div>



                               <div class="form-group"  id="vehicle_model_div">
                            <lable> <?php echo to_hebrew("Vehicle Model",$language_array); ?></lable>
                                <select name="vehicle_model" id="vehicle_model" class="form-control" required> 
                                    <?php
                                        $query = mysqli_query($conn,"select* from vehicles_models");
                                          while($rr = mysqli_fetch_array($query))
                                          {
                                            $vehicles_model_id = $rr['vehicles_model_id'];
                                            $vehicles_model_name = $rr['vehicles_model_name'];
                                            if($vehicle_model_id_db==$vehicles_model_id)
                                                echo '<option value="'.$vehicles_model_id.'" selected>'.$vehicles_model_name.'</option>'; 
                                            else   
                                               echo '<option value="'.$vehicles_model_id.'">'.$vehicles_model_name.'</option>'; 
                                          }


                                    ?>
                                </select>
                              </div>




                              <div class="form-group">
                                 <lable for="name"> <?php echo to_hebrew("Year",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="year" id="year" required value="<?=$vehicle_ad_year ?>">
                              </div>


                              <div class="form-group">
                                  <lable for="name"><?php echo to_hebrew("Hand",$language_array); ?></lable>
                                  <input type="number" class="form-control" name="hand" id="hand" required value="<?=$vehicle_ad_hand ?>">
                              </div>
                              <div class="form-group">
                                  <lable for=""><?php echo to_hebrew("KM",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="km" id="km" required value="<?=$vehicle_ad_km ?>">
                              </div>

                              <div class="form-group">
                                  <lable for=""><?php echo to_hebrew("Test To Date",$language_array); ?></lable>
                                  <input type="date" class="form-control" name="test_to_date" id="test_to_date" required value="<?= $vehicle_ad_test_to_date ?>">
                              </div>
                             
                              <div class="form-group">
                                 <lable for=""> <?php echo to_hebrew("License Level",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="license_level" id="license_level" value="<?= $vehicle_ad_license_level?>">
                              </div>

                               <div class="form-group">
                                  <lable for="">   <?php echo to_hebrew("Current Ownership",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="current_own" id="current_own" required value="<?= $vehicle_ad_current_ownership ?>">
                              </div>

                              <div class="form-group">
                                  <lable for="">   <?php echo to_hebrew("Previous Ownership",$language_array); ?></lable>
                                  <input type="text" class="form-control" name="previous_own" id="previous_own" required value="<?= $vehicle_ad_previous_ownership ?>"> 
                              </div>


                              

                              </div>


                          <div class="col-md-6">
                            <div class="form-group">
                                  <lable for="category"> <?php echo to_hebrew("Ownership",$language_array); ?></lable>
                                  <?php
                                        $str =  to_hebrew("trade character",$language_array);
                                        $str2 = to_hebrew("private",$language_array);
                                         $str3 = to_hebrew("company",$language_array);
                                  ?>
                                  <select name="ownership" id="ownership" class="form-control" required>
                                    
                                      <option value="<?=$str; ?>" <?php 
                                      

                                      if($vehicle_ad_ownership_type==$str){echo "selected"; } ?>> <?php echo $str ;  ?> </option>
                                      <option value="Private" <?php if($vehicle_ad_ownership_type==$str2){echo "selected"; } ?>><?=$str2 ?></option>
                                      <option value="Company" <?php if($vehicle_ad_ownership_type==$str3){echo "selected"; } ?>><?=$str3 ?></option>
                                  </select>
                              </div>

                              <div class="form-group">
                            <?php
                                    $str4 =  to_hebrew("New",$language_array);
                                    $str5 =  to_hebrew("Fair",$language_array);
                                     $str6 =  to_hebrew("replacement required",$language_array);
                            ?>
                                  <lable for=""><?php echo to_hebrew("Tire Condition",$language_array); ?></lable>
                                  <select name="tire_condition" id="tire_condition" class="form-control" required>
                                      <option value="<?=$str4 ?>" <?php if($vehicle_ad_tire_condition==$str4) echo "selected"; ?> ><?=$str4; ?></option>
                                      <option value="<?=$str5 ?>" <?php if($vehicle_ad_tire_condition==$str5) echo "selected"; ?> ><?= $str5?></option>
                                      <option value="<?=$str6 ?>" <?php if($vehicle_ad_tire_condition==$str6) echo "selected"; ?> ><?=$str6 ?></option>
                                  </select>
                              </div>
                              <?php
                                $str7 =  to_hebrew("Known",$language_array);
                                $str8 =  to_hebrew("Unknown",$language_array);
                              ?>
                              <div class="form-group">
                                 <lable for=""><?php echo to_hebrew("Accidents",$language_array); ?></lable>
                                  <select name="accidents" id="accidents" class="form-control" required>
                                      <option value="<?=$str7 ?>" <?php if($vehicle_ad_accidents==$str7) echo "selected"; ?>><?=$str7 ?></option>
                                      <option value="<?=$str8 ?>" <?php if($vehicle_ad_accidents==$str8) echo "selected"; ?>><?=$str8 ?></option>
                                  </select>
                              </div>
                              <?php
                                  $str9 =  to_hebrew("Yes",$language_array);
                                  $str10 =  to_hebrew("No",$language_array);
                              ?>
                              <div class="form-group">
                                <lable><?php echo to_hebrew("After treatment with oils",$language_array); ?></lable>
                                <select name="after_treatment_with_oil" id="after_treatment_with_oil" class="form-control" required>
                                      <option value="<?=$str9?>" <?php if($vehicle_treatment_with_oil==$str9)echo "selected"; ?> ><?=$str9?></option>
                                      <option value="<?=$str10 ?>" <?php if($vehicle_treatment_with_oil==$str10)echo "selected"; ?> ><?= $str10?></option>
                                </select>
                              </div>

                             
                                 <div class="form-group">
                                    <lable><?php echo to_hebrew("Seller Invoice Is Avaiable",$language_array); ?></lable>
                                    <select name="seller_invoice" id="seller_invoice" class="form-control" required>
                                         
                                          <option value="<?=$str9?>" <?php if($vehicle_ad_have_seller_invoice==$str9) echo "selected"; ?> ><?=$str9?></option>
                                      <option value="<?=$str10 ?>" <?php if($vehicle_ad_have_seller_invoice==$str10) echo "selected"; ?> ><?= $str10?></option>
                                    </select>
                              </div>
                              <input type="hidden" name="vehicle_ad_id" id="vehicle_ad_id" value="<?=$vehicle_ad_id; ?>">
                                  <div class="form-group">
                                      <lable for="checkbox-signup">
                                           <?php echo to_hebrew("Known deficiencies such as: liquidity noise blows vacations",$language_array); ?>
                                      </lable>
                                       <textarea type="text" class="form-control" name="v_issue"  id="v_issue" rows="2" maxlength="500" required> <?php echo $vehicle_ad_vehicle_issue; ?></textarea>

                                  </div>  
                                 

                                  <div class="form-group">
                                       <lable for="price"><?php echo to_hebrew("Price",$language_array); ?></lable>
                                      <input type="number" class="form-control input-lg" name="price" id="price" value="<?=$vehicle_ad_price ?>" required>
                                  </div>
                                  <?php
                                     $fetch_v_images = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id=$vehicle_ad_id");
                                     $total = mysqli_num_rows($fetch_v_images);

                                      
                                  ?>
                               

                                  <div class="form-group" id="img_up_div">
                                    <lable><?php echo to_hebrew("Upload Images",$language_array); ?></lable>
                                    <!--   <input type="file" name="vehicles_images[]" id="uploader" class="form-control uploaderrr" >
                                       <p id="upload_status">Please upload Vehicle image with high quality.</p> -->
                                       <input type="file" id='files' name="files[]" multiple class="form-control uploaderrr" >
                                        <!-- <input type="button" id="submit" value='Upload'> -->
                                        <p id="img_err"></p>
                                  </div>
                                  <input type="hidden" id="counter_val" value="<?= $total;?>">
                                    



                                  <?php
                                       $video = mysqli_query($conn,"select* from vehicle_videos where vehicle_ad_id = $vehicle_ad_id");
                                       if(mysqli_num_rows($video)==0){
                                  ?>
                                  
                                  <div class="form-group" id="video_uploder">
                                      <lable> <?php echo to_hebrew("Video",$language_array); ?></lable>
                                      <input type="file" id="video_file" name="video_file"  class="form-control">
                                      <p id="vid_err"><?php echo to_hebrew("Please choose a video shorter than 75 seconds and smaller than 50MB",$language_array); ?></p>
                                  </div>

                                    <?php
                                    }
                                   else
                                    {
                                      $row_vvv = mysqli_fetch_array($video);
                                      $vehicle_video_name = $row_vvv['vehicle_video_name'];
                                      $vehicle_video_id =$row_vvv['vehicle_video_id'];
                                      echo $str = '<div id="video_div" style="margin-bottom: 20px;"><a href="uploads/vehicles_video/'.$vehicle_video_name.'">Watch Video</a> <button type="button" id="'.$vehicle_video_id.'"    class="btn btn-danger del_vid"  data-key="../uploads/vehicles_video/'.$vehicle_video_name.'" data-id="'.$vehicle_ad_id.'"><i class="fas fa-trash"></i><button></div>';
                                    }

                                  ?>
                                   
                                    
                          </div>
                     
                              <div class="col-md-12">
                                     <div class="row" id="img_apppp">
                                 
                                      <?php
                                          $img_dir = "uploads/vehicles_images/";
                                          $vid_dir = "uploads/vehicles_video/";
                                        $fetch_v_images = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id=$vehicle_ad_id");
                                        while($rrr = mysqli_fetch_array($fetch_v_images)){
                                          $vehicle_image_name =$rrr['vehicle_image_name'];
                                          $vehicle_image_id =$rrr['vehicle_image_id'];
                                          $src = $img_dir.$vehicle_image_name;
                                          echo $str = '<div class="col-md-3" id="img_div'.$vehicle_image_id.'"><img src="'.$src.'" width="200px;" height="200px" id="'.$vehicle_image_id.'"><button type="button" class="btn btn-danger btn-sm btn_img" style="margin-top: 20px; margin-bottom: 20px;" id="'.$vehicle_image_id.'" data-id="'.$vehicle_ad_id.'"><i class="fas fa-trash"></i></button></div>';
                                        }
                                      ?>
                                 
                              </div>
                          </div>

                          <div class="col-md-12 form-group">
                                       <lable for="free_text"><?php echo to_hebrew("Free Text",$language_array); ?></lable>
                                        <textarea type="text" class="form-control" name="free_text" id="free_text" maxlength="500" rows="4" required><?=$vehicle_ad_free_text;?></textarea>
                          </div>
                        <!-- </div> -->
                        <div class="form-group col-md-12 text-right">
                            <button class="btn btn-primary btn-save" type="submit" name="update_vehicle_form"><?php echo to_hebrew("Update Vehicle Details",$language_array); ?></button>
                        </div>

                    </form>

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

   setInterval(function(){
   // console.log("i am running");
      if($("#counter_val").val()>8){
        $("#img_up_div").hide();
      }else{
          $("#img_up_div").show();
      }
   },1000);



        $(document).on('change','#files',function(){
                var fileExtension = ['png', 'jpeg', 'jpg'];
                var selection = document.getElementById('files');
                var size = selection.files.length;
               /// var count = $("#counter_img").val();
                let p=0;

                        for (var i=0; i<selection.files.length; i++) {
                            var file = selection.files[i];
                             if($.inArray(file.name.split('.').pop().toLowerCase(), fileExtension) == -1) {
                               // alert(fileExtension+join(" ,")+" are supported");
                               alert("PNG, JPEG, JPG formats are supported");
                               $("#files").val('');
                               $(this).focus();
                                $("#img_err").html("");
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
                                   var totalfiles = document.getElementById('files').files.length;
                                   for (var index = 0; index < totalfiles; index++) {
                                      form_data.append("update_v_images[]", document.getElementById('files').files[index]);
                                   }
                                   form_data.append('vehicle_ad_id',$("#vehicle_ad_id").val());
                                      $.ajax({
                                         url: 'actions/update.php', 
                                         type: 'post',
                                         data: form_data,
                                         dataType: 'json',
                                         contentType: false,
                                         processData: false,
                                         success: function (response) {
                                            if(response.success==1){
                                              $("#img_err").html("Uploaded successfully");
                                              $("#img_apppp").append(response.html);
                                             // $("#img_err").html("");
                                             $("#files").val('');
                                              $("#counter_val").val(parseInt($("#counter_val").val())+size);
                                            }
                                            else {
                                              alert(response.msg);
                                              $("#img_err").html("");
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

       
        $(document).on('click','.btn_img',function(e){

            let vehicle_image_id = $(this).attr('id');
            let vehicle_ad_id = $(this).attr('data-id');
            $.ajax({
              url:'actions/delete.php',
              data:{
                delete_vehi_ad_img :1,
                vehicle_image_id:vehicle_image_id,
                vehicle_ad_id:vehicle_ad_id,
              },
              method:'post',
              success:function(d){
                if(d==1){
                    count=parseInt(count)-1;
                    $("#counter_val").val(count);
                    $("#img_div"+vehicle_image_id).remove();
                    //$("#img_div").show();
                    //$("#img_err").html('Please upload '+count+' images with high quality.');
                }
              }
            }); 
            return false;
        });



        $(document).on('click','.del_vid',function(){
            let vehicle_video_id = $(this).attr('id');
            let vehicle_video_name = $(this).attr('data-key');
            let vehicle_ad_id = $(this).attr('data-id');
            $.ajax({
              url:'actions/delete.php',
              method:'post',
              data:{
                delete_video:1,
                vehicle_video_id:vehicle_video_id,
                vehicle_video_name:vehicle_video_name,
                vehicle_ad_id:vehicle_ad_id,
              },
              success:function(d){
                  if(d==1){
                    let abc = $("#video_size_err").val();
                     let str = '<lable>Video</lable> <input type="file" id="video_file" name="video_file"  class="form-control"><p id="vid_err">'+abc+'</p>';
                    $("#video_div").empty().append(str);
                    $("#video_uploder").show();
                  }
              }
            });
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