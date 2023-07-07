<?php
include('../../../../includes/database_connection.php'); // Connection to database
if($_POST) {
	$page = $_POST['page']; // Current page number
	$per_page = $_POST['per_page']; // Articles per page
	if ($page != 1) $start = ($page-1) * $per_page;
	else $start=0;
	
	// $select = $bdd->query('SELECT * FROM contact LIMIT '.$start.', '.$per_page.''); // Select rows list from $start
	// $select->setFetchMode(PDO::FETCH_OBJ);
	// $numArticles = $bdd->query('SELECT count(id) FROM contact')->fetch(PDO::FETCH_NUM); // Total number of rows in the database


	$select = mysqli_query($conn,"SELECT* FROM user_comments LIMIT $start,$per_page");
		$numArticles  = mysqli_num_rows($select);
	
	$numPage = ceil($numArticles/$per_page); // Total number of page
	
		// We build the article list
	$articleList = '';
	while($result = mysqli_fetch_array($select)) {
		//$date = $result->msgDate;
	//SELECT `comment_id`, `comment_uname`, `comment_uemail`, `comment_msg`, `comment_recordDate` FROM `user_comments` WHERE 1
		$time = $result['comment_recordDate'];

		$finalDate = date("d-m-Y",strtotime($time));
		//$nameOfDay = date('D', strtotime($date));
		$comment_uname = $result['comment_uname'];
		$comment_msg = $result['comment_msg'];
	//	echo $nameOfDay;
	$time = date("H:i",strtotime($result['comment_recordDate']));
		$articleList .= '<div class="panel panel-border panel-info"><div class="panel-heading"><h3>' .$comment_uname .  '<div class="pull-right"><i class="md md-rate-review"></i></div></h3>  gives reviews on '.$finalDate.' at '.$time.' </div>'. '<div class="panel-body"><p class="text-justify"><blockquote>' . $comment_msg . '</blockquote></p></div></div>';
	}
	
	// We send back the total number of page and the comments list
	$dataBack = array('numPage' => $numPage, 'articleList' => $articleList);
	$dataBack = json_encode($dataBack);
	echo $dataBack;
}
?>