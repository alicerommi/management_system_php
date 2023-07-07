 <?php
include("../common_client/master.php"); 

 if(isset($_GET['team_id'])){
            $teamid= $_GET['team_id'];
          } ?>
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
				<!-- 		<li><a href="groundbooking.php">Ground Booking</a></li> -->
						<li><a href="membershipform.php">MemberShip Form</a></li>
					<!-- 	<li><a href="calculator.php">Use DL Calculator</a></li> -->
              </ul>
            </li>
            <li ><a href="member_profiles.php">Member Profiles</a></li>
                    <!--  <li ><a href="login.php">Login</a></li> -->
					<li class="active"><a href="teams.php">Our Teams</a></li>
					
					 <li><a href="about.php">About Us</a></li>
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
        </nav>
      </div>
    </header><!-- Header Close-->
  <body>
   <section class="demo-page padding-bottom-2x">
  <!-- team file content put here --> 
  <div class="container">
   
<div class="row">
    <div class="col-lg-2 col-xs-2">


	 </div>
	 
    <div class="col-lg-10 col-xs-10" style="padding-top:20px">
      <div class="col-lg-0 col-lg-push-6 col-md-6 col-md-push-4 col-sm-2 col-sm-push-0 col-xs-6 col-xs-push-0">
        <!-- <div class="pull-right"><div class="form-group">
				<div class="input-group">
					 
					<input type="text" name="search_text" class="form-control addon-right"  id="search_text" placeholder="Search by Player Name"  />
					<input type="hidden" value="<?php echo $teamid; ?>" name="id" id="id">
					
					<span class="input-group-btn">
						<button class="btn btn-primary icon-left" type="button">
							<i class="fa fa-search" ></i>
					</button>
				</span>					
			</div>
			
			</div></div> -->
      </div>
    </div>
	
	
  <div class="page-header text-left" style="font-color:Black;">
        <h3 class="block-heading space-bottom"><?php
		            $team_name = "SELECT `teamName` FROM `teams` WHERE `teamID`='$teamid' "; 
								$result = mysqli_query($conn,$team_name);
								while($row = mysqli_fetch_array($result)){
									echo "Players of ".$row['teamName']."";
								}
		?>
    

    </h3>
		
			<div class="row">
			
		
				<div id="result">
          <?php 

        $query ="
SELECT * 
FROM  `membership` 
WHERE  `id` 
IN (
SELECT playerID
FROM teamplayers
WHERE teamID =$teamid
)";
				     $res = mysqli_query($conn,$query);
                   
                   if(mysqli_num_rows($res)>0){
                   while($row = mysqli_fetch_array($res)){
           ?>
        <div class="col-sm-3">
          <div class="thumbnail with-caption">
                        <?php 
                // if(strlen($row["image"])==null){
                    
                //   echo "<img src='http://localhost/abc/c2/common_client/image/default.png'width='100px' height='50px'  >"."<br>"; } 
                  
                //   else{
                //   echo "<img src='http://localhost/abc/c2/common_client/image/".$row["image"]."  ' width='100px' height='50px'  >"."<br>";
                // } 
            ?> 
                        
            <div class="caption">
              <h4 class="text-uppercase text-center">
                <?php echo $row["name"]; ?>
              </h4>
              <strong class="text-info ">
                <p class="text-center">
                <?php 
                  echo $row["play_role"];   
                ?>
                </p>
              </strong>
            
            <center>
            <?php echo' <input type="button" name="view" value="view" id='.$row['id'].' class="btn btn-info btn-xs view_data" /> '
            ?>
            </center>
            </div>
          
          </div>
        </div>
        
        
          <?php
                    }
                  
                  }                       
            ?>  
				</div>
	
	 
					
				
					
									                  	
								
								
								
								</div>
								</div>
			<!--for view-->
		<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Player Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
               
				</div>  
                <div class="modal-footer">  
					<div class="pull-right">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
					 </div>
                </div>  
           </div>  
      </div>  
 </div>   <!--view modal end-->					
								
		</div>						
								</section>
 

		<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
 	  
	  
      $(document).on('click', '.view_data', function(){  
           var match_id = $(this).attr("id");  
           if(match_id != '')  
           {  
                $.ajax({  
                     url:"teams_players/select.php",  
                     method:"POST",  
                     data:{match_id:match_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>

<?php include("../common_client/footer.php"); ?>


</body>
	</html>