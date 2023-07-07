<?php
 //for fetching the plan items 
 include '../includes/database_connection.php';
 //for fetching the item flag
 if(isset($_POST['dplan_id']) )
 {
 		$arr=array();
 	$dietplan_id = $_POST['dplan_id'];
 		// $sql  ="select * from (select items.item_id, items.item_name,items.item_active,planfilter.flag from items left join planfilter on items.item_id = planfilter.item_id and planfilter.dietplan_id=$dietplan_id and planfilter.planfilter_active=1) as A where A.item_active=1 order by A.item_id ASC";

 		$sql = "select * from (select * from ( select items.item_id, items.category_id ,items.item_name,items.item_active,planfilter.flag from items left join planfilter on items.item_id = planfilter.item_id and planfilter.dietplan_id=$dietplan_id and planfilter.planfilter_active=1) as A where A.item_active=1) as D left JOIN category on D.category_id=category.category_id ORDER by category.category_name , D.item_name";

 	$query =mysqli_query($conn,$sql);
 	while($row = mysqli_fetch_assoc($query)){
		array_push($arr, $row);
	}
 	echo json_encode($arr);
 }

//get the plan details 
 if(isset($_POST['plan_id'])){
 	$plan_id = $_POST['plan_id'];
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
 	//$query = "SELECT pf.*,itm.* from  planfilter pf, items itm where pf.planfilter_active=1 and itm.item_id=pf.item_id and pf.dietplan_id=$dietplan_id  order by itm.item_id";

 	//$query  ="select * from (select items.item_id, items.item_name,items.item_active,planfilter.flag from items left join planfilter on items.item_id = planfilter.item_id and planfilter.dietplan_id=$dietplan_id and planfilter.planfilter_active=1) as A where A.item_active=1 order by A.item_id ASC";
 	$query = "select * from (select * from ( select items.item_id, items.category_id ,items.item_name,items.item_active,planfilter.flag from items left join planfilter on items.item_id = planfilter.item_id and planfilter.dietplan_id=$dietplan_id and planfilter.planfilter_active=1) as A where A.item_active=1) as D left JOIN category on D.category_id=category.category_id ORDER by category.category_name , D.item_name";

 	//die;

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



//get the all plans

if(isset($_POST['getPlans'])){
	$query = mysqli_query($conn,"select* from dietplan where dietplan_active=1");
	echo ceil(mysqli_num_rows($query)/5);
}

//get paginated plans
if(isset($_POST['start']) && isset($_POST['end'])){
	$start = $_POST['start'];
	$end = $_POST['end'];
	// echo "select* from dietplan where dietplan_active=1 limit $start,$end";
	// die;
	$query = mysqli_query($conn,"select* from dietplan where dietplan_active=1 limit 5 offset $start");
	$arr  = array();
	while($row = mysqli_fetch_assoc($query)){
			array_push($arr, $row);
	}
	echo json_encode($arr);
}


 ?>
