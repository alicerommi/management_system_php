<?php
	//for authentication 
session_start();
include '../../includes/database_connection.php';
if(isset($_POST['teacherlogin'])){
	$email = test_input($_POST['teac_email']); 
	$pass = test_input($_POST['teac_pass']); 
	$query = mysqli_query($conn,"SELECT* FROM teacher WHERE teacher_email='$email' AND teacher_password='$pass'");
	if(mysqli_num_rows($query)==1){
		$row = mysqli_fetch_array($query);
		if($row['teacher_account_status']==1){
				$_SESSION['teacher_email']=$email;
			header("location:../index.php");
		}
		else if($row['teacher_account_status']==2){
			header("location:../login.php?bloacked=2");
		}
		else if($row['teacher_account_status']==0){
			header("location:../login.php?pending=1");
		}
	else{
		header("location:../login.php?loginStatus=0");
	} 
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>