<?php
include '../../includes/database_connection.php';
//this file will handle all the delete operations like deleting any records
if(isset($_GET['keyID'])){
	$id = intval($_GET['keyID']);
	$query  = mysqli_query($conn,"DELETE FROM dream_table WHERE dream_keyword_id=$id");
	if($query)
			header("location:../all-dreamLists.php?deleteStatus=1");
		else
			header("location:../all-dreamLists.php?deleteStatus=0");
}
//for deletign the category of question s
if(isset($_GET['categoryID'])){
	$id = $_GET['categoryID'];
	$query = mysqli_query($conn,"DELETE FROM questions_category WHERE ques_cate_id=$id");
		if($query)
			header("location:../questions-category.php?CatedeleteStatus=1");
		else
			header("location:../questions-category.php?CatedeleteStatus=0");
}//end isset condition here
//for deleting the question with answer
if(isset($_GET['QuesID'])){
	$id = intval($_GET['QuesID']);
	$query = mysqli_query($conn,"DELETE FROM dream_questions WHERE dream_ques_id = $id");
	if($query)
		header("location:../all-questions.php?deleteStatus=1");
	else
		header("location:../all-questions.php?deleteStatus=0");
}

//for deleting the alphabet from table
if(isset($_GET['alphabetID'])){
	$id  = $_GET['alphabetID'];
	$query = mysqli_query($conn,"DELETE FROM `alphabets_table` WHERE alphabet_id=$id");
	if($query)
		header("location:../add-alphabets.php?deleteAlphaStatus=1");
	else
		header("location:../add-alphabets.php?deleteAlphaStatus=0");
}
//for deleting the alphabet description from table
if(isset($_GET['alphabetDesID'])){
	$id =  $_GET['alphabetDesID'];
	$query = mysqli_query($conn,"DELETE FROM `alphabets_description` WHERE alphabet_des_id=$id");
		if($query)
		header("location:../view-alphabetDescription.php?deleteAlphaDesStatus=1");
	else
		header("location:../view-alphabetDescription.php?deleteAlphaDesStatus=0");

}//end isset condition


?>