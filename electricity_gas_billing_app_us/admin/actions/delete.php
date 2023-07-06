<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';


		#delete msg 
		if(isset($_GET['delete_msg'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$msg_id = $_GET['msg_id'];
			$query = mysqli_query($conn,"delete from users_msgs where msg_id = $msg_id");
			if($query)
				header("Location:../$page_name?delete=1");
			else
				header("Location:../$page_name?delete=0");
		}#delete_msg

		#delete_supplier

		if(isset($_GET['delete_supplier'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$energy_supplier_id = intval($_GET['energy_supplier_id']);
			$query = mysqli_query($conn,"delete from gas_energy_suppliers where energy_supplier_id = $energy_supplier_id");
			if($query)
				header("Location:../$page_name?delete=1");
			else
				header("Location:../$page_name?delete=0");
		}#delete_supplier 


		if(isset($_GET['delete_form_entry'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$customer_id = $_GET['customer_id'];
			$delete = mysqli_query($conn,"delete from customer_form_filling where customer_id=$customer_id");
			if($delete)
				header("Location:../$page_name?delete=1");
			else
				header("Location:../$page_name?delete=0");
		}//end delete_form_entry

		if(isset($_GET['delete_electricity_supplier'])){
				$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
				$energy_supplier_id = intval($_GET['energy_supplier_id']);
				$query = mysqli_query($conn,"delete from electricity_energy_suppliers where electricity_provider_id = $energy_supplier_id");
				if($query)
					header("Location:../$page_name?delete=1");
				else
					header("Location:../$page_name?delete=0");
		} #delete_electricity_supplier


		if(isset($_GET['delete_post_code'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$county_configuration_id = intval($_GET['county_configuration_id']);
			$query = mysqli_query($conn,"delete from county_with_suppliers where county_configuration_id = $county_configuration_id");
			if($query)
				header("Location:../".$page_name."?deleted=1");
			else
				header("Location:../".$page_name."?deleted=0");
		}

		if(isset($_GET['delete_county'])){
			$page_name = get_requested_page_uri($_SERVER['HTTP_REFERER']);
			$county_id = intval($_GET['county_id']);
			$delete = mysqli_query($conn,"delete from counties where county_id= $county_id");
			if($delete)
				header("Location:../$page_name?deleted=1");
			else
				header("Location:../$page_name?deleted=0");
		}///end delete_county


		//for removing the user message
			if(isset($_POST['deleteMSGRow'])){
					$msg_id = $_POST['msg_id'];
					$query = mysqli_query($conn,"DELETE FROM `user_messages` WHERE `msg_id`=$msg_id");
					if($query) echo "1"; else echo "0";
		}	
			//for deleting the activity log of admin
		if(isset($_POST['deleteActivity'])){
				$id= $_POST['deleteActivity'];
				$query = mysqli_query($conn,"DELETE FROM `admin_login_activity` WHERE `activity_id`=$id");
				if($query) echo "1"; else echo "0";
		}		
		//delete a deleteImage
		if(isset($_POST['deleteImage'])){
			$event_id = $_POST['event_id'];
			$query = mysqli_query($conn,"delete from event_images where event_id= $event_id");
			if($query) echo "1"; else echo "0";
		}

	
		//for deleting the user testnomal
		if(isset($_POST['deleteTestmonal'])){
				$testimonal_id = $_POST['testimonal_id'];
				$query = mysqli_query($conn,"delete from testimonals where testimonal_id= $testimonal_id");
				if($query) echo "1"; else echo "0";

		}

			if(isset($_POST['deleteBookImage'])){
						$book_id = $_POST['book_id'];
						$query = mysqli_query($conn,"delete from books where book_id= $book_id");
						if($query) echo "1"; else echo "0";
			}// end deleteBookImage

			
		///for deletiung the video
		if(isset($_POST['deleetVideo'])){
			$video_id = $_POST['video_id'];
			$query = mysqli_query($conn,"delete from site_videos where vid_id=$video_id");
			if($query) echo "1"; else echo "0";
		}
		if(isset($_POST['deleteAddressRow'])){
			$add_id = $_POST['add_id'];
			$query = mysqli_query($conn,"delete from mailing_address where address_id=$add_id");
			if($query) echo "1"; else echo "0";
		}//end deleteAddressRow
?>	