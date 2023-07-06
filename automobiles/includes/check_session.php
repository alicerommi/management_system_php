<?php session_start();
	include 'admin/includes/database_connection.php';
	if(!isset($_SESSION['gbh2_customer_id']) && !isset($_SESSION['gbh2_customer_email']) && !isset($_SESSION['gbh2_selected_types_all']) && !isset($_SESSION['gbh2_selected_types_without_all']) )
	{
		header("location:login.php");
	}else{
		/////////////check the customer is blocked or not
		$gbh2_customer_id = $_SESSION['gbh2_customer_id'];
		$gbh2_customer_email = $_SESSION['gbh2_customer_email'];
		$sql = "SELECT * FROM customers WHERE customer_id=$gbh2_customer_id and customer_email='$gbh2_customer_email'";
		$fetch_customer_details = mysqli_query($conn,$sql);
		if(mysqli_num_rows($fetch_customer_details)==0){
				header("location:logout.php");
		}	 //end num rows conditions
		else{
			$row = mysqli_fetch_array($fetch_customer_details);
			//fetch customer data
			$customer_block= $row['customer_block'];
			$customer_name = ucwords($row['customer_name']);
			$customer_email = $row['customer_email'];
			$customer_address = $row['customer_address'];
			$customer_contact_man = $row['customer_contact_man'];
			$customer_phone = $row['customer_phone'];
			$customer_ads_limit = $row['customer_ads_limit'];
			$customer_business_logo = $row['customer_business_logo'];
			$customer_business_address = $row['customer_business_address'];
			$single_access_arr_with_type_ids = array();
			$access_arr = [];
			//$access_vehicles_names = array();
			$check = mysqli_query($conn,"SELECT * FROM `customer_access_vehicles` where customer_access_vehicle_type_id=0 and customer_id=$gbh2_customer_id");
			if(mysqli_num_rows($check)==1){
						$query2 = mysqli_query($conn,"SELECT * FROM `vehicle_types`");
						
						while($r = mysqli_fetch_array($query2)){
							//$data = array();
							$vehicle_type_id = ucwords($r['vehicle_type_id']);
							$vehicle_type_name = $r['vehicle_type_name'];
							$data['vehicle_type_id'] = $vehicle_type_id;
							$data['vehicle_type_name'] = $vehicle_type_name;
							//array_push($access_arr, $data);
							$access_arr[] = $data;
							array_push($single_access_arr_with_type_ids, $vehicle_type_id);

						} //end while
			}  //end number rows
			else{
				$query2 = mysqli_query($conn,"SELECT * FROM `vehicle_types` join customer_access_vehicles on vehicle_types.vehicle_type_id = customer_access_vehicles.customer_access_vehicle_type_id and customer_access_vehicles.customer_id=$gbh2_customer_id");
					if(mysqli_num_rows($query2)==0){
							header("location:logout.php");
					}else{
											while($r = mysqli_fetch_array($query2)){
													$vehicle_type_id = ucwords($r['vehicle_type_id']);
													$vehicle_type_name = $r['vehicle_type_name'];
													$data['vehicle_type_id'] = $vehicle_type_id;
													$data['vehicle_type_name']=$vehicle_type_name;
													$access_arr[] = $data;
													array_push($single_access_arr_with_type_ids, $vehicle_type_id);
												} //end while
					}
			}

						

			//echo json_encode($access_arr);
			//die;

 			if($customer_block==1){
				unset($_SESSION['gbh2_customer_id']);
				unset($_SESSION['gbh2_customer_email']);
				unset($_SESSION['gbh2_selected_types_all']);
				unset($_SESSION['gbh2_selected_types_without_all']);
				//session_destroy();
				header("location:login.php?customer_blocked=1");
			}
		}
	}
?>