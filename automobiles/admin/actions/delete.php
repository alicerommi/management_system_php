<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';
		#vehicle_types page name
		if(isset($_GET['delete_vehicle_type'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$vehicle_type_id = $_GET['vehicle_type_id'];
			$image_namer = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id=$vehicle_type_id");
			$r = mysqli_fetch_array($image_namer);
			unlink("../../uploads/vehicle_types/".$r['vehicle_type_img']);
			$delete= mysqli_query($conn,"DELETE FROM `vehicle_types` WHERE vehicle_type_id=$vehicle_type_id");
			$delete2 = mysqli_query($conn,"delete from vehicles_models where vehicle_type_id=$vehicle_type_id");
			if($delete && $delete2)
				header("location:../".$page_name."?deleted=1");
			else
				header("location:../".$page_name."?deleted=0");
		}	//end delete_vehicle_type


		if(isset($_GET['delete_vehicle_model'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$vehicles_model_id = $_GET['vehicles_model_id'];
				$delete= mysqli_query($conn,"DELETE FROM `vehicles_models` WHERE vehicles_model_id=$vehicles_model_id");
				if($delete)
					header("location:../".$page_name."?deleted=1");
				else
					header("location:../".$page_name."?deleted=0");
		} /// end delete_vehicle_model

		if(isset($_GET['delete_vehicle_manufacture'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$vehicle_manufacture_id = $_GET['vehicle_manufacture_id'];
			$delete= mysqli_query($conn,"DELETE FROM `vehicles_manufacture` WHERE vehicle_manufacture_id=$vehicle_manufacture_id");
			$delete2 = mysqli_query($conn,"DELETE FROM `vehicles_models` WHERE vehicle_manufacture_id=$vehicle_manufacture_id");
				if($delete && $delete2)
					header("location:../".$page_name."?deleted=1");
				else
					header("location:../".$page_name."?deleted=0");
		}

		if(isset($_GET['delete_user'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$customer_id = intval($_GET['customer_id']);
				$delete= mysqli_query($conn,"DELETE FROM `customers` WHERE customer_id=$customer_id");
				$delete2= mysqli_query($conn,"DELETE FROM `customer_access_vehicles` WHERE customer_id=$customer_id");
				if($delete && $delete2)
					header("location:../".$page_name."?deleted=1");
				else
					header("location:../".$page_name."?deleted=0");

		}
?>	