<?php
include '../../includes/database_connection.php';
if(isset($_POST['submitTutorForm'])){
			$upload_dir =  '../uploads/';
			$target = $upload_dir . basename($_FILES['image']['name']);	
			$image = $_FILES['image']['name'];
			$imageType = strtolower(pathinfo($target,PATHINFO_EXTENSION));	
			$InputName = test_input($_POST['InputName']);
			$InputEmail = test_input($_POST['InputEmail']);
			$checkEmail = mysqli_query($conn,"SELECT* FROM teacher WHERE teacher_email='$InputEmail'");

			$city = test_input($_POST['city']);
			$contact = test_input($_POST['contact']);
			$addreess  = test_input($_POST['addreess']);
			$qualification  = test_input($_POST['qualification']);
			$about  = test_input($_POST['about']);
			$age = test_input($_POST['age']);
			$password = test_input($_POST['password']);
			if(mysqli_num_rows($checkEmail)>0){
				header("location:../tutor-registeration.php?emailExists=1");
			}else
				if($imageType=="png" || $imageType=="jpg" || $imageType=="jpeg"){
					if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
								//$res = mysqli_query($conn,$query);
							$query  = "INSERT INTO `teacher`(`teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`, `teacher_img`, `teacher_age`, `teacher_about`,`teacher_recordDate`) VALUES ('$InputName','$InputEmail','$password',NOW(),'0','$contact','$addreess','$city','$image','$age','$about',NOW())";
							$res   = mysqli_query($conn,$query);
							if($res){
								header("location:../tutor-registeration.php?status=1");
							}else
								header("location:../tutor-registeration.php?status=0");
						}

						}else{
							header("location:../tutor-registeration.php?imageType=0");
						}
}//end isset conidtion here

if(isset($_POST['submitStudentForm'])){
		$InputName = test_input($_POST['InputName']);
		$InputEmail = test_input($_POST['InputEmail']);
		$password = test_input($_POST['password']);
		$addreess = test_input($_POST['addreess']);
		$contact = test_input($_POST['contact']);
		$upload_dir =  '../uploads/';
			$target = $upload_dir . basename($_FILES['image']['name']);	
			$image = $_FILES['image']['name'];
			$imageType = strtolower(pathinfo($target,PATHINFO_EXTENSION));	

			$checkEmail  = mysqli_query($conn,"SELECT* FROM student WHERE student_email='$InputEmail'");
			if(mysqli_num_rows($checkEmail)>0){
				header("location:../student-registeration.php?emailExists=1");
			}else{
				if($imageType=="png" || $imageType=="jpg" || $imageType=="jpeg"){
					if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
					 	$query = "INSERT INTO `student`( `student_name`, `student_email`, `student_password`, `student_accountStatus`, `student_contact`, `student_address`, `student_image`, `student_recordDate`) VALUES ('$InputName','$InputEmail','$password',3,'$contact','$addreess','$image',NOW())";
					//die;
						$res = mysqli_query($conn,$query);
						if($res){
								header("location:../student-registeration.php?status=1");
							}else
								header("location:../student-registeration.php?status=0");
					}
				}else{
							header("location:../student-registeration.php?imageType=0");
						}
			}


		}//end isset second

//insert users comments

if(isset($_POST["submit-btn"])){
$name = test_input($_POST["name"]);	
$email =test_input($_POST["email"]);
$message = test_input($_POST["message"]);	  
$query = "INSERT INTO `user_comments`( `comment_uname`, `comment_uemail`, `comment_msg`, `comment_datetime`) VALUES ('$name','$email','$message',NOW())";
$result = mysqli_query($conn,$query);
		if($result){
			header("location:../contact.php?status=1");
		}else{
				header("location:../contact.php?status=0");
		}
}



if(isset($_POST['stdName'])){
		$stdName = $_POST['stdName'];	
		$stdEmail = $_POST['stdEmail'];	
		$tid = $_POST['tid'];
		$query = "INSERT INTO `request`(`requester_name`, `requester_email`, `teacher_id`, `recordDate`) VALUES ('$stdName','$stdEmail',$tid,Now())";
		$res = mysqli_query($conn,$query);
		if($res)
			echo "1";
		else
			echo "0";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>