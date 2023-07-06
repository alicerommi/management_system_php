<?php 
include 'includes/session_check.php';
include 'includes/database_connection.php'; ?>
<?php 
if(isset($_GET['ins_id'])){
    $id = $_GET['ins_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
</head>
<body>
    <!-- Preloader -->
      
    <div id="wrapper">
        <!-- Navigation -->
           <?php 
            include 'includes/navigation_header.php'; ?>
     
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">All Learners</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            
                            <li><a href="Instructors.php">Learners</a></li>
                            <li class="active">View All Learners</li>
                        </ol>
                    </div>
                </div>

                <div class="row"></div>


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