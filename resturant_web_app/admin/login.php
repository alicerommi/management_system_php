<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
         <title>Maxhypechannel - Log in to Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
         <meta content="To effectively communicate with people, accurately identify their needs, locate needed services and resources, and help them make good choices when accessing our services." name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="assets/images/favicon_1.ico">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
         <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
    <body>


        <div class="wrapper-page">
          
            <div class="panel panel-color panel-primary panel-pages" id="login_page" >
                <div class="panel-heading"> 
                    <h3 class="text-center m-t-10 text-white"> Log In to Admin Panel</h3>
                </div> 


                <div class="panel-body">
                <?php
                    if(isset($_GET['wrong'])){
                        if($_GET['wrong']){
                                echo '<div class="alert alert-danger">Wrong Authentication Details</div>';
                        }
                    }

                ?>
                <form class="form-horizontal m-t-20" method="post" id ="loginForm" action="actions/authentication.php">
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="admin_email" type="text" required="" placeholder="Email Address"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="admin_pass" type="password" required="" placeholder="Password" required>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div> -->
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light company_logo_color" name="admin_login_form" type="submit">Log In</button>
                        </div>
                    </div>

                    <!-- <div class="form-group m-t-30">
                        <div class="col-sm-7">
                            <a href="recover_password.php"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                    </div> -->
                </form> 
                </div>                                 
                
            </div>
        </div>
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