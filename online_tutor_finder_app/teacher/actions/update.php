<?php
include '../../includes/database_connection.php';
//this file will handle all the update operations
if(isset($_POST[''])){
	
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>