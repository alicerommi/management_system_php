<?php
include "../../includes/config.php";
if(isset($_GET['id'])){
$id=test_input($_GET['id']);
$del=mysqli_query($con,"DELETE FROM survey_new where survey_id = '$id'");
$delete=mysqli_query($con,"DELETE FROM questions where survey_id = '$id'");
if($del && $delete){
	header("Location: ../existing-surveys.php");
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
