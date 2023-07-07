<?php
include '../../includes/database_connection.php';
if(isset($_POST['img_id'])){
	$id = $_POST['img_id'];
	$query = mysqli_query($conn,"SELECT* FROM image_dimesions WHERE image_id=$id");
	$row = mysqli_fetch_array($query);
	echo json_encode($row);
}

?>
