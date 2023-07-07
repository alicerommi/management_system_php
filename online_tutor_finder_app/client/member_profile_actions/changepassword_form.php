
<?php

session_start();
$member_email ="";
#$member_email=$_SESSION['member_email'];
if (isset($_SESSION['member_email']))
{
$member_email=$_SESSION['member_email'];	
}
?>

<?php

include("../../common/db.php"); 
$err1=$err2=$err3="";
$flag=true;
if(!empty($_POST)){

				$if(isset($_POST['inputPass'])){
		
		$newpass = $_POST['inputPass'];
		
		}
		//echo $newpass;
		if(isset($_POST['inputConfirmPass'])){
		
		$conpass  = $_POST['inputConfirmPass'];
		
		}
		
		if(isset($_POST['inputOldPass'])){
		
		$oldpass = $_POST['inputOldPass'];	
		
		}
		
				$query = "SELECT password FROM membership WHERE email='rehmana578@gmail.com' ";
		
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
				$query = "UPDATE membership SET password='$newpass' WHERE email='rehmana578@gmail.com'";
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
					
	if(strlen($err1)>0){
		echo $err1;
		
	}
	
	if(strlen($err2)>0){
		echo $err2;
		
	}
	
	
	if(strlen($err3)>0){
		echo $err3;
		
	}
	
	
}














/*
$flag= true;
if(!empty($_POST))
{

	$newpass = $_POST['inputPass'];
	
	$conpass= $_POST['inputConfirmPass'];
	
	$oldpass= $_POST['inputOldPass'];
	
	echo $newpass;
	
	die;
	
	$query = "SELECT password FROM membership WHERE email='$member_email' ";
	
	//echo "here";
	$check =  mysqli_query($conn,$query);
		if(mysqli_num_rows($check)){
			while($row = mysqli_fetch_array($check)){
				$oldPass = $row['password'];
			}
		}
    //$age = mysqli_real_escape_string($connect, $_POST["age"]);
   if(strlen($newpass)< 10 && strlen($conpass) < 10){
		$flag=false;
		echo '<script type="javascript">';
		echo 'alert("Password length must be equal or greater than 10.")';
		echo '</script>';
	}elseif($oldpass == $oldpass){
		$flag=true;
	}else 
		$flag = false;
	
	if($flag){
		$update_query = "UPDATE membership SET password='$newpass' WHERE email='$member_email' AND password='$oldPass'";
		$reponse = mysqli_query($conn,$update_query);
		if($reponse ){
			echo '<script>';
	echo 'alert("Password is successfully updated")';
	echo '</script>';
		}else{
			
				echo '<script>';
	echo 'alert("errors")';
	echo '</script>';
		}
	}
}
?>


<?php
/*
include("../../common/db.php");
$flag = true;
if(isset($_POST['conpass']) && isset($_POST['oldpass'])  && isset($_POST['newpass']) ){
	
	$newpass = $_POST['inputPass'];
	
	$conpass= $_POST['inputConfirmPass'];
	
	$oldpass= $_POST['inputOldPass'];
	
	
	$query = "SELECT password FROM membership WHERE email='$member_email' ";
	
	
	$check =  mysqli_query($conn,$query);
		if(mysqli_num_rows($check)){
			while($row = mysqli_fetch_array($check)){
				$oldPass = $row['password'];
			}
		}
	echo "here";	
	if(strlen($newpass)< 10 && strlen($conpass) < 10){
		$flag=false;
		echo '<script type="javascript">';
		echo 'alert("Password length must be equal or greater than 10.")';
		echo '</script>';
	}elseif($oldpass == $oldpass){
		$flag=true;
	}else 
		$flag = false;
	
	if($flag){
		$update_query = "UPDATE membership SET password='$newpass' WHERE email='$member_email' AND password='$oldPass'";
		$reponse = mysqli_query($conn,$update_query);
		if($reponse ){
			echo '<script>';
	echo 'alert("Password is successfully updated")';
	echo '</script>';
		}else{
			
				echo '<script>';
	echo 'alert("errors")';
	echo '</script>';
		}
	}
	
	//$id = $_POST['playerid'];


//	echo $id;
	//echo $newpass;
	//echo $member_email;

//}

?>
































<?php
/*
include("../../common/db.php");
$flag = true;
if(isset($_POST['newpass']) && isset($_POST['conpass']) && isset($_POST['oldpass']) && isset($_POST['id'])){
    
    // Submitted form data
    
	$newpass = $_POST['newpass'];
	
	$conpass = $_POST['conpass'];
	
	$oldpass = $_POST['oldpass'];
	
	$id = $_POST['id'];	
    echo $newpass;
	
	if($newpass != $conpass){
		$flag=false;
	}
	
	if(strlen($newpass)< 10 && strlen($conpass) < 10){
		$flag=false;
		echo '<script type="javascript">';
		echo 'alert("Password length must be equal or greater than 10.")';
		echo '</script>';
		
	}
	
	$query = "SELECT password FROM membership WHERE id='$id' ";
	$check =  mysqli_query($conn,$query);
		if(mysqli_num_rows($check)){
			while($row = mysqli_fetch_array($res)){
				$oldPass = $row['password'];
			}
		}
		
	if($flag){
		$update_query = "UPDATE membership SET password='$newpass' WHERE id='$id' AND password='$oldPass'";
		$reponse = mysqli_query($conn,$update_query);
		if($reponse ){
		$status = 'ok';	
		}
	}else{
		$status='err';
	}	
	/*
    // Send email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'err';
    }
    */
    // Output status
  //  echo $status;
//	die;
//}

?>