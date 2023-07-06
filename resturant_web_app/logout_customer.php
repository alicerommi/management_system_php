<?php
	session_start();
	include 'includes/functions.php';
	include 'includes/database_connection.php';
	if(isset($_SESSION['customer_session_key'])){

			$customer_id = $_SESSION['customer_id'];
			$update_customer_is_offline_logged = mysqli_query($conn,"update customers set customer_login_flag=0 where customer_id=$customer_id");
			if ($update_customer_is_offline_logged){
			
					unset($_SESSION['customer_id']); 
					unset($_SESSION['customer_block']);
					unset($_SESSION['customer_session_key']);
					unset($_SESSION['customer_login_time_date']); 
					header("Location:customer_login.php?logout_success=".base64url_encode(1));
					exit;
			}
	}// end customer_session_key
?>