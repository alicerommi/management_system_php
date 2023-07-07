<?php
//it will includes all the insert operation 
include '../../includes/database_connection.php';
//for deleting the categoru
if(isset($_GET['cate_id']) && isset($_GET['action'])){
	$action=$_GET['action'];
	$cate_id  =$_GET['cate_id'];
	//$query = mysqli_query($conn,"DELETE FROM category WHERE category_id  = $cate_id");
	if($action=="deactive")
				{
					//first check whether this category contains items or not
					$checkCate = mysqli_query($conn,"SELECT * FROM `items` where category_id =$cate_id  and item_active=1");
					if(mysqli_num_rows($checkCate)>0){
						{header("location:../categories.php?failed=0");}
					}else{

						$query = mysqli_query($conn,"UPDATE category SET category_active=0 WHERE category_id  = $cate_id");
						if($query)
										{header("location:../categories.php?deleted=1");}
									else
										{header("location:../categories.php?deleted=0");}
						}
					}else{
						$query = mysqli_query($conn,"UPDATE category SET category_active=1 WHERE category_id  = $cate_id");

									if($query)
									{header("location:../categories.php?restored=1");}
								else
									{header("location:../categories.php?restored=0");}
					}
}//end isset condition here 

//for deleting an item
if(isset($_GET['item_id']) && isset($_GET['action'])){

	$item_id = $_GET['item_id'];
	$action = $_GET['action'];
	if($action=="active")
	{

		$query = mysqli_query($conn,"UPDATE items SET item_active=1 where item_id=$item_id");
		if($query){
						header("location:../view-items.php?itemRestored=1");
				}else{
						header("location:../view-items.php?itemRestored=0");
				}
		
	}
	else if($action=="deactive"){
		//check whether this item is a part of a diet plan or not
		$checkItem = mysqli_query($conn,"SELECT * FROM `planfilter` where item_id=$item_id and planfilter_active=1");
		if(mysqli_num_rows($checkItem)>0){
			header("location:../view-items.php?failed=1");
		}else
				{
							$query = mysqli_query($conn,"UPDATE items SET item_active=0 where item_id=$item_id");
							if($query){
									header("location:../view-items.php?itemDeleted=1");
							}else{
									header("location:../view-items.php?itemDeleted=0");
							}	
				}	
		}else if($action=="permanent"){ 
			$checkItem = mysqli_query($conn,"SELECT * FROM `planfilter` where item_id=$item_id and planfilter_active=1");
		if(mysqli_num_rows($checkItem)>0){
			header("location:../view-items.php?failed=1");
		}else
				{
						 $sql = "DELETE from items where item_id=$item_id";
							$query = mysqli_query($conn,$sql);
							if($query){
									header("location:../view-items.php?itemDeletedPer=1");
							}else{
									header("location:../view-items.php?itemDeletedPer=0");
							}	
				}	

		}
}
if(isset($_GET['dietplan_id']) && isset($_GET['action']) ){
	$dietplan_id  = $_GET['dietplan_id'];
	$action = $_GET['action'];
	if($action=="deactive")
	{		
					$query = mysqli_query($conn,"UPDATE `dietplan` SET `dietplan_active`=0 WHERE dietplan_id=$dietplan_id");
					if($query){
						header("location:../view-plans.php?planDeleted=1");
					}else{
						header("location:../view-plans.php?planDeleted=0");
					}
	}else{
						$query = mysqli_query($conn,"UPDATE `dietplan` SET `dietplan_active`=1 WHERE dietplan_id=$dietplan_id");
						if($query){
							header("location:../view-plans.php?planRestored=1");
						}else{
							header("location:../view-plans.php?planRestored=0");
						}
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

if(isset($_POST['simage_id']) && isset($_POST['type'])){
		
		$simage_id = $_POST['simage_id'];
		$query = mysqli_query($conn,"UPDATE slider_images set image_active=0 where image_id=$simage_id");
		if($query)
			echo "1";
		else
			echo "0";
}

?>
