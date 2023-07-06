<?php

	$dir = "../../includes/";
	include $dir.'database_connection.php';
	include $dir.'cleaner_input.php';
	include $dir.'functions.php';
	include'request_traces.php';

	if(isset($_POST['update_admin_details'])){
			$oldPassword= $_POST['oldPassword'];
			$Password= $_POST['Password'];
			$RePassword= $_POST['RePassword'];
			$admin_id= $_POST['admin_id'];

			$getAdmin_detail= mysqli_query($conn,"select* from admin where admin_id=$admin_id");
			$row = mysqli_fetch_array($getAdmin_detail);
			$old_pass_db = $row['admin_password'];
			if($oldPassword == $old_pass_db){
				if($RePassword==$Password){
					$update = mysqli_query($conn,"update admin set admin_password='$RePassword' where admin_id=$admin_id");
					if($update){
						header("Location:../admin_profile.php?updated=1");
					}else{
						header("Location:../admin_profile.php?updated=0");
					}

				}else{
					header("Location:../admin_profile.php?new_pass_mismatch=0");	
				}
			}else{
				header("Location:../admin_profile.php?old_pass_mismatch=0");
			}
 	}//update_admin_details
 	//change the membership request status
 	if(isset($_POST['membership_request_action'])){
 		$request_id = $_POST['request_id'];
		$action = $_POST['action'];
		$current_time_date = current_dateTime();
		$sql="update membership_requests set request_status = $action,approval_request_datetime='$current_time_date' where member_request_id=$request_id";
		$query = mysqli_query($conn,$sql);
		if ($query)
			echo "1";
		else 
			echo "0";
 	}// end membership_request_action
 	//update package details
 	if(isset($_POST['update_package_details'])){
 				$package_id = test_input($_POST['package_id']);
 				$location = test_input($_POST['location']);
				$package_name = test_input($_POST['package_name']);
				$package_details =   mysqli_escape_string($conn,test_input($_POST['package_details']));
				$package_price_per_month_usds = test_input($_POST['package_price_per_month_usds']);
				$package_price_per_sale = test_input($_POST['package_price_per_sale']);
				// $check = mysqli_query($conn,"select * from packages where package_location='$location'");
				// if(mysqli_num_rows($check)==0)
				// 	{
						$sql = mysqli_query($conn,"update packages set package_name='$package_name', package_details='$package_details',package_price_per_month=$package_price_per_month_usds,package_per_customer=$package_price_per_sale,package_location='$location',last_update_package_datetime=NOW() where package_id=$package_id");
						if ($sql)
							header("Location:../update_membership_package.php?package_id=".$package_id."&updated=1");
						else 
							header("Location:../update_membership_package.php?package_id=".$package_id."&updated=0");
					// }else{
					// 	header("Location:../update_membership_package.php?package_id=".$package_id."&alreadyExists=1");
					//}
 	}//end update_package_details
 	//send reply to user
 	if(isset($_POST['send_user_reply'])){
 		$msg_id = $_POST['msg_id'];
		$admin_ans = mysqli_escape_string($conn,$_POST['admin_ans']);
		$query = mysqli_query($conn,"update user_messages set msg_reply_sent=1 , msg_reply='$admin_ans' where msg_id=$msg_id");
		if($query)
				header("Location:../reply_to_user.php?msg_id=".$msg_id."&updated=1");
		else
			header("Location:../reply_to_user.php?msg_id=".$msg_id."&updated=0");	
 	}///end send_user_reply


 	if(isset($_POST['update_business_res_details'])){
 		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
 			$res_description = mysqli_escape_string($conn,$_POST['res_description']);
				$business_id = $_POST['business_id'];
					$query = mysqli_query($conn,"UPDATE `admin_added_business_details` set `business_details`='$res_description' where  `admin_added_business_id`= $business_id");
					if($query){
						header("Location:../".$page_name."?updated_details=1&business_id=".$business_id);
					}else{
						header("Location:../".$page_name."?updated_details=0&business_id=".$business_id);
					}
 	} //end update_business_res_details

 	if(isset($_POST['update_resturant_videos_urls'])){
 			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
 			$videourls  = array();
			$videourls = $_POST['videourls'];
			$business_id = $_POST['business_id'];
 			$delete_entry = mysqli_query($conn,"delete from admin_added_business_videos_url where admin_added_business_id=$business_id");
 			if($delete_entry){
 					$all_urls = "";
					for($i=0;$i<sizeof($videourls);$i++){
						$all_urls=$all_urls."video_urls=".$videourls[$i];
					}
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_videos_url`( `business_video_url`, `admin_added_business_id`) VALUES ('$all_urls',$business_id)");
					if($query)
						header("Location:../".$page_name."?updated_urls=1&business_id=".$business_id);
					else
						header("Location:../".$page_name."?updated_urls=0&business_id=".$business_id);
 			}else{
 						header("Location:../".$page_name."?delete_previous_urls=0&business_id=".$business_id);
 			}
 	} // end update_resturant_videos_urls

 	if(isset($_POST['update_resturant_menus'])){
 			// print_r($_FILES);
 			// die;
 			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
 			$business_id  = $_POST['business_id'];
			$menu_id  = $_POST['menu_id'];
			$menu_name  = $_POST['menu_name'];
			$menu_price  = $_POST['menu_price'];
			$menu_description  = $_POST['menu_description'];
			$image_new  = $_POST['image_new'];
			
					$allowedExts = array(
							  "PNG", 
							  "JPEG", 
							  "JPG",
					); 
					$dir_menus = "../../uploads/menus_images/";
					if(!empty($_FILES['menu_image']['name'])){
						$newFilePath1 = $_FILES['menu_image']['name'];
						$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
						$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
						$image_name = get_random_image_name($ext,"menu");
						$target_file = $dir_menus.$image_name;
						if (move_uploaded_file($_FILES['menu_image']['tmp_name'], $target_file)){
									$query = mysqli_query($conn,"update business_menus set menu_name='$menu_name', menu_price=$menu_price, menu_image='$image_name',menu_details='$menu_description',menu_updated_timestamp=NOW() where menu_id=$menu_id and admin_business_id = $business_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&updated_menu=1&menu_id=".$menu_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&updated_menu=0&menu_id=".$menu_id);
							}
							else{
								header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1menu_id=".$menu_id);
							}
						}
					else{
								$query = mysqli_query($conn,"update business_menus set menu_name='$menu_name', menu_price=$menu_price,menu_details='$menu_description', menu_updated_timestamp=NOW() where menu_id=$menu_id and admin_business_id = $business_id");
								if ($query)
									header("Location:../".$page_name."?business_id=".$business_id."&updated_menu=1&menu_id=".$menu_id);
								else
									header("Location:../".$page_name."?business_id=".$business_id."&updated_menu=0&menu_id=".$menu_id);
					}
			} // update_resturant_menus


	if(isset($_POST['update_bar_drinks'])){
				$business_id = $_POST['business_id'];
				$drink_id = $_POST['drink_id'];
				$drink_name = $_POST['drink_name'];
				$drink_bottle_price = $_POST['drink_price'];
				$image_name = "";
				$drink_description =  mysqli_escape_string($conn,$_POST['drink_description']);
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
				if (!empty($_FILES['drink_image']['name'])){
						$allowedExts = array(
								  "PNG", 
								  "JPEG", 
								  "JPG",
						); 
						$dir_menus = "../../uploads/drinks_images/";
						$newFilePath1 = $_FILES['drink_image']['name'];
						$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
						$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
						$image_name = get_random_image_name($ext,"bar_drinks");
						if(!in_array($extension,$allowedExts)){
							header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1&drink_id=".$drink_id);
						}else{
									$target_file = $dir_menus.$image_name;
									if(!move_uploaded_file($_FILES['drink_image']['tmp_name'],$target_file)){
											header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1&drink_id=".$drink_id);
									}

									$query= mysqli_query($conn,"UPDATE `business_bar_drinks` SET `business_bar_drink_name`='$drink_name', `business_bar_drink_price`='$drink_bottle_price', `business_bar_drink_img`='$image_name', `business_bar_drink_details`='$drink_description',`updated_date_time`=NOW() where admin_business_id=$business_id and business_bar_drink_id=$drink_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&updated_drink=1&drink_id=".$drink_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&updated_drink=0&drink_id=".$drink_id);

						}
				}else{
								$query= mysqli_query($conn,"UPDATE `business_bar_drinks` SET `business_bar_drink_name`='$drink_name', `business_bar_drink_price`='$drink_bottle_price', `business_bar_drink_details`='$drink_description',`updated_date_time`=NOW() where admin_business_id=$business_id and business_bar_drink_id=$drink_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&updated_drink=1&drink_id=".$drink_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&updated_drink=0&drink_id=".$drink_id);
				}
	}  // end update_bar_drinks

	if(isset($_POST['update_vehicle_details'])){
		#if(!empty($_FILES['vehicles_images']['name'])) {echo "YES";}
		#die;
		$business_id = $_POST['business_id'];
		$vehicle_id = $_POST['vehicle_id'];
		if (!empty($_FILES['vehicles_images']['name'])){
									$allowedExts = array(
												  "PNG", 
												  "JPEG", 
												  "JPG",
										); 
								$vehicle_dirs = "../../uploads/vehicles_images/";
								#$vehicles_images = $_FILES['vehicles_images']['name'];
								$total_imgs = sizeof($_FILES['vehicles_images']);
								for($i=0;$i<$total_imgs;$i++){
										$newFilePath1 = $_FILES['vehicles_images']['name'][$i];
										$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
										$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
										$image_name = get_random_image_name($ext,"vehicle");
										$target_file = $vehicle_dirs.$image_name;
										if(in_array($extension,$allowedExts)){
												if(move_uploaded_file($_FILES['vehicles_images']['tmp_name'][$i],$target_file)){
													mysqli_query($conn,"INSERT INTO `business_vehicle_images`( `vehicle_img`, `business_vehicle_id`) VALUES ('$image_name',$vehicle_id)");
											}
												else{
														header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1");
												}
										}else{
											header("Location:../".$page_name."?business_id=".$business_id."&images_not_allowed=1");
										}	
										
								}//end for loop
		}
		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
		$vehicle_name = $_POST['vehicle_name'];
		$vehicle_category = $_POST['vehicle_category'];
		$vehicle_price = $_POST['vehicle_price'];
		$vehicle_plate_number = $_POST['vehicle_plate_number'];
		$Vehicle_description = mysqli_escape_string($conn,$_POST['Vehicle_description']);
		$update_veh_details = mysqli_query($conn,"UPDATE `business_vehicles` SET `business_vehicle_name`='$vehicle_name',`business_vehicle_description`='$Vehicle_description',`business_vehicle_cate_id`=$vehicle_category,`vehicle_price_per_hour`='$vehicle_price',`vehicle_plate_number`='$vehicle_plate_number',`vehicle_updated_datetime`=NOW() WHERE `business_vehicle_id`=$vehicle_id and `admin_business_id`=$business_id");
		if($update_veh_details){
				header("Location:../".$page_name."?business_id=".$business_id."&updated_vehicle=1&vehicle_id=".$vehicle_id);
		}else{
			header("Location:../".$page_name."?business_id=".$business_id."&updated_vehicle=0&vehicle_id=".$vehicle_id);
		}

	}//end update_vehicle_details
	



	if(isset($_POST['adult_entertaiment_business_description'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
 			$res_description = mysqli_escape_string($conn,$_POST['adult_entertaiment_business_description']);
				$business_id = $_POST['business_id'];
					$query = mysqli_query($conn,"UPDATE `admin_added_business_details` set `business_details`='$res_description' where  `admin_added_business_id`= $business_id");
					if($query){
						header("Location:../".$page_name."?updated_details=1&business_id=".$business_id);
					}else{
						header("Location:../".$page_name."?updated_details=0&business_id=".$business_id);
					}
	} #end update_adult_entertainment_details

	
	if(isset($_POST['update_adult_entertainment_details'])){
		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
 			$videourls  = array();
			$videourls = $_POST['videourls'];
			$business_id = $_POST['business_id'];
 			$delete_entry = mysqli_query($conn,"delete from admin_added_business_videos_url where admin_added_business_id=$business_id");
 			if($delete_entry){
 					$all_urls = "";
					for($i=0;$i<sizeof($videourls);$i++){
						$all_urls=$all_urls."video_urls=".$videourls[$i];
					}
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_videos_url`( `business_video_url`, `admin_added_business_id`) VALUES ('$all_urls',$business_id)");
					if($query)
						header("Location:../".$page_name."?updated_urls=1&business_id=".$business_id);
					else
						header("Location:../".$page_name."?updated_urls=0&business_id=".$business_id);
 			}else{
 						header("Location:../".$page_name."?delete_previous_urls=0&business_id=".$business_id);
 			}
	} // end update_adult_entertainment_details


	if(isset($_POST['update_adult_entertanment_drinks'])){
				$business_id = $_POST['business_id'];
				$drink_id = $_POST['drink_id'];
				$drink_name = $_POST['drink_name'];
				$drink_bottle_price = $_POST['drink_price'];
				$business_type  = $_POST['business_type'];
				$image_name = "";
				$drink_description =  mysqli_escape_string($conn,$_POST['drink_description']);
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
				if (!empty($_FILES['drink_image']['name'])){
						$allowedExts = array(
								  "PNG", 
								  "JPEG", 
								  "JPG",
						); 
						$dir_menus = "../../uploads/drinks_images/";
						$newFilePath1 = $_FILES['drink_image']['name'];
						$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
						$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
						$image_name = get_random_image_name($ext,"bar_drinks");
						if(!in_array($extension,$allowedExts)){
							header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1&drink_id=".$drink_id."&business_type=".$business_type);
						}else{
									$target_file = $dir_menus.$image_name;
									if(!move_uploaded_file($_FILES['drink_image']['tmp_name'],$target_file)){
											header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&image_not_uplodaed_to_dir=1&drink_id=".$drink_id);
									}

									$query= mysqli_query($conn,"UPDATE `business_bar_drinks` SET `business_bar_drink_name`='$drink_name', `business_bar_drink_price`='$drink_bottle_price', `business_bar_drink_img`='$image_name', `business_bar_drink_details`='$drink_description',`updated_date_time`=NOW() where admin_business_id=$business_id and business_bar_drink_id=$drink_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=1&drink_id=".$drink_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=0&drink_id=".$drink_id);

						}
				}else{
								$query= mysqli_query($conn,"UPDATE `business_bar_drinks` SET `business_bar_drink_name`='$drink_name', `business_bar_drink_price`='$drink_bottle_price', `business_bar_drink_details`='$drink_description',`updated_date_time`=NOW() where admin_business_id=$business_id and business_bar_drink_id=$drink_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=1&drink_id=".$drink_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=0&drink_id=".$drink_id);
				}
	}#--update_adult_entertanment_drinks


	if(isset($_POST['update_menu'])){
 			// print_r($_FILES);
 			// print_r($_POST);
 			// die;
 			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
 			$business_id  = $_POST['business_id'];
			$menu_id  = $_POST['menu_id'];
			$menu_name  = $_POST['menu_name'];
			$menu_price  = $_POST['menu_price'];
			$menu_description  = mysqli_escape_string($conn,$_POST['menu_description']);
			$business_type  = $_POST['business_type'];
			$image_new  = $_POST['image_new'];

			
					$allowedExts = array(
							  "PNG", 
							  "JPEG", 
							  "JPG",
					); 
					$dir_menus = "../../uploads/menus_images/";
					if(!empty($_FILES['menu_image']['name'])){
						$newFilePath1 = $_FILES['menu_image']['name'];
						$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
						$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
						$image_name = get_random_image_name($ext,"menu");
						$target_file = $dir_menus.$image_name;
						if (move_uploaded_file($_FILES['menu_image']['tmp_name'], $target_file)){
									$query = mysqli_query($conn,"update business_menus set menu_name='$menu_name', menu_price=$menu_price, menu_image='$image_name',menu_details='$menu_description',menu_updated_timestamp=NOW() where menu_id=$menu_id and admin_business_id = $business_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_menu=1&menu_id=".$menu_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_menu=0&menu_id=".$menu_id);
							}
							else{
								header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&image_not_uplodaed_to_dir=1menu_id=".$menu_id);
							}
						}
					else{
								$query = mysqli_query($conn,"update business_menus set menu_name='$menu_name', menu_price=$menu_price,menu_details='$menu_description', menu_updated_timestamp=NOW() where menu_id=$menu_id and admin_business_id = $business_id");
								if ($query)
									header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_menu=1&menu_id=".$menu_id);
								else
									header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_menu=0&menu_id=".$menu_id);
					}
			} // update_resturant_menus



	if(isset($_POST['update_drinks'])){ #---------general category
				$business_id = $_POST['business_id'];
				$drink_id = $_POST['drink_id'];
				$drink_name = $_POST['drink_name'];
				$drink_bottle_price = $_POST['drink_price'];
				$business_type  = $_POST['business_type'];
				$image_name = "";
				$drink_description =  mysqli_escape_string($conn,$_POST['drink_description']);
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
				if (!empty($_FILES['drink_image']['name'])){
						$allowedExts = array(
								  "PNG", 
								  "JPEG", 
								  "JPG",
						); 
						$dir_menus = "../../uploads/drinks_images/";
						$newFilePath1 = $_FILES['drink_image']['name'];
						$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
						$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
						$image_name = get_random_image_name($ext,"bar_drinks");
						if(!in_array($extension,$allowedExts)){
							header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1&drink_id=".$drink_id."&business_type=".$business_type);
						}else{
									$target_file = $dir_menus.$image_name;
									if(!move_uploaded_file($_FILES['drink_image']['tmp_name'],$target_file)){
											header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&image_not_uplodaed_to_dir=1&drink_id=".$drink_id);
									}

									$query= mysqli_query($conn,"UPDATE `business_bar_drinks` SET `business_bar_drink_name`='$drink_name', `business_bar_drink_price`='$drink_bottle_price', `business_bar_drink_img`='$image_name', `business_bar_drink_details`='$drink_description',`updated_date_time`=NOW() where admin_business_id=$business_id and business_bar_drink_id=$drink_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=1&drink_id=".$drink_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=0&drink_id=".$drink_id);

						}
				}else{
								$query= mysqli_query($conn,"UPDATE `business_bar_drinks` SET `business_bar_drink_name`='$drink_name', `business_bar_drink_price`='$drink_bottle_price', `business_bar_drink_details`='$drink_description',`updated_date_time`=NOW() where admin_business_id=$business_id and business_bar_drink_id=$drink_id");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=1&drink_id=".$drink_id);
									else
										header("Location:../".$page_name."?business_id=".$business_id."&business_type=".$business_type."&updated_drink=0&drink_id=".$drink_id);
				}
	}#--end here
?>