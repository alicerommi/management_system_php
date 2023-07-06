<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';
		if(isset($_POST['add_new_energy_provider'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$sup_description = mysqli_escape_string($conn,$_POST['sup_description']);
				$energy_provider_name = strtolower(test_input($_POST['energy_provider_name']));
				$check  = mysqli_query($conn,"select* from gas_energy_suppliers where energy_supplier_name='$energy_provider_name'");
				if (mysqli_num_rows($check)==0){
								 	$q = mysqli_query($conn,"INSERT INTO `gas_energy_suppliers`(`energy_supplier_name`, `energy_supplier_img`,`energy_supplier_description`) VALUES ('$energy_provider_name','$img_name','$sup_description')");
								 	if($q){
								 		header("location:../".$page_name."?added=1");
								 	}else{
								 		header("location:../".$page_name."?added=0");
								 	}
				}else{
						header("location:../".$page_name."?supplier_exists=1");
				}
		}#add_new_energy_provider


		if(isset($_POST['add_new_electricity_provider'])){
			
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$sup_description = mysqli_escape_string($conn,$_POST['sup_description']);
				if(strlen($sup_description)==0){$sup_description="";}
				$energy_provider_name = strtolower(test_input($_POST['energy_provider_name']));
				$check  = mysqli_query($conn,"select* from electricity_energy_suppliers where electricity_provider_name='$energy_provider_name'");
				if (mysqli_num_rows($check)==0){
									 $sql = "INSERT INTO `electricity_energy_suppliers`(`electricity_provider_name`, `electricity_provider_description`) VALUES ('$energy_provider_name','$sup_description')";
									#die;
								 	$q = mysqli_query($conn,$sql);
								 	if($q){
								 		header("location:../".$page_name."?added=1");
								 	}else{
								 		header("location:../".$page_name."?added=0");
								 	}
				}else{
						header("location:../".$page_name."?supplier_exists=1");
				}
		} #add_new_electricity_provider

		if(isset($_POST['set_a_postcode'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$home_standing_charges = $_POST['home_standing_charges'];
			$business_standing_charges = $_POST['business_standing_charges'];
			$business_rate_per_unit = $_POST['business_rate_per_unit'];
			$home_rate_per_unit = $_POST['home_rate_per_unit'];
			#$supplider_types = $_POST['supplier_types'];
			$choosen_county  = $_POST['choosen_county'];
			#$supplier_id = $_POST['selected_supplier'];
			// print_r($_POST);
			// die;
			$check_configuration_exists = mysqli_query($conn,"select* from county_with_suppliers where county_id=$choosen_county");
			if(mysqli_num_rows($check_configuration_exists)>0){
					header("Location:../".$page_name."?already_exists=1");
			}else{
				$query = mysqli_query($conn,"INSERT INTO `county_with_suppliers`( `county_id`, `county_home_rate_per_unit`, `county_standing_charges_for_home`, `county_business_rate_per_unit`, `county_standing_charges_for_business`) VALUES ($choosen_county,'$home_rate_per_unit','$home_standing_charges','$business_rate_per_unit','$business_standing_charges')");
				if ($query)
					header("Location:../".$page_name."?added=1");
				else 
					header("Location:../".$page_name."?added=0");
			}
			

		}#end set_a_postcode


		if(isset($_POST['add_new_county'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$county_name  = strtolower(test_input($_POST['county_name']));
			$check = mysqli_query($conn,"select* from counties where county_name='$county_name'");
			if(mysqli_num_rows($check)>0){
				header("Location:../".$page_name."?already_exists=1");
			}else{
				$query = mysqli_query($conn,"insert into counties (county_name) values ('$county_name')");
				if($query)
					header("Location:../".$page_name."?added=1");
				else
					header("Location:../".$page_name."?added=0");
			}
		} // end add_new_county



		if(isset($_POST['addLinks'])){
				$fb_link  = $_POST['fb_link'];
				$tw_link  = $_POST['tw_link'];
				$insta_link  = $_POST['insta_link'];
				$linkedin_link  = $_POST['linkedin_link'];
				$googleplus_link  = $_POST['googleplus_link'];
				$query = mysqli_query($conn,"INSERT INTO `footersocial_medialinks`( `fb_link`, `twitter_link`, `gplus_link`, `linkedIn_link`, `instagram_link`) VALUES ('$fb_link','$tw_link','$googleplus_link','$linkedin_link','$insta_link')");
				if($query) header("location:../social_media_links.php?added=1"); 
						else header("location:../social_media_links.php?added=0");  
		}

			//for uplaoding the event images
			if(isset($_POST['upload_event_image'])){
						$event_title = $_POST['event_title'];
					$imageName = $_FILES['event_images']['name'];
						$fPathImg = "../../uploads/event/".$imageName;
							$ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
							if($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
							if(move_uploaded_file($_FILES['event_images']['tmp_name'], $fPathImg)){
							 	$q = mysqli_query($conn,"INSERT INTO `event_images`( `event_title`, `event_image`) VALUES ('$event_title','$imageName')");
							 	if($q){
							 		header("location:../add_event_images.php?added=1");
							 	}else{
							 		header("location:../add_event_images.php?added=0");
							 	}
							}
						}else{
							header("location:../add_event_images.php?invalidImage=0");
						}
			}//end upload_event_image

			
					//add testnomal
					if(isset($_POST['addTest'])){
							$person_name = mysqli_escape_string($conn,$_POST['person_name']);
							$text_para = mysqli_escape_string($conn,$_POST['text_para']);
							$query = mysqli_query($conn,"INSERT INTO `testimonals`( `testimonal_uname`, `testimonal_paragraph`) VALUES ('$person_name','$text_para')");
												if($query)
												 		header("location:../add_testimonal.php?added=1"); 
												else 
													header("location:../add_testimonal.php?added=0");
					}		// addTest here

					//for adding book
					if(isset($_POST['add_book'])){
						// print_r($_POST); die;
							$imageName = $_FILES['book_image']['name'];
							$book_name = $_POST['book_name'];
							$book_des = $_POST['book_des'];
							$book_price = $_POST['book_price'];
								$fPathImg = "../../uploads/books/".$imageName;
							
							$ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
							if($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
							if(move_uploaded_file($_FILES['book_image']['tmp_name'], $fPathImg)){
								$query = mysqli_query($conn,"INSERT INTO `books`( `book_name`, `book_details`, `book_image`,`book_price`) VALUES ('$book_name','$book_des','$imageName',$book_price)");
									if($query){
							 						header("location:../add_book.php?added=1");
							 		}else{
							 					header("location:../add_book.php?added=0");
							 		}
							}
						}else{
							header("location:../add_book.php?invalidImage=0");
						}
					}//end add_book

						
?>