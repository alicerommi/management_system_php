<?php
SESSION_START();
if(!isset($_SESSION["admin"])){
	header("Location: login.php");
}
?>