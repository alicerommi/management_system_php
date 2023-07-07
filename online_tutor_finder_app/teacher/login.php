<!DOCTYPE html>
<html>

<head>
      <meta charset="utf-8" />
        <title>Online Tutor -Teacher DashBoard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong> Teacher Dashboard</strong> </h3>
                </div> 
                <div class="panel-body">
                    <?php
                            if(isset($_GET['loginStatus'])){
                                    if($_GET['loginStatus']==0){
                                        echo '<div class="alert alert-warning">Wrong Authentication Details</div>';
                                    }
                            }
                            if(isset($_GET['notActive'])){
                                    if($_GET['notActive']==1){
                                        echo '<div class="alert alert-danger">Your Account is not Active</div>';
                                    }
                            }
                            if(isset($_GET['bloacked'])){
                                    if($_GET['bloacked']==2){
                                        echo '<div class="alert alert-danger">Your Account is Blocked By Admin</div>';
                                    }
                            }

                              if(isset($_GET['pending'])){
                                    if($_GET['pending']==1){
                                        echo '<div class="alert alert-danger">Your Teacher Request is Still Pending!</div>';
                                    }
                            }
                    ?>
                <form class="form-horizontal m-t-20" action="actions/authentication.php" method="post">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="email" required maxlength="40" placeholder="Enter Your Email" name="teac_email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required placeholder="Enter Your Password" name="teac_pass">
                        </div>
                    </div>

                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit" name = "teacherlogin">Log In</button>
                        </div>
                    </div>

                </form> 
                </div>                                 
                
            </div>
        </div>
    	<script>
            var resizefunc = [];
        </script>
        <!-- Main  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	</body>
    </html>