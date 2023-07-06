<?php 
	include 'includes/header.php';
    #$img_dir = "";
    $img_dir = "../uploads/business_images/";
?>
	 <div class="content-page">
                <div class="content">
                    <div class="container">

                        <div class="row">
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
                                    				if($business_type == 1) {
                                    					echo '<div class="alert alert-info alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            You Are Currently Adding Details For '.$business_name.'.
                                        </div>';

                                        if(isset($_GET['added'])){
                                            if($_GET['added']==1)
                                                    messages("The images for this business has been added","success");
                                        }
                                    				 #Restaurants
                                    				?>	<div class="panel panel-default">
							                                    <div class="panel-heading">
							                                        <h3 class="panel-title">1) Add Restaurant Pictures</h3>
							                                    </div>
							                                    <div class="panel-body">
							                                    	<div class="col-md-12">
							                                    		<form action="actions/insert.php" method="post" enctype="multipart/form-data">
							                                    			<div class="form-group">	
							                                    				<label>Upload Restaurant Images</label>
							                                    				<input type="file" name="images[]" required class="form-control" multiple>
							                                    				<span class="help-block"><small>Use High Quality Images (JPG, PNG, JPEG formats are supported!)</small></span>
							                                    			</div>
							                                    			<input type="hidden" value="<?=$business_id ?>" name="business_id">
							                                    			<input type="hidden" value="<?=$business_type_name ?>" name="business_type_name">

							                                    			<div class="form-group">
							                                    				<button class="btn btn-success" type="submit" name="save_business_images">Upload Images</button>
							                                    			</div>

							                                    		</form>

							                                    		<div class="port">
												                            <div class="portfolioContainer row" style="position: relative; height: 800.859px;">
												                                <?php
                                                                                /// check the business has images or not
                                                                                $check_images = mysqli_query($conn,"select* from admin_added_business_images where admin_added_business_id = $business_id");
                                                                               
                                                                                while($rr = mysqli_fetch_array($check_images)){

                                                                                    $business_img_id = $rr['business_img_id'];
                                                                                    $business_img_name = $img_dir."/".$rr['business_img_name'];
                                                                                   
                                                                                    echo '<div class="col-sm-6 col-lg-3 col-md-4" style="position: absolute; left: 0px; top: 0px;"><div class="gal-detail thumb">
                                                                                        <a href="'.$business_img_name.'" class="image-popup" >
                                                                                            <img src="'.$business_img_name.'" class="thumb-img" alt="">
                                                                                        </a>
                                                                                       
                                                                                    </div></div>';
                                                                                }
                                                                              
                                                                                
                                                                                ?>
												                            </div>
								                        				</div>
							                                    	</div>
							                                    	
							                                    </div>
							                                </div>


                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h3 class="panel-title">2) Add Restaurant Details</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="col-md-12">
                                                                        <form action="actions/insert.php" method="post">
                                                                            <div class="form-group">    
                                                                                <label>Resturant Description</label>
                                                                                <textarea type="text" name="res_description" required class="summernote"></textarea>
                                                                            </div>
                                                                            <input type="hidden" value="<?=$business_id ?>" name="business_id">
                                                                            <input type="hidden" value="<?=$business_type_name ?>" name="business_type_name">

                                                                            <div class="form-group">
                                                                                <button class="btn btn-success" type="submit" name="save_business_res_details">Save Details</button>
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
        </script>