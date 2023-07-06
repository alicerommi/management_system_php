<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
         <title><?php echo "Login To GBH2"; ?> - Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="<?php echo "Login To GBH2 Admin Panel"; ?>" name="description" />
        <meta content="<?php echo "Login To GBH2 Admin Panel"; ?>" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
            <link rel="manifest" href="assets/images/site.webmanifest">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>        
    </head>
 <style type="text/css">
      #captcha_link {
      -moz-user-select: none;
      color: #1155CC !important;
      font-family: "verdana", "Helvetica Neue", Helvetica, Arial, sans-serif;
      text-decoration: none;
    }
    #captcha_link:hover {
      text-decoration: underline;
    }
    #captchaimg{
    margin-bottom: 10px;
    }

  </style>
    <script type="text/javascript">
          //Refresh Captcha
          function refreshCaptcha(){
              var img = document.images['captchaimg'];
              img.src = img.src.substring(
           0,img.src.lastIndexOf("?")
           )+"?rand="+Math.random()*1000;
          }        
    </script>   
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Admin Panel</strong> </h3>
                </div> 
                <div class="panel-body">
                    <?php
                            if(isset($_GET['wrong'])){
                                        if($_GET['wrong']==1){
                                            echo '<div class="alert alert-danger">You have entered wrong details.</div>';
                                        }
                            }

                            if(isset($_GET['wrong_code'])){
                                if($_GET['wrong_code']==1)
                                        echo '<div class="alert alert-warning">You have entered wrong captch code.</div>';
                            }
                    ?>
                <form class="form-horizontal m-t-20" action="actions/authentication.php" method="post">  
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" name="adminName" type="text" required=""   value="<?php if(isset($_COOKIE["admin_login"])) { echo $_COOKIE["admin_login"]; } ?>"  maxlength="50" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" maxlength="50" type="password" name="adminPass" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                                                    <img  src="../includes/captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                                                  
                                                    <input id="captcha_code" placeholder="Enter the code above here" name="captcha_code" type="text" required class="form-control" maxlength="6">
                                                    <br>
                                                    Can't read the image? click <a id="captcha_link" href='javascript: refreshCaptcha();'>here</a> to refresh.
                    </div>


                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox"  name="remember" id="remember" <?php if(isset($_COOKIE["admin_login"])) { ?> checked <?php } ?> >
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>


                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit" name="loginAdmin">Log In</button>
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
<script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function(){
                $(".alert").hide();
            },10000);
        });
</script>