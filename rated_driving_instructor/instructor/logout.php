<?php
session_start();
include 'includes/database_connection.php';
// Unset all of the session variables.
//get the current session and set he online_flag to zero when the instructor will logout 
$ins_email = $_SESSION['ins_email'];
//update the status of user .. using a query 
$query = mysqli_query($conn,"UPDATE `instructor` SET `online_flag`=0 WHERE `email`='$ins_email'");
$_SESSION = array();
session_destroy(); // Destroying All Sessions
header("Location:login.php"); // Redirecting To login page
?>