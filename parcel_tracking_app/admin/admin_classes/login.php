<?php
  include_once("config.php");
  if($db){

    $user    =$_POST['user'];
    $pass    =$_POST['pass'];

    $sql="SELECT * FROM admin_login where password='$pass' AND username='$user'";
    $result = mysqli_query($db, $sql);
    $row=mysqli_fetch_assoc($result);
    //echo var_dump($row);
   if($row){
        session_start();
        $_SESSION['admin_area']=$row['username'];
        $_SESSION['user_id']=$row['id'];
        echo "true";
        //header('location: ../../index.php');
      }
    else{
        echo "false";
    }
  }else{
    echo "connection failed";
  }
  $db->close();
?>
