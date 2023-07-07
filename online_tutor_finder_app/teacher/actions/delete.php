<?php
include '../../includes/database_connection.php';
//this file will handle all the delete operations like deleting any records
if(isset($_GET['subject_id'])){
	$SID  = $_GET['subject_id'];
	$query = mysqli_query($conn,"DELETE FROM subjects WHERE subject_id=$SID ");
	if($query)
		header("location:../my-courses.php?deleteSubject=1");
	else
		header("location:../my-courses.php?deleteSubject=0");
}


if(isset($_GET['qual_id'])){
	$qID  = $_GET['qual_id'];
	$query = mysqli_query($conn,"DELETE FROM qualifications WHERE qual_id=$qID ");
	if($query)
		header("location:../my-qualifications.php?deleteQual=1");
	else
		header("location:../my-qualifications.php?deleteQual=0");
}





?>