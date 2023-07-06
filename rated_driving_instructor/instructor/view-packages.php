<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php';
$query = mysqli_query($conn,"SELECT* FROM `instructor` WHERE `email`='$ins_email'");
$row = mysqli_fetch_array($query);
$instructorID = $row['id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
<link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">My Lession Packages</a></li>
                            <li class="active">View My Packages</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <?php if(isset($_GET['delStatus'])) {
                                    if($_GET['delStatus']==1){
                                        echo '<div class="alert alert-success">The Package Has Been Deleted Successfully</div>';
                                    }else if($_GET['delStatus']==0){
                                          echo '<div class="alert alert-warning">Error in Deletion Package</div>';
                                    }   
                            }
                            ?>
                              <div class="table-responsive">
                                <div id="example23_wrapper" class="dataTables_wrapper">
                                  <table id="allrequests" class="display nowrap dataTable" cellspacing="0" width="100%"  style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th > Name</th>
                                             <th > Type</th>
                                             <th>Number Of Days</th>
                                              <th > Duration In Hours</th>
                                             <th > Amount In USD</th>
                                               <th > Added Date</th>
                                               <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //here we will shwo the all packages of instructor.. 
                                            $query = "SELECT* FROM `packages` WHERE ins_id=$instructorID";
                                            $result = mysqli_query($conn,$query);
                                            if(mysqli_num_rows($result)>0){
                                                while($record = mysqli_fetch_array($result)){
                                                        $packageID = $record['package_id'];
                                                        //`package_name`, `package_type`, `package_durationHours`, `package_amount`, `package_description`
                                                        $package_name = $record['package_name'];
                                                        $package_type = $record['package_type'];
                                                        $package_days = $record['package_days'];
                                                        if($package_type==1){
                                                            $package_type = "Basic";
                                                        }else if($package_type=="2"){
                                                            $package_type = "Standard";
                                                        }else
                                                            $package_type = "Premium";
                                                        $package_durationHours = $record['package_durationHours'];
                                                        $package_amount = $record['package_amount'];
                                                        $packagerecordDate = $record['recordDate'];
                                                     echo '<tr>
                                                        <td>'.ucwords($package_name).'</td>
                                                        <td>'.$package_type.'</td>
                                                        <td>'.$package_days.'</td>
                                                        <td>'.$package_durationHours.'</td>
                                                        <td>'.$package_amount.'</td>
                                                        <td>'.$packagerecordDate.'</td>
                                                        <td><a href="edit-package.php?package_id='.$packageID.'" class="text-inverse p-r-10 edit" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="ti-marker-alt"></i></a> 
                                            </td>
                                                     </tr>'; 

                                                     //<a href="actions/delete.php?package_id='.$packageID.'"  class="text-inverse delete" title="" data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>            
                                   }//end the while loop condition here
                                            }//end num_rows condition here
                                ?>

                                    </tbody>
                                </table>

                                </div>
                            </div>      


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
 <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(document).ready(function() {
    $('#allrequests').DataTable();
    responsive: true;
} );
</script>