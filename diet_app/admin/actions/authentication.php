<?php
session_start();
include '../../includes/database_connection.php';
if(isset($_POST['adminLogin'])){
	$EmailAddress = test_input($_POST['EmailAddress']);
	$pwd =$_POST['pwd'];
	$query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email='$EmailAddress' AND admin_password='$pwd'");
	if(mysqli_num_rows($query)==1){
		$_SESSION['admin_email']=$EmailAddress;
		header('location:../index.php');
	}else{
		header('location:../login.php?loginStatus=0');
	}
}//end adminLogin isset here
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>