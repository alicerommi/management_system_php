<?php 
  include 'check_session.php';
  ini_set('max_execution_time', 300); 
  include 'admin/includes/database_connection.php';
  include 'translations/he.php';
  // require_once ( 'includes/translation_api/vendor/autoload.php');
  // use \Statickidz\GoogleTranslate;
  //   $lang_obj = new GoogleTranslate();
  //         $source = 'en';
  //         $target = 'he';
     function to_english($str){
  return $str;
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title><?php echo $company_name; ?> - <?php echo to_hebrew("Sell or Buy Vehicles",$language_array); ?></title>
  <!--favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
    <!-- datatables for customer --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <!-- fontawesome --> 
 <!--  <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- swiper css -->
  <link rel="stylesheet" href="assets/css/swiper.min.css">
  <!-- fancyapp css -->
  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <!-- ui jquery css -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
  <!-- main css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/lightbox-dist/ekko-lightbox.css">
  <link rel="stylesheet" href="assets/css/custom.css?v=<?=rand(1,1000)?>">
 <!--  <link   rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.3/css/lightslider.min.css"></script> -->
</head>

<body>

  <!-- start header -->
  <header id="header">
    <nav class="navbar navbar-expand-lg" id="header-navbar">
      <div class="wrapper container">

        <button class="navbar-toggler hamburger" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <!-- <span class="icon-bar"><i class="icofont-navigation-menu"></i></span> -->
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
        </button>
        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mr-auto">
            <?php
                    $active_page = basename($_SERVER['PHP_SELF']);
            ?>

            <li class="nav-item <?php if ($active_page=="index.php") { echo "active"; } ?>">
              <a class="nav-link" href="index.php" data-scroll-nav="0"><span><?php echo  to_hebrew("Home",$language_array);?></span></a>
            </li>


             <li class="nav-item <?php if ($active_page=="about.php") { echo "active"; } ?>">
              <a class="nav-link" href="about.php" data-scroll-nav="1"><span><?php echo  to_hebrew("About",$language_array);?></span></a>
            </li>

            
         <!--    <li class="nav-item <?php if ($active_page=="blog.php") { echo "active"; } ?>">
              <a class="nav-link" href="blog.php" data-scroll-nav="2"><span><?php echo  to_hebrew("Blog",$language_array);?></span></a>
            </li>-->
           
      
       

          </ul>

          <ul class="navbar-nav navbar_top_buttons_nav">

            <li class="nav-item abc"  style="margin-right: 10px;">
              <a class="nav-link btn-nav" href="logout.php" title="<?php echo  to_hebrew("Logout",$language_array); ?>"><span> <?php  echo  to_hebrew("Logout",$language_array);  ?></span></a>
            </li> 

            <li class="nav-item abc" >
              <a class="nav-link btn-nav" href="customer_dashboard.php" title="<?php  echo  to_hebrew("My Profile",$language_array); ?>"><span><?php echo  to_hebrew("My Profile",$language_array);  ?> </span></a>
            </li>

          </ul>

          <!-- <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link btn-nav" href="#"><span>Button</span></a>
            </li>
            <li class="nav-item text-address">
              <p class="nav-link text-nav">
                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                <span class="text">
                  <span class="sub">Boston</span>
                  <span class="head">9 East ST.</span>
                </span>
              </p>
            </li>
            <li class="nav-item text-phone">
              <a href="#" class="nav-link text-nav">
                <span class="icon"><i class="fas fa-phone"></i></span>
                <span class="text">
                  <span class="sub">Call us today</span>
                  <span class="head">1800 123 000</span>
                </span>
              </a>
            </li>
          </ul> -->
        </div>
        <!-- Logo -->
        <a class="logo navbar-brand" href="index.php">
          <!-- <span>Auto</span>Mobile -->
          <img src="assets/images/logo.png" class="img-fluid" alt="<?= ucwords($company_name); ?>" title="<?= $company_name; ?>">
        </a>
      </div>
    </nav>
  </header>
  <!-- end header -->