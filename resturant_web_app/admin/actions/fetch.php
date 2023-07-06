<?php

	
	$dir = "../../includes/";
	include $dir.'database_connection.php';
	include $dir.'cleaner_input.php';
	include $dir.'functions.php';
	include'request_traces.php';
	///////////used for fetching_data


	if(isset($_POST['fetch_veh_cate_details'])){
		$cate_id =$_POST['cate_id'];
		$query = mysqli_query($conn,"select* from vehicle_categories where vehicle_cate_id=$cate_id");
		echo json_encode(mysqli_fetch_assoc($query)); 
	}

	if(isset($_POST['fetch_package_details'])){
		$package_id =$_POST['package_id'];
		$query = mysqli_query($conn,"select* from packages where package_id=$package_id");
		echo json_encode(mysqli_fetch_assoc($query)); 
	}

	if(isset($_POST['fetch_user_msg_details'])){
		$msg_id =$_POST['msg_id'];
		$query = mysqli_query($conn,"select* from user_messages where msg_id=$msg_id");
		echo json_encode(mysqli_fetch_assoc($query)); 
	}

	if(isset($_POST['fetch_cities'])){
		$country_id = $_POST['country_id'];
		$query = mysqli_query($conn,"SELECT * FROM `location_cities` where location_country_id=$country_id");
		$data = array();
		while($row = mysqli_fetch_assoc($query)){
			$data[] = $row ;
		}
		echo json_encode($data);
	}

	if(isset($_POST['fetch_zipcodes_areas'])){
		$location_city_id = $_POST['location_city_id'];
			$query = mysqli_query($conn,"select* from location_cities where location_city_id = $location_city_id");
			$row = mysqli_fetch_assoc($query);
			echo $row['location_city_zipcode'];
	}
?>