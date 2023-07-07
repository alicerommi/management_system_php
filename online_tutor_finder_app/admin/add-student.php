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
                                
                                <ol class="breadcrumb pull-right">
                                   <li><a href="#">Our Students</a></li>
                                    <li class="active">Add A Student</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                           
                          <?php  if(isset($_GET['studentAdded'])){
                                    if($_GET['studentAdded']==1){
                                        echo '<div class="alert alert-success">The Student Details Has Been Added Successfully</div>';
                                    }else if($_GET['studentAdded']==0){
                                        echo '<div class="alert alert-warning">Error In Adding Student Details</div>';
                                    }
                            }
                        ?>
                             <div class="col-md-6">
                                  <div class="pull-right" >
                                                        <a href="all-students.php" class="btn btn-default" style="margin-top: 12px;"><i class="fa fa-eye"></i>View All Students</a>
                                </div>
                            <div class="panel panel-default">
                                <h4 class="panel-heading">Add A Student</h4>
                                    <div class="panel-body">
                                            
                                                        <form method="post" action="actions/insert.php">
                                                                        <div class="form-group">
                                                                                <label>Student Name</label>
                                                                                <input type="text" name="studentName" maxlength="40" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                                <label>Student Email</label>
                                                                                <input type="email" name="studentEmail" maxlength="40" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                                <label>Student Account Status</label>
                                                                                  <select class="form-control" required name="studentAccountStatus">
                                                                            <option disabled selected>Nothing Selected</option>
                                                                            <option value="1">Accepted</option>
                                                                             <option value="0">Rejected</option>
                                                                        </select>
                                                                        </div>

                                                                          <div class="form-group">
                                                                                <label>Student Contact Number</label>
                                                                                <input type="text" name="studentContact" maxlength="40" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Password</label>
                                                                            <input type="password" name="studentPassword" maxlength="40" class="form-control" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Address</label>
                                                                            <input type="text" name="studentAddress" maxlength="40" class="form-control" required>
                                                                        </div>


                                                                        <div class="form-group">
                                                                               <button type="submit" class="btn btn-primary" name="studentAddRecord">Save</button>
                                                                        </div>
                                                            
                                                            </form>
                                                        </div>

                                                </div>



                        </div>

                        <!-- Start Widget -->
                      

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>