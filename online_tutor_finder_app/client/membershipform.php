<?php
//session_start();
$member_email="";
if (isset($_SESSION['member_email']))
{
$member_email=$_SESSION['member_email'];  
}
?>	
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>

	
	<!--for date picking-->
	   
    <script type="text/javascript" src="../assets_client/assets/date_picker/bday-picker.js"></script>

	<script type="text/javascript" src="../assets_client/assets/date_picker/bday-picker.min.js"></script>
  <!-- <script type="text/javascript">
    //  $(document).ready(function(){
     // $("div").birthdaypicker(options={birthday[day],birthday[month],birthday[year]});
	  //$("#picker1").birthdaypicker({});
        
      //});
    </script>
	<!---end date picker packages-->
	
	<script src="../assets_client/assets/uploadImage/js/script.js"></script>
	<link rel="stylesheet" href="../assets_client/assets/uploadImage/css/style.css" >
	
	<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	-->
	<script>

$(document).ready(function() {
        $("#exampleInputFile").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Please select only images");
          }
        });
      });
	
	</script>
	</head>
	
	
<?php
include("../common_client/master.php");
?>


<?php
$error= false;

$userErr="";
$msg="";
$email_dupErr="";
$phone_dupErr="";	
$phone_length="";
$ageErr="";
$selectdobErr ="";


	if(isset($_POST['submit'])){		
		$name = trim($_POST['InputName']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
	
	
		$email = trim($_POST['InputEmail']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
	
		$selectOption = $_POST['cityOption'];
		
		$number = trim($_POST['InputNumber']);
		$number = strip_tags($number);
		$number = htmlspecialchars($number);
		if(!isset($_POST['month']) && !isset($_POST['day']) && !isset($_POST['year'])){
		$selectdobErr = "Select your date of birth";	
		$error=true;
		#exit();
		
		}else{
		$month = $_POST['month'];
		$day = $_POST['day'];
		$year = $_POST['year'];
		
		$user_dob = $year."-".$month."-".$day;
		
		#$cur_date = strftime('%F');
		$newDate = date("d-m-Y", strtotime($user_dob));
		$from = new DateTime($user_dob);
		$to   = new DateTime('today');
		$age = $from->diff($to)->y;
		$current_date = date("Y-m-d"); #for joining the
		$joining_date = date("d-m-Y",strtotime($current_date));			
		}
	if(!preg_match("/^[a-zA-Z ]+$/",$name)){
			$error = true;
			$userErr = "Name must contain alphabets and space.";
			}
		//$connection = mysql_connect("localhost","root","");
		//$db = mysql_select_db("diamond_db",$connection);
		$duplicate_name = mysqli_query($conn,"SELECT* from `membership` WHERE `name`='$name' AND `status` ='active' "); 
		
		$res = mysqli_num_rows($duplicate_name);

		$q = mysqli_query($conn,"SELECT* from `membership` WHERE email='$email' AND `status` ='active'"); #for applying more constraints on email append in query (AND status='active'); 
		$duplicate_email = mysqli_num_rows($q);
		#for contact number
		$r = mysqli_query($conn,"SELECT* from `membership` WHERE contact_number='$number' AND `status` ='active'"); 
		$duplicate_number = mysqli_num_rows($r);
		
		$first_name = $name;
		$i = 0;
do {
  //Check in the database here
  $duplicate_name = mysqli_query($conn,"SELECT* from `membership` WHERE `name`='$name' AND `status`='active'"); 
  $exists = mysqli_num_rows($duplicate_name);
  //$exists = exists_in_database($name);
  if($exists>0) {
    $i++;
    $name = $first_name . $i;
  }
}while($exists);
//save $name

		
if($duplicate_email != 0)
{
	$email_dupErr = "This email   " .$email. " is already taken.";
		$error=true;
	
}
if($duplicate_number != 0){
	$phone_dupErr = "This number ".$number." is already taken.";
	$error=true;
}

if(strlen($number) < 13){
	$phone_length= "Enter the complete cell number e.g (0300-123-4567)";
	$error=true;
}

if($age<20)
	{
		$ageErr="Entered age is ".$age." age must be between 20-35";
		$error=true;
	}
		$playing_role=$_POST['p_role'];
		
		$bowling_style=$_POST['bow_style'];
		$batting_style=$_POST['bat_style'];
}
if($_POST){
if(!$error){
$upload_dir =  'file:///C:/wamp/www/abc/c2/common_client/image/';
	
	
	$target = $upload_dir . basename($_FILES['image']['name']);	
	$image = $_FILES['image']['name'];
	
	#$final_date=strrev($user_dob);
		$query = "INSERT INTO `membership`(image,name,email,city,contact_number,date,play_role,bat_style,bow_style,joining_date) 
		
		VALUES('$image','$name','$email','$selectOption','$number','$newDate','$playing_role','$batting_style',
		
		'$bowling_style',NOW())" ;

			
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		}
		$res = mysqli_query($conn,$query);
			if($res){	
		echo '<script language="javascript">';
		echo 'alert("successfully submitted")';
		echo '</script>';
		
		}
		else{
		echo '<script language="javascript">';
		echo 'alert("Error Occurs during the submittion of form")';
		echo '</script>';
		}
	}else{
		echo '<script language="javascript">';
		echo 'alert("Error Occurs during the submittion of form")';
		echo '</script>';
		//echo "error";
		}
		
		mysqli_close($conn);
}
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
		 <!--   <div class="navbar-left ">
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
						<li class="active"><a href="membershipform.php">MemberShip Form</a></li>
					<!-- 	<li><a href="calculator.php">Use DL Calculator</a></li> -->
              </ul>
            </li>
            <li ><a href="member_profiles.php">Member Profiles</a></li>
                    <!--  <li ><a href="login.php">Login</a></li> -->
					<li><a href="teams.php">Our Teams</a></li>
					
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
		 <section class="demo-page padding-bottom-2x">
		<div class="container">
		
		<h2 class="w3-wide w3-center">Fill The Membership Form</h2>
	<h3 class="block-heading"></h3>
	
    <div class="row">
	
        <form role="form" method="POST" enctype="multipart/form-data">
            <div class="col-lg-6">
			<!--for upload an image of member-->
			<div id="wrapper" >
			<div id="image-holder"></div>
			<label for="pic">Choose Image</label>
			
			<input id="exampleInputFile" name="image" type="file"/> 
			<span style="color:red;"><?php
 			echo $msg;			
			 ?></span>
			</div>
			<!--End image upload code-->
			
				<div class="form-group">
                    <label for="InputName">Enter Full Name</label>
                    
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Your Full Name" required>
					<span style="color:red;">
					<?php echo $userErr;
						?>
					</span>
                    
                </div>
				
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" maxlength="35" required>
                       <span id="dupemail" style="color:red;"><?php
						echo $email_dupErr;
							?>
					   </span>
                    
                </div>
			  
               <div class="form-group">
			   <label for="sel1">Select City </label>
			   <select class="form-select space-bottom" style="display:none"  id="sel" name="cityOption" required >
			   <option value="" selected disabled>Nothing selected</option>
			   <option value="Islamabad">Islamabad</option>
			   <option value="Rawalpindi">Rawalpindi</option>
			   </select>

			   </div>
			   <div class="form-group">
			   <label for="cellnumber">Cell Number(Format: XXXX-XXX-XXXX)</label>
			   <input type="text" class="form-control bfh-phone"  maxlength="13" 
			   data-format="dddd-ddd-dddd" id="cell_no" name="InputNumber"
			   placeholder="Contact Number" required>
			   </input>
			   <span id="dupemail" style="color:red;"><?php
						if(strlen($phone_dupErr)!=0)
						echo $phone_dupErr;
					else
						echo $phone_length;
						
						 ?>
			   </div>
			   <div class="form-group">
			   <label for ="birthday">Birth Day</label><br/>
<select name="month"   onChange="changeDate(this.options[selectedIndex].value);" required>
<option value="na">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="day" id="day" required>
<option value="na">Day</option>
</select>
<select name="year" id="year" required>
<option value="na">Year</option>
</select>
<span style="color:red;">
<?php
if($ageErr!=null)
echo $ageErr;
else
echo '<p class="text-danger">Minimum age limit is 20.</p>';
	?>

</span>
</div>
<script language="JavaScript" type="text/javascript">
function changeDate(i){
var e = document.getElementById('day');
while(e.length>0)
e.remove(e.length-1);
var j=-1;
if(i=="na")
k=0;
else if(i==2)
k=28;
else if(i==4||i==6||i==9||i==11)
k=30;
else
k=31;
while(j++<k){
var s=document.createElement('option');
var e=document.getElementById('day');
if(j==0){
s.text="Day";
s.value="na";
try{
e.add(s,null);}
catch(ex){
e.add(s);}}
else{
s.text=j;
s.value=j;
try{
e.add(s,null);}
catch(ex){
e.add(s);}}}}
y = 1997;
while (y-->1977){
var s = document.createElement('option');
var e = document.getElementById('year');
s.text=y;
s.value=y;
try{
e.add(s,null);}
catch(ex){
e.add(s);}}
</script>

		</div>
        <div class="col-lg-5 col-md-push-1">
				   <div class="form-group">
                  <label for="playing_role">Playing Role</label> 
                  <select class="form-select space-bottom" style="display:none"  id="p_role" name="p_role" required="">
                    <option value="" selected="selected" disabled="disabled">Nothing Selected</option>
                    <option value="All-rounder">All Rounder</option>
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                  </select></div>
		
                  

<script type="text/javascript">
	$(document).getElementById("bowling_style1").checked;

</script>

                  <label for="bowling_style">Bowling Style</label><br/>
                <div class="form-group">
	                  
	                 <select class="form-select space-bottom" style="display:none"  name="bow_style" required="">
	                    <option value="" selected="selected" disabled="disabled">Nothing Selected</option>
	                    <option value="Right-arm Fast">Right-arm Fast</option>
	                    <option value="Right-arm Fast Meduim">Right-arm Fast Meduim</option>
						<option value="Right-arm Meduim Fast">Right-arm Meduim Fast</option>
	                    <option value="Right-arm Meduim">Right-arm Meduim</option>
						<option value="Left-arm Fast Meduim">Left-arm Fast Meduim</option> 
						<option value="Left-arm Meduim Fast">Left-arm Meduim Fast</option>	 
						<option value="Left-arm Meduim">Left-arm Meduim</option>
						 <option value="Off Breek">Off Break</option>
	                    <option value="Log Break">Leg Break</option>
						<option value="Slow Left-arm -Orthobox">Slow Left-arm -Orthobox</option>
	                    <option value="Slow Left-arm Chinaman">Slow Left-arm Chinaman</option>                    
	                 </select>
                 </div>
				 <label for="bat_style">Batting Style</label>
                 
                  <div class="radio">
                    <label>
                    <input type="radio" name="bat_style" value="Right Handed" required/>Right Handed</label>
                    <br/>
                    <label>
                    <input type="radio" name="bat_style" value="Left Handed" />Left Handed</label>
                  </div>     	     
             
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary pull-right"> &nbsp &nbsp </input>
					  <a class="btn btn-info pull-right"  data-toggle="modal" data-target="#basicModal">Help</a>
					  
					 <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
																<div class="modal-dialog">
																	<div class="modal-content">
																			<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
																			<h4 class="modal-title" id="myModalLabel"><span class="myhead">Membership Form</span></h4>
																			</div>
																				<div class="modal-body">
																				
																					<table class='help' cellpadding=16 width=100%>
																						  <tr>
																							<td>
																							
																								To fill the membership form follow these steps:<br /><br />
																								1. Fill the membership form correctly.<br /><br />
																								2. Enter your work email because we will notify you through this email.<br /><br />
																								3. After filling the all input fields click on submit button, the membership request will successfully send. <br /><br />
																								4. If the administrator accept or reject your request then a notification will recieved to you on entered email address.<br /><br />
																								5. If your request is accept then your account details will included with notification. <br/><br/>
																								<b>NOTE:</b> Enter your details correctly.<br />
																							<strong>The membership fee is 3000.</strong>
																							
																							</td>
																						  </tr>
																					</table>
																				</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>  
																	</div>
																</div>
															  </div>
					</div>	 
				 
            
        </form>
            
        </div>
    </div>
</div>
</section>

<?php include("../common_client/footer.php"); ?>

</body>
</html>