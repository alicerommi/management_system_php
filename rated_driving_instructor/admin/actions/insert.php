<?php
//for inserting the registeration form of admin
include '../includes/database_connection.php';
$passError="";
$emailError="";
        if(isset($_POST['register'])){
              $Adminname=  mysqli_real_escape_string($conn,$_POST['adminName']); 
              $email = $_POST['adminEmail'];
              $password = $_POST['adminPassword'];
              $conPassword = $_POST['adminConPassword'];
              //check the email whether it already exists or not
              $checkEmail = "SELECT* FROM admin WHERE email='$email'";
              $resEmail = mysqli_query($conn,$checkEmail);
              // Get image name
           $name = $_FILES['file']['name'];
          $target_dir = "images/";
          $target_file = $target_dir . basename($_FILES["file"]["name"]);
           // Select file type
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           // Valid file extensions
           $extensions_arr = array("jpg","jpeg","png","gif");
           //confirmatin of passwords 
           if($password != $conPassword){
           	   $passError =1;
           	   header("location:../register.php?info=0&pass=$passError");
           }else if(mysqli_num_rows($resEmail)>0){
           		$emailError = 1;
              header("location:../register.php?info=0&email=$emailError");
              }
           else
            {
                 //saving in to admin table
                  // Check extension
                  if( in_array($imageFileType,$extensions_arr) ){
                         move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                     } 
                     //$date = date("Y-m-d");
              $query = "INSERT INTO `admin`( `name`, `email`, `password`, `image`,`date`) VALUES ('$Adminname','$email','$password','$name',NOW())"; 
              $result = mysqli_query($conn,$query);
              if($result){
             		header("location:../register.php?info=1");
              }
          }
        }
//for sending and apporving the instructors attached documents
if(isset($_POST['send']) && !isset($_POST['documentsStatusID'])){
  $check1=$check2=$check3=$check4=0;
  if(isset($_POST['checkbox-1']))
     $check1 = $_POST['checkbox-1']; //CNIC Document:
  if(isset($_POST['checkbox-2']))
    $check2 = $_POST['checkbox-2']; //DBA Document:
  if(isset($_POST['checkbox-3']))
    $check3 = $_POST['checkbox-3']; //Public Liability Insurance Document:
  if(isset($_POST['checkbox-4']))
    $check4 = $_POST['checkbox-4']; //Car License Document:
  $message =  mysqli_escape_string($conn,$_POST['message']);
  $doc_id= $_POST['documentsID'];
  $ins_id = $_POST['instructorID'];
  $admin_id = $_POST['adminID'];
  //inserting an entery in ins_admin table as well
  $query0 = mysqli_query($conn,"INSERT INTO `admin_ins_chat`(`admin_id`, `ins_id`, `message`, `post_time`, `sendBy`) VALUES ($admin_id,$ins_id,'$message',CURRENT_TIMESTAMP,'admin')");
   $query ="INSERT INTO `instructor_documents_status`(`doc1_status`, `doc2_status`, `doc3_status`, `doc4_status`,`documents_id`, `recordDateTime`) VALUES ($check1,$check2,$check3,$check4,$doc_id,CURRENT_TIMESTAMP)";
   $result = mysqli_query($conn,$query);
   if($result && $query0)
      header("location:../viewDocuments.php?ins_id=$ins_id&info=1");
    else
      header("location:../viewDocuments.php?ins_id=$ins_id&info=0");
}else if(isset($_POST['send']) && isset($_POST['documentsStatusID'])){
        $documentsStatusID = $_POST['documentsStatusID'];
         $ins_id = $_POST['instructorID'];
        $admin_id = $_POST['adminID'];
        $check1=$check2=$check3=$check4=0;
        $ins_id = $_POST['instructorID'];
        if(isset($_POST['checkbox-1']))
           $check1 = $_POST['checkbox-1']; //CNIC Document:
        if(isset($_POST['checkbox-2']))
          $check2 = $_POST['checkbox-2']; //DBA Document:
        if(isset($_POST['checkbox-3']))
          $check3 = $_POST['checkbox-3']; //Public Liability Insurance Document:
        if(isset($_POST['checkbox-4']))
          $check4 = $_POST['checkbox-4']; //Car License Document:
       //  $subject = mysqli_escape_string($conn,$_POST['subject']);
        $message =  mysqli_escape_string($conn,$_POST['message']);
     $query ="UPDATE `instructor_documents_status` SET `doc1_status`=$check1, `doc2_status`=$check2, `doc3_status`=$check3 , `doc4_status`=$check4 WHERE id=$documentsStatusID";
     $query1 = mysqli_query($conn,"INSERT INTO `admin_ins_chat`(`admin_id`, `ins_id`, `message`, `post_time`, `sendBy`) VALUES ($admin_id,$ins_id,'$message',CURRENT_TIMESTAMP,'admin')");
   $result = mysqli_query($conn,$query);
   if($result && $query1)
      header("location:../viewDocuments.php?ins_id=$ins_id&updateinfo=1");
    else
      header("location:../viewDocuments.php?ins_id=$ins_id&updateinfo=0");
}
?>