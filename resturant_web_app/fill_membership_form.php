<?php
	include 'includes/header.php';
?>
<!--  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<div class="impx-page-heading uk-position-relative membership_form">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-width-1-1">
					<div class="uk-flex uk-flex-left">
						<div class="uk-light uk-position-relative uk-text-left page-title">
							<h1 class="uk-margin-remove">Fill Membership Form</h1><!-- page title -->
							<p class="impx-text-large uk-margin-remove">Be A Part Of Us</p><!-- page subtitle -->
						</div>
					</div>
				</div>
			</div>
		</div>
					

				<div class="uk-padding uk-padding-remove-horizontal impx-section-pricing">
					<div class="uk-container">
					

					<div class="uk-width-1-1 uk-container-center">
	    					<h4 class="uk-heading-line uk-heading-bullet uk-margin-medium-bottom"><span>Fill The Form</span></h4>

	    					<div class="uk-card uk-card-default">
	    						<div class="uk-card-body">

			    					<form method="post"  id="membership_form">
			    						<div class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid">
					    							<div class="form-group">
					    								<label>First Name</label>
					    								<input type="text" name="first_name" required class="uk-input">
					    							</div>
					    							<div class="form-group">
					    								<label>Last Name</label>
					    								<input type="text" name="last_name" required class="uk-input">
					    							</div>
					    							<div class="form-group">
					    								<label>Email Address</label>
					    								<input type="email" name="email_address" required class="uk-input">
					    							</div>
													 <div class="form-group">
													  	<label>Business Type</label>
													  	<select class="uk-select" name="business_type" required>
													  		<option value="" selected disabled>Nothing Selected</option>
													  		 <?php
													  		 $all_businesses_types = mysqli_query($conn,"select* from business_types");
													  		 while($row = mysqli_fetch_array($all_businesses_types)){
													  		 	$business_type_id  = $row['business_type_id'];
																$business_type_name  = $row['business_type_name'];
													  		 	echo '<option value="'.$business_type_id.'">'.$business_type_name.'</option>';
													  		 }
													  		 ?>
													  	</select>
													 </div>

													  <div class="form-group" >
													  	<label>Choose Country</label>
													  	<select class="uk-select" name="business_country" id="business_country" required>
													  		<option value="" selected disabled>Nothing Selected</option>
													  		 <?php
													  		 $all_countries = mysqli_query($conn,"select* from location_countries");
													  		 while($row = mysqli_fetch_array($all_countries)){
													  		 	$location_country_id  = $row['location_country_id'];
																$location_country_name  = $row['location_country_name'];
													  		 	echo '<option value="'.$location_country_id.'">'.$location_country_name.'</option>';
													  		 }
													  		 ?>
													  	</select>
													  	<p id="zip_code_info" class="pull-right"></p>
													 </div>

													  <div class="form-group" id="city_chooser" style="display: none;">
													  	<label>Choose City</label>
													  	<select class="uk-select" name="business_city" id="business_city" required >
													  		
													  	</select>
													 </div>

													<!-- <div class="form-group">
					    								<label>Zip Code</label>
					    								<input type="text" name="business_location" required class="uk-input">
					    							</div> -->

													<div class="form-group">
					    								<label>How long the business has been in existence?</label>
					    								<input type="text" name="business_existence" required class="uk-input">
					    							</div>
					    							<div class="form-group">
					    								<label>Cell Phone Number?</label>
					    								<input type="text" name="cell_phone_number" required class="uk-input">
					    							</div>
					    							<div class="form-group">
					    								<label>Home Phone?</label>
					    								<input type="text" name="home_phone_number" required class="uk-input">
					    							</div>
					    							<div class="form-group">
					    								<label>Office Number</label>
					    								<input type="text" name="office_number" required class="uk-input">
					    							</div>

					    							<div class="pull-right">
					    									<button type="submit" class="uk-button impx-button blue-sky uk-margin-small-bottom">Submit Details</button>
					    							</div>
											 </div>
										</form>									
								</div>
							</div>
	    			</div>


	    		</div>
			</div>

<?php
	include 'includes/footer.php';
?>
<script src="assets/js/actions_js/insert.js"></script>
<script src="assets/js/actions_js/fetch.js"></script>