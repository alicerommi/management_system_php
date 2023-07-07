<?php

$member_email="";
if (isset($_SESSION['member_email']))
{
$member_email=$_SESSION['member_email'];  
}

?>

<html>
  
  <?php
    include("../common_client/master.php");
    #include("../common_client/profileheader.php");
   ?>
<?php
/*
  $passMismatch ="";
$passErr="";
if($_POST){
if(isset($_POST['submit'])) {
  $cur_password = $_POST['curr_password'];
  $new_password= $_POST['new_password'];
  $con_new_password = $_POST['con_new_password'];
  
  if($new_password == $con_new_password){
  
  
  $query_match = "SELECT *FROM `member_login` WHERE `email`='$member_email'";
  
  
  $res = mysqli_query($conn,$query_match);
  #$echo "here";
  if($res){
    $query = "UPDATE `member_login` SET `password`='$new_password' WHERE  `email`='$member_email'";
    #mysql_query("UPDATE `member_login` SET `password`='$new_password' WHERE `email`='$member_email'");
    $success = mysqli_query($conn,$query);
    if($success){
      echo "Your password is successfully updated";
    }
  }else echo "error";
  
  }else{
  $passMismatch = "Passwords are Mismatched";
}
}
}
  */

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
		  <!--
          <a href="index.html" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
		  -->
		   <!-- <div class="navbar-left ">
            <a href="index.php" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
          </div> -->
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
               <li ><a href="matches.php">Match Schedules</a></li>
						<!--
						<li><a href="#">Winning Match Details</a></li>
						<li><a href="#">Upcoming Match List</a></li>
						-->
						<li class="divider"></li>
						<!-- <li ><a href="groundbooking.php">Ground Booking</a></li> -->
						<li><a href="membershipform.php">MemberShip Form</a></li>
						<!-- <li><a href="calculator.php">Use DL Calculator</a></li> -->
              </ul>
            </li>
            <li ><a href="member_profiles.php">Member Profiles</a></li>
                    <!--  <li ><a href="login.php">Login</a></li> -->
					<li><a href="teams.php">Our Teams</a></li>
					
					 <li ><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
			 <?php if (session_status() == PHP_SESSION_ACTIVE) {
					//echo 'Session is active';
					$query = "SELECT* FROM membership WHERE email='$member_email' AND status='active'";
					$res = mysqli_query($conn,$query);
					if(mysqli_num_rows($res)==1){
						while($rows = mysqli_fetch_array($res)){
						

					?>
					 <div class="navbar-right">
					<li class="dropdown" style="list-style: none;">
                  <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"> 
				  
                    <?php
					
						if(strlen($rows["image"])==null){
									 echo "<img src='http://localhost/abc/c2/common_client/image/default.png  '  height='50' width='60' class=
'thumb-lg img-circle img-thumbnail' alt='".$row["name"]."'  >"."<br/>";
								}
else{								
							   echo "<img src='http://localhost/abc/c2/common_client/image/".$rows["image"]."  '  height='50' width='60' class=
' img-circle' alt ='profile image' >"."<br/>";
						
						

		 } 
					echo $rows["name"]."<br/>";
					 
					echo '
				
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="profile.php">
                        <i class="fa fa-user" >&nbsp; </i>
                         Profile
                      </a>
                    </li>
                    <li class="active">
                      <a href="pass_settings.php">  
                        <i class="fa fa-gears">&nbsp;
                        </i> Settings
                      </a>
                    </li>
                  
                    <li>
                      <a href="logout.php">
                        <i class="fa fa-sign-out">
                        </i> Logout
                      </a>
                    </li>
					</li>
					</ul>
					</div>';
					}
		 }
		 }
						else{
							echo '
          <div class="navbar-right navbar-text">
			<a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; <small>Member Login</small></a>
 <!--
		   <a class="navbar-link" href="docs/" target="_blank"><small>Documentation</small></a>
		   -->
						</div> ';} ?>
        </nav>
      </div>
    </header><!-- Header Close-->
	<body>
	<!-- Container -->
	<?php
	$flag = true;
	$err1= "";
	$err2= "";
	$err3= "";
	
	if(isset($_POST['submit'])){
		if(isset($_POST['inputPass'])){
		
		$newpass = $_POST['inputPass'];
		
		}
		//echo $newpass;
		if(isset($_POST['inputConfirmPass'])){
		
		$conpass  = $_POST['inputConfirmPass'];
		
		}
		
		if(isset($_POST['inputOldPass'])){
		
		$oldpass = $_POST['inputOldPass'];	
		
		}
		
		$query = "SELECT password FROM membership WHERE email='$member_email' ";
		
		$checkOldPass =  mysqli_query($conn,$query);
		if(mysqli_num_rows($checkOldPass)){
			while($row = mysqli_fetch_array($checkOldPass)){
				$oldPassword = $row['password'];
			}
		}
		
		if($newpass==$oldPassword){
			$flag = false;
			$err1 = "Entered password matched with old password. So use different password";
		}
		if(strlen($newpass)<10 && strlen($newpass)<10 ){
			
			$flag=false;
			$err2 = "Length of entered password is less than 10.";
		}
		if($oldPassword!=$oldpass){
			$flag = false;
			$err3 = "Entered old password does not matched to your old password";
			
		}
		
		if($flag){
				$query = "UPDATE membership SET password='$newpass' WHERE email='$member_email'";
				$result = mysqli_query($conn,$query);
				if($result){
					echo '<script>';
					echo 'alert("Successfully password has been changed")';
					echo '</script>';
					
				}
				
			}else{
					echo '<script>';
					echo 'alert("Errors in updating the password")';
					echo '</script>';
		}
		
	}
	
	?>	
   <section class="demo-page padding-bottom-2x">
			<div class="container">
				<h3 class="block-heading"> Update Account Password</h3>
					<div class="col-md-8">
						<form name="update" method="POST">							
								<div class="form-group">
									<label for="new_password">Enter New Password</label>
									<input type="password" class="form-control"  name="inputPass"  placeholder="Enter your new password"  maxlength="20" required />
									<span class="help-block">Note: Minimum password length must be 10.</span>
									<span style="color:red;"><?php echo $err1; ?> </span>
								</div>
								
								<div class="form-group">
									<label for="new_con_password">Confirm New Password</label>
									<input type="password" class="form-control" name="inputConfirmPass" placeholder="Enter new password again"  required maxlength="20"/>
									<span class="help-block">Hint: Use special keys, numbers to enhance security of your account. </span>
									<span style="color:red;"><?php echo $err2; ?> </span>
								</div>
								
								<div class="form-group">
									<label for="old_password">Enter Your Old Password</label>
									<input type="password" class="form-control"  name="inputOldPass" placeholder="Enter your old password" required maxlength="20"/>
									<span class="help-block">Note: Do not use previous password as new password.</span>
									<span style="color:red;"><?php echo $err3; ?> </span>
								</div>
								
									<input type="submit" name="submit"  Value="Update Password" class="btn btn-info"  /></input>
									
						</form>	
				</div>	
					
			</div>
	</section>
   
   <?php
   include("../common_client/footer.php");
   ?>
   