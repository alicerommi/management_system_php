<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    $adminRow = mysqli_fetch_array($query);
    $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>
                   
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               <!--  <h4 class="pull-left page-title">Welcome !</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Our Teachers</a></li>
                                    <li class="active">All Teachers</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                             <div class="pull-right">
                                                <a href="add-teacher.php" class="btn btn-default"><i class="fa fa-plus"></i>Add A Teacher</a>
                                            </div>
                                
                                           <div class="col-md-12" style="    margin-top: 20px;">
                                           
                                        <div class="panel panel-default panel-fill">
                                             <?php
                                                if(isset($_GET['deleteStatus'])){
                                                        if($_GET['deleteStatus']==1){
                                                            echo '<div class="alert alert-danger">The Teacher Record Has been Successfully Deleted</div>';
                                                        }else if($_GET['deleteStatus']==0){
                                                                  echo '<div class="alert alert-warning">Error in Deletion Record</div>';
                                                        }   
                                                }
                                            ?>
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Teachers</h3> 
                                                
                                            </div> 
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                   <thead>
                                                            <tr>
                                                                <th> Name</th>
                                                                <th>Email</th>
                                                                  <th>Joining Date</th>
                                                                  <th>Account Status</th>
                                                                  <th>Contact Number</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                    </thead>
                                            <tbody>
                                               <?php 
                                                $query = mysqli_query($conn,"SELECT * FROM `teacher` where teacher_account_status!=0");
                                                if(mysqli_num_rows($query)>0){
                                                  while($row=mysqli_fetch_array($query)){
                                                    //SELECT `teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`, `teacher_recordDate` FROM `teacher` WHERE 1
                                                    $teacher_id= $row['teacher_id'];
                                                    $teacher_name = $row['teacher_name'];
                                                    $teacher_email = $row['teacher_email'];
                                                    $teacher_joining_date = date("d-m-Y",strtotime($row['teacher_joining_date']));
                                                    $teacher_account_status = $row['teacher_account_status'];
                                                    $teacher_contact = $row['teacher_contact'];
                                                    if($teacher_account_status==1)
                                                        $teacher_account_status = '<button class="btn btn-primary btn-rounded waves-effect waves-light">Active</div>';
                                                    else if($teacher_account_status==0){
                                                             $teacher_account_status = '<button class="btn btn-warning btn-rounded waves-effect waves-light">Pending</div>';
                                                    }else if($teacher_account_status==2) {
                                                         $teacher_account_status = '<button class="btn btn-danger btn-rounded waves-effect waves-light">Blocked</div>';
                                                    }else if($teacher_account_status==3){
                                                       $teacher_account_status = '<button class="btn btn-danger btn-rounded waves-effect waves-light">Rejected</div>';
                                                    }

                                                   // $row_recordDate = date("d-m-Y",strtotime($row['row_recordDate']));
                                                      echo '<tr>
                                                      <td>'.$teacher_name.'</td>
                                                        <td>'.$teacher_email.'</td>
                                                        <td>'.$teacher_joining_date.'</td>
                                                        <td>'.$teacher_account_status.'</td>
                                                         <td>'.$teacher_contact.'</td>

                                                        <td>
                                                        <a  class="btn btn-default" href="edit-teacher-info.php?TID='.$teacher_id.'"><i class="fa fa-edit"></i></a>
            
                                                    <a  class="btn btn-danger" href="actions/delete.php?TID='.$teacher_id.'"><i class="fa fa-trash"></i></a>
                                                    <a  class="btn btn-info" href="view_teacher_profile.php?TID='.$teacher_id.'"><i class="fa fa-eye"></i></a>

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
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>