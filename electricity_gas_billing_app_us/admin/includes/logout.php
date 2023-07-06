<?php
			session_start();
			if(isset($_SESSION['save_energy_AdminSession'])){
				unset($_SESSION['save_energy_AdminSession']);
				header("location:../login.php");
			}
?>