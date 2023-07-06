<?php
include '../includes/database_connection.php';
//this code wil save the request status into schdule request action by will performed by instructor when he clicks on button i.e. reject or accept
if(isset($_POST['schdule_ID']) && isset($_POST['action'])){
	$action = $_POST['action'];
	$schID = $_POST['schdule_ID'];
	//saving into table if he accepts then value 1 will be set else 2 wil inserted
	if($action=="accept"){
			$query = "UPDATE `schedule_bookings` SET `approvedStatus`=1 WHERE `id`=$schID";}
	else 
		{$query = "UPDATE `schedule_bookings` SET `approvedStatus`=2 WHERE `id`=$schID";}
	$result = mysqli_query($conn,$query);
	if($result){
		echo "Done";
	}else{
		echo "Error in action".mysqli_error($conn);
	}
}//end if condition

//for package request status 
//////////////////////////////now the package request status will changed into accepted or rejected
if(isset($_POST['pkg_ID']) && isset($_POST['action'])){
	$pkg_ID = $_POST['pkg_ID'];
	$action = $_POST['action'];

	if($action=="accept")
			{$query = "UPDATE `packages_booking` SET `package_requestStatus` = 1 WHERE `package_booking_id`=$pkg_ID";}
	else 
		{$query = "UPDATE `packages_booking` SET `package_requestStatus` = 2 WHERE `package_booking_id`=$pkg_ID";}
	$result = mysqli_query($conn,$query);
	if($result){
		echo "Done";
	}else{
		echo "Error in action".mysqli_error($conn);
	}
}//end if condition
//////////////////////////////////////////////////////////////////////////////////////////////
//for appear package info on the modal  ajax request comes here and show response on modal
if(isset($_POST['package_id'])){
	//SELECT `package_id`, `ins_id`, `package_name`, `package_type`, `package_days`, `package_durationHours`, `package_amount`, `package_description`, `recordDate` FROM `packages` WHERE 1

	$pID =  $_POST['package_id'];
	$query = mysqli_query($conn,"SELECT* FROM `packages` WHERE package_id=$pID");
	$rowPackage  = mysqli_fetch_array($query);
	$package_name = $rowPackage['package_name'];
	$package_type = $rowPackage['package_type'];
	
	if($package_type==1){
		$package_type = "Basic";
	}else if($package_type=="2"){
		$package_type = "Standard";
	}else
		 $package_type = "Premium";

	$package_days = $rowPackage['package_days'];
	$package_durationHours = $rowPackage['package_durationHours'];
	$package_amount = $rowPackage['package_amount'];
	$package_description = $rowPackage['package_amount'];
	$recordDate = $rowPackage['recordDate'];
	// $package_requestStatus = $rowPackage['package_requestStatus'];
	// if($package_requestStatus==1){
	// 	$package_requestStatus = "Approved";
	// }else if($package_requestStatus==2){
	// 	$package_requestStatus = "Disapproved";
	// }else{
	// 	$package_requestStatus = "Pending";
	// }									
									echo'
                      				<dl> 
                                    	<dt>Package Name</dt>
                                        <dd>'.ucwords($package_name).'</dd> 
                                        <dt>Package Type</dt>
                                        <dd>'.$package_type.'</dd> 
                                        <dt>Package Days</dt>
                                        <dd>'.$package_days.'</dd> 
                                        <dt>Package Duration in Hours</dt>
                                        <dd>'.$package_durationHours.'</dd> 
                                        <dt>Package Amount</dt>
                                        <dd>$'.$package_amount.'</dd> 
                                        <dt>Package Description</dt>
                                        <dd>'.ucwords($package_description).'</dd>
                                    </dl>';
}

?>