<?php
include '../../includes/database_connection.php';
//this file will handle all the delete operations like deleting any records
if(isset($_GET['TID'])){
	$id = intval($_GET['TID']);
	$query  = mysqli_query($conn,"DELETE FROM teacher WHERE teacher_id=$id");
	if($query)
			header("location:../all-teacchers.php?deleteStatus=1");
		else
			header("location:../all-teacchers.php?deleteStatus=0");
}

//delete the user comments
if(isset($_GET['comment_id'])){
	$comment_id = $_GET['comment_id'];
	$query = mysqli_query($conn,"DELETE FROM user_comments WHERE comment_id=$comment_id");
	if($query){
		header("location:../users_comments.php?deleted=1");
	}else
	header("location:../users_comments.php?deleted=0");
}
?>