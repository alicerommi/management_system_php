
  <?php

    include 'database_connection.php';


    include 'database_connection.php';
    if (isset($_GET['delete']))
    {
        $id = $_GET['delete'];
       // mysqli_query($connect, "DELETE FROM doctor WHERE ID = '$id'");
        $sql= "DELETE FROM doctor WHERE ID= '$id'";
        $res = mysql_query($sql) or die ("Failed". mysql_error());
        if($sql)
        {
        header("location: http://localhost:8080/hospital/eliteadmin-hospital/add-doctor.php ");
        }

        

    

        //echo "<meta http_equiv = 'refresh' content = '0; url=index.php'>";
       // echo "Delete Record";

    }

?>
