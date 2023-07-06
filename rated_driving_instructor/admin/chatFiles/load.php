<?php 
error_reporting(0);
include "../includes/database_connection.php";
if(isset($_GET['ins_id'])){	 //for getting the conversation details of an admin and instructor 
							$ins_id = $_GET['ins_id'];
							$admin_id = $_GET['admin_id'];
$comm = mysqli_query($conn,"select * from `admin_ins_chat` WHERE `ins_id`='$ins_id' AND `admin_id`='$admin_id'");
if(mysqli_num_rows($comm)>0){
			while($row=mysqli_fetch_array($comm)){
					$sendBy = $row['sendBy'];
					if($sendBy=="instructor"){
						$query2 = mysqli_query($conn,"SELECT* FROM `instructor` WHERE id=$ins_id");
							$recordUser = mysqli_fetch_array($query2);
							$name = $recordUser['name'];
							 // $name = "Me";
							 $name = $recordUser['name']." (Instructor)";
					}elseif($sendBy=="admin"){
							$query = mysqli_query($conn,"SELECT* FROM `admin` WHERE id=$admin_id");
						$recordUser = mysqli_fetch_array($query);
						// $name = $recordUser['name']." (Administrator)";
						$name = "Me";
					}		
				$message=$row['message'];
			    $time=$row['post_time'];
			?>
			<div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$message?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
			<?php
			}//end while loop here 
}//end if condition here
  }//end isset condition 
////////////////////////////////////////////////////////////////////////
//send request using ajax from the messagecontainer for all the users
 if(isset($_POST['admin_id']) && isset($_POST['ins_id'])){
 		// print_r($_POST);
 		// die;
 		$admin_id = $_POST['admin_id'];
 		$ins_id = $_POST['ins_id']; 
		$comm = mysqli_query($conn,"select * from `admin_ins_chat` WHERE `ins_id`='$ins_id' AND `admin_id`='$admin_id'");
		if(mysqli_num_rows($comm)>0){
				while($row=mysqli_fetch_array($comm)){
						$sendBy = $row['sendBy'];
						if($sendBy=="instructor"){
								$query = mysqli_query($conn,"SELECT* FROM `instructor` WHERE id=$ins_id");
								$recordUser = mysqli_fetch_array($query);
								$name = $recordUser['name']." (Instructor)";
						}elseif($sendBy=="admin"){
								$query2 = mysqli_query($conn,"SELECT* FROM `admin` WHERE id=$admin_id");
								$recordUser = mysqli_fetch_array($query2);
								$name = $recordUser['name'];
								$name = "Me";
						}		

				$message=$row['message'];
			    $time=$row['post_time'];
			?>
			<div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$message?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
			<?php
			}//end while loop here 
}//end if condition here
 }//end second isset condition here 
//for getting the messages or conversation between the admin and learner 
if(isset($_POST['admin_id']) && isset($_POST['user_id'])){
		//print_r($_POST);
	$admin_id = $_POST['admin_id'];
	$user_id = $_POST['user_id'];
	$query = mysqli_query($conn,"SELECT* FROM admin_learner_chat WHERE user_id=$user_id AND admin_id= $admin_id");
				if(mysqli_num_rows($query)){
					while($row = mysqli_fetch_array($query)){
							$sendBy = $row['sendBy'];
							if($sendBy=='admin'){
								$query2 = mysqli_query($conn,"SELECT* FROM admin where id = $admin_id");
								$rowAdmin = mysqli_fetch_array($query2);
								$name = "Me";
							}else{
								$query2 = mysqli_query($conn,"SELECT* FROM users where id = $user_id");
								$rowName = mysqli_fetch_array($query2);
								$name = $rowUser['name'];
							}
							$message  = $row['message'];
							$time = $row['post_time'];
							?>
					<div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$message?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
							<?php	
					}//end while loop here 
				}	//end num row conditions here 
}//end isset conidtion  here
//for refreshing the div element  for the leaners messages 
if(isset($_GET['admin_id']) && isset($_GET['user_id']))
{	
	$admin_id = $_GET['admin_id'];
	$user_id = $_GET['user_id'];
	$query = mysqli_query($conn,"SELECT* FROM admin_learner_chat WHERE user_id=$user_id AND admin_id= $admin_id");
				if(mysqli_num_rows($query)){
					while($row = mysqli_fetch_array($query)){
							$sendBy = $row['sendBy'];
							if($sendBy=='admin'){
								$query2 = mysqli_query($conn,"SELECT* FROM admin where id = $admin_id");
								$rowAdmin = mysqli_fetch_array($query2);
								$name = "Me";
							}else{
								$query2 = mysqli_query($conn,"SELECT* FROM users where id = $user_id");
								$rowName = mysqli_fetch_array($query2);
								$name = $rowUser['name'];
							}
							$message  = $row['message'];
							$time = $row['post_time'];
							?>
					<div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$message?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
					<?php 

				}//end if condition here 
			}//end num rows conditin  here
}//end isset conditon here
?>