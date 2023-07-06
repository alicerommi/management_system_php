<?php
include 'includes/header.php';
?>

<div class="impx-page-heading uk-position-relative testimonial">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-width-1-1">
					<div class="uk-flex uk-flex-left">
						<div class="uk-light uk-position-relative uk-text-left page-title">
							<h1 class="form-group-remove">Contact Us</h1><!-- page title -->
							<p class="impx-text-large form-group-remove">24/7 Support Service</p><!-- page subtitle -->
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="uk-padding">
			<div class="uk-container">
				<div class="uk-grid" data-uk-grid-margin="">
					<!-- Columns  -->
                	<div class="uk-width-1-1 uk-container-center">
					    <h4 class="uk-heading-line uk-heading-bullet"><span>Contact US</span></h4>
					    <div class="uk-grid-divider"></div>
                    </div>
    				<!-- Full Column  -->
    				<div class="uk-width-1-1 form-group-medium-bottom">
    					
    					 <p ><span class="company_link">MAXHYPECHANNEL</span> is a referral company registered in 2017 and operating within New York City. <span class="company_link">MAXHYPECHANNEL</span> was formed out of necessity to meet the needs of teeming tourists and residents of the city. Everyone faces the dilemma of where to eat, where to grab drink or where to simply have some fun when they are in a new city or when they just want to unwind after a hard day’s work. So, it doesn’t matter if you are a tourist or you are a resident of New York, we are set up just to meet your needs.</p>
                        

    					


    				</div>
    				<!-- Full Column End -->

    			
    			</div>
    				<div class="uk-padding uk-padding-remove-horizontal impx-section-pricing">
					<div class="uk-container">
    			<div class="uk-card uk-card-default form-group-medium-bottom">
							<div class="uk-card-body impx-padding-medium">
								<h4 class="form-group-medium-bottom uk-heading-bullet uk-heading-line"><span>Write Us Your Query</span></h4>
								<form method="post" id="contact_us_form">

										<div class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-1@s uk-grid">
									   
									        <div class="form-group">
									            <input class="uk-input" type="text" name="first_name"  placeholder="First Name" required>
									        </div>

									         <div class="form-group">
									            <input class="uk-input" type="text"  name="last_name" placeholder="Last Name" required>
									        </div>
									       

									         <div class="form-group">
									            <input class="uk-input" type="text" name="cell_number" placeholder="Cell Phone Number" required>
									        </div>


									         <div class="form-group">
									            <input class="uk-input" type="text" name="home_phone_number" placeholder="Home Phone Number" required>
									        </div>

									        <div class="form-group">
									            <input class="uk-input" type="text" name="office_number" placeholder="Office Number" required>
									        </div>

									         <div class="form-group">
									            <input class="uk-input" type="email" name="email" placeholder="Email Address" required>
									        </div>

									        <div class="form-group">
									            <textarea class="uk-textarea" rows="5" name="message" placeholder="Write Your Message"></textarea>
									        </div>

									        <div class="pull-right">
									            <button class="uk-button impx-button aqua" type="submit">Send Query</button>
									        </div>
									
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
<script type="text/javascript">
$(document).ready(function(){
		$(document).on('click','.company_link',function(){
				location.href="index.php";
		});
	});
</script>
<script src="assets/js/actions_js/insert.js"></script>