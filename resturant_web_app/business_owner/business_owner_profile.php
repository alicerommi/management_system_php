<?php
        include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Start Widget -->
                             <div class="wraper container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="bg-picture text-center" style="background-image:url('assets/images/big/bg.jpg')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                    <img src="" id="admin_image1" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                    <h3 class="text-white"  id="member_full_name2"></h3>
                                </div>
                            </div>
                            <!--/ meta -->
                        </div>
                    </div>
                    <div class="row user-tabs">
                        <div class="col-sm-9 col-lg-6">
                            <ul class="nav nav-tabs tabs" style="width: 100%;">
                            <li class="active tab" style="width: 25%;">
                                <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active"> 
                                    <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                    <span class="hidden-xs">About Me</span> 
                                </a> 
                            </li> 
                           
                            <li class="tab" style="width: 25%;"> 
                                <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                    <span class="hidden-xs">Login Activities</span> 
                                </a> 
                            </li>

                            <li class="tab" style="width: 25%;"> 
                                <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                    <span class="hidden-xs">Settings</span> 
                                </a> 
                            </li> 
                       
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12"> 
                        
                        <div class="tab-content profile-tab-content"> 
                            <div class="tab-pane active" id="home-2"> 
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Business Owner Details</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted member_name" id="member_full_name"></p>
                                                </div>
                                                
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted" id="member_email"></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Cell Phone Number</strong>
                                                    <br>
                                                    <p class="text-muted" id="cell_phone_number"></p>
                                                </div>
                                                  <div class="about-info-p">
                                                    <strong>Home Phone Number</strong>
                                                    <br>
                                                    <p class="text-muted" id="home_phone_number"></p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Office Number</strong>
                                                    <br>
                                                    <p class="text-muted" id="member_office_number"></p>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                         <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Business Owner Details</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Existence Duration</strong>
                                                    <br>
                                                    <p class="text-muted" id="business_duration"></p>
                                                </div>
                                                
                                                <div class="about-info-p">
                                                    <strong>Business Type</strong>
                                                    <br>
                                                    <p class="text-muted" id="business_type"></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Business Location</strong>
                                                    <br>
                                                    <p class="text-muted" id="business_location"></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Request Date And Time</strong>
                                                    <br>
                                                    <p class="text-muted" id="request_date_time"></p>
                                                </div>
                                                  <div class="about-info-p">
                                                    <strong>Approval Date And Time</strong>
                                                    <br>
                                                    <p class="text-muted" id="request_approval_date_time"></p>
                                                </div>
                                                
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div> 





                            <div class="tab-pane" id="messages-2" style="display: none;">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">My Login Activities</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>IP Address</th>
                                                                        <th>Date & Time</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="owner_login_activities"> 
                                                                        
                                                                    
                                                                </tbody>
                                                            </table>
                                                        </div>

                                    </div> 
                                </div>
                                <!-- Personal-Information -->
                            </div> 


                            <div class="tab-pane" id="settings-2" style="display: none;">
                                <!-- Personal-Information -->
                                <div id="update_business_owner_profile_details_err_msg"></div>
                                <div class="col-lg-6">
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Edit Profile</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                       
                                        <form  id="update_business_owner_profile_details" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="FullName">Admin Image</label>
                                                <input  type="file" class="form-control" name="admin_image" id="admin_image" accept="image/*" >

                                            </div>

                                            <div class="form-group">
                                                <label for="FullName">First Name</label>
                                                <input type="text"  id="first_name" name="first_name"  class="form-control">
                                            </div>

                                             <div class="form-group">
                                                <label for="FullName">Last Name</label>
                                                <input type="text"  id="last_name" name="last_name"  class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="AboutMe">About Me</label>
                                                <textarea style="height: 125px" id="AboutMe" name="AboutMe" class="form-control"></textarea>
                                            </div>

                                            <input type="hidden" name="update_business_owner_profile_details" value="1">
                                            <input type="hidden" name="business_owner_site_app" value="1">

                                            <input type="hidden" name="business_owner_id"  value="<?php echo $_SESSION['busines_owner_id']; ?>">
                                            <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Update Details</button>
                                        </form>

                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-6">
                                 <div class="panel panel-default panel-fill">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Change Password</h3> 
                                    </div> 
                                     <div class="panel-body"> 
                                            <form id="update_password_form" method="post" >

                                                    <div class="form-group">
                                                            <label for="Email">Email</label>
                                                            <input type="email"  id="Email"  class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Password">Old Password</label>
                                                            <input type="password" id="oldpass" name="oldpass" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="RePassword">New Password</label>
                                                            <input type="password" id="RePassword" name="RePassword" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="RePassword">Retype New Password</label>
                                                            <input type="password" id="rePassword_again"  name="rePassword_again" class="form-control">
                                                        </div>

                                                        <input type="hidden" name="business_owner_site_app" value="1">
                                                        <input type="hidden" name="business_owner_id"  value="<?php echo $_SESSION['busines_owner_id']; ?>">
                                                        <input type="hidden" name="update_password_form_business_owner" value="1">
                                                        <div class="form-group pull-right">
                                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Update Password</button>
                                                        </div>
                                            </form>
                                    </div>

                                </div>
                        </div>

                                <!-- Personal-Information -->
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div>   



                    </div> <!-- container -->
                               
                </div> <!-- content -->


<?php
    include 'includes/footer.php';
?>
