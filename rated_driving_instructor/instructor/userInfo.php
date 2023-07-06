<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';
if(isset($_GET['userID'])){
    $userID = $_GET['userID'];
}
?>
</head>
<body>
     <!-- Preloader -->
      <!-- <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>  -->
    <div id="wrapper">
        <!-- Left navbar-header -->
             <?php include 'includes/navigation_header.php'; ?>  
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <?php
                            $query  =  "SELECT* FROM `users` WHERE id=$userID";
                            $result  =  mysqli_query($conn,$query);
                            $record = mysqli_fetch_array($result);
                            $username = $record['username'];
                        ?>
                        <h4 class="page-title">Profile Of <?php echo ucwords($username); ?></h4> 
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                             <li><a href="allBookingRequests.php">Booking Requests</a></li>
                            <li class="active">User Profile</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            
                        <!-- show the user details here -->
                  <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                           <!--  <div class="user-bg"> 
                                <img width="100%" alt="user" src="../plugins/images/big/d2.jpg">
                            </div> -->
                            <div class="user-btm-box">
                                <!-- .row -->
                                    <?php 
                                        $query = "SELECT* FROM users WHERE id=$userID";
                                        $result = mysqli_query($conn,$query);
                                        $row = mysqli_fetch_array($result);
                                        $userName = $row['username'];
                                        $joiningDate = $row['date'];
                                        $address = $row['address'];
                                    ?>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>User Name</strong>
                                        <p><?php echo ucwords($userName);?></p>
                                    </div>
                                 
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Member Since</strong>
                                        <p><?php
                                        //date('F j, Y',strtotime($joiningDate))
                                        echo date('F, Y',strtotime($joiningDate));
                                        ?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Phone</strong>
                                        <p><?php echo "Not added yet"; ?></p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Address</strong>
                                        <p><?php echo ucwords($address);?>

                                    </div>
                                </div>
                                <hr>

                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><!-- <strong>Message Me</strong> -->
                                        <p>
                                        <?php  
                                            echo '<a href="chat.php?userID='.$userID.'" class ="btn btn-success">Message Me</a>';
                                        ?>
                                        </p>
                                            
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <!-- .tabs -->
                            <ul class="nav nav-tabs tabs customtab">
                                <li class="active tab">
                                    <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#biography" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Biography</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#update" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Update Details</span> </a>
                                </li>
                            </ul>
                            <!-- /.tabs -->
                          
                </div>
                  </div>
                    </div>


                <!-- /.right-sidebar -->
            </div>
           <?php include('includes/footerText.php'); ?>
        </div>     



        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
           <?php include 'includes/footer_links.php'; ?>
   
</body>

</html>