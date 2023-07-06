<?php session_start();
	if(isset($_SESSION['gbh2_customer_id']) && isset($_SESSION['gbh2_customer_email']) )
	{
		if(isset($_SESSION['gbh2_selected_types_all']) && isset($_SESSION['gbh2_selected_types_without_all'])){
				unset($_SESSION['gbh2_selected_types_all']);
				unset($_SESSION['gbh2_selected_types_without_all']);
		}
		unset($_SESSION['gbh2_customer_id']);
		unset($_SESSION['gbh2_customer_email']);
		header("location:login.php");
	}
?>