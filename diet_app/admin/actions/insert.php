<?php
//it will includes all the insert operation 
include '../../includes/database_connection.php';
if(isset($_POST['AddCate'])){
		$categoryName = $_POST['categoryName'];
		$query = mysqli_query($conn,"INSERT INTO `category`( `category_name`,  `category_recordDate`,`category_active`) VALUES ('$categoryName',CURRENT_TIME,1)");
		if($query){
			header("location:../categories.php?cateAdd=1");
		}else{
		header("location:../categories.php?cateAdd=0");
		}
}//end AddCate
//add an item 

if(isset($_POST['addItem'])){
$itemName = test_input($_POST['itemName']);
$choosenCate = $_POST['choosenCate'];
$query = mysqli_query($conn,"INSERT INTO `items`( `category_id`, `item_name`, `item_recordDate`, `item_active`) VALUES ($choosenCate,'$itemName',CURRENT_TIME,1)");
	if($query){
		header("location:../add-items.php?itemAdded=1");
	}else{
		header("location:../add-items.php?itemAdded=0");
	}

}//end addItem isset here


//add a plan here

if(isset($_POST['addPlan']))	{
	$planName    = test_input($_POST['planName']);
	$planDescription    = test_input($_POST['planDescription']);
	$query = mysqli_query($conn,"INSERT INTO `dietplan`( `dietplan_name`, `dietplan_description`, `dietplan_active`, `dietplan_recordDate`) VALUES ('$planName','$planDescription',1,CURRENT_TIME)");
	if($query)
			header("location:../add-plan.php?planAdded=1");
		else
			header("location:../add-plan.php?planAdded=0");
}//end addplan here

//for inserting the dietplan detail 
if(isset($_POST['addPlanDetail'])){

$plandetailsName = test_input($_POST['plandetailsName']);
$choosenPlan = test_input($_POST['choosenPlan']);
$choosenItem = test_input($_POST['choosenItem']);
$plandetailsDescription = test_input($_POST['plandetailsDescription']);
$checkItem = mysqli_query($conn,"SELECT* FROM plandetail WHERE item_id=$choosenItem AND dietplan_id=$choosenPlan");
if(mysqli_num_rows($checkItem)>0){
	header("location:../add-plandetail.php?alreadyExists=1");
}
	else{
			$query = mysqli_query($conn,"INSERT INTO `plandetail`(`plandetail_name`, `plandetail_description`, `dietplan_id`, `item_id`, `plandetails_active`,`plandetail_recordDate`) VALUES ('$plandetailsName','$plandetailsDescription',$choosenPlan,$choosenItem,1,CURRENT_TIME)");
			if($query)
				header("location:../add-plandetail.php?added=1");
			else
				header("location:../add-plandetail.php?added=0");
			}
}


//for inserting the filters
if(isset($_POST['addPlanFilter'])){
		$choosenPlan = $_POST['choosenPlan'];
		$choosenItem = $_POST['choosenItem'];
		$choosenFilter = $_POST['choosenFilter'];
		$check = mysqli_query($conn,"SELECT* FROM planfilter WHERE dietplan_id=$choosenPlan AND item_id = $choosenItem AND planfilter_active=1");
		if(mysqli_num_rows($check)>0){
			echo "2";
				//header("location:../add-planfilter.php?alreadyExists=1");
		}else{
			$insert = mysqli_query($conn,"INSERT INTO `planfilter`( `item_id`, `dietplan_id`, `flag`, `planfilter_recordDate`, `planfilter_active`) VALUES ($choosenItem,$choosenPlan,'$choosenFilter',CURRENT_TIME,1)");
			if($insert){
				echo "1";
				//header("location:../add-planfilter.php?added=1");
			}else{
				echo "0";
					//header("location:../add-planfilter.php?added=0");
			}
		}


}//end addPlanFilter


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>