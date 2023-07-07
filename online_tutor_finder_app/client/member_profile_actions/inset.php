<?php
$member_email="";
if (isset($_SESSION['member_email']))
{
$member_email=$_SESSION['member_email'];  
}



?>
<?php
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
	?>