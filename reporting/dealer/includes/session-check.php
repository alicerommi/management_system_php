<?php
SESSION_START();
if(!isset($_SESSION["dealer"])){
	header("Location: login.php");
}
?>