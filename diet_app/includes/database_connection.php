<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dietplans_db';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("Database NOt found");
?>