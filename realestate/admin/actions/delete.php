<?php 
include '../../includes/database_connection.php';
//for deleting the projecty
if(isset($_GET['project_id'])){
	$project_id = $_GET['project_id'];
	$query = mysqli_query($conn,"DELETE FROM projects where project_id=$project_id");
	$query2 = mysqli_query($conn,"DELETE FROM `project_images` WHERE project_id=$project_id");
	if($query && $query2){
		header("location:../view-projects.php?delStatus=1");
	}else 
	header("location:../view-projects.php?delStatus=0");
}//end isset condition here 

//for deleting the property 
if(isset($_GET['property_id'])){
	$property_id  = $_GET['property_id'];
	$query  = mysqli_query($conn,"DELETE FROM `property`  where property_id=$property_id");
	$query2  = mysqli_query($conn,"DELETE FROM `property_image` WHERE  property_id=$property_id");
	if($query && $query2){
		header("location:../view-properties.php?delStatus=1");
	}else {
	header("location:../view-properties.php?delStatus=0");
	}
}//end isset condtion

//for deleting the slider image
if(isset($_POST['image_id'])){
	$image_id = $_POST['image_id'];
	$query  = mysqli_query($conn,"DELETE FROM slider_images where simage_id = $image_id");
	if($query)
			echo "1";
		else 
			echo "0";
}

//for deleting the comment
if(isset($_GET['message_id'])){
	$message_id = $_GET['message_id'];
	$query = mysqli_query($conn,"DELETE FROM `contact` WHERE `contact_id`=$message_id");
	if($query)
		header("location:../view-messages.php?deleted=1");
	else 
				header("location:../view-messages.php?deleted=0");
}

//delete the slider image 
if(isset($_GET['simage_id'])){
	$simage_id = $_GET['simage_id'];
	$query = mysqli_query($conn,"DELETE FROM slider_images where simage_id=$simage_id");
	if($query){
		header("location:../add-slider-images.php?deleted=1");
	}else
		header("location:../add-slider-images.php?deleted=0");
}


?>

