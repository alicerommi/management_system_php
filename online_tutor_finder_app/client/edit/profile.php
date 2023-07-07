<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
    <title>user profile</title>
    <style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    border: none;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
  </head><?php
    include("../common_client/master.php");
    #include("../common_client/profileheader.php");
   ?>
  <body>
    <!-- navbar for desktop display -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- navbar for mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
          data-target="#bs-example-navbar-collapse-1"></button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services<span class="caret"></span></a>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#">Match Selection</a></li>
						<li><a href="#">Winning Award Lists</a></li>
						<li><a href="#">Upcoming Match List</a></li>
						<li class="divider"></li>
						<li><a href="groundbooking.php">Ground Booking</a></li>
						<li class="active"><a href="membershipform.php">MemberShip Form</a></li>
						<li><a href="calculator.php">Use DL Calculator</a></li>
					  </ul>
					</li>
            <li class="active">
              <a href="profile.php">Member Profiles</a>
            </li>
            <li>
              <a href="Login.php">Login</a>
            </li>
            <li>
              <a href="about.php">About Us</a>
            </li>
            <li>
              <a href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!-- menubar area end -->
    <div class="container">
   
	 <div class="row row-centered">
	   <div class="col-md-6" >
	 <div class="panel panel-default">
	 <div class="panel-heading">Enter Your Personal Information</div>
<div class="panel-body" style="padding-top:2em">	 
	  
        <form role="form"  method="post" id="myForm"
enctype="multipart/form-data" >										
 <div class="form-group">
			   <label for="playing_role">Playing Role </label>
			   <select class="form-control" id="p_role" name="p_role" required >
			   <option value="" selected disabled>Nothing selected</option>
			   <option value="Islambad">Player</option>
			   <option value="Batsman">Batsman</option>
			   <option value="Bowler">Bowler</option>
			     
			   </select>
			    </div>
				
			  <label for="batting_style"> Bating Style</label>
			   <div class="checkbox">
			    
  <label><input type="checkbox" value="Right Handed">Right Handed</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" value="Left Handed">Left Handed</label>
</div>


 <label for="bowling_style"> Bowling Style</label>
			   <div class="checkbox">
			    
  <label><input type="checkbox" value="Right Handed">Right Handed</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" value="Left Handed">Left Handed</label>

</div>				

		<button class="btn btn-primary waves-effect waves-light w-md" type="submit" >Save</button> 
		<button class="btn btn-primary waves-effect waves-light w-md" type="reset" >Reset</button> 
                                        </form>
										</div>
     
    </div>
	</div>
</div>	
</div>	

    <footer class="container-fluid text-center" style="padding:1rem; position: relative; right: 0; bottom: 0; left: 0;">
      <p>Diamond Cricket Club, Islambad, G-8/2, Pakistan</p>
    </footer>
  </body>
</html>
