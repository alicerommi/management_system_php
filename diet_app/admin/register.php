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
  <title>Sugarly Date</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Style Css -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Font -->
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
          <form action="" method="POST">
            <div class="form-group">
              <!-- <label for="comment">Email:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon4"><img src="images/icons/01.png" alt=""></span>
              </div>
              <input name="firstname" type="text" id="firstname" class="form-control" placeholder="Enter your Firstname" required>
              <div class="error" id="error-email" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Email:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon4"><img src="images/icons/01.png" alt=""></span>
              </div>
              <input name="lastname" type="text" id="lastname" class="form-control" placeholder="Enter your Lastname" required>
              <div class="error" id="error-email" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Email:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="images/icons/01.png" alt=""></span>
              </div>
              <input name="EmailAddress" type="email" id="email" class="form-control" placeholder="Enter your Email" required>
              <div class="error" id="error-email" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Password:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><img src="images/icons/02.png" alt=""></span>
              </div>
              <input name="pwd" type="password" id="password" class="form-control" placeholder="Enter your Password" required>
              <div class="error" id="error-pass" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Password:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><img src="images/icons/02.png" alt=""></span>
              </div>
              <input name="pwdconf" type="password" id="passwordconfirm" class="form-control" placeholder="Enter your Confirm Password" required>
              <div class="error" id="error-pass" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Password:</label> -->
              <div class="input-group-prepend">
                <!-- <span class="input-group-text" id="basic-addon2"><img src="images/icons/02.png" alt=""></span> -->
              </div>
              <select class="form-control" name="">
                <option value="">Gender</option>
                <option value="">Male</option>
                <option value="">Female</option>
              </select>
              <div class="error" id="error-pass" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Password:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="images/icons/02.png" alt=""></span>
              </div>
              <input name="contact" type="text" id="contact" class="form-control" placeholder="Enter your Contact No" required>
              <div class="error" id="error-pass" style="color: red;"></div>
            </div>
            <div class="form-group">
              <!-- <label for="comment">Password:</label> -->
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="images/icons/02.png" alt=""></span>
              </div>
              <input name="city" type="text" id="city" class="form-control" placeholder="Enter your City" required>
              <div class="error" id="error-pass" style="color: red;"></div>
            </div>
            <div class="form-group text-center button">
              <button type="submit" onclick="ValidateReg()" class="btn btn-default">Sign Up</button>
            </div>
          </form>
        </div>
        <div class="links text-center col-md-12">
          <p>Already have an account? <a href="#">Sign In</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- End: Login Wrapper -->
  <!-- Start: Footer Section -->
  <footer class="footer-login">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="social-list">
            <ul class="socials">
              <li><a href="#" class="social-link"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#" class="social-link"><i class="fa fa-pinterest"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End: Footer Section -->




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
