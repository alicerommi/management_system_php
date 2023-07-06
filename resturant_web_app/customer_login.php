<?php
	include 'includes/header.php';
?>
<!--  <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
<div class="impx-page-heading uk-position-relative customer_login">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-width-1-1">
					<div class="uk-flex uk-flex-left">
						<div class="uk-light uk-position-relative uk-text-left page-title">
							<h1 class="uk-margin-remove">Customer Login & Registeration</h1><!-- page title -->
							<p class="impx-text-large uk-margin-remove">Register Yourself</p><!-- page subtitle -->
						</div>
					</div>
				</div>
			</div>
</div>
		<div class="uk-padding">
			<div class="uk-container">
				<?php
	    							if(isset($_GET['logout_success'])){
	    									$en = base64url_decode($_GET['logout_success']);
	    									if($en==1){
	    										message("You Have Been Logout Successfully!","success");
	    									}
	    							}
	    							if(isset($_GET['customer_blocked_from_admin'])){
	    									if($_GET['customer_blocked_from_admin']==1){
	    										message("Your Account Has Been Blocked From Admin!","danger");
	    									}
	    							}

	    							if(isset($_GET['busines_owner_logout'])){
	    								if($_GET['busines_owner_logout']==1){
	    									message("You Have Been Logout Successfully!","success");
	    								}
	    							}

	    							?>
				<div data-uk-grid="" class="uk-grid">

						<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-2@s">
	    					

	    					<div class="uk-card uk-card-default">
	    						<div class="uk-card-body">
	    							<h4 class="uk-heading-line uk-heading-bullet uk-margin-medium-bottom"><span>Customer Registeration Form</span></h4>
			    					
			    					<form method="post" id="customer_register_form">
			    							
			    							<div class="form-group">
			    									<label>Full Name</label>
			    									<input type="text" name="full_name" required class="uk-input">
			    							</div>
			    							<div class="form-group">
			    								<label>Email Address</label>
			    								<input type="email" name="customer_email_add" required class="uk-input">
	    									</div>

	    									<div class="form-group">
			    								<label>Password</label>
			    								<input type="password" name="customer_password" required class="uk-input">
	    									</div>



	    										
					    					<div class="pull-right">
					    							<button type="submit" class="uk-button impx-button blue-sky uk-margin-small-bottom">Register</button>
					    					</div>
			    					</form>
								</div>
							</div>
	    				</div>

	    				<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-2@s">
	    					

	    					<div class="uk-card uk-card-default">
	    						<div class="uk-card-body">
	    							<h4 class="uk-heading-line uk-heading-bullet uk-margin-medium-bottom"><span>Enter Details To Login</span></h4>

	    							
	    							<form method="post" id="customer_login">
	    									
			    							<div class="form-group">
			    								<label>Email Address</label>
			    								<input type="email" name="customer_email_login" id="customer_email_login" required class="uk-input">
	    									</div>

	    									<div class="form-group">
			    									<label>Password</label>
			    									<input type="password" name="customer_login_password" id="customer_login_password" required class="uk-input">
			    							</div>

			    							<div class="form-group">
			    								<label>User Type</label>
			    								<select class="uk-input" name="user_type" required>
			    										
			    										<option value="customer">Customer</option>
			    										<option value="Business Owner">Business Owner</option>
			    								</select>
			    							</div>

	    									<div class="form-group form-check">
											    <input type="checkbox" class="form-check-input" name="remember_me_check" id="remebermecheck">
											    <label class="form-check-label" for="remebermecheck">Remember Me</label>
											</div>


					    					<div class="pull-right">
					    						<button type="submit" class="uk-button impx-button blue-sky uk-margin-small-bottom">Login</button>
					    					</div>
	    							</form>
			    					
								</div>
							</div>
	    				</div>
	    			</div>	
	    	</div>
	    </div>		
<?php
	include 'includes/footer.php';
?>
<script src="assets/js/actions_js/insert.js"></script>