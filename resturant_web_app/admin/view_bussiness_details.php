<?php 
	include 'includes/header.php';
?>
	 <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Business Overview</h3>
                                    </div>
                                    <div class="panel-body">
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
                                    				// if($business_type == 1) { #Restaurants

                                    				// }	
                                    			?>
                                    			
                                    			<div class="col-md-4">
                                    				<div class="about-info-p">
	                                                    <strong>Business Name</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$business_name; ?></p>
                                                	</div>
                                                	<div class="about-info-p">
	                                                    <strong>Business Type</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$business_type_name; ?></p>
                                                	</div>

                                                	<div class="about-info-p">
	                                                    <strong>Business Email</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$business_email; ?></p>
                                                	</div>

                                                	<div class="about-info-p">
	                                                    <strong>Business Phone</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$business_phone; ?></p>
                                                	</div>
                                    			</div>
                                    			
                                    			<div class="col-md-4">
                                    					<div class="about-info-p">
	                                                    <strong>Business Country</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$location_country_name; ?></p>
                                                	</div>


                                                	<div class="about-info-p">
	                                                    <strong>Business City</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$location_city_name; ?></p>
                                                	</div>

                                                	<div class="about-info-p">
	                                                    <strong>Business Zipcode</strong>
	                                                    <br>
	                                                    <p class="text-muted"><?=$location_city_zipcode; ?></p>
                                                	</div>
                                                	<div class="about-info-p">
	                                                    <strong>Business Website</strong>
	                                                    <br>
	                                                    <a href='<?php echo $business_site_link ?>' target="_blank" class="btn btn-info" title="Visit Business Site"><i class="fa fa-eye"></i></a>
                                                	</div>
                                    			</div>
                                    			<div class="col-md-4">
                                    					<div class="about-info-p">
		                                                    <strong>Business Added Date</strong>
		                                                    <br>
		                                                    <p class="text-muted"><?= human_timedate($business_added_date); ?></p>
                                                		</div>
                                    			</div>

                                    			<div class="col-md-12">
                                    				<strong>Business Details</strong>
                                    				<br>
                                    					<p style="text-align: justify;"><?=$business_more_details ?></p>
                                    			</div>
                                    			
                                    			

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->
                    </div>
                 </div>
<?php 
	include 'includes/footer.php';
?>