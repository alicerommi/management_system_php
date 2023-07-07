<?php
include("../common_client/master.php");
?>

<head>

	  <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="../assets_client/engine1/style.css" />
    <script type="text/javascript" src="../assets_client/engine1/jquery.js"></script>
</head>

<header class="navbar navbar-fixed-top navbar-centered-nav tron-nav-demo-page">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".tron-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <!--
          <a href="index.html" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
		  -->
		  <!--  <div class="navbar-left ">
            <a href="index.php" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
          </div> -->
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <!-- <li><a href="matches.php">Match Schedules</a></li> -->
						<!--
						<li><a href="#">Winning Match Details</a></li>
						<li><a href="#">Upcoming Match List</a></li>
						-->
					
						<!-- <li><a href="groundbooking.php">Ground Booking</a></li> -->
						<li><a href="tutor-registeration.php">Tutor Registeration Form</a></li>
              <li class="divider"></li>
            <li><a href="student-registeration.php">Student Registeration Form</a></li>
					<!-- 	<li><a href="calculator.php">Use DL Calculator</a></li> -->
              </ul>
            </li>
            <li ><a href="tutor_profiles.php">Tutor Profiles</a></li>
         
					 <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
			
        </nav>
      </div>
    </header><!-- Header Close-->
	<body>
	
		 <!-- for slider -->
  <script type="text/javascript" src="../assets_client/engine1/wowslider.js"></script> 
  <script type="text/javascript" src="../assets_client/engine1/script.js"></script>
<section class="demo-page padding-bottom-2x">
<div class="container">
	<h2 class="w3-wide w3-center">Welcome to Online Tutor Finder Web Application</h2>
	<h3 class="block-heading"></h3>
	


 <div id="wowslider-container1">
    <div class="ws_images">
      <ul>
        <li>
          <img src="../assets_client/data1/images/img1.jpg" alt="" title="" id="wows1_0" />
			<div class="carousel-caption">
			
			</div>
	   </li>
        <li>
          <img src="../assets_client/data1/images/img2.jpg" alt="img2" title="img2" id="wows1_1" />
        </li>
        <li>
          <img src="../assets_client/data1/images/img3.jpg" alt="img3" title="img3" id="wows1_2" />
        </li>
        <li>
          <img src="../assets_client/data1/images/img4.jpg" alt="cssslider" title="" id="wows1_3" />
        </li>
        <li>
          <img src="../assets_client/data1/images/img5.jpg" alt="" title="" id="wows1_4" />
        </li>
      </ul>
    </div>
    <div class="ws_bullets">
      <div>
      <a href="#" title="">
        <span>
        <img src="../assets_client/data1/tooltips/img1.jpg" alt="" />1</span>
      </a> 
      <a href="#" title="img2">
        <span>
        <img src="../assets_client/data1/tooltips/img2.jpg" alt="img2" />2</span>
      </a> 
      <a href="#" title="img3">
        <span>
        <img src="../assets_client/data1/tooltips/img3.jpg" alt="img3" />3</span>
      </a> 
      <a href="#" title="">
        <span>
        <img src="../assets_client/data1/tooltips/img4.jpg" alt="" />4</span>
      </a> 
      <a href="#" title="">
        <span>
        <img src="../assets_client/data1/tooltips/img5.jpg" alt="" />5</span>
      </a></div>
    </div>
    <div class="clearfix">
      <div class="ws_shadow"></div>
    </div>
   </div>
   <span > </span>
<br/>
</section>	



<?php


 include("../common_client/footer.php");?>


