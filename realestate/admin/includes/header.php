<?php
    include 'session_check.php';
    include '../includes/database_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"> -->
     <title>FRANCHINO Negocios Inmobiliarios Admin Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet"> -->
    <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" /> -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">

    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.10/css/lightgallery.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">
      <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">

    <script src="js/lib/jquery/jquery.min.js"></script>
      <style type="text/css" href="dropzone/css/dropzone.css"></style>
  <script type="text/javascript" src="dropzone/js/dropzone.js"> </script>

</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <h3>FRANCHINO</h3>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="includes/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li><a class="" href="index.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li class="nav-label">Features</li>

                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu"> Proyectos</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="view-projects.php">View All Project</a></li>
                                <li><a href="add-project.php">Add A Project</a></li>

                            </ul>
                        </li>

                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Propiedades</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="view-properties.php">View All Properties</a></li>
                                <li><a href="add-property.php">Add a Property</a></li>
                            </ul>
                        </li>



                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope" aria-hidden="true"></i><span class="hide-menu">Mensajes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                 <li><a href="view-readmessages.php">View Read Messages</a></li>
                                  <li><a href="view-unreadmessages.php">View Unread Messages</a></li>
                                <li><a href="view-messages.php">View All Messages</a></li>
                            </ul>
                        </li>

                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-gear" aria-hidden="true"></i><span class="hide-menu">Ajustes De Pagina</span></a>
                            <ul aria-expanded="false" class="collapse">
                              <!--   <li><a href="add-slider-images.php">Add Images For Slider</a></li> -->
                                <li><a href="add-sociallinks.php">Add Social Links</a></li>
                                <li><a href="add-footer-text.php">Add Footer Links</a></li>
                                <!-- <li><a href="home-page-paragraph.php">Home Page Paragraph</a></li> -->

                            </ul>
                        </li>

                        <!--  <li><a class="" href="profile.php"><i class="fa fa-user"></i>Admin Profile</a></li> -->
                        <li><a class="" href="includes/logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
