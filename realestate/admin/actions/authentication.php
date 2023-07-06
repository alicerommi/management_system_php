<?php
session_start();
include '../../includes/database_connection.php';
if(isset($_POST['adminLogin'])){//for admin login
	session_start();
	$email = test_input($_POST['email']);
	$password = $_POST['password'];
	$query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email='$email' AND admin_password='$password'");
	if(mysqli_num_rows($query)==1){
		$_SESSION['admin_email']=$email;
		header("location:../index.php");
	}else{
		header("location:../login.php?LoginStatus=0");
	}
}//end isset condition here
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>