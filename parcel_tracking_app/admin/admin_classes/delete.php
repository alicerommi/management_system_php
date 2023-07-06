<?php
include('config.php');
if(isset($_GET['courier_id'])){
	$id =  $_GET['courier_id'];
	$query1 = mysqli_query($db,"delete from courier where tracking_id='$id'");
	$query2 = mysqli_query($db,"delete from time_status where tracking_id='$id'");
	if($query1 && $query2){
		header("location:../all_items.php?deleted=1");
	}else 
			header("location:../all_items.php?deleted=0");
}
?>