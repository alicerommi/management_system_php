<?php
  include 'includes/header.php';
?>                   
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                   <div class="content">

                <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('assets/images/big/bg.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="<?=$admin_picture; ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"><?=$admin_name ?></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                   
                        
                        
                                <div class="row" style="margin-top: 29px;">
                                    <?php
                                    if(isset($_GET['old_pass_mismatch'])){
                                        messages("Old password is wrong","danger");
                                    }
                                    if(isset($_GET['updated'])){
                                        if ($_GET['updated']==1)
                                            messages("Password has been updated successfully","success");
                                        else if ($_GET['updated']==0)
                                             messages("Error in updating password","warning");
                                    }

                                    if(isset($_GET['new_pass_mismatch'])){
                                        if($_GET['new_pass_mismatch']==0){
                                             messages("New password combination is wrong","warning");   
                                        }
                                    }


                                    ?>
                                    <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Personal Information</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$admin_name;?></p>
                                                </div>
                                                
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$admin_email?></p>
                                                </div>
                                                
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->
                                    </div>


                                    <div class="col-md-8">
                                         <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Update Admin Details</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                 <form  action="actions/update.php" method="post">
                                                    <div class="form-group">
                                                        <label for="FullName">Full Name</label>
                                                        <input type="text" value="<?=$admin_name; ?>" id="FullName" class="form-control">
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="Password">Old Password</label>
                                                        <input type="password" placeholder="6 - 15 Characters" name="oldPassword" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Password">New Password</label>
                                                        <input type="password" placeholder="6 - 15 Characters" name="Password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="RePassword">Re-Password</label>
                                                        <input type="password" placeholder="6 - 15 Characters" name="RePassword" class="form-control">
                                                    </div>
                                                        <input type="hidden" name="admin_id" value="<?=$admin_id;?>">
                                                        <div class="pull-right">
                                                                 <button class="btn btn-primary waves-effect waves-light w-md" name="update_admin_details" type="submit">Save</button>
                                                        </div>
                                                </form>
                                             </div>   

                                       
                                    </div>

                                </div>
                            </div> 
                </div> <!-- container -->
                               
                </div>
                               
                </div> <!-- content -->
      
<?php
        include 'includes/footer.php';
?>