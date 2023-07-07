 <?php
//this file will details with all the types of insertion operation or form submissions
include '../../includes/database_connection.php';
//for adding a dream
if(isset($_POST['addDream'])){
	$dreamKeyword = test_input($_POST['dreamKeyword']);
	$dreamDescription = test_input($_POST['dreamDescription']);
	$query = "INSERT INTO `dream_table`(`dream_keyword`,`dream_para`,`recordDate`) VALUES ('$dreamKeyword','$dreamDescription',CURRENT_TIMESTAMP)";
	$result = mysqli_query($conn,$query);
	if($result)
		header("location:../add-dream.php?addStatus=1");
	else
		header("location:../add-dream.php?addStatus=0");
}//end if conidtion
//for inserting the question category
if(isset($_POST['addQuesCategory'])){
	$questionCategory = test_input($_POST['questionCategory']);
	$categoryPriority = $_POST['categoryPriority'];
	//check point so that admin cant set a number to two categories
	$checkP = mysqli_query($conn,"SELECT* FROM questions_category WHERE ques_cate_priority=$categoryPriority");
	if(mysqli_num_rows($checkP)>0)
	{
				header("location:../questions-category.php?alreadyExist=1");
	}else{
			if($_POST['cateID']==0){
				$query  = mysqli_query($conn,"INSERT INTO `questions_category`(`ques_category_name`,`ques_cate_priority`,`ques_category_recordDate`) VALUES ('$questionCategory',$categoryPriority,CURRENT_TIMESTAMP)");
						if($query)
							header("location:../questions-category.php?cateStatus=1");
						else 
							header("location:../questions-category.php?cateStatus=0");
			}else{ 
				$id  = $_POST['cateID'];
				$query = mysqli_query($conn,"UPDATE `questions_category` SET `ques_category_name`='$questionCategory', `ques_cate_priority`=$categoryPriority WHERE ques_cate_id=$id");
				if($query)
							header("location:../questions-category.php?cateStatusUpdate=1");
						else 
							header("location:../questions-category.php?cateStatusUpdate=0");
			}//end else part
	}
}//end isset condition here

//for adding the question and its answer 
if(isset($_POST['Addquestion'])){
	//mysqli_real_escape_string()
		$question  = test_input(mysqli_real_escape_string($conn,$_POST['question']));
		$questionCategory  = $_POST['questionCategory'];
		//foe checking the limit of questions per category
		$limitQuery = mysqli_query($conn,"SELECT* FROM dream_questions WHERE question_cate_id=$questionCategory");
		if(mysqli_num_rows($limitQuery)>=5){
			header("location:../add-question.php?QuesLimit=0");
		}else{
		$questionAnswer  = mysqli_real_escape_string($conn,$_POST['questionAnswer']);
		   $sql = "INSERT INTO `dream_questions`( `dream_ques`, `dream_ques_ans`, `question_cate_id`, `recordDate`) VALUES ('$question','$questionAnswer',$questionCategory,CURRENT_TIMESTAMP)";
		$query = mysqli_query($conn,$sql);
			if($query)
				header("location:../add-question.php?addQuesStatus=1");
			else
				header("location:../add-question.php?addQuesStatus=0");
			}//end limit condition here
}//end isset conidtion 

//for adding an aplhabet in table
if(isset($_POST['addAlphabet'])){
	$alphabet =test_input(strtolower($_POST['alphabet']));
	//check point 
	$checkQ = mysqli_query($conn,"SELECT* FROM alphabets_table where alphabet='$alphabet'");
	if(mysqli_num_rows($checkQ)>0){
		header("location:../add-alphabets.php?AlphabetExists=1");
	}else{
	$sql = "INSERT INTO `alphabets_table`(`alphabet`, `alphabet_recordDate`) VALUES ('$alphabet',CURRENT_TIMESTAMP)";
	$query = mysqli_query($conn,$sql);
	if($query)
		header("location:../add-alphabets.php?addAlphabetStatus=1");
	else
		header("location:../add-alphabets.php?addAlphabetStatus=0");
	}
}//end isset condition

//for adding the alphabt description
if(isset($_POST['alphabetDescription'])){
	$alphabetChosen = $_POST['alphabetChosen'];
	$alphabetDescription = $_POST['alphabetDescription'];
	$sql = "INSERT INTO `alphabets_description`(`alphabet_id`, `alphabet_description`, `alphabet_des_recordDate`) VALUES ($alphabetChosen,'$alphabetDescription',CURRENT_TIMESTAMP)";
	$query = mysqli_query($conn,$sql);
	if($query)
			header("location:../add-alphabetDescription.php?alphaDesAddStatus=1");
	else
			header("location:../add-alphabetDescription.php?alphaDesAddStatus=0");
}	
//for input trimming
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>