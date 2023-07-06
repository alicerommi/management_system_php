<?php 
include 'includes/session_check.php';
include 'includes/database_connection.php';
if(isset($_GET['ins_id'])){
  $ins_id = $_GET['ins_id'];
}else{
  echo "Unknown Parameters";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
           <?php 
            include 'includes/navigation_header.php'; ?>
        <!-- Left navbar-header end -->
          <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Instructor Packages</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="instructors.php">Instructors</a></li>
                            <li class="active">Instructor Packages</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                  <?php //get the packages which has made by the instructor 
                    $query = mysqli_query($conn,"SELECT* FROM packages WHERE ins_id=$ins_id");
                    $count = 0;
                    while($pRow = mysqli_fetch_array($query)){
                      $count++;
                    $package_id = $pRow['package_id'];
                    $package_name = $pRow['package_name'];
                    $package_type = $pRow['package_type'];
                    $package_days = $pRow['package_days'];
                    $package_durationHours = $pRow['package_durationHours'];
                    $package_amount = $pRow['package_amount'];
                    $package_description = $pRow['package_description'];
                    $recordDate = date('d-m-Y',strtotime($pRow['recordDate']));
                  ?>
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                             <div class="box-title"><?php echo "Package#".$count. " Details";?><hr/></div>
                            <div class="user-btm-box">
                                 <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Name</strong>
                                        <p><?php echo ucwords($package_name); ?></p>
                                    </div>
                                     <div class="col-md-6 b-r"><strong>Added Date</strong>
                                        <p><?php echo $recordDate; ?></p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Type</strong>
                                        <p><?php if($package_type==1) echo "Basic"; else if($package_type==2) echo "Standard"; else if($package_type==3) echo "Premium"; ?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Days</strong>
                                        <p><?php echo $package_days; ?></p>
                                    </div>
                                </div>
                                
                                <hr>
                               
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Hours</strong>
                                        <p><?php echo $package_durationHours; ?></p>
                                    </div>
                                    <div class="col-md-6"><strong>Price</strong>
                                        <p><?php echo "$".$package_amount; ?></p>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Description</strong>
                                        <p><?php echo $package_description; ?></p>
                                    </div>
                                </div>
                                <hr>                         
                            </div>
                        </div>
                    </div>
                    <?php
                  }//end while loop here
                  ?>
                  </div>
                <!-- /.right-sidebar -->
            </div>
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