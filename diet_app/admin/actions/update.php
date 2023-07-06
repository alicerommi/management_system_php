<?php
//it will includes all the insert operation 
include '../../includes/database_connection.php';
//for updating the category name
if(isset($_POST['UpdateCate'])){
	$cate_id = $_POST['cate_id'];
	$categoryName = $_POST['categoryName'];
	$query = mysqli_query($conn,"UPDATE category SET category_name='$categoryName'");
	if($query){
		header("location:../categories.php?updated=1");
	}else{
		header("location:../categories.php?updated=0");
	}
}//end isset here
//for updating the item details
if(isset($_POST['updateItem'])){

		$itemName = $_POST['itemName'];
		$item_id = $_POST['item_id'];
		$choosenCate = $_POST['choosenCate'];
		$query = mysqli_query($conn,"UPDATE items SET item_name='$itemName' , category_id=$choosenCate WHERE item_id = $item_id");
		if($query){
			header("location:../edit-item.php?itemUpdated=1&item_id=".$item_id);
		}else
		{
			header("location:../edit-item.php?itemUpdated=0&item_id=".$item_id);
		}
}

//for updating the dietplan
if(isset($_POST['EditPlan'])){
	$dietplan_id = $_POST['dietplan_id'];
	$planName = $_POST['planName'];
	$planDescription = $_POST['planDescription'];
	$query = mysqli_query($conn,"UPDATE dietplan SET dietplan_description='$planDescription', dietplan_name='$planName' WHERE dietplan_id=$dietplan_id");
	if($query)
		header("location:../edit-plan.php?planEdited=1&dietplan_id=".$dietplan_id);
	else
		header("location:../edit-plan.php?planEdited=0&dietplan_id=".$dietplan_id);
}

//for updating the plan filter
if(isset($_POST['editPlanFilter'])){

	//$planfilter_id = $_POST['planfilter_id'];
	$choosenPlan  = $_POST['choosenPlan'];
	$choosenItem  = $_POST['choosenItem'];
	$choosenFilter  = $_POST['choosenFilter'];
	$query = mysqli_query($conn,"UPDATE `planfilter` SET `flag`='$choosenFilter' WHERE `item_id`=$choosenItem AND `dietplan_id`=$choosenPlan");
	if($query)
		echo "1";
		// header("location:../edit-planfilter.php?updated=1&planfilter_id=".$planfilter_id);
	else
		echo "0";
		// header("location:../edit-planfilter.php?updated=0&planfilter_id=".$planfilter_id);
}//end editPlanFilter





?>