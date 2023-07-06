<?php
	session_start();
	include '../includes/database_connection.php';
	include '../includes/functions.php';
	if(!isset($_SESSION['busines_owner_id'])){
		header("Location:../customer_login.php?owner_logout=1");
	}
?>