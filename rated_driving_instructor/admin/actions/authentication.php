<?php
session_start();
include '../includes/database_connection.php';
 //for authentication  login is the name of submit button in login form
      if(isset($_POST['login'])){
                $username = mysqli_escape_string($conn,$_POST['username']);
                $password = $_POST['password'];
                $query = "SELECT* FROM `admin` WHERE `name`='$username' AND `password`='$password'";
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)==1){
                         $row = mysqli_fetch_array($result);
                         $admin_email  = $row['email']; 
                         $_SESSION['admin_email'] = $admin_email;
                         //save the online_flag status for the admin in table 
                         $query2 = mysqli_query($conn,"UPDATE admin SET online_flag=1 WHERE email='$admin_email'");
                         header("location:../index.php"); }
                         else{
                	       header("location:../login.php?info=wrong");}
                 }
?>