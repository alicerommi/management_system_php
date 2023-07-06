<?php session_start();
  // require_once ( 'includes/translation_api/vendor/autoload.php');
  // use \Statickidz\GoogleTranslate;
  
  //   $lang_obj = new GoogleTranslate();
  //   // function do_now($str){
  //         $source = 'en';
  //         $target = 'he';
include 'translations/he.php';
 function to_english($str){
  return $str;
 }
 ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo to_hebrew("Login Page",$language_array); ?> || GBH2</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/site.webmanifest">
<style type="text/css">
  .modal-content{
        background-color: #f0efeb !important;
  }
  .modal{
    top: 100px !important;
  }
   body {
      background-image: url("assets/images/cover.png");
       
        -webkit-background-size: cover; /* For WebKit*/
    -moz-background-size: cover;    /* Mozilla*/
    -o-background-size: cover;      /* Opera*/
    background-size: cover;         /* Generic*/
}
      #captcha_link {
        font-size: 18px;
        font-weight: 600;
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
    .customer_msg{
          font-size: 18px !important;
    font-weight: 600 !important;
    text-transform: capitalize !important;
    }
    #login_btn{
             background-color: #fff229;

              padding: 0.875em 2.5em;
              color: #05083d;
              font-size: 16px;
              font-weight: bold;
              text-align: center;
              text-transform: uppercase;
              -webkit-border-radius: 0;
              -moz-border-radius: 0;
              -ms-border-radius: 0;
              -o-border-radius: 0;
              border-radius: 0;
    }
    #login_btn:hover{
        background-color: white;
            color: #05083d;
          
    }
    .form-group label{
      text-align: right;
    /*  width: 100%;
     display: block;*/

}

.directional_class{
  direction: rtl;
}
.form-control{
    direction: rtl !important;
}
   
</style>
<script type="text/javascript">
          //Refresh 7tcha
          function refreshCaptcha(){
              var img = document.images['captchaimg'];
              img.src = img.src.substring(
           0,img.src.lastIndexOf("?")
           )+"?rand="+Math.random()*1000;
          }        
</script>   
  </head>
	<body class="directional_class">
   <aside class="main-sidebar ">
    <aside class="main-sidebar">
    </aside>
   </aside>
<!--login modal-->
<div id="loginModal" class="modal show row-md-offset-4" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="text-center"><?php echo to_hebrew("Welcome To GBH2 - Customer Login",$language_array); ?></h4>
      </div>
      <div class="modal-body">
           <?php
                            if(isset($_GET['wrong'])){
                                        if($_GET['wrong']==1){
                                          $str =  to_hebrew("You have entered wrong details.",$language_array);
                                            echo '<div class="alert alert-danger customer_msg text-center">'.$str.'</div>';
                                        }
                            }

                            if(isset($_GET['wrong_code'])){
                                if($_GET['wrong_code']==1){
                                   $str =  to_hebrew("You have entered wrong captcha code.",$language_array);
                                        echo '<div class="alert alert-warning customer_msg text-center">'.$str.'</div>';
                                      }
                            }

                            if(isset($_GET['customer_blocked'])){
                                if($_GET['customer_blocked']==1)
                                       {
                                      $str =  to_hebrew("You have been blocked from the gbh2 admin",$language_array);
                                         $str2 =  to_hebrew("Help! Contact Admin For Details.",$language_array);

                                        echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                                        echo '<div class="alert alert-info text-center">'.$str2.'</div>';
                                      }
                            }
                    ?>
           <form  class="form col-md-12 center-block" method="post" action="actions/authentication.php">
                      <div class="form-group">
                          <input type='email' class='form-control'  name='txtemail' placeholder='<?php echo to_english("Email Address"); ?>' value="<?php if(isset($_COOKIE["gbh2_customer_login"])) { echo $_COOKIE["gbh2_customer_login"]; } else if(isset($_GET['gbh2_customer_email'])){
                                    echo $_GET['gbh2_customer_email'];

                          }   ?>" required>
                      </div>
                      
                      <div class="form-group">
                        <input type="password" class="form-control"  name="txtPassword" value="<?php if(isset($_GET['pass'])){
                          echo $_GET['pass'];
                        } ?>" required placeholder='<?php echo to_hebrew("Password",$language_array); ?>'  >
                      </div>

                      <div class="form-group">
                             <img src="includes/captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                                <input id="captcha_code" name="captcha_code" type="text" required  class="form-control" placeholder='<?php echo to_hebrew("Enter the code above here",$language_array); ?>'>
                                 <br>
                              
                                <a id="captcha_link" href='javascript: refreshCaptcha();'>&nbsp;<?php
                                echo to_hebrew("Click to change the code",$language_array);
                                ?></a>
                      </div>
                      <div class="form-group">
                       
                                <input type="checkbox"  name="remember" id="remember" <?php if(isset($_COOKIE["gbh2_customer_login"])) { ?> checked <?php } ?> >
                                <label for="checkbox-signup">
                                    <?php echo to_hebrew("Remember me",$language_array); ?>
                                </label>
                        
                      </div>

                      <div class="form-group">
                          <input class="btn btn-primary btn-lg btn-block" type="submit" name="do_login_customer" id="login_btn" value="<?php echo to_hebrew("Login",$language_array); ?>">
                      </div>

          </form>
      </div>
        <div class="modal-footer">
          <div class="col-md-12">
       
      </div>  
      </div>
        </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){
        $(".alert").fadeOut('slow');
      },10000);
    });
</script>