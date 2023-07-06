<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';

		if(isset($_POST['update_a_county'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			// print_r($_POST);
			// die;
			#$supplier_types = $_POST['supplier_types'];
			#$selected_supplier = $_POST['selected_supplier'];
			$county_configuration_id = $_POST['county_configuration_id'];
			$home_rate_per_unit = $_POST['home_rate_per_unit'];
			$business_rate_per_unit = $_POST['business_rate_per_unit'];
			$home_standing_charges = $_POST['home_standing_charges'];
			$business_standing_charges = $_POST['business_standing_charges'];
			$county_id = $_POST['county_id'];
			$sql = "UPDATE `county_with_suppliers` SET county_home_rate_per_unit='$home_rate_per_unit' ,county_standing_charges_for_home='$home_standing_charges', county_business_rate_per_unit='$business_rate_per_unit',county_standing_charges_for_business='$business_standing_charges',county_update_datetime=NOW() where county_configuration_id=$county_configuration_id";
			// die;
			$query = mysqli_query($conn,$sql);
			if($query)
				header("Location:../".$page_name."?updated=1&county_configuration_id=".$county_configuration_id."&county_id=".intval($county_id));
			else
				header("Location:../".$page_name."?updated=0&county_configuration_id=".$county_configuration_id."&county_id=".intval($county_id));
		}// end update_a_postcode

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

			//update social media links
		// if(isset($_POST['updateLinks'])){
		// 		$sm_linkid = $_POST['sm_linkid'];
		// 		$fb_link = $_POST['fb_link'];
		// 		$tw_link = $_POST['tw_link'];
		// 		$insta_link = $_POST['insta_link'];
		// 		$linkedin_link = $_POST['linkedin_link'];
		// 		$googleplus_link = $_POST['googleplus_link'];
		// 		$query = mysqli_query($conn,"UPDATE `footersocial_medialinks` SET `sm_linkid`='$sm_linkid',`fb_link`='$fb_link',`twitter_link`='$tw_link',`gplus_link`='$googleplus_link',`linkedIn_link`='$linkedin_link',`instagram_link`='$insta_link' WHERE sm_linkid=$sm_linkid");
		// 		if($query) header("location:../social_media_links.php?updated=1"); else header("location:../social_media_links.php?updated=0");
		// }

		// if(isset($_POST['sendReplyFORM'])){
		// 				$msg_id = $_POST['msg_id'];
		// 	$msg_reply = mysqli_escape_string($conn,$_POST['msg_reply']);
		// 	$query = mysqli_query($conn,"UPDATE `user_messages` SET msg_reply='$msg_reply',msg_recordflag=1 where msg_id=$msg_id");
		// 	if($query) header("location:../send_reply.php?message_id=$msg_id&replySent=1"); else header("location:../send_reply.php?message_id=$msg_id&replySent=0");;
		// }
		

///for updating the package details 
		

?>