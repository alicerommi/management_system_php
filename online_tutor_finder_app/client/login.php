<?php
include("../common_client/master.php");
?>

<!-- Header -->
    <header class="navbar navbar-fixed-top navbar-centered-nav tron-nav-demo-page">
      <div class="container">
        <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".tron-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		 
        </div>
       <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
            
              <li><a href="tutor-registeration.php">Tutor Registeration Form</a></li>
              <li class="divider"></li>
            <li  ><a href="student-registeration.php">Student Registeration Form</a></li>
              </ul>
            </li>
            <li><a href="tutor_profiles.php">Tutor Profiles</a></li>
           <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
    <?php         echo '
          <div class="navbar-right navbar-text">
      <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; <small>Student Login</small></a>           </div> '; ?>
        </nav>
      </div>
    </header><!-- Header Close-->
  <body>
   <section class="demo-page padding-bottom-2x">
<div class="container">
<div class="row">
<div class="col-md-4">
<div  class="pull-left" >
  

  <img  src="login.png" height="250px" width="250px"  style="align:left"/>
  
  
  </div>
  </div>

  <div class="col-md-6" >
  <form  method="POST" name="login" action="actions/authentication.php">

                            <h3><strong>Students</strong>  Login</h3>
                            <small class="text-muted"><strong>This section is for Students Who Are Active In Our Site.</strong><br />
               Please enter Email ID and Password to procced.</small>

	<div class="form-group">
	
      <label>Student Email:</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password" required>
    </div>
   <div >
   
</div>
    <button type="submit" class="btn btn-default" name="student-submit" id="sub">Submit</button>
	<button type="reset" class="btn btn-default" id="res">Reset</button>
  </form>
  <a href="student-registeration.php">New Student Registration?</a>
  </div>

  
  
	</div>
  
  </div>
</div>
</section>
</body>
<?php
include("../common_client/footer.php");
?>
</html>