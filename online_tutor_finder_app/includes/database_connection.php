<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'online_tutor';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("Database NOt found");
?>