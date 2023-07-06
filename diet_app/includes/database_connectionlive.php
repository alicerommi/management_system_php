
<?php
$host = 'localhost';
$username = 'qaraadc1_rehman';
$password = '?U43#?W0(X4M';
$dbname = 'qaraadc1_dietplans_db';
$conn = new mysqli($host, $username, $password);
$Select_db = mysqli_select_db($conn, $dbname) or die ("NOt found");
?>