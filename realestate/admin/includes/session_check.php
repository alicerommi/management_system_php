<?php
session_start();
if(isset($_SESSION['admin_email'])){
	$admin_email = $_SESSION['admin_email'];
}else{
	header("location:login.php");
}
?>
