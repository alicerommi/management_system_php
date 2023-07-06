<?php
include '../../includes/database_connection.php';
if(isset($_POST['image_id']))
{	
	$imgid = $_POST['image_id'];
	$query = mysqli_query($conn,"SELECT simage_name,simage_description FROM `slider_images` WHERE simage_id=$imgid");
	$row = mysqli_fetch_array($query);
	echo json_encode($row);
}

if(isset($_POST['message_id']))
{	
	$message_id = $_POST['message_id'];
	$query = mysqli_query($conn,"SELECT * FROM `contact` WHERE contact_id=$message_id");
	// $query2 = mysqli_query($conn,"UPDATE contact SET msg_read=1");
	$row = mysqli_fetch_assoc($query);
	//echo json_encode($row);
	echo $row['contact_msg'];
}
?>