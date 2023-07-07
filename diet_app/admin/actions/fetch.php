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


//for the add plan filter call

if(isset($_POST['dplan_id']) && $_POST['role']){

	$dietplan_id= $_POST['dplan_id'];
 	//$filter = 	$_POST['filter'];
 	//echo $filter;
 	//if($filter=="allowed"){
 	$query = "SELECT pf.*,itm.* from  planfilter pf, items itm where pf.planfilter_active=1 and itm.item_id=pf.item_id and pf.dietplan_id=$dietplan_id  order by itm.item_id";
 //	}else{
 	//	 $query = "SELECT pf.*,itm.* from  planfilter pf, items itm where pf.planfilter_active=1 and itm.item_id=pf.item_id and pf.dietplan_id=$dietplan_id and  pf.flag!='allowed'";
 	//}
 	
 	$sql = mysqli_query($conn,$query);
 	$array = array();
 	while($r = mysqli_fetch_assoc($sql)){
 		array_push($array,$r);
 	}
 	echo json_encode($array);

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