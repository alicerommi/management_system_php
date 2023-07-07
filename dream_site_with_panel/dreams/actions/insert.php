<?php
include '../includes/database_connection.php';
if(isset($_POST['commentFORM'])){
		$name=test_input($_POST['name']);
		$email=test_input($_POST['email']);
		$message=test_input($_POST['message']);	
		$keyword = $_POST['keyword'];
		$sql = "INSERT INTO `user_comments`( `comment_uname`, `comment_uemail`, `comment_msg`, `comment_recordDate`) VALUES ('$name','$email','$message',CURRENT_TIMESTAMP)";
		// echo $sql;
		// die;
		$query = mysqli_query($conn,$sql);
			if($query)
					header("location:../dream_description.php?keyword=$keyword&CommentStatus=1");
			else
				header("location:../dream_description.php?keyword=$keyword&CommentStatus=0");
}//end issety condition

//for input trimming
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
