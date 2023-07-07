<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    $adminRow = mysqli_fetch_array($query);
    $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- <h4 class="pull-left page-title">Welcome !</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Our Students</a></li>
                                    <li class="active">All Students</li>
                                </ol>
                            </div>
                        </div>

                                          <div class="pull-right">
                                                <a href="add-student.php" class="btn btn-default"><i class="fa fa-plus"></i>Add A Student</a>
                                            </div>
                                
                                           <div class="col-md-12" style="    margin-top: 20px;">
                                           
                                        <div class="panel panel-default panel-fill">
                                             <?php
                                                if(isset($_GET['deleteStatus'])){
                                                        if($_GET['deleteStatus']==1){
                                                            echo '<div class="alert alert-success">The Dream Record Has been Successfully Deleted</div>';
                                                        }else if($_GET['deleteStatus']==0){
                                                                  echo '<div class="alert alert-danger">Error in Deletion Record</div>';
                                                        }   
                                                }
                                            ?>
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Students</h3> 
                                                
                                            </div> 
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                           
                                                            <th> Name</th>
                                                            <th>Email</th>
                                                              <th>Record Added Date</th>
                                                              <th>Account Status</th>
                                                              <th>Contact Number</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                </thead>
                                            <tbody >
                                               <?php 
                                                $query = mysqli_query($conn,"SELECT * FROM `student` WHERE student_accountStatus !=3");
                                                if(mysqli_num_rows($query)>0){
                                                  while($row=mysqli_fetch_array($query)){
                                                    $student_id= $row['student_id'];
                                                    $student_name = $row['student_name'];
                                                    $student_email = $row['student_email'];
                                                    $student_recordDate = date("d-m-Y",strtotime($row['student_recordDate']));
                                                    $student_accountStatus = $row['student_accountStatus'];
                                                    $student_contact = $row['student_contact'];
                                                    if($student_accountStatus==1)
                                                            $student_accountStatus = '<button class="btn btn-primary btn-rounded waves-effect waves-light">Accepted</div>';
                                                    else if($student_accountStatus==0){
                                                             $student_accountStatus = '<button class="btn btn-warning btn-rounded waves-effect waves-light">Rejected</div>';
                                                    }else if($student_accountStatus==2){
                                                        $student_accountStatus = '<button class="btn btn-warning btn-rounded waves-effect waves-light">Blocked</div>';
                                                    }else{
                                                      $student_accountStatus = '<button class="btn btn-danger btn-rounded waves-effect waves-light">Pending</div>';
                                                    }

                                                   // $row_recordDate = date("d-m-Y",strtotime($row['row_recordDate']));
                                                      echo '<tr>
                                                      <td>'.$student_name.'</td>
                                                        <td>'.$student_email.'</td>
                                                        <td>'.$student_recordDate.'</td>
                                                        <td>'.$student_accountStatus.'</td>
                                                         <td>'.$student_contact.'</td>

                                                        <td>
                                                        <a  class="btn btn-default" href="edit-student-info.php?SID='.$student_id.'"><i class="fa fa-edit"></i></a>
            
                                                    <a  class="btn btn-danger" href="actions/delete.php?SID='.$student_id.'"><i class="fa fa-trash"></i></a>
                                                    <a  class="btn btn-info" href="view-moreInfo.php?SID='.$student_id.'"><i class="fa fa-eye"></i></a>

                                                        </td>
                                                        </tr>';
                                                  }
                                                }
                                               ?> 
                                             
                                              



                                             </tbody>


                                             </table>   
                                         </div>
                                         </div>
                                         </div>
                                         </div>
                      

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?><script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>