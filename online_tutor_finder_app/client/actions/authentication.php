<?php
session_start();
include '../../includes/database_connection.php';
//student login authentication
if(isset($_POST["student-submit"])){
	$email = trim($_POST["email"]);
	$email = strip_tags($email);
	$email = htmlspecialchars($email);
	$password = trim($_POST["password"]);
	$password = strip_tags($password);
	$password = htmlspecialchars($password);
	$query = "SELECT *FROM `student` WHERE student_email='$email' AND student_password='$password'";
	$result= mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$student_accountStatus = $row['student_accountStatus'];
	
	if($student_accountStatus == 1){
		   $_SESSION['student_email']= $email;
         header("location:../student-profile.php");	
	}else if($student_accountStatus == 0) {
	    	header("location:../login.php?status=rej");	
      }else if($student_accountStatus==3){
      	header("location:../login.php?status=pend");	
      }else{
      	header("location:../login.php?status=block");
      }
   }


if(isset($_POST['password']))
{
// print_r($_POST);
// die;
	$password = $_POST['password'];
$stdEmail = $_POST['stdEmail'];
$tid= $_POST['tid'];
$select  = mysqli_query($conn,"SELECT* FROM student WHERE student_email='$stdEmail' AND student_password='$password'");
$row = mysqli_fetch_array($select);
$student_accountStatus  = $row['student_accountStatus'];
$sid = $row['student_id'];
// die;
if($student_accountStatus == 1){
		   $query = mysqli_query($conn,"INSERT INTO `student_request`( `srequest_std_id`, `srequest_tea_id`, `srequest_status`, `srequest_recordDate`) VALUES ($sid,$tid,0,NOW())");
		   if($query){
		   	echo 1;
		   }else{
		   	echo 0;
		   }
	}else if($student_accountStatus == 0) {
	    	//header("location:../login.php?status=rej");	
	    	echo "rejected";
      }else if($student_accountStatus==3){
      	echo "pending";
      //	header("location:../login.php?status=pend");	
      }else{
      	echo "blocked";
      	//header("location:../login.php?status=block");
      }

}

 ?>