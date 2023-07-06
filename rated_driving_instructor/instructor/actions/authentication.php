<?php
session_start();
include '../includes/database_connection.php';
         //for authentication  login is the name of submit button in login form
        if(isset($_POST['login'])){
                    $email =$_POST['email'];
                    $password = $_POST['password'];
                    $query = "SELECT* FROM `instructor` WHERE `email`='$email' AND `password`='$password' AND `emailVeriStatus`=1";
                    $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result)==1){
                                //start the session and setting the flag 1 as it will be online when he will logged out then automaitcally the value will set 0 
                                 mysqli_query($conn,"UPDATE `instructor` SET `online_flag`=1 WHERE `email`=$email");
                                  $_SESSION['ins_email'] = $email;
                                 header("location:../index.php");}
                                 else{header("location:../login.php?info=wrong");}
            }//isset condition end
?>