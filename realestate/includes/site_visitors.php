<?php include 'database_connection.php';
//date_default_timezone_set('Australia/Melbourne');
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d', time());
$sql = "SELECT * FROM `visitors` WHERE `ip` ='$ip' AND  `date`='$date'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)==0){
  $query = "INSERT INTO `visitors`(`ip`,`date`) VALUES('$ip','$date')";
  mysqli_query($conn,$query);
 }
 ?>
