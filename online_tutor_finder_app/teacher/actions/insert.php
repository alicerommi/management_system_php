 <?php
//this file will details with all the types of insertion operation or form submissions
include '../../includes/database_connection.php'; // data base conection is done 
//for uploading the excel file
if(isset($_POST['uploadExcFile'])){
	$total1 = count($_FILES['excelFile']['name']);
		//count the number of files.. 
		$allowedExts = array("xlsx","csv"); // as we are allowling only upload the excel file not other types of files
	$filesName1 = $_FILES['excelFile']['name'];
	$target_dir = "../uploads/"; //where the file will store
	$target_file = $target_dir . basename($_FILES["excelFile"]["name"]);
				$newFilePath =$_FILES['excelFile']['name'];
				$extension = pathinfo($newFilePath, PATHINFO_EXTENSION);
						//check point for extension of files
					if(in_array($extension,$allowedExts)){
						if (move_uploaded_file($_FILES["excelFile"]["tmp_name"], $target_file)){
											$query = mysqli_query($conn,"INSERT INTO `files_upload`( `file_name`, `file_recordDate`) VALUES ('$filesName1',CURRENT_TIME)");
											header("location:../upload-file.php?uploadStatus=1");
										}else{
											echo "Error In Uploading".mysqli_error($conn);
										}	
							}else{
								header("location:../upload-file.php?fileFlag=1");
							}
}
//for setting the image dimensions 
if(isset($_POST['imageSizeForm'])){	
	$Width = $_POST['Width'];
	$Height = $_POST['Height'];
	$checkNumrows = mysqli_query($conn,"SELECT* FROM image_dimesions");
	if(mysqli_num_rows($checkNumrows)>0){
		header("location:../image-dimension.php?exists=1");
	}else{
	$query = "INSERT INTO `image_dimesions`(`image_height`, `image_width`, `record_date`) VALUES ('$Height','$Width',NOW())";
	$res = mysqli_query($conn,$query);
	if($res){
		header("location:../image-dimension.php?added=1");
	}else
		header("location:../image-dimension.php?added=0");
	}
}

//for updating the image dimensions points
if(isset($_POST['imageSizeFormUpdate'])){
	$Width = $_POST['Width'];
	$Height = $_POST['Height'];
	$imageID = $_POST['imageID'];
	$query = mysqli_query($conn,"UPDATE image_dimesions SET image_height='$Height', image_width='$Width' WHERE image_id=$imageID");
	if($query){
		header("location:../image-dimension.php?updated=1");
	}else{
		header("location:../image-dimension.php?updated=0");
	}
}

//for inserting qualification
if(isset($_POST['addQual'])){
	$qualification = $_POST['qualification'];
	$TID = $_POST['TID'];
	$query = "INSERT INTO `qualifications`(`qual_name`, `qual_recordDate`, `teacher_id`) VALUES ('$qualification',NOW(),$TID)";
	$res = mysqli_query($conn,$query);
	if($res){
		header("location:../my-qualifications.php?added=1");
	}else
	header("location:../my-qualifications.php?added=0");
}




if(isset($_POST['updateQual'])){
	$qualification = $_POST['qualification'];
	$qualID = $_POST['qualID'];
	$query = "UPDATE `qualifications` SET `qual_name`='$qualification' WHERE qual_id=$qualID";
	$res = mysqli_query($conn,$query);
	if($res){
		header("location:../my-qualifications.php?edited=1");
	}else
		header("location:../my-qualifications.php?edited=0");
}

if(isset($_POST['addSub'])){
	$subjectname = $_POST['subjectname'];
	$subjectclass = $_POST['subjectclass'];
	$TID = $_POST['TID'];
	$query = mysqli_query($conn,"INSERT INTO `subjects`( `teacher_id`, `subject_name`, `subject_class`, `subject_recordDate`) VALUES ($TID,'$subjectname','$subjectclass',NOW())");
	if($query){
		header("location:../my-courses.php?addedCOurse=1");
	}else
		header("location:../my-courses.php?addedCOurse=0");
}


if(isset($_POST['updateSub'])){
	$subjectname = $_POST['subjectname'];
	$subjectclass = $_POST['subjectclass'];
	$subjectID = $_POST['subjectID'];
	$query = mysqli_query($conn,"UPDATE `subjects` SET `subject_name`='$subjectname',`subject_class`='$subjectclass' WHERE `subject_id`=$subjectID");
	if($query){
		header("location:../my-courses.php?editedCourse=1");
	}else
		header("location:../my-courses.php?editedCourse=0");
}


?>