<?php
include '../../includes/database_connection.php';
if(isset($_GET['TID']) && isset($_GET['action']) ){
	$tID = intval($_GET['TID']); //teacher id 
	$action = $_GET['action'];
	if($action=="accept"){
		$query = mysqli_query($conn,"UPDATE teacher SET teacher_account_status=1 WHERE teacher_id=$tID"); //accepted by admin
			if($query){
				header("location:../teacher-requests.php?Accstatus=1");
			}else{
				header("location:../teacher-requests.php?Accstatus=0");
			}
			
	}else if($action=="reject"){
		$query = mysqli_query($conn,"UPDATE teacher SET teacher_account_status=3 WHERE teacher_id=$tID"); //rejected by admin
			if($query){
		header("location:../teacher-requests.php?Rejstatus=1");
	}else{
		header("location:../teacher-requests.php?Rejstatus=0");
	}	


}
}//end isset condition
?>