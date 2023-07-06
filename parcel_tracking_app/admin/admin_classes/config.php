<?php
  $dbhost    	= "localhost";				//host name.
  $dbuser 	= "root";					//database user.
  $dbpasswd 	= "";						//database passwd.
  $dbname		= "jidhey_db";
  //Create connection and select DB
$db = new mysqli("srv38","zamarket_church_user","I-U?qHG]f0=e","zamarket_churchdb");
if($db->connect_error){
   die("Unable to connect database: " . $db->connect_error);
}
?>