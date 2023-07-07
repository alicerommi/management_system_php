<?php
include "../../includes/config.php";
if(isset($_POST['updateLOGO'])){	
$target_dir = "../images/";
$allowedExts = array(
			  "png", 
			  "jpg",
			  "PNG",
);
$status = 0;
$target_file = $target_dir.basename($_FILES["image"]["name"]);
// $checkPoint = getimagesize($_FILES["image"]["temp_name"]);
$newFilePath1 =$_FILES["image"]["name"];
$extension = pathinfo($newFilePath1, PATHINFO_EXTENSION);
if(in_array($extension,$allowedExts)){
	if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file))
			{ 	
				$imageName = basename($_FILES["image"]["name"]);
				mysqli_query($con,"INSERT INTO `logos`(`imageName`) VALUES('$imageName')");
				header('location:../ChangecompanyLogo.php?status=1'); }
		else{
				 header('location:../ChangecompanyLogo.php?status=2');
			}		
		}else{
			header('location:../ChangecompanyLogo.php?status=0');
		}
}
?>