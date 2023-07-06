<?php 
	include 'includes/header.php';
    #$img_dir = "";
    $img_dir = "../uploads/business_images/";
?>
	 <div class="content-page">
                <div class="content">
                    <div class="container">

                        <div class="row">
                               <?php
                                    $business_id = $_GET['business_id'];
                                    $vehicle_id = $_GET['vehicle_id'];
                                    show_back_button("add_vehicles.php?business_id=".$business_id,"Back To Vehicles");
                                ?>
                            <div class="col-md-12">
                            	               <?php
                                    				
                                    				$check = mysqli_query($conn,"SELECT * FROM `admin_added_business` where business_id= $business_id  and business_type=4"); # for vehicle
                                                    
                                                    if(mysqli_num_rows($check)>0 ) {
                                                        $row = mysqli_fetch_array($check);
                                                         info_message('You Are Currently Updating One of Vehicle Details of '.$row['business_name'].".");
                                                    }
                                    				 #Restaurants
                                    				?>	 
                                                    <div class="col-md-12">
                                                        <?php
                                                              if(isset($_GET['updated_vehicle'])){
                                                                    if($_GET['updated_vehicle']==1)
                                                                         messages("The Vehicle Details Has Been Updated","success");
                                                                    else if($_GET['updated_vehicle']==0)
                                                                        messages("Error in Updating Vehicle Details","danger");
                                                                 }

                                                              $dir_vehicles = "../uploads/vehicles_images/";
                                                                
                                                                if(isset($_GET['vehicle_img_deleted'])){
                                                                    if($_GET['vehicle_img_deleted']==1)
                                                                           messages("Success! Image Has Removed","danger");
                                                                    else if($_GET['vehicle_img_deleted']==0)
                                                                         messages("Error! Error in Removing Image","warning");
                                                                }

                                                                $fetch_vehicles_details = mysqli_query($conn,"SELECT * FROM `business_vehicles` join vehicle_categories on business_vehicles.business_vehicle_cate_id = vehicle_categories.vehicle_cate_id and business_vehicles.admin_business_id= $business_id and business_vehicles.business_vehicle_id=$vehicle_id");
                                                                $row = mysqli_fetch_array($fetch_vehicles_details);
                                                                $business_vehicle_description = $row['business_vehicle_description'];
                                                                $business_vehicle_name = $row['business_vehicle_name'];
                                                                $business_vehicle_cate_id = $row['business_vehicle_cate_id'];
                                                                $vehicle_price_per_hour = $row['vehicle_price_per_hour'];
                                                                $vehicle_plate_number = $row['vehicle_plate_number'];
                                                                

                                                        ?>
                                                        <div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">Update Drink Details</h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	
							                                    		<form action="actions/update.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="business_id" id="business_id" value="<?php echo $business_id;?>">
                                                                                <input type="hidden" name="vehicle_id" id="vehicle_id" value="<?php echo $vehicle_id;?>">
                                                                                <?php
                                                                                    $all_images_of_vehicles = mysqli_query($conn,"select* from business_vehicle_images where business_vehicle_id= $vehicle_id");


                                                                                        while($rr = mysqli_fetch_array($all_images_of_vehicles)){
                                                                                            $vehicle_img_id = $rr['vehicle_img_id'];
                                                                                            $vehicle_image =$dir_vehicles.$rr['vehicle_img'];
                                                                                                 echo '<div class="col-md-3 margin_bottom_10px" id="image_v'.$vehicle_img_id.'" >
                                                                                                            <div class="thumbnail">
                                                                                                              <a href="'.$vehicle_image.'">
                                                                                                                <img src="'.$vehicle_image.'"  style="width: 300px; height: 200px;">
                                                                                                              </a>
                                                                                                              
                                                                                                            </div>
                                                                                                            <button type="button" title="Delete This Image" class="btn btn-danger text-center del_img" id="'.$vehicle_img_id.'"><i class="fa fa-trash"></i></button>
                                                                                                            </div>';
                                                                                        }     
                                                                                ?>
                                                                              
                                                                                <div class="form-group">
                                                                                    <input type="file" name="vehicles_images[]" multiple  class="form-control">
                                                                                    <span class="help-block"><small>Note! You can upload multiple vehicles images [JPG,JPEG,PNG formats are allowed].</small></span>
                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label>Vehicle Name</label>
                                                                                    <input type="text" name="vehicle_name" value="<?php echo $business_vehicle_name; ?>" required class="form-control" placeholder="Vehicle Name">
                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label>Vehicle Category</label>
                                                                                    <select class="form-control" required name="vehicle_category">
                                                                                          
                                                                                            <?php
                                                                                                $all_categories = mysqli_query($conn,"SELECT * FROM `vehicle_categories`");

                                                                                                while($row = mysqli_fetch_array($all_categories)){
                                                                                                    $vehicle_cate_id = $row['vehicle_cate_id'];
                                                                                                    $vehicle_cate_name = $row['vehicle_cate_name'];
                                                                                                    if (business_vehicle_cate_id==$vehicle_cate_id)
                                                                                                        echo '<option value = "'.$vehicle_cate_id.'" selected>'.$vehicle_cate_name.'</option>';
                                                                                                    else
                                                                                                        echo '<option value = "'.$vehicle_cate_id.'">'.$vehicle_cate_name.'</option>';
                                                                                                }  //end while loop here
                                                                                            ?>  
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>Vehicle Rental Price (Per Hour)</label>
                                                                                    <input type="number" name="vehicle_price" required class="form-control" value="<?= $vehicle_price_per_hour ?>" placeholder="Vehicle Price Per Hour" >
                                                                                      <span class="help-block"><small>Note! Minimum Rental is 6 hours</small></span>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>Vehicle Plate Number</label>
                                                                                        <input type="text" name="vehicle_plate_number"  class="form-control" placeholder="Vehicle Plate Number" value="<?= $vehicle_plate_number; ?>">
                                                                                </div>
                                                                            
                                                                        
                                                                                <div class="form-group">    
                                                                                    <label>Vehicle Details</label>
                                                                                    <textarea type="text" name="Vehicle_description" required class="summernote" placeholder="Vehicle Details"><?=$business_vehicle_description?></textarea>
                                                                                </div>

                                                                                <div class="form-group">

                                                                                    <button type="submit" name="update_vehicle_details" class="btn btn-success">Save Vehicle Details</button>
                                                                                </div>
							                                    			
							                                    		</form>
							                                    	</div>
							                                    </div>


							                     </div>
                                            
                        </div> <!-- End Row -->
                    </div>
                 </div>
<?php 
	include 'includes/footer.php';
?>
<!-- <script src="assets/pages/datatables.init.js"></script> -->
<script type="text/javascript">
      jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 100,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

                 $('.note-insert').hide();
                $('.note-table').hide();
                $('.note-height').hide();
                $('.note-view').hide();
                $('.note-color').hide();
                $('.note-help').hide();
                $('.note-style').hide();
                $(".note-fontsize").hide();
                $(".note-fontname").hide();
                $(document).on('click','.delete_menu_img',function(){
                        $("#image_div").remove();
                        $("#upload_image").show();
                });
               


                $(document).on('click','.del_img',function(){
                    let img_id = $(this).attr('id').trim();
                    let vehicle_id = $("#vehicle_id").val().trim();
                    let business_id = $("#business_id").val().trim();
                    location.href="actions/delete.php?vehicle_id="+vehicle_id+"&remove_vehicle_img=1&img_id="+img_id+"&business_id="+business_id;
                });

            });
</script>
