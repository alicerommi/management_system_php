<?php
include '../includes/database_connection.php';
//for deleting the instructors packages
if(isset($_GET['package_id'])){
	$package_id = intval($_GET['package_id']);
	$query = mysqli_query($conn,"DELETE FROM `packages` WHERE package_id=$package_id");
	if($query)
		header("location:../view-packages.php?delStatus=1");
	else
		header("location:../view-packages.php?delStatus=0");
}//
//for deleting the vehicle 
if(isset($_GET['vehicle_id'])){
	$vid = $_GET['vehicle_id'];
	$query = mysqli_query("DELETE FROM instructor_vehicles WHERE vehicle_id=$vid");
	if($query) 
		header("location:../add-vehicle.php?delStatus=1");
	else
		header("location:../add-vehicle.php?delStatus=0);
}
?>