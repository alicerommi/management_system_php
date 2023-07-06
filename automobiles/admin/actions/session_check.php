<?php
			session_start();
			if(!isset($_SESSION['automobiles_adminSession'])){
				header("location:login.php");
			}
?>