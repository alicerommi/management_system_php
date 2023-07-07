<?php
    if(isset($_GET['SID'])){
            $SID = intval($_GET['SID']);
    }else{
        echo 'Invalid Paramters';
        die;
    }
    include 'includes/header.php';
    include 'includes/left_nav.php';
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
                                    <li class="active">Edit Teacher Info</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      
                              <div class="pull-right" >
                                                        <a href="all-students.php" class="btn btn-default" style="margin-top: 12px;"><i class="fa fa-eye"></i>Back To Students List</a>
                                </div>
                        <div class="row">
                                
                                        <div class="panel panel-default">
                                            <h4 class="panel-heading">Edit Student Details</h4>
                                            <div class="panel-body">
                                                <?php
                                                if(isset($_GET['updateStatus'])){
                                                    if($_GET['updateStatus']==1){
                                                        echo '<div class="alert alert-success">The Student Details Has Been Updated</div>';
                                                    }else if($_GET['updateStatus']==0){
                                                         echo '<div class="alert alert-warning">Error In Updating Details</div>';
                                                    }
                                                }
                                               
                                                ?>
                                                 <div class="col-md-6">
                                                        <form method="post" action="actions/update.php">
                                                            <?php
                                                                $query = mysqli_query($conn,"SELECT* FROM student WHERE student_id=$SID");
                                                                if(mysqli_num_rows($query)>0){
                                                                    $row = mysqli_fetch_array($query);
                                                                    $student_name = $row['student_name'];
                                                                    $student_email = $row['student_email'];
                                                                    $student_accountStatus = $row['student_accountStatus'];
                                                                    $student_contact = $row['student_contact'];

                                                                }
                                                            ?>
                                                               <div class="form-group">
                                                                                <label>Student Name</label>
                                                                                <input type="text" name="studentName" maxlength="40" class="form-control" required value="<?php echo $student_name ; ?>">
                                                                        </div>

                                                                        <div class="form-group">
                                                                                <label>Student Email</label>
                                                                                <input type="email" name="studentEmail" maxlength="40" class="form-control" required value="<?php echo $student_email; ?>">
                                                                        </div>

                                                                        <div class="form-group">
                                                                                <label>Student Account Status</label>
                                                                                  <select class="form-control" required name="studentAccountStatus">
                                                                            <option disabled selected>Nothing Selected</option>
                                                                            <option value="1" <?php if($student_accountStatus==1) echo 'selected';?>>Accepted</option>
                                                                            
                                                                              <option value="2" <?php if($student_accountStatus==2) echo 'selected';?>>Blocked</option>
                                                                        </select>
                                                                        </div>

                                                                          <div class="form-group">
                                                                                <label>Student Contact Number</label>
                                                                                <input type="text" name="studentContact" maxlength="40" class="form-control" required value="<?php echo  $student_contact; ?>">
                                                                        </div>
                                                              
                                                                <input type="hidden" name="SID" value="<?php echo $SID; ?>">
                                                                <div class="form-group">
                                                                    <button type="submit" name="studentInfoUpdate" class="btn btn-primary">Update</button>
                                                                </div>
                                                            
                                                            </div>



                                                        </form>

                                            </div>

                                        </div>

                                </div>

                        </div>
                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>