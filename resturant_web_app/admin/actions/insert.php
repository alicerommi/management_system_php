<?php

	$dir = "../../includes/";
	include $dir.'database_connection.php';
	include $dir.'cleaner_input.php';
	include $dir.'functions.php';
	include'request_traces.php';
	///////////used for insertion
	//add vehcile category	

	if(isset($_POST['add_category'])){

		$cate_name = test_input($_POST['cate_name']);
		$category_details = mysqli_escape_string($conn,$_POST['category_details']);
		$check = mysqli_query($conn,"select* from vehicle_categories where vehicle_cate_name='$cate_name'");
		if(mysqli_num_rows($check)>0){
			header("Location:../vehicle_category.php?alreadyExists=1");
		}else{
			$query = mysqli_query($conn,"INSERT INTO `vehicle_categories`( `vehicle_cate_name`, `vehicle_cate_detail`) VALUES ('$cate_name','$category_details')");
			if($query)
				header("Location:../vehicle_category.php?added=1");
			else
				header("Location:../vehicle_category.php?added=0");
		}	
	}//end add_category

	///a dd package
	if(isset($_POST['add_new_package'])){
				$package_name = test_input($_POST['package_name']);
				$package_details = mysqli_escape_string($conn,test_input($_POST['package_details']));
				$package_price_per_month_usds = test_input($_POST['package_price_per_month_usds']);
				$package_price_per_sale = test_input($_POST['package_price_per_sale']);
				$location  = test_input($_POST['location']);
				$check = mysqli_query($conn,"select * from packages where package_location='$location'");
				if (mysqli_num_rows($check)==0){
							$sql = "INSERT INTO `packages`( `package_name`, `package_details`, `package_price_per_month`, `package_per_customer`,`package_location`) VALUES ('$package_name','$package_details',$package_price_per_month_usds,$package_price_per_sale,'$location')";
							$query = mysqli_query($conn,$sql);
							if($query)
								header("Location:../add_membership_package.php?added=1");
							else
								header("Location:../add_membership_package.php?added=0");
				}else{
					header("Location:../add_membership_package.php?alreadyExists=1");
				}
	} //end add_new_package

	if(isset($_POST['add_location'])){
	    
			$zip_code = test_input($_POST['zip_code']);
			$city_name = test_input($_POST['city_name']);
			if( test_input($_POST['country_name_selected'])!="n"){
					$country_id = test_input($_POST['country_name_selected']);
			}else{
				
				$country_name =$_POST['country_name'];
				$insert_country = mysqli_query($conn,"insert into location_countries (location_country_name) values('$country_name')");
				$country_id = mysqli_insert_id($conn);
			}
			$check_address = mysqli_query($conn,"select* from location_cities where location_city_name= '$city_name' and location_country_id=$country_id  and location_city_zipcode='$zip_code'");
			if(mysqli_num_rows($check_address)==0){
			   $sql = "INSERT INTO `location_cities`( `location_city_name`, `location_city_zipcode`, `location_country_id`) VALUES ('$city_name','$zip_code',$country_id)";
			  
				$insert_location = mysqli_query($conn,$sql);
							if($insert_location)
								header("Location:../add_location.php?added=1");
							else
								header("Location:../add_location.php?added=0");
			}else{
					header("Location:../add_location.php?address_exists=1");
			}
	}//emnd add_location 
	//add business from admin
	if(isset($_POST['save_business_details'])){
			
			$business_name = $_POST['business_name'];
			$business_type = $_POST['business_type'];
			$business_email = $_POST['business_email'];
			$business_phone = $_POST['business_phone'];
			$business_website = $_POST['business_website'];
			$city_name_selected = $_POST['city_name_selected'];
			$business_details =  mysqli_escape_string($conn,$_POST['business_details']);
			$check = mysqli_query($conn,"select* from admin_added_business where business_email='$business_email'");
			if(mysqli_num_rows($check)>0){
				header("Location:../add_business.php?alreadyExists=1");
			}else{
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business`( `business_name`, `business_type`, `location_id`, `business_email`, `business_phone`, `business_site_link`, `business_more_details`) VALUES ('$business_name',$business_type,$city_name_selected,'$business_email','$business_phone','$business_website','$business_details')");
					if($query){
							header("Location:../add_business.php?added=1");
					}else
							{header("Location:../add_business.php?added=0");}
			}
	} //end save_business_details


	#-----------save resturants images only
	if(isset($_POST['save_resturant_business_images'])){


		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
		$allowedExts = array(
			  "PNG", 
			  "JPEG", 
			  "JPG",
		); 
		$business_id = $_POST['business_id'];
		$filesName1 = $_FILES['images']['name'];
		$total =sizeof($_FILES['images']['name']);
		$target_dir = "../../uploads/business_images/";
		for($a=0;$a<$total;$a++){
				//saving all the attached files into a string later we will push this string in to the table field.. 
				$newFilePath1 =$_FILES['images']['name'][$a];
				$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
				$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
				$image_name = generateRandomString(rand(5,20))."_".generate_unique_id()."_".md5(generateRandomString(rand(0,5000)))."_".md5($a*rand(1,100)).".".$ext;
				$target_file = $target_dir . $image_name;
					if(in_array($extension,$allowedExts)){
						if (move_uploaded_file($_FILES["images"]["tmp_name"][$a], $target_file)){
						  					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_images`( `business_img_name`, `admin_added_business_id`) VALUES ('$image_name',$business_id)");
										}else{
											echo "error in uploading images";
											die;
										}	

							}else{
								echo "The File is not supported";	
								die;
							}

							if($a == $total-1){
										header("Location:../".$page_name."?business_id=".$business_id."&added=1");
							}
		}//end first loop 
	}  //end save_resturant_business_images

	#------------add business details
	if(isset($_POST['save_business_res_details'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$res_description = mysqli_escape_string($conn,$_POST['res_description']);
				$business_id = $_POST['business_id'];
				$check = mysqli_query($conn,"select* from admin_added_business_details where admin_added_business_id  = $business_id");
				if(mysqli_num_rows($check)==0){
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_details`( `business_details`, `admin_added_business_id`) VALUES ('$res_description',$business_id)");
					if($query){
						header("Location:../".$page_name."?business_id=".$business_id."&added_details=1");
					}else{
						#header("Location:../add_resturant_details.php?added_details=0&business_id=".$business_id);
						header("Location:../".$page_name."?business_id=".$business_id."&added_details=0");
					}
				}else{
					#header("Location:../add_resturant_details.php?already_exists_details=1&business_id=".$business_id);
					header("Location:../".$page_name."?business_id=".$business_id."&already_exists_details=1");
				}
	} //end save_business_res_details

	if(isset($_POST['add_resturant_videos_urls'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);			
			$videourls  = array();
			$videourls = $_POST['videourls'];
			$business_id = $_POST['business_id'];
			 $check_urls = mysqli_query($conn,"select* from admin_added_business_videos_url where admin_added_business_id = $business_id");
			 if(mysqli_num_rows($check_urls)>0){
			 	header("Location:../".$page_name."?already_exists_urls=1&business_id=".$business_id);
			 }else{
			 		$all_urls = "";
					for($i=0;$i<sizeof($videourls);$i++){
						$all_urls=$all_urls."video_urls=".$videourls[$i];
					}
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_videos_url`( `business_video_url`, `admin_added_business_id`) VALUES ('$all_urls',$business_id)");
					if($query)
						header("Location:../".$page_name."?added_urls=1&business_id=".$business_id);
					else
						header("Location:../".$page_name."?added_urls=0&business_id=".$business_id);
			 }	
	}  //end add_resturant_videos_urls

	if(isset($_POST['save_resturant_menus'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
				$business_id = $_POST['business_id'];
				$menu_name = $_POST['menu_name'];
				$menu_price = $_POST['menu_price'];
				$menu_description = $_POST['menu_description'];
				$image_name = "";
				if(!empty($_FILES['menu_image']['name'])){
					$allowedExts = array(
							  "PNG", 
							  "JPEG", 
							  "JPG",
					); 
					$dir_menus = "../../uploads/menus_images/";
					$newFilePath1 = $_FILES['menu_image']['name'];
					$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
					$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
					$image_name = get_random_image_name($ext,"menu");
					$target_file = $dir_menus.$image_name;
					if(!in_array($extension,$allowedExts)){
						header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1");
					}else{
						if(!move_uploaded_file($_FILES['menu_image']['tmp_name'],$target_file)){
										header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1");
						}else{
								$check = mysqli_query($conn,"select* from business_menus where menu_name='$menu_name' and menu_price='$menu_price' and admin_business_id=$business_id");
								if(mysqli_num_rows($check)==0){
									$query= mysqli_query($conn,"INSERT INTO `business_menus`( `menu_name`, `menu_price`, `menu_image`, `admin_business_id`,`menu_details`) VALUES ('$menu_name','$menu_price','$image_name',$business_id,'$menu_description')");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&added_menu=1");
									else
										header("Location:../".$page_name."?business_id=".$business_id."&added_menu=0");
								}else{
									header("Location:../".$page_name."?business_id=".$business_id."&already_menu_exist=1");
								}
						}
					}
				}else{
							$check = mysqli_query($conn,"select* from business_menus where menu_name='$menu_name' and menu_price='$menu_price' and admin_business_id=$business_id");
							if(mysqli_num_rows($check)==0){
								$query= mysqli_query($conn,"INSERT INTO `business_menus`( `menu_name`, `menu_price`, `menu_image`, `admin_business_id`,`menu_details`) VALUES ('$menu_name','$menu_price','$image_name',$business_id,'$menu_description')");
								if ($query)
									header("Location:../".$page_name."?business_id=".$business_id."&added_menu=1");
								else
									header("Location:../".$page_name."?business_id=".$business_id."&added_menu=0");
							}else{
								header("Location:../".$page_name."?business_id=".$business_id."&already_menu_exist=1");
							}
				}
	} //end save_resturant_menus

	if(isset($_POST['save_bar_drinks'])){
			$business_id = $_POST['business_id'];
			$drink_name = $_POST['drink_name'];
			$drink_bottle_price = $_POST['drink_bottle_price'];
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
						header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1");
					}else{
								$target_file = $dir_menus.$image_name;
								if(!move_uploaded_file($_FILES['drink_image']['tmp_name'],$target_file)){
										header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1");
								}

					}
			}

			$check = mysqli_query($conn,"select* from business_bar_drinks where business_bar_drink_name='$drink_name' and business_bar_drink_price='$drink_bottle_price' and admin_business_id=$business_id");
			if(mysqli_num_rows($check)==0){
				$query= mysqli_query($conn,"INSERT INTO `business_bar_drinks`( `business_bar_drink_name`, `business_bar_drink_price`, `admin_business_id`, `business_bar_drink_img`, `business_bar_drink_details`) VALUES ('$drink_name','$drink_bottle_price',$business_id,'$image_name','$drink_description')");
				if ($query)
					header("Location:../".$page_name."?business_id=".$business_id."&added_drink=1");
				else
					header("Location:../".$page_name."?business_id=".$business_id."&added_drink=0");
			}else{
				header("Location:../".$page_name."?business_id=".$business_id."&already_drink_exist=1");
			}
	}//end save_bar_drinks						
	if(isset($_POST['save_vehicle'])){
			$allowedExts = array(
							  "PNG", 
							  "JPEG", 
							  "JPG",
					); 
			$business_id = $_POST['business_id'];
			$vehicle_name = $_POST['vehicle_name'];
			$vehicle_category = $_POST['vehicle_category'];
			$vehicle_price = $_POST['vehicle_price'];
			$vehicle_plate_number = "";
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			if(isset($_POST['vehicle_plate_number']))
				$vehicle_plate_number = $_POST['vehicle_plate_number'];
			$Vehicle_description =  mysqli_escape_string($conn,$_POST['Vehicle_description']);
			$insert_vehicle = mysqli_query($conn,"INSERT INTO `business_vehicles`( `business_vehicle_name`, `business_vehicle_description`, `business_vehicle_cate_id`,`admin_business_id`, `vehicle_price_per_hour`, `vehicle_plate_number`) VALUES ('$vehicle_name','$Vehicle_description',$vehicle_category,$business_id,'$vehicle_price','$vehicle_plate_number')");
			if($insert_vehicle){
				$last_id = mysqli_insert_id($conn);
				if(!empty($_FILES['vehicles_images']['name']))
				{			
								$vehicle_dirs = "../../uploads/vehicles_images/";
								$vehicles_images = $_FILES['vehicles_images']['name'];
								$total_imgs = sizeof($_FILES['vehicles_images']);
								for($i=0;$i<$total_imgs;$i++){
										$newFilePath1 = $_FILES['vehicles_images']['name'][$i];
										$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
										$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
										$image_name = get_random_image_name($ext,"vehicle");
										$target_file = $vehicle_dirs.$image_name;
										if(in_array($extension,$allowedExts)){
												if(move_uploaded_file($_FILES['vehicles_images']['tmp_name'][$i],$target_file)){
													mysqli_query($conn,"INSERT INTO `business_vehicle_images`( `vehicle_img`, `business_vehicle_id`) VALUES ('$image_name',$last_id)");
											}
												else{
														header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1");
												}
										}else{
											header("Location:../".$page_name."?business_id=".$business_id."&images_not_allowed=1");
										}	
										
								}//end for loop
				}
				header("Location:../".$page_name."?business_id=".$business_id."&added_vehicle=1");
			}else{
					header("Location:../".$page_name."?business_id=".$business_id."&added_vehicle=0");	
			}
	} // end save_vehicle


	if(isset($_POST['save_adult_entertainment_business_images'])){

		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
		$allowedExts = array(
			  "PNG", 
			  "JPEG", 
			  "JPG",
		); 
		$business_id = $_POST['business_id'];
		$filesName1 = $_FILES['images']['name'];
		$total =sizeof($_FILES['images']['name']);
		$target_dir = "../../uploads/adult_entertainment_images/";
		for($a=0;$a<$total;$a++){
				//saving all the attached files into a string later we will push this string in to the table field.. 
				$newFilePath1 =$_FILES['images']['name'][$a];
				$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
				$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
				$image_name = generateRandomString(rand(5,20))."_".generate_unique_id()."_".md5(generateRandomString(rand(0,5000)))."_".md5($a*rand(1,100)).".".$ext;
				$target_file = $target_dir . $image_name;
					if(in_array($extension,$allowedExts)){
						if (move_uploaded_file($_FILES["images"]["tmp_name"][$a], $target_file)){
						  					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_images`( `business_img_name`, `admin_added_business_id`) VALUES ('$image_name',$business_id)");
										}else{
											echo "error in uploading images";
											die;
										}	

							}else{
								echo "The File is not supported";	
								die;
							}

							if($a == $total-1){
										header("Location:../".$page_name."?business_id=".$business_id."&added=1");
							}
		}//end first loop 
	}#save_adult_entertainment_business_images

	if(isset($_POST['save_adult_entertainment_details'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$res_description = mysqli_escape_string($conn,$_POST['adult_entertaiment_business_description']);
				$business_id = $_POST['business_id'];
				$check = mysqli_query($conn,"select* from admin_added_business_details where admin_added_business_id  = $business_id");
				if(mysqli_num_rows($check)==0){
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_details`( `business_details`, `admin_added_business_id`) VALUES ('$res_description',$business_id)");
					if($query){
						header("Location:../".$page_name."?business_id=".$business_id."&added_details=1");
					}else{
						#header("Location:../add_resturant_details.php?added_details=0&business_id=".$business_id);
						header("Location:../".$page_name."?business_id=".$business_id."&added_details=0");
					}
				}else{
					#header("Location:../add_resturant_details.php?already_exists_details=1&business_id=".$business_id);
					header("Location:../".$page_name."?business_id=".$business_id."&already_exists_details=1");
				}
	}# end save_adult_entertainment_details

	if(isset($_POST['save_adult_entertainment_urls'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);			
			$videourls  = array();
			$videourls = $_POST['videourls'];
			$business_id = $_POST['business_id'];
			 $check_urls = mysqli_query($conn,"select* from admin_added_business_videos_url where admin_added_business_id = $business_id");
			 if(mysqli_num_rows($check_urls)>0){
			 	header("Location:../".$page_name."?already_exists_urls=1&business_id=".$business_id);
			 }else{
			 		$all_urls = "";
					for($i=0;$i<sizeof($videourls);$i++){
						$all_urls=$all_urls."video_urls=".$videourls[$i];
					}
					$query = mysqli_query($conn,"INSERT INTO `admin_added_business_videos_url`( `business_video_url`, `admin_added_business_id`) VALUES ('$all_urls',$business_id)");
					if($query)
						header("Location:../".$page_name."?added_urls=1&business_id=".$business_id);
					else
						header("Location:../".$page_name."?added_urls=0&business_id=".$business_id);
			 }	
	}// endsave_adult_entertainment_urls


#-----------genetal type=-----------------
	if(isset($_POST['save_business_drinks'])){ #---------general type
			$business_id = $_POST['business_id'];
			$drink_name = $_POST['drink_name'];
			$drink_bottle_price = $_POST['drink_bottle_price'];
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
						header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1");
					}else{
								$target_file = $dir_menus.$image_name;
								if(!move_uploaded_file($_FILES['drink_image']['tmp_name'],$target_file)){
										header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1");
								}

					}
			}

			$check = mysqli_query($conn,"select* from business_bar_drinks where business_bar_drink_name='$drink_name' and business_bar_drink_price='$drink_bottle_price' and admin_business_id=$business_id");
			if(mysqli_num_rows($check)==0){
				$query= mysqli_query($conn,"INSERT INTO `business_bar_drinks`( `business_bar_drink_name`, `business_bar_drink_price`, `admin_business_id`, `business_bar_drink_img`, `business_bar_drink_details`) VALUES ('$drink_name','$drink_bottle_price',$business_id,'$image_name','$drink_description')");
				if ($query)
					header("Location:../".$page_name."?business_id=".$business_id."&added_drink=1");
				else
					header("Location:../".$page_name."?business_id=".$business_id."&added_drink=0");
			}else{
				header("Location:../".$page_name."?business_id=".$business_id."&already_drink_exist=1");
			}
	}//end save_drinks	

	#-------general category
	if(isset($_POST['save_food_menus'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
				$business_id = $_POST['business_id'];
				$menu_name = $_POST['menu_name'];
				$menu_price = $_POST['menu_price'];
				$menu_description = $_POST['menu_description'];
				$image_name = "";
				if(!empty($_FILES['menu_image']['name'])){
					$allowedExts = array(
							  "PNG", 
							  "JPEG", 
							  "JPG",
					); 
					$dir_menus = "../../uploads/menus_images/";
					$newFilePath1 = $_FILES['menu_image']['name'];
					$extension =  strtoupper (pathinfo($newFilePath1, PATHINFO_EXTENSION));
					$ext = pathinfo($newFilePath1, PATHINFO_EXTENSION);
					$image_name = get_random_image_name($ext,"menu");
					$target_file = $dir_menus.$image_name;
					if(!in_array($extension,$allowedExts)){
						header("Location:../".$page_name."?business_id=".$business_id."&image_not_supported=1");
					}else{
						if(!move_uploaded_file($_FILES['menu_image']['tmp_name'],$target_file)){
										header("Location:../".$page_name."?business_id=".$business_id."&image_not_uplodaed_to_dir=1");
						}else{
								$check = mysqli_query($conn,"select* from business_menus where menu_name='$menu_name' and menu_price='$menu_price' and admin_business_id=$business_id");
								if(mysqli_num_rows($check)==0){
									$query= mysqli_query($conn,"INSERT INTO `business_menus`( `menu_name`, `menu_price`, `menu_image`, `admin_business_id`,`menu_details`) VALUES ('$menu_name','$menu_price','$image_name',$business_id,'$menu_description')");
									if ($query)
										header("Location:../".$page_name."?business_id=".$business_id."&added_menu=1");
									else
										header("Location:../".$page_name."?business_id=".$business_id."&added_menu=0");
								}else{
									header("Location:../".$page_name."?business_id=".$business_id."&already_menu_exist=1");
								}
						}
					}
				}else{
							$check = mysqli_query($conn,"select* from business_menus where menu_name='$menu_name' and menu_price='$menu_price' and admin_business_id=$business_id");
							if(mysqli_num_rows($check)==0){
								$query= mysqli_query($conn,"INSERT INTO `business_menus`( `menu_name`, `menu_price`, `menu_image`, `admin_business_id`,`menu_details`) VALUES ('$menu_name','$menu_price','$image_name',$business_id,'$menu_description')");
								if ($query)
									header("Location:../".$page_name."?business_id=".$business_id."&added_menu=1");
								else
									header("Location:../".$page_name."?business_id=".$business_id."&added_menu=0");
							}else{
								header("Location:../".$page_name."?business_id=".$business_id."&already_menu_exist=1");
							}
				}
	} //end save_resturant_menus	
?>