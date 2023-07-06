<?php
	session_start();
	include 'includes/functions.php';
	include 'includes/database_connection.php';
	#---------fro setting up the session for customer
	// die;
	if(isset($_GET['customer_id'])){
		$customer_id = intval($_GET['customer_id']);
		$customer_details  = mysqli_query($conn,"select * from customers where customer_id = $customer_id");
		$customer_row = mysqli_fetch_array($customer_details);
		
			if ($customer_row['customer_block']==0)
				{
						$_SESSION['customer_id']  =$customer_id;
						$_SESSION['customer_block'] = $customer_row['customer_block'];
						$_SESSION['customer_session_key'] = generate_unique_id();
						$_SESSION['customer_login_time_date'] = current_time_date();
						header("Location:customer_dashboard.php?welcome_customer=MQ");
				}else{
						header("Location:customer_login.php?customer_blocked_from_admin=1");
				}
	}//end customer_id


	/////////////for business owner login
	if(isset($_GET['business_owner_id'])){
		echo $business_owner_id = $_GET['business_owner_id'];
		$business_own_details  = mysqli_query($conn,"select * from membership_requests where member_request_id = $business_owner_id");
		$business_row = mysqli_fetch_array($business_own_details);
		// print_r($business_row);
		// die;
		if ($member_block['member_block']==0)

				{
						$_SESSION['busines_owner_id']  =$business_owner_id;
						$_SESSION['busines_owner_block'] = $member_block['member_block'];
						$_SESSION['busines_owner_session_key'] = generate_unique_id();
						$_SESSION['busines_owner_login_time_date'] = current_time_date();
						header("Location:business_owner/index.php?welcome_business_owner=1");
				}else{
						header("Location:customer_login.php?customer_blocked_from_admin=1");
				}
	}
?>