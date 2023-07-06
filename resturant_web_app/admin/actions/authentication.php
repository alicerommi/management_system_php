<?php
	session_start();
	$dir = "../../includes/";
	include $dir.'database_connection.php';
	include $dir.'cleaner_input.php';
	include $dir.'functions.php';
	#for authentication
	if(isset($_POST['admin_login_form'])){
		$admin_email = $_POST['admin_email'];
 		$admin_pass = $_POST['admin_pass'];
 		$query = mysqli_query($conn,"select* from admin where admin_email='$admin_email' and admin_password='$admin_pass'");
 		if(mysqli_num_rows($query)==1){
 			$_SESSION['max_py_channel_admin_email'] = $admin_email;
 			header("location:../index.php");
 		}else{
 			header("Location:../login.php?wrong=1");	
 			exit;
 		}
 	}//end authentication

	
?>