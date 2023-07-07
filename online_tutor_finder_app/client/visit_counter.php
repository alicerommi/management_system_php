<?php
include("../common/db.php");

$ip = $_SERVER['REMOTE_ADDR'];

$sql = "SELECT `ip` FROM `visitors` WHERE `ip` ='$ip'";

$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res)==0){
	$query = "INSERT INTO `visitors`(`id`,`ip`) VALUES(NULL,'$ip')";
	
	$response = mysqli_query($conn,$query);
		
}
$count ="SELECT `ip` FROM `visitors`";

$num = mysqli_query($conn,$count);

echo mysqli_num_rows($num);

?>