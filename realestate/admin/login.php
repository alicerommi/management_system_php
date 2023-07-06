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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="login-background">
    <div class="container">
        <div class="login-wrapper">
            <div class="content">
                <div class="col-md-12 text-center logo-image">
                    <img src="images/logo.png" alt="Logo">
                </div>
                <form method="POST" action="actions/authentication.php" id="login-content">
                    <div class="col-md-12 text-center">
                        <h3>LOGIN TO ADMIN PANEL</h3>
                    </div>
                    <?php
                            if(isset($_GET['LoginStatus'])){
                                if($_GET['LoginStatus']==0){
                                    echo '<div class="alert alert-danger">Wrong Athentication Details!</div>';
                                }
                            }
                    ?>
                    <div class="form-group col-md-12">
                        <label for="email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="email" name="email" required="" aria-required="true" type="text" placeholder="Please enter your email" maxlength="40">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password" class="control-label col-lg-2">Password</label>
                        <div class="col-lg-12">
                            <input class="form-control" id="password" name="password" required="" aria-required="true" type="password" placeholder="Please enter your password" maxlength="40">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-lg-offset-2 col-lg-12 text-center">
                            <button class="btn btn-success wave-outline" type="submit" name="adminLogin">Login</button>
                        </div>
                    </div>
                    <p>Already have an account? <a href="register.php">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>    



    <!-- Main Js -->
   <!--  <script src="js/main.js"></script> -->
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
    <!-- Amchart -->

    <script src="js/custom.min.js"></script>

</body>

</html>
