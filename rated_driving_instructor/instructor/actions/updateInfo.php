<?php
//this file use to update the details of instructor like his profile details or password 
include '../includes/database_connection.php';
//for updating his address and post code also the user name in first tab of instructor
if(isset($_POST['updateUserInfo'])){ //start of if condition
	$id = $_POST['ins_id'];
	$name = mysqli_escape_string($conn,$_POST['name']);
	$address = $_POST['address'];
	$postcode = mysqli_escape_string($conn,$_POST['postcode']);
	$addressEN = urlencode($address);
	$halfHourRate = $_POST['halfHourRate'];
	$apiLink  = "https://maps.googleapis.com/maps/api/geocode/json?address=$addressEN&key=AIzaSyBRkdcfuduhpP_lGJ1MDxTxm14-SKiAcnc";
	$MapApi = file_get_contents($apiLink);
	$json = json_decode($MapApi,true);
	//for getting the two parameters i.e. lat and lng from the entered address
	$lat = round($json["results"][0]["geometry"]["location"]["lat"],3);
	$lng = round($json["results"][0]["geometry"]["location"]["lng"],3);
	$query = "UPDATE `instructor` SET `address` = '$address', `postcode`='$postcode', `name`='$name', `lat`='$lat', `lng` = '$lng', `instructorPrice_perHalfHour`='$halfHourRate' WHERE `id`=$id";
	$result = mysqli_query($conn,$query);
	if($result){ header("Location:../profile.php?id=$id&info=1"); }
		else{ header("Location:../profile.php?id=$id&info=0"); }
}//end if condition

//for updating the user password from profile page
if(isset($_POST['updateUserPass'])){

	$id = $_POST['ins_id'];
	//query for fetching the old password of this user
	$queryOldPass  = "SELECT* FROM `instructor` WHERE id=$id";
	$resultOldPass = mysqli_query($conn,$queryOldPass);
	if(mysqli_num_rows($resultOldPass)==1){
		$row = mysqli_fetch_array($resultOldPass);
		$oldPassword = $row['password'];
	} 
	//password entered by user 
	$olduserPassword = $_POST['oldPassword'];
	$newPassword = $_POST['newPassword'];
	$conNewPassword = $_POST['confirmNewPassword'];
	if($olduserPassword==$oldPassword && $newPassword==$conNewPassword){ //start condition if password
		$query  = "UPDATE instructor SET password='$newPassword' WHERE id=$id";
		$result = mysqli_query($conn,$query);
		if($result){ header("location:../profile.php?id=$id&info=3"); }
	}else{ header("location:../profile.php?id=$id&info=4"); }//end the password condtion	
}
//for updating the package information
if(isset($_POST['packageEdit'])){
	$editpackagename = mysqli_escape_string($conn,$_POST['editpackagename']);
	$editpackageType = $_POST['editpackageType'];
	$editpkghours = $_POST['editpkghours'];
	$editpkgamount = $_POST['editpkgamount'];
	$editpackageDescription = mysqli_escape_string($conn,strip_tags($_POST['editpackageDescription']));
	$packageID = $_POST['packageID'];
	$package_days = $_POST['editpkgdays'];
	$query = mysqli_query($conn,"UPDATE `packages` SET `package_name`='$editpackagename',`package_type`='$editpackageType',`package_days`='$package_days',`package_durationHours`='$editpkghours',`package_amount`='$editpkgamount',`package_description`='$editpackageDescription' WHERE `package_id`=$packageID");
	if($query)
		header("location:../edit-package.php?package_id=".$packageID."&editStatus=1");
	else
			header("location:../edit-package.php?package_id=".$packageID."&editStatus=0");
}
//for edit the vehicle info 
if(isset($_POST['editVehicle'])){
	// print_r($_POST);
	// die;
	$vehicle_id = $_POST['vehicle_id'];
	$ins_id = $_POST['ins_id'];
	$vFamily = mysqli_escape_string($conn,$_POST['vFamily']);
	$vModel = mysqli_escape_string($conn,$_POST['vModel']);
	$vName = mysqli_escape_string($conn,$_POST['vName']);
	$query = mysqli_query($conn,"UPDATE `instructor_vehicles` SET `vehicle_family`='$vFamily',`vehicle_model`='$vModel',`vehicle_name`='$vName' WHERE `vehicle_id`=$vehicle_id AND ins_id = $ins_id");	
	if($query)
		header("location:../edit-vehicle.php?vehicle_id=".$vehicle_id."&editInfo=1");
	else
		header("location:../edit-vehicle.php?vehicle_id=".$vehicle_id."&editInfo=0");
}//end isset condition here
?>
