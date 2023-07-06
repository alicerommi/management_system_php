<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Dashboard</title>
  <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
</head>

<body id="login-background">
  <!-- Start: Login Wrapper -->
  <div class="login-wrapper">
    <div class="container">

      <div class="col-md-12 login-content">
        <!-- <div class="col-md-12 text-center title">
            <h4>LOGIN</h4>
          </div> -->
        <!-- <div class="col-md-12 text-center image-logo">
          <img src="images/logo.png" alt="Logo" class="img-responsive">
        </div> -->
        <div class="login-panel">
          <?php
            if(isset($_GET['loginStatus'])==1){
              echo '<div class="alert alert-danger">Wrong Authentication Details</div>';
            }
          ?>

          <form action="actions/authentication.php" method="POST">
            <div class="form-group">
              <label for="comment">Email:</label>
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="images/icons/01.png" alt=""></span>
              </div>
              <input name="EmailAddress" type="email" id="email" class="form-control" placeholder="Enter your Email" required>
              <div class="error" id="error-email" style="color: red;"></div>
            </div>
            <div class="form-group">
              <label for="comment">Password:</label>
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="images/icons/02.png" alt=""></span>
              </div>
              <input name="pwd" type="password" id="password" class="form-control" placeholder="Enter your Password" required>
              <div class="error" id="error-pass" style="color: red;"></div>
            </div>
           <!--  <div class="form-group">
              <label class="checkbox-inline">
                  <input type="checkbox" class="checkbox" value=""> Remember Me
                </label>
            </div> -->
            <div class="form-group text-center button">
              <button type="submit" onclick="ValidateUser()" class="btn btn-default" name="adminLogin">Login</button>
            </div>
          </form>
        </div>
       <!--  <div class="links text-center col-md-12">
          <a href="#">Forgot Password?</a>
          <p>Not a member? <a href="#">Sign Up?</a></p>
        </div> -->
      </div>
    </div>
  </div>
  <!-- End: Login Wrapper -->
  <!-- Bootstrap tether Core JavaScript -->
  <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
    function ValidateUser() {
      var textBox = document.getElementById("password");
      var textLength = textBox.value.length;

      if (textBox.value == '' || textLength <= 8) {
        // alert('Please enter correct password');
        document.getElementById('error-pass').innerHTML='Please enter your password and 6 digit';
        textBox.classList.add('error');
        setTimeout(function() {
          textBox.classList.remove('error');
        }, 300);

        // e.preventDefault();
      }

      var email = document.getElementById('email');
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if (!filter.test(email.value)) {
        // alert('Please provide a valid email address');
        document.getElementById('error-email').innerHTML='Please enter your Email Address';
        email.focus;
        // return false;
        email.classList.add('error');
        setTimeout(function() {
          email.classList.remove('error');
        }, 300);

        // e.preventDefault();
      }
    }
  </script>
</body>
</html>