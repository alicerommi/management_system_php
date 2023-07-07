<?php
session_start();
$member_email="";
if(!isset($_SESSION)){
$member_email=$_SESSION['member_email'];
}

include("../common_client/db.php");
$error= false;

$userErr="";
$msg="";
$email_dupErr="";
$phone_dupErr="";	
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

$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("diamond_db",$connection);
$q = mysql_query("SELECT* from `membership` WHERE email='$email'"); #for applying more constraints on email append in query (AND status='active'); 
$duplicate_email = mysql_num_rows($q);
#for contact number
$r = mysql_query("SELECT* from `membership` WHERE contact_number='$number'"); 
$duplicate_number = mysql_num_rows($r);

if($duplicate_email != 0)
{
	$email_dupErr = "This email   " .$email. " is already taken.";
		$error=true;
	
}
if($duplicate_number != 0){
	$phone_dupErr = "This number ".$number." is already taken.";
	$error=true;
}
if($age<20)
	{
		$ageErr="Entered age is ".$age." age must be between 20-35";
		$error=true;
	}
		$playing_role=$_POST['p_role'];
		
		$bowing_style=$_POST['bow_style'];
		
		$batting_style=$_POST['bat_style'];
		
}
if($_POST){
if(!$error){
$upload_dir =  'file:///C:/wamp/www/dimondcricket/common_client/image/';
$target = $upload_dir . basename($_FILES['image']['name']);	
	$image = $_FILES['image']['name'];
	#$final_date=strrev($user_dob);
		$query = "INSERT INTO `membership`(image,name,email,city,contact_number,date,play_role,bat_style,bow_style,joining_date) 
		VALUES('$image','$name','$email','$selectOption','$number','$newDate','$playing_role','$bowing_style','$batting_style',NOW())" ;

			
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
		echo "error";
		}
		
		mysqli_close($conn);
}
		?>

<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	
	<!--for date picking-->
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../assets_client/assets/date_picker/bday-picker.js"></script><script type="text/javascript" src="../assets_client/assets/date picker/bday-picker.js"></script>
	<script type="text/javascript" src="../assets_client/assets/date_picker/bday-picker.min.js"></script>
  <!-- <script type="text/javascript">
    //  $(document).ready(function(){
     // $("div").birthdaypicker(options={birthday[day],birthday[month],birthday[year]});
	  //$("#picker1").birthdaypicker({});
        
      //});
    </script>
	<!---end date picker packages-->
	<script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js" ></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
	
	
	<script src="../assets_client/assets/uploadImage/js/script.js"></script>
	<link rel="stylesheet" href="../assets_client/assets/uploadImage/css/style.css" >
	
	<style>
	.thumb-image
	{float:right;
	width:100px;
	position:relative;
	padding:2px;
	}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
	
$(document).ready(function() {
        $("#fileUpload").on('change', function() {
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
						<li class="active"><a href="membershipform.php">MemberShip Form</a></li>
						<li><a href="calculator.php">Use DL Calculator</a></li>
					  </ul>
					</li>
      
				  <li><a href="member_profiles.php">Member Profiles</a></li>
                   
					 <li><a href="Login.php">Login</a></li>
					
                       
					   <li><a href="about.php">About Us</a></li>
					  <li><a href="contact.php">Contact Us</a></li>
					   
					 
					
					   <li><a href="profile.php">Your Profile</a></li>
                    
                  </ul>				 
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
			<!-- menubar area end -->
			
			<br />
			
		</div>
		<div class="container">
    <div class="row">
	
	<h4><strong>Membership Form</strong></h4>
        <form role="form" method="POST" enctype="multipart/form-data">
            <div class="col-lg-6">
			<!--for upload an image of member-->
			<div id="wrapper" >
			<div id="image-holder"></div>
			<label for="pic">Choose Image</label>
			<input id="fileUpload" name="image" type="file"/> 
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
                    
                        <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required>
                       <span id="dupemail" style="color:red;"><?php
						echo $email_dupErr;
							?>
					   </span>
                    
                </div>
			  
               <div class="form-group">
			   <label for="sel1">Select City </label>
			   <select class="form-control" id="sel" name="cityOption" required >
			   <option value="" selected disabled>Nothing selected</option>
			   <option value="Islamabad">Islamabad</option>
			   <option value="Rawalpindi">Rawalpindi</option>
			   </select>

			   </div>
			   <div class="form-group">
			   <label for="cellnumber">Cell Number(Format: XXXX-XXX-XXXX)</label>
			   <input type="text" class="form-control bfh-phone"  max length="13" data-format="dddd-ddd-dddd" id="cell_no" name="InputNumber" placeholder="Contact Number" required></input>
			   <span id="dupemail" style="color:red;"><?php
						echo $phone_dupErr; ?>
			   </div>
			   <div class="form-group">
			   <label for ="birthday">Birth Day</label><br/>
<select name="month"  onChange="changeDate(this.options[selectedIndex].value);" required>
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
echo $ageErr;
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
        <div class="col-md-6">
				   <div class="form-group">
                  <label for="playing_role">Playing Role</label> 
                  <select class="form-control" id="p_role" name="p_role" required="">
                    <option value="" selected="selected" disabled="disabled">Nothing selected</option>
                    <option value="Player">Player</option>
                    <option value="Batsman">Batsman</option>
                    <option value="Bowler">Bowler</option>
                  </select></div>
                  <table>
                  <thead></thead>		
                  <label for="bat_style">Bating Style</label>
                  <tbody>
                  <tr>
                  <td>	
                  <div class="radio">
                    <label>
                    <input type="radio" name="bat_style" value="Right Handed" required/>Right Handed</label>
                    
                    <label>
                    <input type="radio" name="bat_style" value="Left Handed" />Left Handed</label>
                  </div>
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <table>
					<thead><th>Pace/Seam Bowling</th></thead>
					<b>Choose Bowling Style:</b>
					<!--Pace/Seam Bowling-->
					<tbody>
					<tr>
					<td>
					<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
					</div>
</td>

					<td>	<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div>	
						</td>
						</tr>
						<tr>
						<td>
						<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div>
						</td>
						<td>	
						<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div>
						</td>
						</tr>
						<tr>
						<td>	
						<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div>
						</td>
						<td>	
						<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div>
						</td>
						<tr>
						<td>	
						<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div> </td>
						<td>	
						<div class="radio">
					<label>
					<input type="radio" name="rf" value="Right-arm Fast" >Right-arm Fast</input>
					</label>
						</div>	
						</td>
						</tr>
</tbody>
</table>
                 <!--
                  <label for="bowing_style">Bowling Style</label>
                  <div class="radio">
                    <label>
                    <input type="radio" name="bow_style" value="Right Handed" required/> Right Handed</label>
                    <br />
                    <label>
                    <input type="radio" name="bow_style" value="Left Handed" />Left Handed</label>
                  </div>
				-->
				<!--
					<p class="h4" style="padding-bottom:12px;">Member age must be between 20-35.<br />
						Acknowledge of your request will comes within three days.<br />
							Request Will reject if any wrong information was entered.<br />
							Becareful, when you entered information for membership.<br />
							
					</p>
					-->
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"> &nbsp &nbsp </input>
				 
            
        </form>
            
        </div>
    </div>
</div>
	<br />
<footer class="container-fluid text-center" style="padding:1rem;">
  <p> Diamond Cricket Club, Islambad, G-8/2, Pakistan </p>

</footer>

</body>
</html>