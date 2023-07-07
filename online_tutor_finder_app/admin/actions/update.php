<?php
include '../../includes/database_connection.php';
//this file will handle all the update operations
if(isset($_POST['adminTeacherUpdate'])){
		$teacherName = test_input($_POST['teacherName']);
		$teacherEmail = test_input($_POST['teacherEmail']);
		$teacherAccountStatus = test_input($_POST['teacherAccountStatus']);
		$TID = test_input($_POST['TID']);
		$teacherContact = test_input($_POST['teacherContact']);
		$teacherAddress = test_input($_POST['teacherAddress']);
		$teacherCity = test_input($_POST['teacherCity']);
			$sql = "UPDATE `teacher` SET `teacher_name`='$teacherName',`teacher_email`='$teacherEmail',`teacher_account_status`=$teacherAccountStatus,`teacher_contact`='$teacherContact',`teacher_address`='$teacherAddress',`teacher_city`='$teacherCity' WHERE `teacher_id`=$TID";
			$res = mysqli_query($conn,$sql);
			if($res)
				header("location:../edit-teacher-info.php?updateStatus=1&TID=".$TID);
			else
				header("location:../edit-teacher-info.php?updateStatus=0&TID=".$TID);
		
}//end isset condition

if(isset($_POST['studentInfoUpdate'])){
		$studentName = test_input($_POST['studentName']);
		$studentEmail = test_input($_POST['studentEmail']);
		$studentAccountStatus = test_input($_POST['studentAccountStatus']);
		$studentContact = test_input($_POST['studentContact']);
		$SID = test_input($_POST['SID']);
		$sql = mysqli_query($conn,"UPDATE `student` SET `student_name`='$studentName',`student_email`='$studentEmail',`student_accountStatus`=$studentAccountStatus,`student_contact`='$studentContact' WHERE student_id=$SID");
		if($sql)
			header("location:../edit-student-info.php?updateStatus=1&SID=".$SID);
		else
			header("location:../edit-student-info.php?updateStatus=0&SID=".$SID);
}

//for updating the image dimesion
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>