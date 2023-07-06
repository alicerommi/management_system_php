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
                                    $drink_id = $_GET['drink_id'];
                                    show_back_button("add_drinks_for_club.php?business_id=".$business_id,"Back To Club Drinks");
                                ?>
                            <div class="col-md-12">
                            	               <?php
                                    				
                                    				$check = mysqli_query($conn,"SELECT * FROM `admin_added_business` where business_id= $business_id  and business_type=11"); # for club-                                                    
                                                    if(mysqli_num_rows($check)>0 ) {
                                                        $row = mysqli_fetch_array($check);
                                                         info_message('You Are Currently Updating One of Drink Details of '.$row['business_name'].".");
                                                    }
                                    				 #Restaurants
                                    				?>	 
                                                    <div class="col-md-12">
                                                        <?php
                                                              if(isset($_GET['updated_drink'])){
                                                                    if($_GET['updated_drink']==1)
                                                                         messages("The Drink Details Has Been Updated","success");
                                                                    else if($_GET['updated_drink']==0)
                                                                        messages("Error in Updating Drink Details","danger");
                                                                 }

                                                              $dir_menus = "../uploads/drinks_images/";
                                                                
                                                                if(isset($_GET['image_not_uplodaed_to_dir'])){
                                                                    if($_GET['image_not_uplodaed_to_dir']==1)
                                                                           messages("Error! Drink image has not uploaded to Directory","warning");
                                                                }
                                                                $fetch_drink_details = mysqli_query($conn,"select* from business_bar_drinks where admin_business_id= $business_id and business_bar_drink_id = $drink_id"); #-- also used for the adult entertainment category
                                                                $row = mysqli_fetch_array($fetch_drink_details);
                                                                $drink_image = $dir_menus.$row['business_bar_drink_img'];
                                                                $business_bar_drink_details = $row['business_bar_drink_details'];
                                                                 $drink_name = $row['business_bar_drink_name'];
                                                                    $drink_price = $row['business_bar_drink_price'];
                                                        ?>
                                                        <div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">Update Drink Details</h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	
							                                    		<form action="actions/update.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="business_id" value="<?php echo $business_id;?>">
                                                                                <input type="hidden" name="drink_id" value="<?php echo $drink_id;?>">
                                                                                <?php
                                                                                            if(strlen($row['business_bar_drink_img'])>0){          

                                                                                                    echo '<div class="col-md-4" id="image_div">
                                                                                                            <div class="thumbnail">
                                                                                                              <a href="'.$drink_image.'">
                                                                                                                <img src="'.$drink_image.'"  style="width: 300px; height: 200px;">
                                                                                                              </a>
                                                                                                            </div>
                                                                                                            <button type="button" title="Delete This Image" class="btn btn-danger delete_menu_img"><i class="fa fa-trash"></i></button>
                                                                                                            </div>';
                                                                                                }else{
                                                                                                    // echo '<div class="form-group" id="upload_image" ><input type="file" name="menu_image"  class="form-control"></div>'; 
                                                                                                }
                                                                                ?>
                                                                                <div class="form-group" id="upload_image"><input type="file" name="drink_image"  id="menu_image" class="form-control"></div>
                                                                                <input type="hidden" name="image_new" id="image_new" value="0">
                                                                                <div class="form-group">
                                                                                   <!--  <label>Menu Name</label> -->
                                                                                    <input type="text" name="drink_name" required class="form-control" placeholder="Menu Name" value="<?php echo $drink_name; ?>">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <!-- <label>Menu Price</label> -->
                                                                                    <input type="number" name="drink_price" required class="form-control" placeholder="Menu Price" min="1" value="<?php echo $drink_price; ?>">
                                                                                </div>
                                                                            
                                                                        
                                                                                <div class="form-group">    
                                                                               <!--      <label>Menu Details</label> -->
                                                                                    <textarea type="text" name="drink_description" required class="summernote" placeholder="Menu Details"><?php echo $business_bar_drink_details;?></textarea>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <button type="submit" name="update_drinks" class="btn btn-success">Update Drink Details</button>
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
               
            });
</script>
