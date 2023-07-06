<?php
include '../includes/database_connection.php';
include 'session_check.php';
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
    <title>Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.4.1.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/datatable.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

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
                        <!-- Logo icon -->
                        <!-- <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b> -->
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <h2>LOGO</h2>
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
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
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


                        <!-- <li> <a class="" href="dashboard.php"><i class="fa fa-tasks"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
 -->
 <li> <a  href="index.php" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">Dashboard</span></a>

                        <li> <a class="" href="categories.php"><i class="fa fa-tasks"></i><span class="hide-menu">Categories</span></a>
                        </li>
                        <li> <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-align-justify"></i><span class="hide-menu">Food Items</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-items.php">Add Items</a></li>
                                <li><a href="view-items.php">View items</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Diet Plans</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-plan.php">Add A Diet Plan</a></li>
                                <li><a href="view-plans.php">View Diet Plans</a></li>
                            </ul>
                        </li>

                        <!--  <li> <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-circle"></i><span class="hide-menu">Plan Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-plandetail.php">Add Plan Details</a></li>
                                <li><a href="view-plandetails.php">View All Plans Details</a></li>
                            </ul>
                        </li> -->

                            <li> <a class="has-arrow " href="#" aria-expanded="false"><i class="fa fa-filter"></i><span class="hide-menu">Plan Items Status</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add-planfilter.php">Add Item Status</a></li>
                              <!--   <li><a href="view-planfilters.php">View  All Plan Filters</a></li> -->
                            </ul>
                        </li>


                         <li> <a  href="messages.php" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">User Messages</span></a>

                        </li>


                         <li><a href="includes/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>



                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
