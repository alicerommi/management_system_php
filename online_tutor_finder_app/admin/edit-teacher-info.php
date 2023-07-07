<?php
    if(isset($_GET['TID'])){
            $TID = intval($_GET['TID']);
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
                                                        <a href="all-teacchers.php" class="btn btn-default" style="margin-top: 12px;"><i class="fa fa-eye"></i>Back To Teacher List</a>
                                </div>
                        <div class="row">
                                
                                        <div class="panel panel-default">
                                            <h4 class="panel-heading">Edit Teacher Details</h4>
                                            <div class="panel-body">
                                                <?php
                                                if(isset($_GET['updateStatus'])){
                                                    if($_GET['updateStatus']==1){
                                                        echo '<div class="alert alert-success">The Teacher Details Has Been Updated</div>';
                                                    }else if($_GET['updateStatus']==0){
                                                         echo '<div class="alert alert-warning">Error In Updating Details</div>';
                                                    }
                                                }
                                               
                                                ?>
                                                 <div class="col-md-6">
                                                        <form method="post" action="actions/update.php">
                                                            <?php
                                                                $query = mysqli_query($conn,"SELECT* FROM teacher WHERE teacher_id=$TID");
                                                                if(mysqli_num_rows($query)>0){
                                                                    $row = mysqli_fetch_array($query);
                                                                    $teacher_name = $row['teacher_name'];
                                                                    $teacher_email = $row['teacher_email'];
                                                                    $teacher_account_status = $row['teacher_account_status'];
                                                                    $teacher_contact = $row['teacher_contact'];
                                                                    $teacher_address = $row['teacher_address'];
                                                                    $teacher_city = $row['teacher_city'];


                                                                }
                                                            ?>
                                                                <div class="form-group">
                                                                        <label>Teacher Name</label>
                                                                        <input type="text" name="teacherName" maxlength="40" class="form-control" required value="<?php echo $teacher_name; ?>">
                                                                </div>

                                                                <div class="form-group">
                                                                        <label>Teacher Email</label>
                                                                        <input type="email" name="teacherEmail" maxlength="40" class="form-control" required value="<?php echo $teacher_email; ?>">
                                                                </div>
                                                                 <div class="form-group">
                                                                        <label>Teacher Account Status</label>
                                                                        <select class="form-control" required name="teacherAccountStatus">
                                                                            <option value="1" <?php if($teacher_account_status==1) echo 'selected';?> >Active</option>
                                                                           
                                                                              <option value="2" <?php if($teacher_account_status==2) echo 'selected'; ?> >Blocked</option>
                                                                        </select>

                                                                </div>
                                                              
                                                                <input type="hidden" name="TID" value="<?php echo $TID; ?>">
                                                              
                                                            </div>


                                                                <div class="col-md-6">
                                                                   
                                                                <div class="form-group">
                                                                        <label>Teacher Contact Number</label>
                                                                        <input type="text" name="teacherContact" maxlength="40" class="form-control" required value="<?php echo $teacher_contact; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Teacher Address</label>
                                                                        <input type="text" name="teacherAddress" maxlength="40" class="form-control" required value="<?php echo $teacher_address; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Teacher City</label>
                                                                        <input type="text" name="teacherCity" maxlength="40" class="form-control" required value="<?php 
                                                                            echo $teacher_city;
                                                                        ?>">
                                                                </div>

                                                                <div class="form-group pull-right">
                                                                    <button class="btn btn-primary" type="submit" name="adminTeacherUpdate">Update
                                                                    </button>

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