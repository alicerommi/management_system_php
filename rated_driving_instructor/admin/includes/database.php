<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'doctor_basic_info';
mysql_connect($host,$username,$password);
mysql_select_db($dbname);

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $add = $_POST['address'];
    $adm = $_POST['admission'];
    $img = $_POST['myimage'];

    if (mysql_query("insert into doctor_record(name,email,address,admission,myimage) VALUES ('$name', '$email' , '$add' , '$adm','img')"))
    {
        echo "submited";
    }
}






?>