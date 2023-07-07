<?php
include '../../includes/database_connection.php';
//for accepting or rejecting the student requests 
if(isset($_GET['request_id'])){
	$request_id = intval($_GET['request_id']);
	$action = $_GET['action'];
	if($action=="accept"){
		$query = mysqli_query($conn,"UPDATE `student_request` SET `srequest_status`=1 WHERE srequest_id=$request_id");
			if($query)
					header("location:../all-student-requests.php?statusAcc=1");
				else 
					header("location:../all-student-requests.php?statusAcc=0");
	}else if($action=="reject"){
			$query =  mysqli_query($conn,"UPDATE `student_request` SET `srequest_status`=2 WHERE srequest_id=$request_id");
			if($query)
					header("location:../all-student-requests.php?statusRej=1");
				else 
					header("location:../all-student-requests.php?statusRej=0");
	}	

}
?>