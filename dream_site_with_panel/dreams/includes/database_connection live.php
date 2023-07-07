<?php
$host = 'localhost';
$username = 'etrifect_dream';
$password = 'qazwsxedcrfv1234567890';
$dbname = 'etrifect_dream';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("NOt found");
?>