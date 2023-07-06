<?php
	$dir = "../../includes/";
	include $dir.'database_connection.php';
	include $dir.'cleaner_input.php';
	include $dir.'functions.php';
	include'request_traces.php';

	if(isset($_GET['delete_business_img'])){
			$img_id  = $_GET['img_id'];
			$delete_business_img  = $_GET['delete_business_img'];
			$business_id = $_GET['business_id'];
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$query = mysqli_query($conn,"delete from admin_added_business_images where business_img_id=$img_id and admin_added_business_id=$business_id");
			if($query)
				header("Location:../".$page_name."?deleted_img=1&business_id=".$business_id);
			else
				header("Location:../".$page_name."?deleted_img=0&business_id=".$business_id);
	}// end delete_business_img
	//delete business entry
	if(isset($_GET['delete_business'])){
		$business_id = intval($_GET['business_id']);
		$query1 = mysqli_query($conn,"DELETE FROM `admin_added_business_images` WHERE `admin_added_business_id`=$business_id");
		$query2 = mysqli_query($conn,"DELETE FROM `admin_added_business_videos_url` WHERE `admin_added_business_id`=$business_id");
		$query3 = mysqli_query($conn,"DELETE FROM `admin_added_business` WHERE business_id=$business_id");
		$query4 = mysqli_query($conn,"DELETE FROM `admin_added_business_details` WHERE `admin_added_business_id`=$business_id");
		if($query1 && $query2 && $query3 && $query4){
			header("Location:../all_businesses.php?delete_business=1");
		}else{
			header("Location:../all_businesses.php?delete_business=0");
		}
	}// end delete_business

	if(isset($_GET['delete_menu'])){
		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
		$menu_id = intval($_GET['menu_id']);
		$business_id = intval($_GET['business_id']);
		$delete = mysqli_query($conn,"delete from business_menus where menu_id=$menu_id and admin_business_id = $business_id");
		if($delete){
			header("Location:../".$page_name."?menu_deleted=1&business_id=".$business_id);
		}
	}  // end delete_menu
	if(isset($_GET['delete_drink'])){
		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);	
		$drink_id = intval($_GET['drink_id']);
		$business_id = intval($_GET['business_id']);
		$delete = mysqli_query($conn,"delete from business_bar_drinks where business_bar_drink_id=$drink_id and admin_business_id = $business_id");
		if($delete){
			header("Location:../".$page_name."?drink_deleted=1&business_id=".$business_id);
		}else{
			header("Location:../".$page_name."?drink_deleted=0&business_id=".$business_id);
		}
	}  // end delete_drink

	if(isset($_GET['delete_vehicle'])){
		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
		$vehicle_id = intval($_GET['vehicle_id']);
		$business_id = intval($_GET['business_id']);
		$delete_vehicle_imgs = mysqli_query($conn,"delete from business_vehicle_images where business_vehicle_id=$vehicle_id");
		$delete_vehicle = mysqli_query($conn,"delete from business_vehicles where business_vehicle_id= $vehicle_id");
		if($delete_vehicle && $delete_vehicle_imgs)
			header("Location:../".$page_name."?vehicle_deleted=1&business_id=".$business_id);
		else
			header("Location:../".$page_name."?vehicle_deleted=0&business_id=".$business_id);
	}// end delete_vehicle
	#delete any image for a specific vehicle
	if(isset($_GET['remove_vehicle_img'])){
		$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
		$vehicle_id = intval($_GET['vehicle_id']);
		$img_id = intval($_GET['img_id']);
		$business_id = intval($_GET['business_id']);
		$delete_img = mysqli_query($conn,"delete from business_vehicle_images where business_vehicle_id=$vehicle_id and vehicle_img_id=$img_id");
		if($delete_img)
			header("Location:../".$page_name."?vehicle_img_deleted=1&business_id=".$business_id."&vehicle_id=".$vehicle_id);
		else
			header("Location:../".$page_name."?vehicle_img_deleted=0&business_id=".$business_id."&vehicle_id=".$vehicle_id);

	}//end remove_vehicle_img

?>