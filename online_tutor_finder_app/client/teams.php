  <?php
include("../common_client/master.php");
$member_email="";
if (isset($_SESSION['member_email']))
{
$member_email=$_SESSION['member_email'];  
}

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
		  <!--  <div class="navbar-left ">
            <a href="index.php" class="navbar-logo">
            <img src="assets/logo/try4.png" alt="Diamond Cricket Club">
          </a>
          </div> -->
        </div>
        <nav class="collapse navbar-collapse tron-navbar-collapse" role="navigation">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="matches.php">Match Schedules</a></li>
						<!--
						<li><a href="#">Winning Match Details</a></li>
						<li><a href="#">Upcoming Match List</a></li>
						-->
						<li class="divider"></li>
						<!-- <li><a href="groundbooking.php">Ground Booking</a></li> -->
						<li><a href="membershipform.php">MemberShip Form</a></li>
						<!-- <li><a href="calculator.php">Use DL Calculator</a></li> -->
              </ul>
            </li>
            <li ><a href="member_profiles.php">Member Profiles</a></li>
                    <!--  <li ><a href="login.php">Login</a></li> -->
					<li class="active"><a href="teams.php">Our Teams</a></li>
					
					 <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
					  <?php if (session_status() == PHP_SESSION_ACTIVE) {
					
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
			
          </ul>
		 
          <div class="navbar-right navbar-text">
			<a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp; <small>Member Login</small></a>
 <!--
		   <a class="navbar-link" href="docs/" target="_blank"><small>Documentation</small></a>
		   -->
          </div> 
        </nav>
      </div>
    </header><!-- Header Close-->
  <body>
   <section class="demo-page padding-bottom-2x"> 
	
                      	<div class="container">
                      	<h2 class="w3-wide w3-center">Club Teams</h2>
                      	<h3 class="block-heading"></h3>
                          <div class="row">
                      <?php $query = "SELECT * FROM teams";
                      				$result = mysqli_query($conn,$query);
                      				if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_array($result)){
                                //SELECT `teamID`, `teamName`, `date` FROM `teams` WHERE 1
                                $teamID = $row['teamID'];
                                $teamName = $row['teamName'];
                                $date = $row['date'];
                                $queryNum = mysqli_query($conn,"SELECT* FROM teamplayers WHERE teamID=$teamID");
                                $numOFPlayers = mysqli_num_rows($queryNum);
                                ?>
                      	     <div class="col-sm-4">
                                    <div class="panel panel-color panel-success">
                                      <div class="panel-heading">
                                      <h3 class="panel-title"><?php echo "Team ID".$teamID; ?> 
                                       </h3></div>
                                      <div class="panel-body">
                                             <div class="caption">
                                        <h4> <p class="h4"><strong><?php echo ucwords($teamName)?></strong></p></h4>
                                        <span class="text-muted"> 
                                       <?php echo "Number of Players: ".$numOFPlayers; ?><br> 
                                        </span>
                                        <span class="text-muted">
                                       <?php echo "TEAM Created Date:".date("d-m-Y",strtotime($date)); ?><br>
                                        </span>
                                        <p class="text-justify">
                                        <strong></strong></p><p class="h4"><strong>About Team</strong><br><br>No Information about Team
                                        </p>
                                        <p></p>
                                        <center>
                                        
                                       <?php  echo '<a href="view_teams_members.php?team_id='.$teamID.'" class="btn btn-primary">View Team Members</a>' ?>
                                        
                                        </center>
                                         </div>
                                        </div>
                                        </div>
                                        </div>

                            <?php  }

                            }
                        ?>	
                      		
                         
                      	
                      </div>
                      <h3 class="block-heading"></h3>
                      		
                      	
                      				
                        </div>

  </section>
  <!--end -->
  <?php 
  include("../common_client/footer.php");
  ?>
  </body>
  
  </html>