<?php
include '../../includes/database_connection.php';
//this file will handle all the update operations like updating the dream details
if(isset($_POST['updateDream'])){
		$dreamKeyword = test_input($_POST['dreamKeyword']);
		$dream_id = $_POST['dream_id'];
		$dreamDescription = $_POST['dreamDescription'];
		$query = "UPDATE dream_table SET dream_keyword='$dreamKeyword', dream_para='$dreamDescription' WHERE dream_keyword_id=$dream_id";
		$res = mysqli_query($conn,$query);
		// 	echo $query;
		// die;
		if($res)
			header("location:../edit-dream.php?keyID=".$dream_id."&updateStatus=1");
		else
			header("location:../edit-dream.php?keyID=".$dream_id."&updateStatus=0");
}//end isset condition here 
//update the question and its category
if(isset($_POST['Editquestion'])){
		$questionID = $_POST['questionID'];
		$question = mysqli_real_escape_string($conn,$_POST['question']);
		$questionCategory = $_POST['questionCategory'];
		$questionAnswer = mysqli_real_escape_string($conn,$_POST['questionAnswer']);
		$sql = "UPDATE `dream_questions` SET `dream_ques`='$question',`dream_ques_ans`='$questionAnswer',`question_cate_id`=$questionCategory WHERE dream_ques_id=$questionID";
		$res = mysqli_query($conn,$sql);
		if($res)
			header("location:../edit-question.php?QuesID=".$questionID."&editQuesStatus=1");
		else	
			header("location:../edit-question.php?QuesID=".$questionID."&editQuesStatus=0");
}//end isset condition 

//update the alphabet description 
if(isset($_POST['EditAlphaDes'])){
		$alphabet_des_id = $_POST['alphabet_des_id'];
		$alphabetChosen = $_POST['alphabetChosen'];

		$alphabetDescription = $_POST['alphabetDescription'];
		// print_r($_POST);
		// die;
		$query = "UPDATE `alphabets_description` SET `alphabet_id`=$alphabetChosen,`alphabet_description`='$alphabetDescription' WHERE `alphabet_des_id`=$alphabet_des_id";
		$res = mysqli_query($conn,$query);
		if($res)
				header("location:../edit-alphabetDescription.php?alphabetDesID=".$alphabet_des_id."&editDesStatus=1");
			else
				header("location:../edit-alphabetDescription.php?alphabetDesID=".$alphabet_des_id."&editDesStatus=0");
}//end isset condition

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>