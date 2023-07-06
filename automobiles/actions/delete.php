<?php session_start();
	include '../admin/includes/database_connection.php';
		$img_dir = "../uploads/vehicles_images/";
	$vid_dir = "../uploads/vehicles_video/";
	if(isset($_POST['delete_vehi_ad_img'])){
		$vehicle_image_id = $_POST['vehicle_image_id'];
		$vehicle_ad_id = $_POST['vehicle_ad_id'];
		$img_data = mysqli_query($conn,"select* from vehicle_images where vehicle_image_id=$vehicle_image_id");
		$row = mysqli_fetch_array($img_data);
		unlink($img_dir.$row['vehicle_image_name']);
		$delete = mysqli_query($conn,"delete from vehicle_images where vehicle_image_id=$vehicle_image_id");
		if($delete)
			echo "1";
		else echo "0";
	}

	if(isset($_POST['delete_video'])){
		$vehicle_video_id = $_POST['vehicle_video_id'];
		$vehicle_video_name = $_POST['vehicle_video_name'];
		$vehicle_ad_id = $_POST['vehicle_ad_id'];
		$delete = mysqli_query($conn,"delete from vehicle_videos where vehicle_video_id=$vehicle_video_id");
		if($delete){
			unlink($vehicle_video_name);
			echo "1";
		}else{
			echo "0";
		}
	}   //end delete_video

	if(isset($_GET['delete_vehicle'])){
		$customer_id = $_SESSION['gbh2_customer_id'];
		$vehicle_ad_id = $_GET['vehicle_ad_id'];
		/////first to unlink every image and video related to ad
				$query = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id = $vehicle_ad_id");
				while($r = mysqli_fetch_array($query)){
					unlink($img_dir.$r['vehicle_image_name']);
				}//end while
				$vidoe = mysqli_query($conn,"select* from vehicle_videos where vehicle_ad_id=$vehicle_ad_id");
				if(mysqli_num_rows($vidoe)>0){
					$rv = mysqli_fetch_array($vidoe);
					$vehicle_video_name = $vid_dir.$rv['vehicle_video_name'];
						unlink($vehicle_video_name);
				}
				$delete_images = mysqli_query($conn,"delete  from vehicle_images where vehicle_ad_id=$vehicle_ad_id");
				$delete_videos = mysqli_query($conn,"delete  from vehicle_videos where vehicle_ad_id=$vehicle_ad_id");
				$delete_ad = mysqli_query($conn,"delete from vehicles_ads where customer_id=$customer_id and vehicle_ad_id= $vehicle_ad_id");
				if($delete_images  && $delete_videos && $delete_ad)
					header("Location:../my_vehicles.php?deleted=1");
				else
					header("Location:../my_vehicles.php?deleted=0");
	}
?>