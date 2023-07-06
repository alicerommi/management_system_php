<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; 
  if(isset($_GET['vehicle_id'])){
    $vehicle_id = $_GET['vehicle_id'];
   }
   $query = mysqli_query($conn,"SELECT* FROM instructor WHERE email='$ins_email'");
    $row = mysqli_fetch_array($query);
    $ins_id = $row['id'];
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
                          <h4 class="page-title">Edit Vehicle Information</h4>
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Edit Vehicle Details</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
               
                    <div class="row">
                          <div class="col-md-4">
                             <div class="white-box"> 
                              <div class="box-title">Edit Vehicle Details</div> 
                                <?php //show the messages
                                    if(isset($_GET['editInfo'])){
                                        if($_GET['editInfo']==1){
                                          echo '<div class="alert alert-success">The Vehicle Has Been Updated</div>';
                                        }else if($_GET['editInfo']==0){
                                          echo '<div class="alert alert-danger">Error in Editing Vehicle Information</div>';
                                        }
                                    } 
                                    //get the vehicle info
                                    $query2 = mysqli_query($conn,"SELECT* FROM `instructor_vehicles` WHERE `vehicle_id`=$vehicle_id");
                                    $row = mysqli_fetch_array($query2);
                                    $vehicle_family = $row['vehicle_family'];
                                     $vehicle_model = $row['vehicle_model'];
                                      $vehicle_name = $row['vehicle_name'];
                                ?>
                                    <form method="post" action="actions/updateInfo.php" >
                                      <?php  echo '<input type="hidden" name="vehicle_id" value="'.$vehicle_id.'">'; ?>
                                      <?php  echo '<input type="hidden" name="ins_id" value="'.$ins_id.'">'; ?>
                                        <div class="form-group">
                                            <label> Vehicle Family</label> 
                                            <input type="text" maxlength="50" name="vFamily" class="form-control" required value="<?php echo $vehicle_family; ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Vehicle Model</label> 
                                            <input type="text" maxlength="50" name="vModel" class="form-control" required value="<?php echo $vehicle_model ;?>"> 
                                        </div>
                                         <div class="form-group">
                                            <label> Vehicle Name</label> 
                                            <input type="text" maxlength="50" name="vName" class="form-control" required value="<?php echo $vehicle_name;?>"> 
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" name="editVehicle" type="submit">Save</button>
                                        </div>
                                    </form>
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
   <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script></body>
 <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(document).ready(function() {
    $('#allinstructorsVehicles').DataTable();
    responsive: true;
} );
</script>
</body>

</html>