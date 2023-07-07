<?php
session_start();
if(isset($_SESSION['teacher_email'])){
	$teacher_email= $_SESSION['teacher_email'];
}else{	
	header("location:login.php");
}
?>