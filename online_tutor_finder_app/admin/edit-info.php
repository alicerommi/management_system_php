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
                            <div class="col-sm-12">
                               <!--  <h4 class="pull-left page-title">Welcome !</h4> -->
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Our Teachers</a></li>
                                    <li class="active">Add A Teacher</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      
                              <div class="pull-right" >
                                                        <a href="all-teacchers.php" class="btn btn-default" style="margin-top: 12px;"><i class="fa fa-eye"></i>View All Teachers</a>
                                </div>
                        <div class="row">
                                
                                        <div class="panel panel-default">
                                            <h4 class="panel-heading">Add Teacher Details</h4>
                                            <div class="panel-body">
                                                <?php
                                                if(isset($_GET['teacherAdded'])){
                                                    if($_GET['teacherAdded']==1){
                                                        echo '<div class="alert alert-success">The Teacher Details Has Been Added</div>';
                                                    }else if($_GET['teacherAdded']==0){
                                                         echo '<div class="alert alert-warning">Error In Adding Details</div>';
                                                    }
                                                }
                                                if(isset($_GET['emailExists'])){
                                                     if($_GET['emailExists']==1){
                                                         echo '<div class="alert alert-danger">Teacher With This Email Is Already Exists</div>';
                                                     }
                                                }
                                                ?>
                                                 <div class="col-md-6">
                                                        <form method="post" action="actions/insert.php">
                                                                <div class="form-group">
                                                                        <label>Teacher Name</label>
                                                                        <input type="text" name="teacherName" maxlength="40" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                        <label>Teacher Email</label>
                                                                        <input type="email" name="teacherEmail" maxlength="40" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                        <label>Teacher Password</label>
                                                                        <input type="password" name="teacherPassword" maxlength="40" class="form-control" required>
                                                                </div>

                                                                <div class="form-group">
                                                                        <label>Teacher Joining Date</label>
                                                                        <input type="date" name="joiningDate"  class="form-control" required>
                                                                </div>
                                                            </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Teacher Account Status</label>
                                                                        <select class="form-control" required name="teacherAccountStatus">
                                                                            <option disabled selected>Nothing Selected</option>
                                                                            <option value="1">Active</option>
                                                                             <option value="0">Not Active</option>
                                                                        </select>

                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Teacher Contact Number</label>
                                                                        <input type="text" name="teacherContact" maxlength="40" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Teacher Address</label>
                                                                        <input type="text" name="teacherAddress" maxlength="40" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                        <label>Teacher City</label>
                                                                        <input type="text" name="teacherCity" maxlength="40" class="form-control" required>
                                                                </div>

                                                                <div class="form-group pull-right">
                                                                    <button class="btn btn-primary" type="submit" name="adminTeacherAdd">Save
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