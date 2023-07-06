<?php
	include 'includes/header.php';
?>
<div class="impx-page-heading uk-position-relative membership">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-width-1-1">
					<div class="uk-flex uk-flex-left">
						<div class="uk-light uk-position-relative uk-text-left page-title">
							<h1 class="uk-margin-remove">Membership Packages</h1><!-- page title -->
							<p class="impx-text-large uk-margin-remove">Be A Part Of Us</p><!-- page subtitle -->
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="uk-padding uk-padding-remove-horizontal impx-section-pricing">
			<div class="uk-container">
				<div class="uk-flex uk-flex-center uk-margin-medium-bottom impx-margin-bottom-small">
					<!-- Pricing Intro -->
					<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s uk-text-center hp-offer-intro">
						<h2 class="uk-margin-small-bottom">Our Membership Packages</h2>
						<p class="impx-text-large uk-margin-remove-top uk-margin-small-bottom">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>


					</div>
					<!-- Pricing Intro End -->
				</div>

				<div class="uk-flex uk-flex-center uk-margin-bottom">
					<div class="uk-width-5-6@xl uk-width-5-6@l uk-width-5-6@m uk-width-1-1@s impx-pricing-list uk-grid uk-grid-stack" data-uk-grid="">
						<?php
							///get all the packages =
						$all_packages  = mysqli_query($conn,"select * from packages");
						$counter = 0;
						if(mysqli_num_rows($all_packages)>0){
							echo '<ul class="uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-3@s uk-grid-collapse impx-promo-pricing-list uk-grid uk-first-column" data-uk-grid="">';
								while ($row = mysqli_fetch_assoc($all_packages)) {
									$counter = $counter+1;
									$class_name = 'uk-box-shadow-large uk-light';
									$color_class = 'bg-color-gold';
									$package_id = base64url_encode($row['package_id']);
									$str = base64url_encode("package_id");
									$package_name = $row['package_name'];
									$package_details = $row['package_details'];
									$package_price_per_month = $row['package_price_per_month'];
									$package_per_customer = $row['package_per_customer'];
									$package_location = $row['package_location']; 
									if($counter%2==0){
										$class_name = 'uk-box-shadow-xlarge uk-light featured';
										$color_class = 'bg-color-company-color';
									}
									echo '<li class="uk-position-relative uk-first-column"  >
								<div class="impx-promo-pricing '.$class_name.'">
									<div class="uk-position-relative">
										<img src="assets/images/pricing-img-1.jpg" alt="">
										<div class="impx-overlay light"></div>
									</div>
									<div class="uk-position-relative uk-padding '.$color_class.'">
							            <h4 class="uk-heading-line uk-margin-small-bottom"><span>'.$package_name.'</span></h4>
							            <span class="uk-label uk-label-success impx-text-gold uk-text-bold">$'.$package_price_per_month.' for 30 Days</span>
							            <span class="uk-label uk-label-success impx-text-gold uk-text-bold">$'.$package_per_customer.' for Each Customer</span>

							            <span class="uk-label uk-label-success impx-text-gold uk-text-bold">'.$package_location.'</span>

										<p>'.$package_details.'</p>
										<div class="button_membership" align="center">
											<a href="fill_membership_form.php?'.$str.'='.$package_id.'"  rel="nofollow noopener">Fill Membership Form</a>
										</div>
							        </div>
						        </div>
							</li>';
					}	//end while
								echo '</ul>';
			}//end num rows 	
					
		?>

					</div>
				</div>



			</div>
		</div>
<?php

	include 'includes/footer.php';
?>