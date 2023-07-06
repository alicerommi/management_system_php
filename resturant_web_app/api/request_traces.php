<?php
//for saving the requests trace
date_default_timezone_set("Asia/Karachi");
error_reporting(E_ALL); // Error engine - always ON!
ini_set('display_errors', TRUE); // Error display - OFF in production env or real server
ini_set('log_errors', TRUE); // Error logging
ini_set('error_log', 'logs/errors.log'); // Logging file
ini_set('log_errors_max_len', 1024); // Logging file size
if($_POST){
	$file="logs/paramters_trace.txt";
	$date = date("d-m-Y h:i:sa");
	$_POST['date_time']=$date;
	file_put_contents($file,"\n".json_encode($_POST, true), FILE_APPEND);	
		file_put_contents($file,"\n".json_encode($_FILES, true), FILE_APPEND);
}
?>