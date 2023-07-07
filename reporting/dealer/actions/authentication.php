    <?php
    SESSION_START();
    include "../../includes/config.php";
    if(isset($_POST['fcheck'])){
        // echo "<pre>";
        // echo print_r($_POST);
        // echo "</pre>";
        // die;
        $email=test_input($_POST['email']);
        $password=test_input($_POST['password']);
        $check = "SELECT * FROM dealers where dealer_email='$email' and dealer_password = '$password'";
        // echo $check;
        // die;
        $query=mysqli_query($con,$check);
        if(!$query){
            echo "error".mysqli_error($con);
        }
        $count=mysqli_num_rows($query);
        if($count==1){
            $_SESSION["dealer"]=$email;
            header("Location:../index.php");
        }else{
            header("location:../login.php?status=0");
        }
    }
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    ?>
         