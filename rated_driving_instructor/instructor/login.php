<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Rated Driving Instructor - Instructor Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
.login-register {
    background: url(images/bk.jpg) no-repeat center center / cover !important;
    height: 100%;
    position: fixed;
}
#wrapper {
    width: 103%;
}

</style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div class = "container-fluid" style = "padding-left: 1px;">
    	<div class = "row">
    <section id="wrapper" class="login-register" style = "overflow: scroll;">
    		<div class = "col-md-4">
    		</div>
    		<div class = "col-md-4" style = "margin-top: 55px;">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="actions/authentication.php" method="POST">
                    <a href="javascript:void(0)" class="text-center db"><img src="logos/logo.png" alt="Home" height="80%" width="80%" />
                           </a>
                     <div class="form m-t-40">
                        <?php
                        if(isset($_GET['info'])=="wrong"){ 
                            echo '<div class="alert alert-warning">
                                    <strong>Wrong Email and Password Combinations.</strong>
                            </div>';
                            }
                        if(isset($_GET['passReset'])){
                            if($_GET['passReset']==1){
                                echo '<div class="alert alert-success"> <strong> New Password Has Been Sent to Your Email</strong></div>';
                            }
                        }
                            if($_GET['emailNotFount']){
                                if($_GET['emailNotFount']==1){
                                         echo '<div class="alert alert-warning">
                                                             <strong>Oh! </strong>This Email is Not Registered with Us.
                                                 </div>';
                                                 echo '<div class="alert alert-success">
                                                             <strong>Please! </strong> Click <a href="register.php" style = "color: white; font-weight: 500;">Here</a> to Create an Account
                                                 </div>';
                                }
                            }    
                            
                         
                        ?>
                     </div>       
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="email" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password"  name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <!-- <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>  -->
                            <a href="javascript:void(0)" id="to-recover" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot Password?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="login" style = "border: 0; background-color: #f24282;">Log In</button>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Don't have an account? <a href="register.php" class="text-primary m-l-5"><b style = "color: #f24282;">Sign Up</b></a></p>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" method="post" action="actions/resetPass.php">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="recoverPass">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        	</div><!-- login-sidebar column ends here -->
        	<div class = "col-md-4">
    		</div>
    </section>
    	</div><!-- row ends -->
    </div><!-- container ends -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>