<?php
 //for fetching the plan items 
 include '../includes/database_connection.php';
 //for fetching the item flag
 if(isset($_POST['item_id']) && isset($_POST['dietplan_id']) )
 {
 	$itemId = $_POST['item_id'];
 	$dietplan_id = $_POST['dietplan_id'];
 	$sql = "SELECT pf.* , itm.* from planfilter pf, items itm where pf.dietplan_id=$dietplan_id and itm.item_id=$itemId and pf.item_id=$itemId and planfilter_active=1";
 	$query =mysqli_query($conn,$sql);
 	$row =mysqli_fetch_assoc($query);
 	$flag = $row['flag'];
 	$final = array(
 		"flag"=>$flag,	
 		"item_name"=>$row['item_name'],
 	);
 	echo json_encode($final);
 }

//get the plan details 
 if(isset($_POST['plan_id'])){
 	$plan_id = $_POST['plan_id'];
 	// echo "SELECT * FROM `dietplan` WHERE `dietplan_id`=$plan_id";
 	// die;
 	$query = mysqli_query($conn,"SELECT * FROM `dietplan` WHERE `dietplan_id`=$plan_id");
 	$row = mysqli_fetch_assoc($query);
 	echo json_encode($row);
 }
//get all the dietplans
 if(isset($_POST['allplans']))
 {	
 	$query = mysqli_query($conn,"SELECT* FROM dietplan where dietplan_active=1");
 	$array = array();
 	while($ro = mysqli_fetch_assoc($query)){
 		array_push($array,$ro);
 	}
 	echo json_encode($array);
 }	

//get the deitplan items

 if(isset($_POST['dietplan_id']) && isset($_POST['filter'])){

 	
 	$dietplan_id= $_POST['dietplan_id'];
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


 //get all the items
if(isset($_POST['allItems'])){
	$dietplan_id = $_POST['dietplan_id'];
	$sql = "SELECT pf.*,itm.* from  planfilter pf, items itm where pf.planfilter_active=1 and itm.item_id=pf.item_id and pf.dietplan_id=$dietplan_id and  pf.flag!='allowed'";
	$query = mysqli_query($conn,$sql);
	$array = array();
	while($row = mysqli_fetch_assoc($query)){
		array_push($array,$row);
	}
	echo json_encode($array);
}




//get all the plans related to an item 
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$query = mysqli_query($conn,"select pf.*, dp.*, itm.* from planfilter pf, dietplan dp, items itm where pf.planfilter_active=1 and pf.dietplan_id=dp.dietplan_id and itm.item_id=$item_id and pf.item_id=$item_id and itm.item_active=1 and dp.dietplan_active=1 order by pf.dietplan_id");
	$array = array();
	if(mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_assoc($query)){
			array_push($array, $row);
		}//end while loop here 
	}//end num rows  condition  
	echo json_encode($array);
}




 ?>
