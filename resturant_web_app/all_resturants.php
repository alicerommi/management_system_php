<?php
	include 'includes/header.php';
?>

		<!-- PAGE HEADING -->
		<div class="impx-page-heading uk-position-relative about">
			<div class="impx-overlay dark"></div>
			<div class="uk-container">
				<div class="uk-width-1-1">
					<div class="uk-flex uk-flex-left">
						<div class="uk-light uk-position-relative uk-text-left page-title">
							<h1 class="uk-margin-remove">All Restaurants </h1><!-- page title -->
							<!-- page subtitle -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- PAGE HEADING END -->

		<div class="uk-padding">
			<div class="uk-container">
				<div class="uk-flex uk-flex-center uk-margin-medium-bottom impx-rooms-intro">
					<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-1-1@m uk-width-1-1@s uk-text-center"><!-- intro -->
						<h2 class="uk-margin-remove-top uk-margin-small-bottom">Search A Resturant</h2>
						<form>
								<div class="form-group">
										<input class="uk-input booking-email uk-border-rounded uk-width-1-1" type="text" placeholder="Enter City Name" required>
								</div>
						    	<div class="form-group" style="margin-top: 10px;">
						      			  <button type="submit" class="uk-button impx-button impx-button-rounded green uk-margin-small-bottom">Search</button>
						   		 </div>
						   
						</form>
					</div><!-- intro end -->
				</div>
				<div data-uk-grid="" class="uk-grid">
				<div class="uk-width-3-3@xl uk-width-3-3@l uk-width-3-3@m uk-width-1-1@s uk-margin-small-top uk-first-column">
						<div class="uk-position-relative uk-visible-toggle">
							<!-- Rooms List -->
					        <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-2@s data-uk-grid uk-grid-match uk-margin-large-bottom uk-grid" data-uk-grid="">
					            <li class="uk-first-column"><!-- room item #1 -->
					            	<div class="uk-card uk-card-default uk-card-medium">
							            <div class="uk-card-media-top uk-position-relative">
							                <img src="assets/images/rooms/room-1.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
							            <div class="uk-card-body impx-padding-medium">
							                <h4 class="uk-card-title uk-margin-remove-bottom">Resturant 1</h4>
								        	<span class="uk-label bg-color-aqua">from $50/night</span>
								            <ul class="uk-list room-fac">
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Beatus in maximarum timore</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Oculis Compensabatur</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Dolorisnos veriusque nihil</li>
											</ul>

											 <div class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
										        <a href="resturant_details.php" class="uk-button uk-button-text impx-text-aqua">Read more »</a>
										    </div>
							            </div>
							        </div>
								</li><!-- room item #1 end -->
								<li><!-- room item #2 -->
									<div class="uk-card uk-card-default">
							            <div class="uk-card-media-top uk-position-relative">
							                <img src="assets/images/rooms/room-2.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
							            <div class="uk-card-body impx-padding-medium">
							                <h4 class="uk-card-title uk-margin-remove-bottom">Resturant 2</h4>
								        	<span class="uk-label bg-color-aqua">from $80/night</span>
								            <ul class="uk-list room-fac">
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Beatus in maximarum timore</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Oculis Compensabatur</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Dolorisnos veriusque nihil</li>
											</ul>

											 <div class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
										        <a href="resturant_details.php" class="uk-button uk-button-text impx-text-aqua">Read more »</a>
										    </div>
							            </div>
							        </div>
								</li><!-- room item #2 end -->
								<li class="uk-grid-margin uk-first-column"><!-- room item #3 -->
									<div class="uk-card uk-card-default">
							            <div class="uk-card-media-top uk-position-relative">
							                <img src="assets/images/rooms/room-3.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
							            <div class="uk-card-body impx-padding-medium">
							                <h4 class="uk-card-title uk-margin-remove-bottom">Resturant 2</h4>
								        	<span class="uk-label bg-color-aqua">from $100/night</span>
								            <ul class="uk-list room-fac">
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Beatus in maximarum timore</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Oculis Compensabatur</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Dolorisnos veriusque nihil</li>
											</ul>

											 <div class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
										        <a href="resturant_details.php" class="uk-button uk-button-text impx-text-aqua">Read more »</a>
										    </div>
							            </div>
							        </div>
								</li><!-- room item #3 end -->
								<li class="uk-grid-margin"><!-- room item #4 -->
									<div class="uk-card uk-card-default">
							            <div class="uk-card-media-top uk-position-relative">
							                <img src="assets/images/rooms/room-4.jpg" alt="">
							                <div class="impx-overlay light overlay-squared padding-xwide"></div>
							            </div>
							            <div class="uk-card-body impx-padding-medium">
							                <h4 class="uk-card-title uk-margin-remove-bottom">Resturant 4</h4>
								        	<span class="uk-label bg-color-aqua">from $150/night</span>
								            <ul class="uk-list room-fac">
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Beatus in maximarum timore</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Oculis Compensabatur</li>
												<li><span class="impx-text-aqua uk-icon" data-uk-icon="icon: check; ratio: 1;"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="check"><polyline fill="none" stroke="#000" stroke-width="1.1" points="4,10 8,15 17,4"></polyline></svg></span> Dolorisnos veriusque nihil</li>
											</ul>

											 <div class="uk-card-footer uk-padding-remove-horizontal uk-padding-remove-bottom">
										        <a href="resturant_details.php" class="uk-button uk-button-text impx-text-aqua">Read more »</a>
										    </div>
							            </div>
							        </div>
								</li><!-- room item #4 end -->
					        </ul>
					        <!-- rooms list end -->
				        </div>

				      
					</div>

						
					

					</div>
				</div>
			</div>
		</div>
<?php
include 'includes/footer.php';
?>