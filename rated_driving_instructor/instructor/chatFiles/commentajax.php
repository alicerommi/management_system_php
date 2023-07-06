<?php
include '../includes/database_connection.php'; 
//for adding the message to learner
if(isset($_POST['user_comm']) && isset($_POST['senderID']))
{
  $comment=$_POST['user_comm'];
  $ins_id = $_POST['senderID'];
  $user_id = $_POST['recieverID'];
  $insert=mysqli_query($conn,"INSERT INTO `users_chat`(`ins_id`, `user_id`, `comment`, `post_time`,`sendBy`) VALUES('$ins_id','$user_id','$comment',CURRENT_TIMESTAMP,'instructor')");
}
//for adding message of instructor to admin 
if(isset($_POST['action'])){
	if($_POST['action']=="addMessage"){
		$ins_id = $_POST['ins_id'];
		$admin_id = $_POST['admin_id'];
		$message = $_POST['ins_comm'];
		$query = mysqli_query($conn,"INSERT INTO `admin_ins_chat`(`admin_id`, `ins_id`, `message`, `post_time`, `sendBy`) VALUES ($admin_id,$ins_id,'$message',CURRENT_TIMESTAMP,'instructor')");		
	}	//end the action check point here
}//end isset condition here 
?>