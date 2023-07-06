<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png"> -->
    <title>FRANCHINO Negocios Inmobiliarios Admin Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>

<body class="login-background">
    <div class="container">
        <div class="register-wrapper">
            <div class="content">
                <!-- <div class="col-md-12 text-center logo-image">
                    <img src="images/logo_dash.png" alt="Logo">
                </div> -->
               
                <form method="POST" action="actions/insert.php" id="login-content" enctype="multipart/form-data">

                    <div class="col-md-12 text-center">
                        <h3>ADMIN REGISTRATION</h3>
                    </div>
                     <?php
                //for showing the feedback messages
                   if(isset($_GET['status'])){
                        if($_GET['status']==1){
                            echo '<div class="alert alert-success">The Form is Successfully Submitted</div>';
                        }else if($_GET['status']==0){
                            echo '<div class="alert alert-warning">Error in Submitting Form</div>';
                        }
                   } 
                   if(isset($_GET['emailExists'])){
                        if($_GET['emailExists']==1)
                                 echo '<div class="alert alert-warning">Admin is already Exists</div>';
                   }
                   if(isset($_GET['fileNotSupport'])){
                        if($_GET['fileNotSupport']==1){
                                echo '<div class="alert alert-warning">The uploaded image format is invalid</div>';
                        }
                   }
                    if(isset($_GET['passMisMatch'])){
                        if($_GET['passMisMatch']==1){
                                echo '<div class="alert alert-warning">Passwords are MisMatched</div>';
                        }
                   }
                ?>
                    <div class="file-upload col-md-12 form-group">
                        <label for="upload" class="file-upload__label">Upload Image</label>
                        <input id="upload" class="file-upload__input" type="file" name="file-upload">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name" class="control-label col-lg-6">Full Name</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="name" name="name" required="" aria-required="true" type="text" placeholder="Please enter your full name" maxlength="30">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="email" name="email" required="" aria-required="true" type="text" placeholder="Please enter your email" maxlength="40">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password" class="control-label col-lg-2">Password</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="password" name="password" required="" aria-required="true" type="password" placeholder="Please enter your password" maxlength="30">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password_2" class="control-label col-lg-6">Confirm Password</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="password_2" name="confirmpassword" required="" aria-required="true" type="password" placeholder="Please enter your password"  maxlength="30">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-lg-offset-2 col-lg-12 text-center">
                            <button class="btn btn-success wave-outline" type="submit" name="adminRegister">Register</button>
                        </div>
                    </div>
                    <p>Don't have an account? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>    

    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="js/scripts.js"></script>
    <!-- scripit init-->
    <script src="js/custom.min.js"></script>
</body>

</html>
