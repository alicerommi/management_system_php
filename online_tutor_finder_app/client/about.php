<?php
include("../common_client/master.php");
include '../includes/database_connection.php';
?>
<html lang="en">

  <head>
    <title>Online Tutor Finder</title>
    <!--SEO Meta Tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tron Bootstrap based UI Kit, flat, modern front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="8 Guild">
    <!-- Favicons -->
    <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Page specific CSS -->
    <link href="../common_client/assets/css/administrator.css" rel="stylesheet">

   
  </head>

  <!-- Body -->

  <body>
    
    <!-- Header -->
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
		 <!--   <div class="navbar-left ">
            <a href="index.php" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
          </div> -->
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
           <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
          <li><a href="tutor-registeration.php">Tutor Registeration Form</a></li>
                  <li class="divider"></li>
                <li><a href="student-registeration.php">Student Registeration Form</a></li>
              </ul>
            </li>

            <li ><a href="tutor_profiles.php">Tutor Profiles</a></li>

             <li class="active"><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>

		
        </nav>
      </div>
    </header><!-- Header Close-->
    <!-- Container -->
    <section class="container">
   
      <!-- Block Header -->
      <div class="page-header text-center">
        <h2>Mission Statement</h2>
      </div><!-- Block Header End -->
      
      <!-- Content -->
      <div class="row space-top">
       <div class = "row">
	 
<div class="col-md-10">

<h2 class="block-heading"><strong>How Does This Work?</strong></h2>
</div> 
</div>

<h3 class="block-heading">1. START YOUR SEARCH</h3>
 <blockquote>
    <p class="text-justify">
	Start searching for the best tutor based on your course need. You will immediately see the best matching tutor. Sign up as a student and connect with the tutor instantly. Need help with your searching? Post your request and we’ll have tutors contact you very soon!
	<br />
</p>
</blockquote>
<h3 class="block-heading">2. CHOOSE DESIRED TUTOR</h3>
<blockquote>
 <p class="text-justify">
Before learning from tutors, you must have some credits in your own account. Check all the available packages and have the best one for you. Need some free trial or demo live class to check teaching quality? Contact us soon.
	</p>
   
  </blockquote>

   <h3 class="block-heading">3. SCHEDULE</h3>
    <blockquote>
     <p class="text-justify">
    Communicate directly with tutors to find a time that works for you. Whether you need a single time slot/ monthlong pre-scheduled hours/ full course completion/ homework assignment solution, anything and everything you can get by mutual agreement with your tutor. Talk details about your learning and appropriate budget before connecting in live class.
      </p>
       
      </blockquote>


      <h3 class="block-heading">4. START LEARNING</h3>
    <blockquote>
     <p class="text-justify">
  One-on-one instruction through live video, free hand drawing, file sharing, live discussing each tine part, is the most effective way to learn. Until you are fully satisfied, your payments are secured and will not be sent to tutor account. Even you can request Admin to handle some circumstances. So, start your learning and let us handle payments and administrative details.
      </p>
       
      </blockquote>
  
  
  <hr/>
  
  </div>
      </div>

      <!-- Block Header -->
      <div class="page-header text-center">
        <h2>Administrators <small>People who take Decision</small></h2>
      </div><!-- Block Header End -->
      <div class="row">
	 <?php $query ="SELECT * FROM `admin`";
				 $res = mysqli_query($conn,$query);
					 while($rows = mysqli_fetch_array($res)){ 
				 ?>											
         <div class="col-sm-4">
          <div class="thumbnail with-caption">
		  <?php 
					echo "<img src='uploads/adminA.jpg' width='100px' height='50px' alt='".$rows['admin_name']."' >";
						
		  ?>
           
            <div class="caption">
					 <h4 class="text-uppercase"><?php echo $rows['admin_name']; ?></h4>
              <span class="text-muted text-uppercase">Administrator</span>
              
              <div class="social-buttons">
                <a href="#" class="social-btn sb-twitter sb-sm"><i class="fa fa-twitter"></i></a>
                <a href="#" class="social-btn sb-google-plus sb-sm"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social-btn sb-facebook sb-sm"><i class="fa fa-facebook"></i></a>
              </div>
            </div>
          </div>
        </div>
		<?php
					 }
		?>
       
       
      </div><!-- Content End -->

    </section><!-- Container End -->

    <?php include("../common_client/footer.php");?>

  </body><!-- Body End -->
</html>