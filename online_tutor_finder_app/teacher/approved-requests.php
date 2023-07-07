<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
?>
                    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12" style="
    margin-top: -11px;
">
                                <h4 class="pull-left page-title">View All The Approved Requests Of Students</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Request Container</a></li>
                                    <li class="active">Approved Requests</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      <div class="row">
                          
                              <div class="panel panel-default panel-fill">

                             <div class="panel-heading"> 
                                                <h3 class="panel-title">All Approved Requests</h3> 
                                </div>

                                   <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th> Student ID</th>
                                                            <th>Student Name</th>
                                                            <th>Student Email</th>
                                                            <th>Student Address</th>
                                                              <th>Request Date</th>
                                                              <th>Request Actions</th>
                                                        </tr>
                                                </thead>
                                            <tbody >
                                                    <?php
                                                    //get the student requests 
                                                     $query = mysqli_query($conn,"SELECT * FROM `teacher` where teacher_email='$teacher_email'");
                                                
                                                  $row=mysqli_fetch_array($query);
                                                    $TID= $row['teacher_id'];
                                                        $teacher_email = $_SESSION['teacher_email'];
                                                          $query = mysqli_query($conn,"SELECT std.*,tea.*, std_req.* from student std,teacher tea,student_request std_req where std_req.srequest_tea_id = tea.teacher_id AND std_req.`srequest_std_id` = std.student_id AND tea.teacher_id=3 and std_req.srequest_status=1");
                                                          while($row = mysqli_fetch_array($query)){
                                                            $student_id = $row['student_id'];
                                                            $student_name = $row['student_name'];
                                                            $student_email= $row['student_email'];
                                                            $student_address= $row['student_address'];
                                                            $srequest_recordDate = date("d-m-Y",strtotime($row['srequest_recordDate']));
                                                            $srequest_id = $row['srequest_id'];
                                                            $srequest_status = $row['srequest_status'];
                                                           if($srequest_status==1){
                                                                $lastButtons = '<td><button class="btn btn-purple" readonly><i class="fa fa-check"></i>Accepted</button></td>';
                                                            }
                                                            
                                                echo '<tr>
                                                        <td>'.$student_id.'</td>
                                                        <td>'.$student_name.'</td>
                                                        <td>'.$student_email.'</td>
                                                        <td>'.$student_address.'</td>
                                                        <td>'.$srequest_recordDate.'</td>
                                                        '.$lastButtons.'
                                                </tr>';
                                                
                                                }?>


                                            </tbody>

                                        </table>
                                         </div>
                                         </div>
                                         </div>







                      </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
<?php
    include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>
