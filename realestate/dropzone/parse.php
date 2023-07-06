<?php 

if(!empty($_FILES)){

	//print_r($_POST);
	// die;
	$tempFile = $_FILES['file']['tmp_name'];
	//$extn = pathinfo($tempFile,PATHINFO_EXTENSION);

	$folder = "uploads/";
	$targetFilePath = $folder.$_FILES['file']['name'];


	move_uploaded_file($tempFile, $targetFilePath);
}