<?php


include '../includes/database_connection.php';


if(isset($_GET['vlink'])){


	$vlink = $_GET['vlink'];

	//for matching the vlink process
	
	$query = "SELECT* FROM instructor WHERE vLink='$vlink'";
	
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	$id = $row['id'];


	if(mysqli_num_rows($result)==1){

		$updateLink = "UPDATE instructor SET emailVeriStatus=1 WHERE id=$id";
		mysqli_query($conn,$updateLink);

		  echo '<script language="javascript">';
				echo 'alert("Email Verification Process Has Complete")';
				echo '</script>';
	}else{

		 echo '<script language="javascript">';
				echo 'alert("Error in Email Verification Process")';
				echo '</script>';
	}


}