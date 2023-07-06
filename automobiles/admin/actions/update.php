<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';
		if(isset($_POST['saveProfiel'])){
				$admin_id = $_POST['admin_id'];
				$FullName = $_POST['FullName'];
				$Password = $_POST['Password'];
				$RePassword = $_POST['RePassword'];
				$sql = "UPDATE `admin` SET `admin_name`='$FullName',`admin_password`='$Password' WHERE admin_id=$admin_id";
				$query = mysqli_query($conn,$sql);
				if($query)
					header("location:../admin_profile.php?updated=1");
				else
					header("location:../admin_profile.php?updated=0");
		}#saveProfiel

		if(isset($_POST['update_new_customer'])){
			// print_r($_POST);
			// die;
			$customer_id = intval($_POST['customer_id']);
			$selected_access_for_user = $_POST['selected_access_for_user'];
			$size = sizeof($selected_access_for_user);
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$added_by = 0;
			$customer_name= strtolower($_POST['customer_name']);
			$customer_address = strtolower(mysqli_escape_string($conn,$_POST['customer_address']));
			$customer_phone = strtolower($_POST['customer_phone']);
			$customer_conatct_man = strtolower($_POST['customer_conatct_man']);
			$customer_ads_limit = $_POST['customer_ads_limit'];
			//$customer_email= strtolower($_POST['customer_email']);
			$customer_pass =$_POST['customer_pass'];
			
					$update_customer = mysqli_query($conn,"UPDATE `customers` SET `customer_name`='$customer_name',`customer_password`='$customer_pass',`customer_added_by`=$added_by,`customer_address`='$customer_address',`customer_contact_man`='$customer_conatct_man',`customer_phone`='$customer_phone',customer_ads_limit=$customer_ads_limit WHERE customer_id=$customer_id");
					$delete_other_table_data = mysqli_query($conn,"DELETE FROM customer_access_vehicles where customer_id=$customer_id");
					if($update_customer){
						
						if($size==1){
							$access_id = $selected_access_for_user[0];
							mysqli_query($conn,"INSERT INTO `customer_access_vehicles`(`customer_access_vehicle_type_id`, `customer_id`) VALUES ($access_id,$customer_id)");
						}else{
							for($i=0;$i<$size; $i++){
								$access_id = $selected_access_for_user[$i];
								mysqli_query($conn,"INSERT INTO `customer_access_vehicles`(`customer_access_vehicle_type_id`, `customer_id`) VALUES ($access_id,$customer_id)");
							} //end for loop here
						}
						header("location:../".$page_name."?updated=1&customer_id=".$customer_id);
					}else{
						header("location:../".$page_name."?updated=0&customer_id=".$customer_id);
					}
			

		}//end update_new_customer

		if(isset($_GET['block_or_unblock'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$customer_id = intval($_GET['customer_id']);
			$flag = $_GET['flag'];
			if($flag==0){
				$flag=1;
			}else{
				$flag=0;
			}
			$update_customer = mysqli_query($conn,"UPDATE `customers` set customer_block=$flag WHERE customer_id=$customer_id");
			if($update_customer)
					header("location:../".$page_name."?operation=1");
			else
					header("location:../".$page_name."?operation=0");
		}//end block_or_unblock

		if(isset($_POST['update_vehicle_type'])){
			
			$vehicle_type_name = $_POST['vehicle_type_name'];
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$vehicle_type_id = $_POST['vehicle_type_id'];


				if(!empty($_FILES['type_img']['name'])){
					$dir = "../../uploads/vehicle_types/";
					$row =mysqli_fetch_array( mysqli_query($conn,"select* from vehicle_types where vehicle_type_id=$vehicle_type_id"));
					$vehicle_type_img = $row['vehicle_type_img'];
					if(strlen($vehicle_type_img)>0){
						unlink(($dir.$vehicle_type_img));
					}
						$type_img = $_FILES['type_img']['name'];
						$img_type =strtolower(pathinfo($type_img, PATHINFO_EXTENSION));
						$img_name = getName(10).".".$img_type;
					
							if(move_uploaded_file($_FILES['type_img']['tmp_name'], $dir.$img_name))
								{
									$query = mysqli_query($conn,"UPDATE vehicle_types SET vehicle_type_img ='$img_name' WHERE vehicle_type_id=$vehicle_type_id");
									if($query){
											 		header("location:../".$page_name."?updated=1&vehicle_type_id=".$vehicle_type_id);
											 	}else{
											 		header("location:../".$page_name."?updated=0&vehicle_type_id=".$vehicle_type_id);
											 	}
								}else{
										header("location:../".$page_name."?uploading_err=1&vehicle_type_id=".$vehicle_type_id);
								}
				}else{
						$query = mysqli_query($conn,"UPDATE vehicle_types SET vehicle_type_name ='$vehicle_type_name' WHERE vehicle_type_id=$vehicle_type_id");
									if($query){
											 		header("location:../".$page_name."?updated=1&vehicle_type_id=".$vehicle_type_id);
											 	}else{
											 		header("location:../".$page_name."?updated=0&vehicle_type_id=".$vehicle_type_id);
											 	}
				}
		} //end update_vehicle_type_img
?>