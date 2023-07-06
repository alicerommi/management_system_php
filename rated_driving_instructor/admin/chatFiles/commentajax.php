<?php
include '../includes/database_connection.php';
//for covering the admin to instructor conversations
if(isset($_POST['admin_comm']) && isset($_POST['admin_id']) && isset($_POST['ins_id']))
{
	  $comment=$_POST['admin_comm'];
	  $admin_id = $_POST['admin_id'];
	  $ins_id = $_POST['ins_id'];
	 mysqli_query($conn,"INSERT INTO `admin_ins_chat`( `admin_id`, `ins_id`, `message`, `post_time`, `sendBy`) VALUES ($admin_id,$ins_id,'$comment',CURRENT_TIMESTAMP,'admin')");
}//end isset condition here 
////for covering the admin to learner conversations
if(isset($_POST['action']) ){
	if($_POST['action'] == "add"){
			  $comment = $_POST['admin_comm'];
			  $admin_id = $_POST['admin_id'];
			  $user_id = $_POST['user_id'];
			  mysqli_query($conn,"INSERT INTO `admin_learner_chat`( `admin_id`, `user_id`, `message`, `post_time`, `sendBy`) VALUES ($admin_id,$user_id,'$comment',CURRENT_TIMESTAMP,'admin')");
	}//end if condition for action add
}//end isset condition here
?>