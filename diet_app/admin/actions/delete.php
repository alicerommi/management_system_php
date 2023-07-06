<?php
//it will includes all the insert operation 
include '../../includes/database_connection.php';
//for deleting the categoru
if(isset($_GET['cate_id'])){
	$cate_id  =$_GET['cate_id'];
	//$query = mysqli_query($conn,"DELETE FROM category WHERE category_id  = $cate_id");
	$query = mysqli_query($conn,"UPDATE category SET category_active=0 WHERE category_id  = $cate_id");
	if($query)
			header("location:../categories.php?deleted=1");
		else
			header("location:../categories.php?deleted=0");
}//end isset condition here 

//for deleting an item
if(isset($_GET['item_id'])){
	$item_id = $_GET['item_id'];
	$query = mysqli_query($conn,"UPDATE items SET item_active=0 where item_id=$item_id");
	if($query){
		header("location:../view-items.php?itemDeleted=1");
	}else{
		header("location:../view-items.php?itemDeleted=0");
	}
}
if(isset($_GET['dietplan_id'])){
	$dietplan_id  = $_GET['dietplan_id'];
	$query = mysqli_query($conn,"UPDATE `dietplan` SET `dietplan_active`=0 WHERE dietplan_id=$dietplan_id");
	if($query){
		header("location:../view-plans.php?itemDeleted=1");
	}else{
		header("location:../view-plans.php?itemDeleted=0");
	}
}

//for deleting the message
if(isset($_GET['message_id'])){
	$msg_id = $_GET['message_id'];
	$query = mysqli_query($conn,"UPDATE messages SET message_active=0 WHERE message_id=$msg_id");
	if($query)
		header("location:../messages.php?deleted=1");
	else 
		header("location:../messages.php?deleted=0");
}

?>
