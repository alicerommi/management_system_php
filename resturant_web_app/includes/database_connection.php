<?php
$host = 'srv38';
$username = 'zamarket_zamarket_maxpychannel_db_user';
$password = 'tH*GID}MA5h7';
$dbname = 'zamarket_maxpychannel_db';
$conn = new mysqli($host, $username, $password);
if(!$conn){
	echo "error in data base connection";
}
$Select_db = mysqli_select_db($conn, $dbname) or die ("NOt found");
#----------things need to fill before putting on server

$files_are_on_server=1;  #if files are not in server
$base_url = "http://zamarket.com.pk/projects/res/";
$email_verification_link= "email_verification_process.php";
$company_email_add="info@themaxhype.com";
$company_name ="Maxhypechannel";
$images_supported_array = array ("png","jpg","jpeg");
$business_owner_files_directory_images = '../uploads/business_owner/business_owner_images/'; #for uploading the images of business owner
$set_the_password_length_for_business_owner = 7;
#----------global parameters
$GLOBALS['timezone'] = "Asia/Karachi";
?>