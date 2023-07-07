<?php
session_start();
$_SESSION['teacher_email']="";
if(strlen($_SESSION['teacher_email'])==0) // Destroying All Sessions
{
	header("Location:../login.php"); // Redirecting To login page
}
?>