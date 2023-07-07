<?php
//include("../common_client/db.php");
session_start();
$member_email ="";
#$member_email=$_SESSION['member_email'];
if (isset($_SESSION['member_email']))
{
		$member_email=$_SESSION['member_email'];	
}
?>

<?php
  include("../common_client/master.php");
  #include("../common_client/profileheader.php");
 ?>
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
		   <div class="navbar-left ">
		   
            <a href="index.php" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
				
		 </a>
          </div>
		  
		  
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Match Schedules</a></li>
						<!--
						<li><a href="#">Winning Match Details</a></li>
						<li><a href="#">Upcoming Match List</a></li>
						-->
						<li class="divider"></li>
						<li><a href="groundbooking.php">Ground Booking</a></li>
						<li class="active"><a href="membershipform.php">MemberShip Form</a></li>
						<li><a href="calculator.php">Use DL Calculator</a></li>
              </ul>
            </li>
            <li ><a href="member_profiles.php">Member Profiles</a></li>
                    <!--  <li ><a href="login.php">Login</a></li> -->
					<li><a href="teams.php">Our Teams</a></li>
					
					 <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
			
          </ul>
		 <?php if (session_status() == PHP_SESSION_ACTIVE) {
					//echo 'Session is active';
					$query = "SELECT* FROM membership WHERE email='$member_email' AND status='active'";
					$res = mysqli_query($conn,$query);
					if(mysqli_num_rows($res)==1){
						while($rows = mysqli_fetch_array($res)){
						

					?>
					 <div class="navbar-right">
					 
					<li class="dropdown" style="list-style: none;">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> <span class="caret"></span>
				  
                    <?php
					
						if(strlen($rows["image"])==null){
									 echo "<img src='http://localhost/abc/c2/common_client/image/default.png'  height='50' width='60' class=
'thumb-lg img-circle img-thumbnail' alt='".$rows["name"]."'  >"."<br/>";
								}
else{								
							   echo "<img src='http://localhost/abc/c2/common_client/image/".$rows["image"]."  '  height='50' width='60' class=
' img-circle' alt ='profile image' >"."<br/>";
						
						

		 } 
					echo $rows["name"]."<br/>";
					 
					echo '
				
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="active">
                      <a href="profile.php">
                        <i class="fa fa-user" >&nbsp; </i>
                          Profile
                      </a>
                    </li>
                   <li>
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
					
					</ul>
					</li>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

		 <section class="demo-page padding-bottom-2x">
  <!-- menubar area end -->
         <div class="container">
		 
		 <div class="demo-page alert-demo">
    
      <div class="alert alert-fullwidth alert-success fade in">
        
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php
			$query = "SELECT name FROM membership WHERE email='$member_email' AND status='active'";
			$res = mysqli_query($conn,$query);
			if(mysqli_num_rows($res)>0){
				while($r = mysqli_fetch_array($res)){
					$name = $r['name'];
					
				}
			}
		  ?>
		  <strong>Hello, <?php echo $name." ";?> you have successfully logged in to your profile. </strong>
		  <?php
			//date_default_timezone_set("Pakistan/Karachi");
			//$today = date("F j, Y, g:i a");  
			//echo " ".$today;
			date_default_timezone_set("Asia/Karachi");
			$today = date("F j, Y, g:i a");  
			echo " ".$today;

		  ?>
        
      </div>
	  </div>
	 
      <div class="row">
			<div class="col-sm-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							Player Preferences
						</h3>
					</div>
					<div class="panel-body">
							<div class="row">
									<?php
									$query = "SELECT *FROM membership WHERE email='$member_email' AND status='active'";
									$result = mysqli_query($conn,$query);
										if(mysqli_num_rows($result)>0){
											while($rows = mysqli_fetch_array($result)){
											
									?> 
									<div class=" col-md-3 col-lg-3 "> 
										  <table class="table table-user-information">
												<tbody>
													  <tr>
														<td>Playing Role</td>
														<td><strong><?php echo $rows["play_role"]; ?></strong></td>
													  </tr>
													  <tr>
														<td>Batting Style</td>
														<td><strong><?php echo $rows["bat_style"]; ?></strong></td>
													  </tr>
													  <tr>
														<td>Bowling Style</td>
														<td><strong><?php echo $rows["bow_style"]; $id=$rows["id"]; }}?></strong></td>
													  </tr>
												</tbody>
											 </table>
											 
									</div>
									
							</div>
					</div>
				</div>
			</div>
		
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-9   toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Personal Information</h3>
					
            </div>
            <div class="panel-body">
              <div class="row">
							<?php
								$query = "SELECT *FROM membership WHERE email='$member_email' AND status='active'";

								$result = mysqli_query($conn,$query);



								if(mysqli_num_rows($result)>0){
									while($rows = mysqli_fetch_array($result)){
										$showimage=$rows["image"];
								//echo $showimage;}}
							?> 
												
							<?php if(strlen($showimage)==null){
echo"								
                <div class='col-md-3 col-lg-3' align='center'> <img alt='User Pic' src='http://localhost/abc/c2/common_client/image/default.png' class='img-circle img-responsive'> </div>";
							}else{
								//echo $showimage;
					echo"								
                <div class='col-md-3 col-lg-3' align='center'> <img alt='User Pic' src='http://localhost/abc/c2/common_client/image/".$showimage."' class='img-circle img-responsive'> </div>";
				}

				?>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name</td>
                        <td><strong><?php echo $rows["name"]; ?> </strong></td>
                      </tr>
                      <tr>
                        <td>Mobile </td>
                        <td><strong><?php echo $rows['contact_number'];  ?></strong></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a><?php echo $rows['email'];  ?></a></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>City</td>
                        <td><strong><?php echo $rows['city'];  ?></strong></td>
                      </tr>
                        <tr>
                        <td>Date of Birth</td>
						
                        <td><strong><?php
							$originalDate = $rows['date'];
							$newDate = date("d-m-Y", strtotime($originalDate));
						echo $newDate;  ?></strong></td>
                      </tr>
					   <tr>
                        <td>Club Joining Date</td>
						
                        <td><strong><?php
							$originalDate = $rows['joining_date'];
							$newDate = date("d-m-Y", strtotime($originalDate));
						echo $newDate;  ?> </strong></td>
                      </tr>
					  <tr>
						<td>Major Teams</td>
						<td>
										<?php
															//echo $id; 
																	$query = "SELECT `teamID` FROM `teamplayers` WHERE `playerID`='$id' ";
																	$output = mysqli_query($conn,$query);
																	$team_id ="";
																	$array  = array();
																	
																		while($r=mysqli_fetch_array($output)){
																			$team_id = $r['teamID'];
																			$q = "SELECT* FROM `teams` WHERE `teamID` = '$team_id'";
																			$found=mysqli_query($conn,$q);
																			
																			if(mysqli_num_rows($found)>0){
																				
																				while($team_record = mysqli_fetch_array($found) ){
																					
																					echo "<ul style=font-size:20px>";
																					echo "<li>" .$team_record['teamName']. "</li>" ;
																					echo "</ul>"; 
																					
																				}
																				
																			}
																		}
																				if(strlen($team_id)==null)
																				{
																					echo " <strong> This player is not selected to any team of club.</strong>"; 
																				}	
																	?>
						
						</td>
					  
                     <?php } } ?>
                    </tbody>
                  </table>
                  <!--
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a> 
				  -->
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Your Favourite" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="fa fa-heart-o"></i></a>
						<div class="pull-right">
							
						<a type="button"  href="pass_settings.php" class="btn btn-sm btn btn-success" ><i class="fa fa-edit">&nbsp;Change Password
							</i> </a>
						</div>
				 </div>
            
          </div>
        </div>
      </div>
    </div>
</section>
</body>
<!-- Modal -->
	<?php
	/*$flag=true;
	if($_POST){
		if(isset($_POST['insert'])){
			
		$newpass = $_POST['inputPass'];
	
		$conpass= $_POST['inputConfirmPass'];
	
		$oldpass= $_POST['inputOldPass'];	
			//echo $oldpass;
		//die;
		$query = "SELECT password FROM membership WHERE email='$member_email' ";
		
	
		$check =  mysqli_query($conn,$query);
		if(mysqli_num_rows($check)){
			while($row = mysqli_fetch_array($check)){
				$oldPassword = $row["password"];
			}
		}
		if($newpass==$oldPassword){
				$flag = false;
				echo '<script>';
				echo 'alert("New password and old password are matched. Use to use different password")';
				echo '</script>';
			
		}else if(strlen($conpass)<10 && strlen($newpass)<10){
			$flag = false;
			echo '<script>';
			echo 'alert("Length of choosen passord must be equal or greater than 10")';
			echo '</script>';
		}
		
		if($oldPassword!=$oldpass){
			$flag = false;
			//$err3 = "Entered old password does not matched to your old password";
			echo '<script>';
			echo 'alert("Entered old password does not matched to your old password")';
			echo '</script>';
		}
		if($flag){
			
					$update_query = "UPDATE membership SET password='$newpass' WHERE email='$member_email' AND password='$oldPassword'";
					$reponse = mysqli_query($conn,$update_query);
					if($reponse ){
						echo '<script>';
						echo 'alert("Password is successfully updated")';
						echo '</script>';
					
					}
		}else{
						echo '<script>';
						echo 'alert("Errors in updating password")';
						echo '</script>';
			
		}
		
		}
	}
	
	*/?>
 <!--
 <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">PHP Ajax Insert Data in MySQL By Using Bootstrap Modal</h4>
   </div>
   <div class="modal-body">
	
                        <form method="post" id="insert_form" name="insert_form">
							<div class="form-group">
								<label for="new_password">Enter New Password</label>
								<input type="password" class="form-control" id="inputPass" name="inputPass"  placeholder="Enter your new password"  maxlength="20"/>
								<span class="help-block">Note: Minimum password length must be 10.</span>
							</div>
							<div class="form-group">
								<label for="new_con_password">Confirm New Password</label>
								<input type="password" class="form-control" id="inputConfirmPass" name="inputConfirmPass" placeholder="Enter new password again" min="10" maxlength="20"/>
								<span class="help-block">Hint: Use special keys, numbers to enhance security of your account. </span>
							</div>
							<div class="form-group">
								<label for="old_password">Enter Your Old Password</label>
								<input type="password" class="form-control" id="inputOldPass" name="inputOldPass" placeholder="Enter your old password" min="10" maxlength="20"/>
								<span class="help-block">Note: Do not use previous password as new password.</span>
							</div>
							<input type="submit" name="insert" id="insert" value="Update" class="btn btn-primary"/>
						</form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<script>
/*
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){
  event.preventDefault();
  if($('#inputPass').val() == "")
  {
   alert("New password field is required");
  }
  else if($('#inputConfirmPass').val() == '')
  {
   alert("Confirm password field is required");
  }
   else if($('#inputOldPass').val() == '')
  {
   alert("Old password field is required");
  }
  else
  {
   $.ajax({
    url:"member_profile_actions/changepassword_form.php",
    method:"POST",
    data:$('#insert_form').serialize(),
    beforeSend:function(){
     $('#insert').val("Inserting");
    },
    success:function(data){
    // $('#insert_form')[0].reset();
     $('#add_data_Modal').modal('hide');
    // $('#employee_table').html(data);
    }
   });
  }
 });
});
*/
 </script>
-->
<?php include("../common_client/footer.php");
?>


<script type="text/javascript" src="../assets_client/assets/profile/js/profile.js">
</body>
</html>
