<?php
session_start();
include "../../includes/config.php";
if(isset($_POST['fcheck'])){
        $email=test_input($_POST['email']);
        $password=test_input($_POST['password']);
        $query=mysqli_query($con,"SELECT * FROM admin where admin_email='$email' and admin_password = '$password'");
        if(!$query){
            echo "error".mysqli_error($con);
        }
        $count=mysqli_num_rows($query);
        if($count==1){
            $_SESSION["admin"]=$email;
            header("Location:../index.php");
        }else{
            header("location:../login.php?s=0");
        }
    }
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>