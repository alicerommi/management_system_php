<?php
include '../../includes/database_connection.php';
if(isset($_POST['keyword'])){
	$keyword = $_POST['keyword'];
	$query = mysqli_query($conn,"SELECT* FROM teacher WHERE  teacher_address LIKE '%$keyword%' AND teacher_account_status = 1");
	if(mysqli_num_rows($query)>0){
		while($row = mysqli_fetch_array($query)){
			$teacher_id  = $row['teacher_id']; 
			$teacher_name  = $row['teacher_name']; 
			$teacher_email  = $row['teacher_email']; 
			$teacher_password  = $row['teacher_password'];
			 $teacher_joining_date  = $row['teacher_joining_date'];
			 $teacher_account_status  = $row['teacher_account_status'];
			 $teacher_contact  = $row['teacher_contact']; 
			 $teacher_address  = $row['teacher_address']; 
			 $teacher_city  = $row['teacher_city'];
			 $teacher_img  = $row['teacher_img'];
			 $teacher_age  = $row['teacher_age'];
			 $teacher_about  = $row['teacher_about']; 
			 $teacher_recordDate  = $row['teacher_recordDate'];

			echo '<div class="col-md-4">';
								echo '<div class="well well-sm">';
		
		
											if(strlen($teacher_img)==0){
										
									echo "<img src='uploads/default.png' style='width:125px;height:100px' class='img-thumbnail img-responsive' >"."<br>"; } 
									
									else{
									echo "<img src='uploads/".$teacher_img."  '  style='width:125px;height:100px' class='img-thumbnail img-responsive' >"."<br>";} 
										
										echo "Name: "."<p class='text-uppercase text-success text-justify'>".$teacher_name."</p>";
										
										echo "Address: "."<p class='text-uppercase text-success text-justify'>".$teacher_address ."</p>";
										echo "City: "."<p class='text-uppercase text-success text-justify'>".$teacher_city."</p>"; 
									
									 
									 
										echo "<center><a class='btn btn-danger' href='tutor_details.php?tid=".$teacher_id."'>View More Details</a></center>";

																
		echo '</div>';	
		echo '<hr/>';
		echo'
		</div>';
		}
	}else{
		echo "
		<center><div class='alert alert-primary' style='margin-top: 20px;'>The Tutor With This Address is not Found</div></center>";
	}
}

?>