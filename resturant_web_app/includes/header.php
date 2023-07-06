<?php
	session_start();
	include 'database_connection.php';
	include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="format-detection" content="telephone=no" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Maxhypechannel</title>
        <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="57x57" href="assets/images/logos/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="assets/images/logos/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="assets/images/logos/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="assets/images/logos/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="assets/images/logos/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="assets/images/logos/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="assets/images/logos/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="assets/images/logos/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="assets/images/logos/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="assets/images/logos/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="assets/images/logos/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/images/logos/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="assets/images/logos/favicon-16x16.png">
		<link rel="manifest" href="assets/images/logos/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
        <!-- Google Fonts -->
       	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">
       	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&amp;subset=latin-ext" rel="stylesheet"> -->
       	 <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/uikit.min.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/tiny-date-picker.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/custom.css" />
        <link rel="stylesheet" href="assets/css/media-query.css" />
    </head>
    	


    <body class="impx-body" id="top" >
    	

    	<!-- HEADER -->
		<header id="impx-header">
			<div>
				<?php
					$page_name = basename($_SERVER['PHP_SELF']);
					if($page_name=="index.php"){
						echo '<div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">';
					}else if($page_name=="pub_details.php"){
						echo '<div class="impx-menu-wrapper style2 resto" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">';
					}
					else{
						echo '<div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-page-heading; animation: uk-animation-slide-top">';

					}
				?>
					<!-- Mobile Nav Start -->
					<div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
				        <div class="uk-offcanvas-bar">

				            <ul class="uk-nav uk-nav-default">

				                <li class="uk-parent"><a href="index.php">Home</a></li>
				                <li><a href="track_bookings.php">Track Booking</a></li>
				                <li class="uk-parent">
						        	<a href="#" class="uk-navbar-nav-subtitle">Our Services</a>
						        	<ul class="uk-nav-sub">
				                		<li><a href="all_resturants.php">Restaurants </a></li>
										<li><a href="all_clubs_pubs.php">Clubs & Pubs</a></li>
										<li><a href="all_limousines.php">Limousines</a></li>
				                	</ul>
				                </li>
				                <li><a href="about_us.php">About Us</a></li>
				                <li><a href="contact_us.php">Contact</a></li>
				                <li><a href="membership.php"> Get Membership</a></li>
				                
				            </ul>
				        </div>
				    </div>
				    <a href="#mobile-nav" id = "menu_mobile" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav" data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i> Menu</a>
		            <!-- Mobile Nav End -->
		            <!-- Top Header -->
					<div class="impx-top-header style2"> 
						<div class="uk-container uk-container-expand">
							<div class="uk-grid">
								<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
								</div>
								
								<?php
							
								if(!isset($_SESSION['customer_session_key'])){
									
										echo '	
										<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
											<div class="impx-top-social">
												<ul>
													<li><a href="customer_login.php" title="Get Registered"><i class="fa fa-user-plus"></i> Register</a></li>
													<li><a href="customer_login.php" title="Customer Login"><i class="fa fa-sign-in"> </i> Login</a></li>
													
												</ul>
											</div>
										</div>';
								}else{
										$customer_id = $_SESSION['customer_id'];
										$check_customer_details = mysqli_query($conn,"select* from customers where customer_id = $customer_id");
										$row = mysqli_fetch_array($check_customer_details);
										$customer_block = $row['customer_block'];
										$customer_full_name = $row['customer_full_name'];
											echo '<input type="hidden" value="'.$customer_block.'" id="customer_block">';
										echo '	
										<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
											<div class="impx-top-social">
												<ul>
													<li><a href="customer_dashboard.php" title="'.$customer_full_name.'"><i class="fa fa-user"></i></a></li>
													<li><a href="logout_customer.php" title="Logout Now"><i class="fa fa-sign-out"> </i> Logout</a></li>
													
												</ul>
											</div>
										</div>';
								}

								?>



								
							</div>

						</div>
					</div>
					<!-- Top Header End -->


					<div class="uk-container uk-container-expand">
						<div data-uk-grid>

							<!-- Header Logo -->
							<div class="uk-width-auto">
								<div class="impx-logo">
									<a href="index.php"><img src="assets/images/logo3.png" class="" alt="Logo"></a>
								</div>
							</div>
							<!-- Header Logo End-->

							<!-- Header Navigation -->
							<div class="uk-width-expand uk-position-relative">								
								<nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m" data-uk-navbar>
									<div class="uk-navbar-right impx-navbar-right">
	        							<ul class="uk-navbar-nav impx-nav style2">
											<!-- Navigation Items -->
									    	<li class="uk-parent uk-active">
								    			<a href="index.php" class="uk-navbar-nav-subtitle"><div>Home
								    				<div class="uk-navbar-subtitle">Welcome</div></div>

								    			</a>
									    		
									    	</li>
									    	<li>
									        	<a href="track_bookings.php" class="uk-navbar-nav-subtitle"><div>Track Booking<div class="uk-navbar-subtitle">Our Best Suites</div></div></a>
										
									        </li>
									        <li class="uk-parent">
								    			<a href="#" class="uk-navbar-nav-subtitle"><div>Want To Book?<div class="uk-navbar-subtitle">Our Services</div></div></a>
									    		<div class="uk-navbar-dropdown">
	                								<ul class="uk-nav uk-navbar-dropdown-nav">
														<li><a href="all_resturants.php">Restaurants </a></li>
														<li><a href="all_clubs_pubs.php">Clubs & Pubs</a></li>
														<li><a href="all_limousines.php">Limousines</a></li>
														
													</ul>
												</div>
									    	</li>
											<li><a href="membership.php" class="uk-navbar-nav-subtitle"><div>Membership<div class="uk-navbar-subtitle">Get Membership</div></div></a></li>
											<li><a href="about_us.php" class="uk-navbar-nav-subtitle"><div>About Us<div class="uk-navbar-subtitle">who We Are?</div></div></a></li>
									        <li><a href="contact_us.php" class="uk-navbar-nav-subtitle"><div>Contact<div class="uk-navbar-subtitle">Get in Touch</div></div></a></li>

									    </ul>
									    <!-- Navigation Items End -->
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			<!-- </div> -->
		</header>
		<!-- HEADER END -->
		<div id="preloader"></div>