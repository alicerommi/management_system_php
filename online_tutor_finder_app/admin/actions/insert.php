 <?php
//this file will details with all the types of insertion operation or form submissions
include '../../includes/database_connection.php'; // data base conection is done 
if(isset($_POST['adminTeacherAdd'])){

			$techerImage = $_FILES["teacherImg"]["name"];
			$targer = "../../clients/uploads/".basename($techerImage);
			// echo $targer;
			// die;
			$imageFileType = strtolower(pathinfo($techerImage,PATHINFO_EXTENSION));
			$teacherName  = test_input($_POST['teacherName']);
			$teacherEmail  = test_input($_POST['teacherEmail']);
			$teacherPassword  = test_input($_POST['teacherPassword']);
			$joiningDate  = test_input($_POST['joiningDate']);
			$teacherContact  = test_input($_POST['teacherContact']);
			$teacherAddress  = test_input($_POST['teacherAddress']);
			$teacherCity  = test_input($_POST['teacherCity']);
			$teacherAge = $_POST['teacherAge'];
			$teacherAccountStatus  = test_input($_POST['teacherAccountStatus']);
			$checkEmail = mysqli_query($conn,"SELECT* FROM teacher where teacher_email='$teacherEmail'");
			if(mysqli_num_rows($checkEmail)>0){
				header("location:../add-teacher.php?emailExists=1");
			}else{
				if($imageFileType=="jpg" || $imageFileType=="png"  || $imageFileType=="jpeg"  ){
				if(move_uploaded_file($_FILES['teacherImg']['tmp_name'], $targer) ){
				$sql = "INSERT INTO `teacher`( `teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`,`teacher_img`,`teacher_age`, `teacher_recordDate`) VALUES ('$teacherName','$teacherEmail','$teacherPassword','$joiningDate',$teacherAccountStatus,'$teacherContact','$teacherAddress','$teacherCity','$techerImage','$teacherAge',NOW())";
				$res = mysqli_query($conn,$sql);
				if($res)
					header("location:../add-teacher.php?teacherAdded=1");
				else
					header("location:../add-teacher.php?teacherAdded=0");
			}
			}else{
				header("location:../add-teacher.php?fileType=0");
			}
		}
}

if(isset($_POST['studentAddRecord'])){
$studentName = test_input($_POST['studentName']);
$studentEmail = test_input($_POST['studentEmail']);
$studentAccountStatus = test_input($_POST['studentAccountStatus']);
$studentPassword = test_input($_POST['studentPassword']);
$studentContact = test_input($_POST['studentContact']);
$studentAddress = test_input($_POST['studentAddress']);
$checkEmail = mysqli_query($conn,"SELECT* FROM student where student_email='$teacherEmail'");
if(mysqli_num_rows($checkEmail)>0){
		header("location:../add-student.php?emailExists=1");
}else{
					$sql = "INSERT INTO `student`( `student_name`, `student_email`, `student_password`, `student_accountStatus`, `student_contact`, `student_address`,`student_recordDate`) VALUES ('$studentName','$studentEmail','$studentPassword','$studentAccountStatus','$studentContact','$studentAddress',NOW())";
					$res = mysqli_query($conn,$sql);
					if($res)
						header("location:../add-student.php?studentAdded=1");
					else
						header("location:../add-student.php?studentAdded=0");
	}
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
