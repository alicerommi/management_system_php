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
                                    				$all_business = mysqli_query($conn,"SELECT * FROM `admin_added_business` inner join location_cities join location_countries join business_types on location_countries.location_country_id=location_cities.location_country_id and admin_added_business.location_id = location_cities.location_city_id and business_types.business_type_id = admin_added_business.business_type and admin_added_business.business_id=$business_id");
                                    				$row = mysqli_fetch_array($all_business);
                                    				$business_type = $row['business_type'];
                                    				$location_city_name = $row['location_city_name'];
                                                    $location_city_zipcode = $row['location_city_zipcode'];
                                                    $business_id = $row['business_id'];
                                                    $business_name = $row['business_name'];
                                                    $business_type_name = $row['business_type_name'];
                                                    $business_type = $row['business_type'];
                                                    $business_email = $row['business_email'];
                                                    $location_country_name = $row['location_country_name'];
                                                    $full_address =$location_city_name.", ".$location_city_zipcode.", ".$location_country_name;
                                                    $business_phone = $row['business_phone'];
													$business_site_link = $row['business_site_link'];
													$business_more_details = $row['business_more_details'];
													$business_added_date = $row['business_added_date'];
                                    				if($business_type == 3) {
                                                    info_message('You Are Currently Adding Details For '.$business_name.".");

                                                    if(isset($_GET['added'])){
                                                        if($_GET['added']==1)
                                                                messages("The images for this business has been added","success");
                                                    }

                                                    if(isset($_GET['added_details'])){
                                                        $g = $_GET['added_details'];
                                                        if ($g==1){
                                                              messages("Pub Details has been added","success");
                                                        }else if($g==0){
                                                            messages("Error in adding Pub Details","warning");
                                                        }
                                                    }
                                    				 #Restaurants
                                    				?>	<div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">1) Add Pubs Pictures</h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	<div class="col-md-12">
							                                    		<form action="actions/insert.php" method="post" enctype="multipart/form-data">
							                                    			<div class="form-group">	
							                                    				<label>Upload Pubs Images</label>
							                                    				<input type="file" name="images[]" required class="form-control" multiple>
							                                    				<span class="help-block"><small>Use High Quality Images (JPG, PNG, JPEG formats are supported!)</small></span>
							                                    			</div>
							                                    			<input type="hidden" value="<?=$business_id ?>" name="business_id">
							                                    			<input type="hidden" value="<?=$business_type_name ?>" name="business_type_name">

							                                    			<div class="form-group">
							                                    				<button class="btn btn-success" type="submit" name="save_resturant_business_images">Upload Images</button>
							                                    			</div>
							                                    		</form>
							                                    	</div>
							                                    </div>
							                                </div>
                                                            <?php
                                                            if(isset($_GET['deleted_img'])){
                                                                if($_GET['deleted_img']==1){
                                                                    messages("The Image has been deleted","danger");
                                                                }else if($_GET['deleted_img']==0){
                                                                        messages("Error in deletion","warning");
                                                                }
                                                            }
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="portlet">
                                                                        <div class="portlet-heading portlet-default">
                                                                            <h3 class="portlet-title text-dark">
                                                                                2) Added Images
                                                                            </h3>
                                                                            <div class="portlet-widgets">
                                                                                <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                                                                                <span class="divider"></span>
                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                                                                                <span class="divider"></span>
                                                                                <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                        </div>
                                                                        <div id="bg-default" class="panel-collapse collapse in" aria-expanded="true" style="">
                                                                            <div class="portlet-body">
                                                                            <div class="row">
                                                                                <?php
                                                                                        /// check the business has images or not
                                                                                        $check_images = mysqli_query($conn,"select* from admin_added_business_images where admin_added_business_id = $business_id");
                                                                                        while($rr = mysqli_fetch_array($check_images)){
                                                                                            $business_img_id = $rr['business_img_id'];

                                                                                            $business_img_name = $img_dir."/".$rr['business_img_name'];
                                                                                            echo '<div class="col-md-4" id="business_image_div'.$business_img_id.'">
                                                                                                            <div class="thumbnail">
                                                                                                              <a href="'.$business_img_name.'">
                                                                                                                <img src="'.$business_img_name.'" alt="Lights" style="width: 300px; height: 200px;">
                                                                                                              </a>
                                                                                                            </div>
                                                                                                            <button type="button" id="'.$business_img_id.'" data-id="'.$business_id.'" title="Delete This Image" class="btn btn-danger delete_business_img"><i class="fa fa-trash"></i>
                                                                                                            </div>';
                                                                                    }


                                                                                ?>
                                                                            
                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                           
                                                            </div>

                                                            <?php 
                                                                      if(isset($_GET['updated_details'])){
                                                                            $g = $_GET['updated_details'];
                                                                            if ($g==1){
                                                                                  messages("Resturant Details has been updated","success");
                                                                            }else if($g==0){
                                                                                messages("Error in updating Resturant Details","warning");
                                                                            }
                                                                         }



                                                                         if(isset($_GET['already_exists_details'])){
                                                                            $g = $_GET['already_exists_details'];
                                                                            if ($g==1){
                                                                                  messages("The Resturant Details Are Already Exists","success");
                                                                            }
                                                                        }

                                                                    $check_res_details = mysqli_query($conn,"select* from admin_added_business_details where admin_added_business_id= $business_id");
                                                                    $actions = 'actions/insert.php';
                                                                    $details_of_resturant = "";
                                                                    $action_btn = 'save_business_res_details';
                                                                    $business_details = "";
                                                                    if (mysqli_num_rows($check_res_details)==1){
                                                                        $actions = 'actions/update.php';
                                                                        $action_btn = 'update_business_res_details';
                                                                        $row = mysqli_fetch_array($check_res_details);
                                                                        $business_details = $row['business_details'];
                                                                    }
                                                            ?>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">3) Add Pubs Details</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="col-md-12">
                                                                        <form action="<?php echo $actions; ?>" method="post">
                                                                            <div class="form-group">    
                                                                                <textarea type="text" name="res_description" required class="summernote"><?php echo $business_details; ?></textarea>
                                                                            </div>
                                                                            <input type="hidden" value="<?=$business_id ?>" name="business_id">
                                                                            <input type="hidden" value="<?=$business_type_name ?>" name="business_type_name">

                                                                            <div class="form-group">
                                                                                <button class="btn btn-success" type="submit" name="<?php echo $action_btn; ?>">Save Details</button>
                                                                            </div>

                                                                        </form>

                                                                       
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>


                                                             <div class="panel panel-default">
                                                                <?php

                                                                                       if(isset($_GET['added_urls'])){
                                                                                        $g = $_GET['added_urls'];
                                                                                        if ($g==1){
                                                                                              messages("Resturant Videos Links Have Been Added","success");
                                                                                        }else if($g==0){
                                                                                            messages("Error in Inserting Resturant Videos Links","warning");
                                                                                        }
                                                                                    }


                                                                                      if(isset($_GET['already_exists_urls'])){
                                                                                        $g = $_GET['already_exists_urls'];
                                                                                        if ($g==1){
                                                                                              messages("The Resturant Video Links Are Already Exists","success");
                                                                                        }
                                                                                    }

                                                                                     if(isset($_GET['updated_urls'])){
                                                                                        $g = $_GET['updated_urls'];
                                                                                        if ($g==1){
                                                                                              messages("Resturant Videos Links Have Been Updated","success");
                                                                                        }else if($g==0){
                                                                                            messages("Error in Updating Resturant Videos Links","warning");
                                                                                        }
                                                                                    }


                                                                                      if(isset($_GET['delete_previous_urls'])){
                                                                                        $g = $_GET['delete_previous_urls'];
                                                                                        if ($g==1){
                                                                                              messages("Erorr in deleteing The Previous Resturant videos links","success");
                                                                                        }
                                                                                      }
                                                                ?>
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">4) Add Pubs Videos</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="col-md-12">
                                                                        <div class="text-right">
                                                                            <button class="btn btn-info" id="add_urlbtn" title="Make New Input Field For URL"><i class="fa fa-plus"></i></button>
                                                                        </div>

                                                                        <?php


                                                                        $check_urls = mysqli_query($conn,"select* from admin_added_business_videos_url where admin_added_business_id = $business_id");
                                                                         $actions = "actions/insert.php";
                                                                        $btn = "add_resturant_videos_urls";
                                                                        if(mysqli_num_rows($check_urls)>0){
                                                                            $actions = "actions/update.php";
                                                                            $btn = "update_resturant_videos_urls";
                                                                        }
                                                                        ?>
                                                                        <form action="<?php echo $actions; ?>" method="post" id="url_addition">
                                                                            <div class="url_div">

                                                                                <?php 

                                                                                    if(mysqli_num_rows($check_urls)>0){
                                                                                        $ro = mysqli_fetch_array($check_urls);
                                                                                        $str = $ro['business_video_url'];
                                                                                    $a = explode("video_urls=",$str);
                                                                                            for($i=1;$i<sizeof($a);$i++){
                                                                                                $business_video_url = $a[$i];
                                                                                                         echo '<div class="form-group">
                                                                                                        <label>Enter Video URLs</label>    
                                                                                                        <input type="text" name="videourls[]" value="'.$business_video_url.'" required class="form-control">
                                                                                                    </div>';
                                                                                            }
                                                                            }else{
                                                                             echo '<div class="form-group">
                                                                                    <label>Enter Video URLs</label>    
                                                                                    <input type="text" name="videourls[]" required class="form-control">
                                                                                </div>';
                                                                            }
                                                                                ?>
                                                                            
                                                                            </div>
                                                                            <input type="hidden" value="<?=$business_id ?>" name="business_id">
                                                                            <div class="form-group">
                                                                                <button class="btn btn-success" type="submit" name="<?php echo $btn; ?>">Save URLS</button>
                                                                            </div>

                                                                        </form>

                                                                       
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>


                                    				<?php 
                                    				}
                                    			?>
                            </div>
                        </div> <!-- End Row -->
                    </div>
                 </div>
<?php 
	include 'includes/footer.php';
?>
<script type="text/javascript">
            $(window).load(function(){
                $('.note-insert').hide();
                $('.note-table').hide();
                $('.note-height').hide();
                $('.note-view').hide();
                $('.note-color').hide();
                $('.note-help').hide();
                $('.note-style').hide();
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                }); 
            });

            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });

            jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 200,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                 // set focus to editable area after initializing summernote
                });
            });

            $(document).on('click','#add_urlbtn',function(){
                let html_input='<div class="form-group"><label>Enter Video URL</label><input type="text" name="videourls[]" required class="form-control"></div>';
                $(".url_div").append(html_input);
            }); 

            $(document).on('click','.delete_business_img',function(){
                var img_id = $(this).attr('id').trim();
                var business_id = $(this).attr('data-id').trim();
                location.href='actions/delete.php?img_id='+img_id+"&delete_business_img=1&business_id="+business_id;
            });
</script>