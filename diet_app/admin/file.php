<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dietplans_db';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("Database NOt found");

//insert the category 
$insert =  mysqli_query($conn,"INSERT INTO `category`( `category_name`, `category_recordDate`, `category_active`) VALUES ('abc',NOW(),1)");

if($insert)
	echo "done category has been added";




