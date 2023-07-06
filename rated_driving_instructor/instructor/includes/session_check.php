<?php
//for checking the session is set or not this file will include in every page in the top of start code
session_start();
if(isset($_SESSION['ins_email'])){
	$ins_email = $_SESSION['ins_email'];
	//echo $ins_email;	
}else
header("location:login.php");
?>