<?php
//session_start();
$member_email ="";
if(isset($_SESSION['member_email']))
{
$member_email=$_SESSION['member_email'];	
}
include("../common/db.php");
?>

<?php
include("../common_client/master.php");
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
						<li ><a href="membershipform.php">MemberShip Form</a></li>
						<!-- <li><a href="calculator.php">Use DL Calculator</a></li> -->
              </ul>
            </li>
            <li class="active" ><a href="member_profiles.php">Member Profiles</a></li>
                    <!--  <li ><a href="login.php">Login</a></li> -->
					<li><a href="teams.php">Our Teams</a></li>
					
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
        </nav>
      </div>
    </header><!-- Header Close-->
	<body>
	<section class="demo-page padding-bottom-2x">
	<div class="container">
	<h2 class="w3-wide w3-center">Club Members</h2>
	<h3 class="block-heading"></h3>
	<div class="row">	
		
	<div class="col-lg-2 col-xs-2">


	 </div>
	 <?php
			$query = "SELECT * FROM membership WHERE status='active'";
			$res = mysqli_query($conn,$query);
				if(mysqli_num_rows($res)>0){
		
	 ?>
    <div class="col-lg-9 col-xs-9" >
      <div class="col-lg-0 col-lg-push-8 col-md-6 col-md-push-6 col-sm-2 col-sm-push-0 col-xs-6 col-xs-push-0">
	<div class="form-group">
	<div id="ab">Search Members</div>
	<select id="fetchval" class="form-select space-bottom" style="display:none;" name="fetchby" class="form-control">
						  <option selected disabled>Select Player Role</option>
						  <option value="All-rounder">All Rounder</option>
						  <option value="Batsman">Batsman</option>
						  <option value="Bowler">Bowler</option>
</select>
	</div>
	</div>
	</div>

	
	<div class="row">

	<div id="table-container">
	
	
	</div>


	</div>
	</div>
				<?php }
				else{  ?>
						<div class="col-md-12">
           
            <div class="jumbotron">
              
              <p class="text-info">Club has no members.</p>
              <p class="text-info text-center" ><a class="btn-outlined btn-default" role="button" href="index.php"> <i class="fa fa-arrow-left"></i>Back to Home Page</a></p>
            </div>
          </div>
					
				
				<?php }
				?>
	
	</section>

<script>
    $(document).ready(function(){
				        $(document).on('change','#fetchval',function(){
				            var keyword = $(this).find(':selected').val();
				           // alert(keyword);
				            $.ajax(
				            {
				                url:'member_profile_actions/fetch.php',
				                type:'POST',
				                data:'request='+keyword,
				                
				                beforeSend:function()
				                {
				                    $("#table-container").html('Working...');
				                    
				                },
				                success:function(data)
				                {
				                    $("#table-container").html(data);
				                },
				            });
				        });
    });
    
</script>	

	<script>
	 $(document).ready(function(){
    $("#table-container").load('member_profile_actions/showall.php');
});
	
	</script>
<?php include("../common_client/footer.php"); ?>

</body>
</html>