<?php
//for updating property images of a property
include '../../includes/database_connection.php';
$query = mysqli_query($conn,"SELECT MAX(project_id) as maxid FROM projects");
$maxId = 0;
	$row = mysqli_fetch_array($query);
 $maxId = $row['maxid']+1;
//	die;
if(!empty($_FILES)){
	$tempFile = $_FILES['file']['tmp_name'];
	$folder = "../uploads/project-images/";
	$targetFilePath = $folder.$_FILES['file']['name'];	
	$fileName = $_FILES['file']['name'];
	$extn = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	if($extn=="jpg" || $extn == "png" || $extn=="jpeg"){
		if(move_uploaded_file($tempFile, $targetFilePath)){
				$res = mysqli_query($conn,"INSERT INTO `project_images`( `project_image_name`, `project_id`, `project_image_recordDate`) VALUES ('$fileName','$maxId',NOW())");
				if($res) echo "1";  else echo "0";
		}//end move uploaded file
	}//end if condition	
}//end isempty conditon
?>