<?php
	session_start();
	include '../includes/database_connection.php';
	include '../includes/functions.php';
	if(isset($_SESSION['busines_owner_id'])){
		$busines_owner_id = $_SESSION['busines_owner_id'];
		$update_user_online_status = mysqli_query($conn,"update membership_requests set member_login_flag=0 where member_request_id=$busines_owner_id");
		if($update_user_online_status){
			unset($_SESSION['busines_owner_id']);
			unset($_SESSION['busines_owner_block']);
			unset($_SESSION['busines_owner_session_key']);
			unset($_SESSION['busines_owner_login_time_date']);
			header("Location:../customer_login.php?busines_owner_logout=1");
		}
	}
?>