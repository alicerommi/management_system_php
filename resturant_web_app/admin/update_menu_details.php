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
                                    $business_type = $_GET['business_type'];
                                    $menu_id = $_GET['menu_id'];
                                    
                                    if ($business_type==5)
                                            show_back_button("add_adult_entertanmaint_menus.php?business_id=".$business_id,"Back To Business Menus");
                                       else if ($business_type==10)
                                            show_back_button("add_menus_for_event.php?business_id=".$business_id,"Back To Business Menus");
                                        else if ($business_type==11){
                                                 show_back_button("add_menus_for_club.php?business_id=".$business_id,"Back To Business Menus");
                                        }
                                    
                                ?>
                            <div class="col-md-12">
                            	               <?php
                                    				
                                    				$check_business_resturant = mysqli_query($conn,"SELECT * FROM `admin_added_business` where business_id= $business_id  and business_type=$business_type"); # for resturant
                                                    
                                                    if(mysqli_num_rows($check_business_resturant)>0 ) {
                                                        $row = mysqli_fetch_array($check_business_resturant);
                                                         info_message('You Are Currently Updating One of Menu of '.$row['business_name'].".");
                                                    }
                                    				 #Restaurants
                                    				?>	 
                                                    <div class="col-md-12">
                                                        <?php
                                                              if(isset($_GET['updated_menu'])){
                                                                    if($_GET['updated_menu']==1)
                                                                         messages("The Menu Details Has Been Updated","success");
                                                                    else if($_GET['updated_menu']==0)
                                                                        messages("Error in Updating Menu Details","danger");
                                                                 }

                                                              $dir_menus = "../uploads/menus_images/";
                                                                
                                                                if(isset($_GET['image_not_uplodaed_to_dir'])){
                                                                    if($_GET['image_not_uplodaed_to_dir']==1)
                                                                           messages("Error! Menu image has not uploaded to Directory","warning");
                                                                }
                                                                $fetch_menu_details = mysqli_query($conn,"select* from business_menus where admin_business_id= $business_id and menu_id = $menu_id");
                                                                $row = mysqli_fetch_array($fetch_menu_details);
                                                                $menu_name = $row['menu_name'];
                                                                $menu_price = $row['menu_price'];
                                                                $menu_image = $dir_menus.$row['menu_image'];
                                                                $menu_details = $row['menu_details'];
                                                        ?>
                                                        <div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">Update Menu</h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	
							                                    		<form action="actions/update.php" method="post" enctype="multipart/form-data">
                                                                                <input type="hidden" name="business_id" value="<?php echo $business_id;?>">
                                                                                <input type="hidden" name="menu_id" value="<?php echo $menu_id;?>">
                                                                                <input type="hidden" name="business_type" value="<?php echo $business_type;?>">
                                                                                <?php
                                                                                            if(strlen($row['menu_image'])>0){          

                                                                                                    echo '<div class="col-md-4" id="image_div">
                                                                                                            <div class="thumbnail">
                                                                                                              <a href="'.$menu_image.'">
                                                                                                                <img src="'.$menu_image.'"  style="width: 300px; height: 200px;">
                                                                                                              </a>
                                                                                                            </div>
                                                                                                            <button type="button" title="Delete This Image" class="btn btn-danger delete_menu_img"><i class="fa fa-trash"></i>
                                                                                                            </div>';
                                                                                                }else{
                                                                                                    // echo '<div class="form-group" id="upload_image" ><input type="file" name="menu_image"  class="form-control"></div>'; 
                                                                                                }
                                                                                ?>
                                                                                <div class="form-group" id="upload_image"><input type="file" name="menu_image"  id="menu_image" class="form-control"></div>
                                                                                <input type="hidden" name="image_new" id="image_new" value="0">
                                                                                <div class="form-group">
                                                                                   <!--  <label>Menu Name</label> -->
                                                                                    <input type="text" name="menu_name" required class="form-control" placeholder="Menu Name" value="<?php echo $menu_name; ?>">
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <!-- <label>Menu Price</label> -->
                                                                                    <input type="number" name="menu_price" required class="form-control" placeholder="Menu Price" min="1" value="<?php echo $menu_price; ?>">
                                                                                </div>
                                                                            
                                                                        
                                                                                <div class="form-group">    
                                                                               <!--      <label>Menu Details</label> -->
                                                                                    <textarea type="text" name="menu_description" required class="summernote" placeholder="Menu Details"><?php echo $menu_details;?></textarea>
                                                                                </div>

                                                                                <div class="form-group">
                                                                                    <button type="submit" name="update_menu" class="btn btn-success">Update Menu</button>
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
