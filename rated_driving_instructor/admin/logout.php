<?php
include 'includes/session_check.php';
include 'includes/database_connection.php';
// Unset all of the session variables.
$_SESSION = array();
session_destroy(); // Destroying All Sessions
//setting the online_flag =0 as admin will be offline 
$query = "UPDATE `admin` SET `online_flag`=0 WHERE `email`='$admin_email'";
$result = mysqli_query($conn,$query);
if($result)
header("Location:login.php"); // Redirecting To login page
?>