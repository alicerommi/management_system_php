<?php
  $dbhost    	= "localhost";				//host name.
  $dbuser 	= "root";					//database user.
  $dbpasswd 	= "";						//database passwd.
  $dbname		= "advertp1_client_script";

  //Create connection and select DB

$db = new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);



if($db->connect_error){

   die("Unable to connect database: " . $db->connect_error);

}

?>
