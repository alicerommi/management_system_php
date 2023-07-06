<?php
	session_start();
	if(!isset($_SESSION['max_py_channel_admin_email'])){
		header("Location:logout.php");
	}
?>