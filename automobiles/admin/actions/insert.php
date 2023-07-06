<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';

		if(isset($_POST['add_new_vehicle_type'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$Vehicle_type_name = strtolower( $_POST['Vehicle_type_name']);
				$type_img = $_FILES['type_img']['name'];

				$img_type =strtolower(pathinfo($type_img, PATHINFO_EXTENSION));
				$img_name = getName(10).".".$img_type;
				$dir = "../../uploads/vehicle_types/";
				$check   = mysqli_query($conn,"select* from vehicle_types where vehicle_type_name='$Vehicle_type_name'");
				if(mysqli_num_rows($check)==0){
					if(move_uploaded_file($_FILES['type_img']['tmp_name'], $dir.$img_name))
						{
							$query = mysqli_query($conn,"INSERT INTO `vehicle_types`( `vehicle_type_name`,`vehicle_type_img`) VALUES ('$Vehicle_type_name','$img_name')");
							if($query){
									 		header("location:../".$page_name."?added=1");
									 	}else{
									 		header("location:../".$page_name."?added=0");
									 	}
						}else{
								header("location:../".$page_name."?uploading_err=1");
						}
				}else{
						header("location:../".$page_name."?supplier_exists=1");
				}
		} //end add_new_vehicle_type

		////////// add_new_model

		if(isset($_POST['add_new_model'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$model_name = strtolower($_POST['model_name']);
			$v_type = $_POST['v_type'];
			//$manufacture_name = $_POST['manufacture_name'];
			$vehicle_manufacture_id =$_POST['vehicle_manufacture'];
			$check   = mysqli_query($conn,"select* from vehicles_models where vehicles_model_name='$model_name' and vehicle_manufacture_id=$vehicle_manufacture_id and vehicle_type_id=$v_type");
			if(mysqli_num_rows($check)==0){
									$query = mysqli_query($conn,"INSERT INTO `vehicles_models`( `vehicle_type_id`, `vehicle_manufacture_id`, `vehicles_model_name`) VALUES ($v_type,$vehicle_manufacture_id,'$model_name')");
									if($query){
								 		header("location:../".$page_name."?added=1");
								 	}else{
								 		header("location:../".$page_name."?added=0");
								 	}
				}else{
						header("location:../".$page_name."?already_exists=1");
				}

		}// end add_new_model here 


		if(isset($_POST['add_new_manufacture'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$manufacture_name = strtolower($_POST['manufacture_name']);
			$check   = mysqli_query($conn,"select* from vehicles_manufacture where vehicle_manufacture_name='$manufacture_name'");
			if(mysqli_num_rows($check)==0){
					$query = mysqli_query($conn,"INSERT INTO `vehicles_manufacture`(`vehicle_manufacture_name`) VALUES ('$manufacture_name')");
					if($query){
								 		header("location:../".$page_name."?added=1");
								 	}else{
								 		header("location:../".$page_name."?added=0");
								 	}
				}else{
						header("location:../".$page_name."?already_exists=1");
				}
		}//end add_new_manufacture


		// add_new_customer

		if(isset($_POST['add_new_customer'])){
			$selected_access_for_user = $_POST['selected_access_for_user'];
			$size = sizeof($selected_access_for_user);
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$added_by = 0;
			$customer_name= strtolower($_POST['customer_name']);
			
			$customer_address = strtolower(mysqli_escape_string($conn,$_POST['customer_address']));
			$customer_phone = strtolower($_POST['customer_phone']);
			$customer_conatct_man = strtolower($_POST['customer_conatct_man']);

			$customer_ads_limit = $_POST['customer_ads_limit'];

			$customer_email= strtolower($_POST['customer_email']);
			$customer_pass =$_POST['customer_pass'];
			$check = mysqli_query($conn,"select* from customers where customer_email='$customer_email'");
			if(mysqli_num_rows($check)==0){
					$insert_customer = mysqli_query($conn,"INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_password`, `customer_added_by`, `customer_address`, `customer_contact_man`, `customer_phone`,`customer_ads_limit`) VALUES ('$customer_name','$customer_email','$customer_pass',$added_by,'$customer_address','$customer_conatct_man','$customer_phone',$customer_ads_limit)");
					if($insert_customer){
						$customer_id = mysqli_insert_id($conn);
						if($size==1){
							$access_id = $selected_access_for_user[0];
							mysqli_query($conn,"INSERT INTO `customer_access_vehicles`(`customer_access_vehicle_type_id`, `customer_id`) VALUES ($access_id,$customer_id)");
						}else{
							for($i=0;$i<$size; $i++){
								$access_id = $selected_access_for_user[$i];
								mysqli_query($conn,"INSERT INTO `customer_access_vehicles`(`customer_access_vehicle_type_id`, `customer_id`) VALUES ($access_id,$customer_id)");
							} //end for loop here
						}
						header("location:../".$page_name."?added=1");
					}else{
						header("location:../".$page_name."?added=0");
					}
			}else{
					header("location:../".$page_name."?already_exists=1");
			}
		} //eend add_new_customer
?>