<?php 
error_reporting(0);
include "../includes/database_connection.php";
						if(isset($_GET['ins_id']) && isset($_GET['user_id'])){	
							$ins_id = $_GET['ins_id'];
							$user_id = $_GET['user_id'];
$comm = mysqli_query($conn,"select * from `users_chat` WHERE `ins_id`='$ins_id' AND `user_id`='$user_id'");
if(mysqli_num_rows($comm)>0){
			while($row=mysqli_fetch_array($comm)){
					$sendBy = $row['sendBy'];
					if($sendBy=="user"){
					$query = mysqli_query($conn,"SELECT* FROM `users` WHERE id=$user_id");
						$recordUser = mysqli_fetch_array($query);
						$name = $recordUser['username']." (Learner)";
					}elseif($sendBy=="instructor"){
							$query2 = mysqli_query($conn,"SELECT* FROM `instructor` WHERE id=$ins_id");
							$recordUser = mysqli_fetch_array($query2);
							$name = $recordUser['name'];
							$name = "Me";
					}		
				$comment=$row['comment'];
			    $time=$row['post_time'];
			?>
			<div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$comment?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
			<?php
			}//end while loop here 
}//end if condition here
  }//end isset condition 
////////////////////////////////////////////////////////////////////////
//send request using ajax from the messagecontainer for all the users
 if(isset($_POST['user_id']) && isset($_POST['ins_id'])){
 		$user_id = $_POST['user_id'];
 		$ins_id = $_POST['ins_id']; 
		$comm = mysqli_query($conn,"select * from `users_chat` WHERE `ins_id`='$ins_id' AND `user_id`='$user_id'");
		if(mysqli_num_rows($comm)>0){
				while($row=mysqli_fetch_array($comm)){
						$sendBy = $row['sendBy'];
						if($sendBy=="user"){
								$query = mysqli_query($conn,"SELECT* FROM `users` WHERE id=$user_id");
								$recordUser = mysqli_fetch_array($query);
								$name = $recordUser['username']." (Learner)";
						}elseif($sendBy=="instructor"){
								$query2 = mysqli_query($conn,"SELECT* FROM `instructor` WHERE id=$ins_id");
								$recordUser = mysqli_fetch_array($query2);
								$name = $recordUser['name'];
								$name = "Me";
						}		

				$comment=$row['comment'];
			    $time=$row['post_time'];
			?>
			<div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$comment?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
			<?php
			}//end while loop here 
}//end if condition here
 }//end second isset condition here 
///////////for getting the admin messages in instructor panel this request will come from the AdminMessageContainer.php page
if(isset($_POST['messages']) && isset($_POST['admin_id']) && isset($_POST['ins_id']) ){
		$admin_id = $_POST['admin_id'];
		$ins_id = $_POST['ins_id'];
		//for getting message from instructor admin table 	
		$query = mysqli_query($conn,"SELECT* FROM `admin_ins_chat` WHERE `ins_id` = $ins_id AND `admin_id` = $admin_id");
		$count=0;
		if(mysqli_num_rows($query)>0){
			while($row=mysqli_fetch_array($query)){
						$sendBy = $row['sendBy'];
						if($sendBy=="admin"){
								$query2 = mysqli_query($conn,"SELECT* FROM `admin` WHERE id=$admin_id");
								$recordUser = mysqli_fetch_array($query2);
								$name = $recordUser['name']." (Administrator)";
						}elseif($sendBy=="instructor"){
								$query3 = mysqli_query($conn,"SELECT* FROM `instructor` WHERE id=$ins_id");
								$recordUser = mysqli_fetch_array($query3);
								$name = $recordUser['name'];
								$name = "Me";
						}		
				$comment=$row['message'];
			    $time=$row['post_time'];
			     ?>
			    <div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$comment?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
			    <?php 
		}//end while loop here
	}//end num rows condition here
}// end isset condition here

//for fetchig the messages  refresh div function for viewing the admin messages
if(isset($_GET['messages']) && isset($_GET['admin_id']) && isset($_GET['ins_id']) ){
		$admin_id = $_GET['admin_id'];
		$ins_id = $_GET['ins_id'];
		//for getting message from instructor admin table 
		$query = mysqli_query($conn,"SELECT* FROM `admin_ins_chat` WHERE `ins_id` = $ins_id AND `admin_id` = $admin_id");
		if(mysqli_num_rows($query)>0){
			while($row=mysqli_fetch_array($query)){
						$sendBy = $row['sendBy'];
						if($sendBy=="admin"){
								$query2 = mysqli_query($conn,"SELECT* FROM `admin` WHERE id=$admin_id");
								$recordUser = mysqli_fetch_array($query2);
								$name = $recordUser['name']." (Administrator)";
						}elseif($sendBy=="instructor"){
								$query2 = mysqli_query($conn,"SELECT* FROM `instructor` WHERE id=$ins_id");
								$recordUser = mysqli_fetch_array($query2);
								$name = $recordUser['name'];
								$name = "Me";
						}		
				$comment=$row['message'];
			    $time=$row['post_time']; ?>
			    <div class="chats"><strong><?=ucwords($name)?>:</strong> <?=$comment?> <p><?=date("j/m/Y g:i:sa", strtotime($time))?></p><hr/></div>
			    <?php 
		}//end while loop here
	}//end num rows condition here
}// end isset condition here
?>