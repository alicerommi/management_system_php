<?php
include '../includes/database_connection.php';
if(isset($_POST['recoverPass'])){
        $email = mysqli_escape_string($conn,$_POST['email']);
        //update the new pass of isntructor in table
        $query  = mysqli_query($conn,"SELECT* FROM instructor WHERE email='$email' AND emailVeriStatus=1");
        if(mysqli_num_rows($query)==1){
                     $pass = generateRandomString(10);
                     //update pass new
                     $query2 = mysqli_query($conn,"UPDATE instructor SET password='$pass' WHERE email='$email'");
                     if($query2){
                                emailSender($email,$pass);
                                header("location:../login.php?passReset=1");
                     }
        }else{
             header("location:../login.php?emailNotFount=1");
        }
}//end isset
//for sending email
function emailSender($to,$pass){
            $subject = 'Instructor Password Reset:';
            $headers = "From:ayazahmad578@gmail.com\r\n";
            $headers .= "Reply-To: ayazahmad578@gmail.com\r\n";
            $headers .= "CC: ayazahmad578@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message .= "<h1>Your Password Has Been Reset</h1><br>";
           // $message .= "<p></p>";
             $message.="
            <br>
            New Password is:";
            $message.=$pass;
            $message.="
            <br>
            Regards: Management</p>";
            mail($to, $subject, $message, $headers);
}
function generateRandomString($length) {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                    }//end fn

?>