<?php
            include 'actions/session_check.php';
            include 'database_connection.php';
            include 'alert_messages.php';
            include 'functions.php';
            $company_name = "GBH2";
?>
<!-- Developed By: http://binary6.pk/ 
  Email: rehman@binary6.com
  Mobile Number: +92335 6050509
  Mobile Number: +92331 8207979
-->
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title><?= $company_name; ?> - Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?= $company_name; ?>" name="description" />
        <meta content="<?= $company_name; ?>" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- <link rel="shortcut icon" href="assets/images/favicon_1.png"> -->
        <!--  <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png" /> -->
            <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
            <link rel="manifest" href="assets/images/site.webmanifest">
           <!-- ION Slider -->
        <link href="assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/ion-rangeslider/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css">

          <!--bootstrap-wysihtml5-->
        <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
        <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
         <!--venobox lightbox-->
        <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css">
            <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
          <link href="assets/plugins/colorpicker/colorpicker.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/jquery-multi-select/multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/select2/dist/css/select2-bootstrap.css" rel="stylesheet" type="text/css">
  
          <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
         <!-- Plugins css -->
        <link href="assets/plugins/notifications/notification.css" rel="stylesheet">

        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <?php
                                          //getting the admin info
                                                 $admin_email = $_SESSION['automobiles_adminSession'];
                                             $AdminQuery = mysqli_query($conn,"select* from admin where admin_email='$admin_email'");
                                              $row = mysqli_fetch_array($AdminQuery);
                                            $admin_name = ucwords($row['admin_name']);
                                            $admin_id = $row['admin_id'];
                                            $admin_pic = $row['admin_image'];
                                            if(strlen($admin_pic)==0){
                                                            $admin_pic = "assets/images/users/dummy.png";
                                            }else {
                                                          $admin_pic = "assets/images/users/".$admin_pic;
                                            }
                                            $admin_email = $row['admin_email'];
    ?>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.php" class="logo"><span><?= $company_name; ?></span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                       

                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?php echo $admin_pic; ?>" alt="Administrator Picture" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $admin_name; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="admin_profile.php"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    <li><a href="includes/logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                          
                             <li>
                                <a href="vehicle_types.php" class="waves-effect"><i class="fa fa-car"></i><span>Vehicle Types</span></a>
                            </li>

                            <li>
                                <a href="add_manufacture.php" class="waves-effect"><i class="fa fa-bars"></i><span>Vehicle Manufacture</span></a>
                            </li>
                            
                             <li>
                                <a href="add_model.php" class="waves-effect"><i class="md md-now-widgets"></i><span>Vehicle Models</span></a>
                            </li>

                         
                            <?php
                                $query = mysqli_query($conn,"select* from vehicle_types");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicle_type_id = $row['vehicle_type_id'];
                                                                    $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                   echo ' <li>
                                <a href="filter_applier.php?vehicle_type_id='.$vehicle_type_id.'&vehicle_type_name='.$vehicle_type_name.'" class="waves-effect"><i class="md md-filter-list"></i><span>Filters for '.ucwords($vehicle_type_name).'</span></a>
                                </li>';
                                                                }
                            ?>
                           



                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Customers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="add_a_user.php">Add New User</a></li>
                                     <li><a href="all_users.php">All Users</a></li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="includes/logout.php" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                            </li>
                          
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>