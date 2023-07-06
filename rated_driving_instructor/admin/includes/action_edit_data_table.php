<?php

include 'database_connection.php';


if(isset($_POST['submit']))
{
    $idd = $_POST['ID'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $special = $_POST['special'];
    $dob = $_POST['dob'];
    //$image_query = "SELECT * FROM doctor WHERE ID = '$idd' AND image = '$image' ";
 
    $image = $_POST['image'];
   
    $url = $_POST['url'];

    //$gender = $_POST['gender'];
/*
    if(isset($image))
    {
        $image_query = "select $image from doctor where ID=$idd";
        $i_query = mysqli_query($Conn, $image_query);
        $image = $i_query['image'];
        //$image = $_POST['image'];

    }else
    {
        $image_query = "select $image from doctor where ID=$idd";
        $i_query = mysqli_query($Conn, $image_query);
        $image = $i_query['image'];

    }
    */

    $sql = "UPDATE doctor SET name='$name', description='$description', special='$special', dob = '$dob',image='$imagee', url='$url', gender='$gender' WHERE ID=$idd";
    $query = mysqli_query($Conn, $sql);


        if($query)
    	{
            header("location: http://localhost:8080/hospital/eliteadmin-hospital/add-doctor.php ");
    	}
    
}

/*

if(isset($_FILES['gallery']) && count($_FILES['gallery']['error']) == 1 && $_FILES['gallery']['error'][0] > 0)
{
    //file not selected
} else if(isset($_FILES['gallery']))
{ //this is just to check if isset($_FILE). Not required.
    //file selected
}
*/


?>
