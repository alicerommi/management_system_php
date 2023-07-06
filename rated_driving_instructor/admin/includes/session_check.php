<?php
//for checking the session is set or not this file will include in every page in the top of start code
session_start();
if(isset($_SESSION['admin_email'])){
	$admin_email = $_SESSION['admin_email'];	
}else
header("location:login.php");
?>