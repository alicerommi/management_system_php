<?php
	include('config.php');
	if(isset($_POST['save'])){
			// $CATALOGUE = $_POST['CATALOGUE'];
			// $CONSIGNOR = $_POST['CONSIGNOR'];
			// $CONSIGNEE = $_POST['CONSIGNEE'];
			$date = $_POST['date'];
			$time = $_POST['time'];
			$shipper_name = $_POST['shipper_name'];
			$shipper_phone = $_POST['shipper_phone'];
			$shipper_address = $_POST['shipper_address'];
			$reciever_name = $_POST['reciever_name'];
			$reciever_phone = $_POST['reciever_phone'];
			$reciever_address = $_POST['reciever_address'];
			$ship_type = $_POST['ship_type'];
			$status = $_POST['status'];
			$current_loca= $_POST['current_loca'];
			$tracking_id  = $_POST['tracking_id'];
			$consignment = $_POST['consignment'];
				$item_name = $_POST['item_name'];
				$item_wright = $_POST['item_wright'];
				$invoice_number = $_POST['invoice_number'];
				$booking_mode  = $_POST['booking_mode'];
				$mode = $_POST['mode'];
			$insert = mysqli_query($db,"INSERT INTO `courier`( `tracking_id`, `shipper_name`, `shipper_address`, `shipper_phone`, `reciver_name`, `reciver_address`, `reciver_phone`, `shippment_type`,`consignment_number`, `item_name`, `weight`, `invoice_number`, `booking_mode`, `mode`) VALUES ('$tracking_id','$shipper_name','$shipper_address','$shipper_phone','$reciever_name','$reciever_address','$reciever_phone','$ship_type','$consignment','$item_name','$item_wright','$invoice_number','$booking_mode','$mode')");

			$insert2 = mysqli_query($db,"INSERT INTO `time_status`( `status_date`, `status_time`, `shipment_status`,`status_cur_location`, `tracking_id`) VALUES ('$date','$time','$status','$current_loca','$tracking_id')");
			if($insert && $insert2)
							header("location:../index.php?added=1"); 
				else
						 	header("location:../index.php?added=0");
	}  //end save

	if(isset($_POST['addStatus'])){
			$id = $_POST['id'];
			$location  = $_POST['location'];
			$date  = $_POST['date'];
			$time  = $_POST['time'];
			$status  = $_POST['status'];
			$bbid= $_POST['bbid'];
			$sql = mysqli_query($db,"INSERT INTO `time_status`( `status_date`, `status_time`, `shipment_status`, `status_cur_location`, `tracking_id`) VALUES ('$date','$time','$status','$location','$id')");
			if($sql)
					header("location:../view_details.php?id=$bbid&added=1"); 
				else
					header("location:../view_details.php?id=$bbid&added=0"); 

	}
?>