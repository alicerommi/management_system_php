<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Member Login</title>

</head>
<?php
include("master.php");

?>
<body>

<!-- navbar for desktop display -->
				<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- navbar for mobile display -->
				<div class="navbar-header" >
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services<span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#">Match Selection</a></li>
						<li><a href="#">Winning Award Lists</a></li>
						<li><a href="#">Upcoming Match List</a></li>
						<li class="divider"></li>
						<li><a href="groundbooking.php">Ground Booking</a></li>
						<li><a href="member.php">MemberShip Form</a></li>
						<li><a href="calculator.php">Use DL Calculator</a></li>
					  </ul>
					</li>
      
				  <li><a href="#">Member Profiles</a></li>
                      <li class="active"><a href="login.php">Login</a></li>
                  
                        <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
                    
                  </ul>				 
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<!-- menubar area end -->
			
			<br />
			
		</div>
			
<div class="container">
                 <div class="row">
                        <div class="col-md-8" style="margin-bottom:28px">
                            <h3><strong>Members</strong>  Login</h3>
                            <small class="text-muted"><strong>This section is for Islamabad Diamond Cricket Club Members Only.</strong><br />
               Please enter Member's ID and Password to procced.</small>

                        </div>
                    </div>       
					
			</div>
			
<div class="container">
  <form  method="get">
    <div class="form-group">
      <label>Member ID:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" required>
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default" id="sub">Submit</button>
	<button type="reset" class="btn btn-default" id="res">Reset</button>
  </form>
  <a href="member.php">New User Registration?</a>
</div>
            


	<br />
<footer class="container-fluid text-center">
  <p> Diamond Cricket Club, Islambad, G-8/2, Pakistan </p>

</footer>

</body>
</html>