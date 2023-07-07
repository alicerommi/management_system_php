<?php
include '../../includes/database_connection.php';
//this file will fetch all the dreams from the databases.. when the page will load
if(isset($_POST['alpha'])){
	$alpha = strtolower($_POST['alpha']);
	$query = "SELECT* FROM `dream_table` WHERE `dream_keyword` LIKE '$alpha%'";
	$res = mysqli_query($conn,$query);
		if(mysqli_num_rows($res)>0){
				while($row = mysqli_fetch_array($res)){
					$dream_keyword_id = $row['dream_keyword_id'];
					$dream_keyword = $row['dream_keyword'];
					$dream_para =substr($row['dream_para'],0,120);
					echo '<tr>
					<td>'.$dream_keyword.'</td>
					<td>'.$dream_para.'</td>
					<td>
						<a  class="btn btn-default" href="edit-dream.php?keyID='.$dream_keyword_id.'"><i class="fa fa-edit"></i></a>
						
						<a  class="btn btn-danger" href="actions/delete.php?keyID='.$dream_keyword_id.'"><i class="fa fa-trash"></i></a>
						<a  class="btn btn-info" href="view-dream.php?keyID='.$dream_keyword_id.'"><i class="fa fa-eye"></i></a>
						</td>
					</tr>';
				}//end while 
		}//end num rows condition
}//end isset condition 

//fetch the question category for editing the questin category
if(isset($_POST['ques_cate_id'])){
	$id = $_POST['ques_cate_id'];
	$query = mysqli_query($conn,"SELECT* FROM questions_category WHERE ques_cate_id=$id");
	$row = mysqli_fetch_array($query);
	echo json_encode($row);
}

//for fetching the user comment 
if(isset($_POST['comment_id'])){
	$id = $_POST['comment_id'];
	$query = mysqli_query($conn,"SELECT* FROM user_comments WHERE comment_id=$id");
	$row = mysqli_fetch_array($query);
	$userName = $row['comment_uname'];
	$comment_msg =  $row['comment_msg'];
	echo '<div class="modal-dialog">
    
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">'.$userName.'</h4>
        </div>
        <div class="modal-body">
          <p>'.$comment_msg.'</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    `';
}

?>
