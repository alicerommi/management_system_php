<?php
// $host = 'localhost';
// $username = 'urmemesc_insuser';
// $password = 'qwer1234';
// $dbname = 'urmemesc_instructor';
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mycity';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("NOt found");
// Check connection
/*
if ($conn->connect_error) {
    die("Connection failed: " . $Conn->connect_error);
} 
echo "Connected successfully";
*/
?>