<?php
//it will includes all the insert operation 
include '../../includes/database_connection.php';
//for fetching the category detail
if(isset($_POST['category_id'])){
		  $category_id = $_POST['category_id'];
		  $query = mysqli_query($conn,"SELECT* FROM category WHERE category_id=$category_id");
		  echo json_encode(mysqli_fetch_assoc($query));
}//end isset here
//get the diet plan desciption
if(isset($_POST['dietplan_id'])){
	$dietplan_id = $_POST['dietplan_id'];
	$query = mysqli_query($conn,"SELECT* FROM `dietplan` WHERE `dietplan_id`=$dietplan_id");
	$row = mysqli_fetch_assoc($query);
	echo $row['dietplan_description'];
}


if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$query = mysqli_query($conn,"SELECT* FROM planfilter WHERE item_id = $item_id AND planfilter_active=1");
	if(mysqli_num_rows($query)>0){
		$array = array();
		while($row= mysqli_fetch_assoc($query)){
			array_push($array, $row);
		}//end while loop here
	}//endd num rows condition here 
	echo json_encode($array);
}

//get the user message
if(isset($_POST['msg_id'])){
	$msg_id = $_POST['msg_id'];
	$query = mysqli_query($conn,"SELECT* FROM messages where message_id=$msg_id");
	echo json_encode(mysqli_fetch_assoc($query));
}
?>