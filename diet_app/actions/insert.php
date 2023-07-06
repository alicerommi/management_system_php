<?php 
//for inserting the 
	 include '../includes/database_connection.php';
	 //form-contact-name=sfdjfsd&form-contact-email=rehmana578%40gmail.com&form-contact-message=ksdfj
	 if(isset($_POST['contactForm'])){
	 	$name = test_input($_POST['form-contact-name']);
	 	$email = test_input($_POST['form-contact-email']);
	 	$message = test_input($_POST['form-contact-message']);
	 	$query  = "INSERT INTO `messages`(`message_uname`, `message_email`, `message_msg`, `message_recordDate`) VALUES ('$name','$email','$message',CURRENT_TIME)";
	 	$res = mysqli_query($conn,$query);
	 	if($res)
	 			echo 1;
	 		else
	 			echo 0;
	 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>