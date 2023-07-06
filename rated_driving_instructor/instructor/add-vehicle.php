<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; 
  // if(isset($_GET['id'])){
    $query = mysqli_query($conn,"SELECT* FROM instructor WHERE email='$ins_email'");
    $row = mysqli_fetch_array($query);
    $ins_id = $row['id'];
  // }
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
                          <h4 class="page-title">Add Vehicles</h4>
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Add Vehicles</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
               
                    <div class="row">
                          <div class="col-md-4">
                             <div class="white-box"> 
                              <div class="box-title">Add A Vehicle</div> 
                                <?php //show the messages
                                    if(isset($_GET['status'])){
                                        if($_GET['status']==1){
                                          echo '<div class="alert alert-success">The Vehicle Has Been Added</div>';
                                        }else if($_GET['status']==0){
                                          echo '<div class="alert alert-danger">Error in Adding Vehicle</div>';
                                        }
                                    } 
                                ?>
                                    <form method="post" action = "actions/insert.php">
                                      <?php  echo '<input type="hidden" name="instructorID" value="'.$ins_id.'">'; ?>
                                        <div class="form-group">
                                            <label>Enter Vehicle Family</label> 
                                            <input type="text" maxlength="50" name="vFamily" class="form-control" required> 
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Vehicle Model</label> 
                                            <input type="text" maxlength="50" name="vModel" class="form-control" required> 
                                        </div>
                                         <div class="form-group">
                                            <label>Enter Vehicle Name</label> 
                                            <input type="text" maxlength="50" name="vName" class="form-control" required> 
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success" name="addVehicle" type="submit">Save</button>
                                        </div>
                                    </form>
                          </div>     
                      </div>     
                      <div class="col-md-8">

                                      <div class="white-box">
                                        <?php
                                              if(isset($_GET['delStatus'])){
                                                  if($_GET['delStatus']==1){
                                                    echo '<div class="alert alert-success">The Vehicle Has Been Deleted</div>';
                                                  }else if($_GET['delStatus']==0){
                                                      echo '<div class="alert alert-danger">Erro rin Deleting Vehicle</div>';
                                                  }
                                              }
                                        ?>
                                           <div class="table-responsive">
                                            <div id="example23_wrapper" class="dataTables_wrapper">
                                              <div id="allrequests_wrapper" class="dataTables_wrapper no-footer">
                                              <table id="allinstructorsVehicles" class="display nowrap dataTable no-footer" cellspacing="0" width="100%" style="width: 80%;" role="grid" aria-describedby="allrequests_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th >
                                                       V Family</th>
                                                        <th>
                                                            V Model
                                                        </th>
                                                        <th>
                                                            V Name
                                                        </th>
                                                        <th>
                                                              Date
                                                        </th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                    //show all the vehicles of instructors here 
                                                    $query1 = mysqli_query($conn,"SELECT* FROM instructor_vehicles WHERE ins_id=$ins_id");
                                                    if(mysqli_num_rows($query1)>0){
                                                      while($record = mysqli_fetch_array($query1)){
                                                          //SELECT `vehicle_id`, `ins_id`, `vehicle_family`, `vehicle_model`, `vehicle_name`, `recordDate` FROM `instructor_vehicles` WHERE 1
                                                          $vehicle_family = $record['vehicle_family'];
                                                          $vehicle_model = $record['vehicle_model'];
                                                          $vehicle_name = $record['vehicle_name'];
                                                          $vehicle_id = $record['vehicle_id'];
                                                          $recordDate = date('d-m-Y',strtotime($record['recordDate']));
                                                          echo '<tr>'.
                                                          '<td>'.$vehicle_family.'</td>'.
                                                          '<td>'.$vehicle_model.'</td>'.
                                                          '<td>'.$vehicle_name.'</td>'.
                                                          '<td>'.$recordDate.'</td>'.
                                                           '<td><a href="edit-vehicle.php?vehicle_id='.$vehicle_id.'" class="btn btn-info"><i class="fa fa-pencil fa-fw"></i></a>'." ".'<a href="actions/delete-vehicle.php?vehicle_id='.$vehicle_id.'" class="btn btn-danger"><i class="fa fa-trash"</i></a></td>'. 
                                                          '</tr>';
                                                      } //end while loop here 
                                                    }//end if condition here
                                                    //  
                                                  ?>
                                                </tbody>
                                                </table> 
                                </div>  
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