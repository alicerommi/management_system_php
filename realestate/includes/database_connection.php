<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'real_estate';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("NOt found");
?>