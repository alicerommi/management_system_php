<?php include 'includes/header.php'; ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Admin Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <!-- <div class="col-md-12 cover-bg" style="background-image: url('images/background/profile-bg.jpg');">
                    <div class="col-md-12 profile text-center">
                        <img class="cover" src="images/users/1.jpg" alt="Cover">
                    </div>

                </div> -->
                <?php

                  //get the admin info
                $admin_email = $_SESSION['admin_email'];
                $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email='$admin_email'");
                $row  = mysqli_fetch_array($query);
                $admin_name  = $row['admin_name'];
                $admin_email  = $row['admin_email'];
                $admin_id=$row['admin_id'];
                ?>

                <div class="row">
                    
                    <div class="col-md-8">
                        <?php
                          if(isset($_GET['passChange'])){
                            if($_GET['passChange']==1){
                              echo '<div class="alert alert-success">The Password Has Been Successfully Changed</div>';
                            }else if($_GET['passChange']==0){
                              echo '<div class="alert alert-warning">Error In Updating Password';
                            }
                          }

                          if(isset($_GET['newPassMisMatch'])){
                            if($_GET['newPassMisMatch']==0)
                              echo '<div class="alert alert-warning">New Password And Confirm Password Are Mismatched</div>';
                          }
                          

                          if(isset($_GET['oldPassMisMatch'])){
                            if($_GET['oldPassMisMatch']==0)
                              echo '<div class="alert alert-warning">Old password is Mismatched</div>';
                          }


                        ?>
                        <div class="panel panel-primary panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Change Password</h3>
                            </div>
                            <div class="panel-body">
                              <form class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="actions/update.php">
                               
                                  <div class="form-group">
                                      <label for="oldpass" class="control-label col-lg-6">Old Password</label>
                                      <div class="col-lg-12">
                                          <input type="password" class="form-control" id="oldpass" name="oldpass" required aria-required="true">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="newpass" class="control-label col-lg-6">New Password</label>
                                      <div class="col-lg-12">
                                          <input type="password" class="form-control" id="newpass" name="newpass" required aria-required="true">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="confpass" class="control-label col-lg-6">Confirm Password</label>
                                      <div class="col-lg-12">
                                          <input type="password" class="form-control" id="confpass" name="confpass" required aria-required="true">
                                      </div>
                                  </div>

                                  <input type="hidden" name="adminID" value="<?php echo  $admin_id; ?>">
                                  <div class="form-group text-right">
                                      <div class="col-lg-offset-2 col-lg-12">
                                          <button class="btn btn-primary waves-effect waves-light save-password"  type="submit" name="ChangePasswordForm">Update Password</button>
                                      </div>
                                  </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            <!-- End Container fluid  -->
    <?php include 'includes/footer.php'; ?>
   
