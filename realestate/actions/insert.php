<?php
	include '../includes/database_connection.php';
	if(isset($_POST['contactForm'])){
		// print_r($_POST);
		// die;
		$name = test_input($_POST['name']);
		$email = test_input($_POST['email']);
		$message = test_input($_POST['message']);
		$phone = test_input($_POST['cnumber']);
		$query  = mysqli_query($conn,"INSERT INTO `contact`( `contact_uname`, `contact_uemail`,`contact_phone`, `contact_msg`, `contact_reply`,`contact_recordDate`) VALUES ('$name','$email','$phone','$message','',NOW())");
			//die;
		if($query)
			header("location:../contact.php?added=1");
		else
			header("location:../contact.php?added=0");
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>