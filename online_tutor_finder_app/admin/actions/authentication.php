<?php
	//for authentication 
session_start();
include '../../includes/database_connection.php';
if(isset($_POST['Adminlogin'])){
	$email = test_input($_POST['admin_email']); 
	$pass = test_input($_POST['admin_pass']); 
	$query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email='$email' AND admin_password='$pass'");
	// print_r($query);
	// die;
	if(mysqli_num_rows($query)==1){
		$_SESSION['admin_email']=$email;
		header("location:../index.php");
	}else{
		header("location:../login.php?loginStatus=0");
	} 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>