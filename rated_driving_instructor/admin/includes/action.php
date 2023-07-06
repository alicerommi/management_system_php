<?php

include 'database_connection.php';


if(isset($_POST['submit']))
{
        $target= "images/".basename($_FILES['image']['name']);
        
        $image = $_FILES['image']['name'];
    /*
    $image = $_FILES['image']['name'];
    $f_tmp = $_FILES['image']['tmp_name'];
    $store = "images/".$image;
    move_uploaded_file($f_tmp,$store);
    */


    $name = $_POST['name'];
    $description = $_POST['description'];
    $special = $_POST['special'];
    $dob = $_POST['dob'];
    //$image = $_POST['image'];
    $url = $_POST['url'];
    $gender = $_POST['gender'];
    //echo $image;
    
    
    $query = mysqli_query($Conn, "insert into doctor (name,description,special,dob,image,url,gender)
    VALUES ('$name','$description','$special','$dob','$image','$url','$gender')");

     if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
        {
            echo "ok";
        }

    if($query)
    	{
            header("location: http://localhost:8080/hospital/eliteadmin-hospital/add-doctor.php ");
    	}
        
    
}

?>
