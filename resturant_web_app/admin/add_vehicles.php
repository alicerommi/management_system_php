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
                                    show_back_button("all_businesses.php","Back To Business List");
                            ?>
                            <div class="col-md-12">
                            	<?php
                                    				$business_id = $_GET['business_id'];
                                    				$check_business_resturant = mysqli_query($conn,"SELECT * FROM `admin_added_business` where business_id= $business_id  and business_type=4"); # for vehicles
                                                    
                                                    if(mysqli_num_rows($check_business_resturant)>0 ) {
                                                        $row = mysqli_fetch_array($check_business_resturant);
                                                         info_message('You Are Currently Adding Vehicles For '.$row['business_name'].".");
                                                    }
                                    				 #Restaurants
                                    				?>	 
                                                    <div class="col-md-6">
                                                        <?php
                                                              if(isset($_GET['added_vehicle'])){
                                                                    if($_GET['added_vehicle']==1)
                                                                         messages("The Vehicle Details Has Been Saved","success");
                                                                    else if($_GET['added_vehicle']==0)
                                                                        messages("Error in Saving Vehicle Details","danger");
                                                                 }

                                                                if(isset($_GET['images_not_allowed'])){
                                                                    if($_GET['images_not_allowed']==1)
                                                                           messages("Details Are Saved, But Few Images Are Not Uploaded Due To Format Error!","warning");

                                                                }
                                                                
                                                                if(isset($_GET['image_not_uplodaed_to_dir'])){
                                                                    if($_GET['image_not_uplodaed_to_dir']==1)
                                                                           messages("Error! Vehicles Images has not uploaded to Directory","warning");

                                                                }

                                                                if(isset($_GET['vehicle_deleted'])){
                                                                    if($_GET['vehicle_deleted']==1){
                                                                             messages("Success! Vehicle has been deleted successfully","danger");
                                                                    }else if($_GET['vehicle_deleted']==0){
                                                                        messages("Error! Error in removing vehicle","danger");
                                                                    }
                                                                }
                                                        ?>
                                                        <div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">Enter Details To Add Vehicle For This Business</h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	
							                                    		<form action="actions/insert.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="business_id" value="<?php echo $business_id;?>">
                                                                           
                                                                                <div class="form-group">
                                                                                    <label>Upload Vehicles Images</label>
                                                                                    <input type="file" name="vehicles_images[]" multiple  class="form-control" required>
                                                                                   
                                                                                    <span class="help-block"><small>Note! You can upload multiple vehicles images [JPG,JPEG,PNG formats are allowed].</small></span>
                                                                                </div>


                                                                                <div class="form-group">
                                                                                   <label>Vehicle Name</label>
                                                                                    <input type="text" name="vehicle_name" required class="form-control" placeholder="Vehicle Name">
                                                                                </div>


                                                                                <div class="form-group">
                                                                                    <label>Vehicle Category</label>
                                                                                    <select class="form-control" required name="vehicle_category">
                                                                                            <option value="" selected disabled>Choose Vehicle Category</option>
                                                                                            <?php
                                                                                                $all_categories = mysqli_query($conn,"SELECT * FROM `vehicle_categories`");

                                                                                                while($row = mysqli_fetch_array($all_categories)){
                                                                                                    $vehicle_cate_id = $row['vehicle_cate_id'];
                                                                                                    $vehicle_cate_name = $row['vehicle_cate_name'];
                                                                                                    echo '<option value = "'.$vehicle_cate_id.'">'.$vehicle_cate_name.'</option>';
                                                                                                }
                                                                                            ?>  
                                                                                    </select>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <label>Vehicle Rental Price (Per Hour)</label>
                                                                                    <input type="number" name="vehicle_price" required class="form-control" placeholder="Vehicle Price Per Hour" >
                                                                                      <span class="help-block"><small>Note! Minimum Rental is 6 hours</small></span>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                     <label>Vehicle Plate Number</label>
                                                                                        <input type="text" name="vehicle_plate_number"  class="form-control" placeholder="Vehicle Plate Number">
                                                                                </div>
                                                                            
                                                                        
                                                                                <div class="form-group">    
                                                                                  <label>Vehicle Details</label>
                                                                                    <textarea type="text" name="Vehicle_description" required class="summernote" placeholder="Vehicle Details"></textarea>
                                                                                </div>

                                                                                <div class="form-group">

                                                                                    <button type="submit" name="save_vehicle" class="btn btn-success">Add Vehicle</button>
                                                                                </div>

							                                    			
							                                    		</form>
							                                    	</div>
							                                    </div>


							                     </div>
                                                  <div class="col-md-6">
                                                         <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">Added Vehicles</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <table id="datatable" class="table table-striped table-bordered">
                                                                            <thead>
                                                                               <tr>
                                                                                    <th>Vehicle Name</th>                                                    
                                                                                    <th>Price (Per Hour)</th>
                                                                                    <th>Actions</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                    <?php
                                                                                        $all_vehicles = mysqli_query($conn,"SELECT * FROM `business_vehicles` join vehicle_categories on business_vehicles.business_vehicle_cate_id = vehicle_categories.vehicle_cate_id and business_vehicles.admin_business_id= $business_id");
                                                                                        while($roww = mysqli_fetch_array($all_vehicles)){
                                                                                            $business_vehicle_id = $roww['business_vehicle_id'];
                                                                                            $business_vehicle_name = $roww['business_vehicle_name'];
                                                                                            $vehicle_price_per_hour = $roww['vehicle_price_per_hour'];
                                                                                            $actions ='<a href="update_vehicle_details.php?business_id='.$business_id.'&vehicle_id='.$business_vehicle_id.'" class="btn btn-purple btn-sm" title="Update Vehicle Details"><i class="fa fa-pencil"></i></a> <a href="actions/delete.php?delete_vehicle=1&vehicle_id='.$business_vehicle_id.'&business_id='.$business_id.'" title="Delete This Vehicle" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                                                                                            echo '<tr>
                                                                                            <td>'.$business_vehicle_name.'</td>
                                                                                            <td>'.$vehicle_price_per_hour.'</td>
                                                                                            <td>'.$actions.'</td>
                                                                                            </tr>';

                                                                                        }
                                                                                    ?>
                                                                            </tbody>
                                                                        </table>
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
                $('#datatable').dataTable();
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
            });
</script>
