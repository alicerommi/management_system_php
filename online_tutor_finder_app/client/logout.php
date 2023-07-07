<?php
session_start();

// Unset all of the session variables.
$_SESSION = array();

session_destroy(); // Destroying All Sessions

header("Location: login.php"); // Redirecting To login page



?>