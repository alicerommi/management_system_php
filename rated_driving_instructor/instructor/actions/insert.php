<?php
//for inserting the registeration form of ins
include '../includes/database_connection.php';
      require 'vendor/autoload.php';
      $client = new \GoCardlessPro\Client([
        'access_token' => 'sandbox_YLmQoGwup6JjQHHgK7Adi5BQhKjPSakoxwfMY75I',
        // Change me to LIVE when you're ready to go live
        'environment' => \GoCardlessPro\Environment::SANDBOX
      ]);
$passError="";
$emailError="";
        if(isset($_POST['register'])){
              $insname=  mysqli_real_escape_string($conn,$_POST['insName']); 
              $email = $_POST['insEmail'];
              $password = $_POST['insPassword'];
              $conPassword = $_POST['insConPassword'];
              $gender = $_POST['insGender'];
              $serviceType = $_POST['insWork'];
              //check the email whether it already exists or not
              $checkEmail = "SELECT* FROM `instructor` WHERE email='$email'";
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
                 //saving in to ins table
                  // Check images extension
                  if( in_array($imageFileType,$extensions_arr) ){
                         move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                     } 
                     $veriLink = generateRandomString(35);
                     $verificationLink = "verificationStatus.php?vlink=".$veriLink;
                     //for email sending calling a function
                   //  emailSender($email,$verificationLink);
                $query = "INSERT INTO `instructor`(`name`, `email`, `image`, `password`, `vLink`, `emailVeriStatus`, `legalVeri`,`date`,`gender`,`service_type`) VALUES ('$insname','$email','$name','$password','$veriLink',0,0,NOW(),'$gender','$serviceType')"; 
                // echo $query;
                // die;
                $result = mysqli_query($conn,$query);
              if($result){
                   emailSender($email,$verificationLink);
             		header("location:../register.php?info=1");
              }
          }
        }

//for generating a link
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//for sending email
function emailSender($to,$link){
            $subject = 'Instructor Request Status:';
            $headers = "From:ayazahmad578@gmail.com\r\n";
            $headers .= "Reply-To: ayazahmad578@gmail.com\r\n";
            $headers .= "CC: ayazahmad578@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message .= "<h1>Your Registeration as an Instructor has been Recieved</h1><br>";
            $message .= "<p>To Complete The Email Verification Process.</p>";
             $message.="
            <br>
            Click on Given Link:";
              $url = "http://rateddrivinginstructors.com/codeAge/instructor/".$link;
            $message.="<a href=".$url.">Click Here To Complete Email Verification Process</a>";
            $message.="
            <br>
            Regards: Management</p>";
            mail($to, $subject, $message, $headers);
}
//for adding package from instructor
if(isset($_POST['packageAdd'])){
    $packagename = mysqli_escape_string($conn,$_POST['packagename']);
    $packagetype = $_POST['packageType'];
    $pkghours = $_POST['pkghours'];
    $packageamount = $_POST['pkgamount'];
    $insID = $_POST['insID'];
    $pkgDays = $_POST['pkgdays'];
    $packagedescription = mysqli_escape_string($conn,strip_tags($_POST['packageDescription']));
    $query = "INSERT INTO `packages`(`ins_id`,`package_name`, `package_type`,`package_days`,`package_durationHours`, `package_amount`, `package_description`,`recordDate`) VALUES ('$insID','$packagename','$packagetype','$pkgDays','$pkghours','$packageamount','$packagedescription',NOW())";
    $result = mysqli_query($conn,$query);
    if($result)
      header("location:../add-package.php?packageAdded=1");
    else 
      header("location:../add-package.php?packageAdded=0");
} 
//for uploading the lega documents of instructor 
if(isset($_POST['legalDoc'])){
  //count the number of files.. for upload1
    $total1 = count($_FILES['upload1']['name']);
    //count the number of files.. for upload2
    $total2 = count($_FILES['upload2']['name']);
    //count the number of files.. for upload3 and upload4
    $total3 = count($_FILES['upload3']['name']);
    $total4 = count($_FILES['upload4']['name']);
    //extension of file checking
    $allowedExts = array(
        "pdf", 
        "doc", 
        "docx",
        "xlsx",
        "jpg",
        "csv",
        "png",
    ); 

    $filesName1 = $_FILES['upload1']['name'];
    $filesName2 = $_FILES['upload2']['name'];
    $filesName3 = $_FILES['upload3']['name'];
    $filesName4 = $_FILES['upload4']['name'];
      
    //get extension of files and pushing it into an array   
    //for files 1 
    $ext1 = array();
    //as we are saving the all file names in to table field so we need to concatenate the files name
    $attachmentsKEY = "&key123456789=";
    $attachments1 = "";
    $attachments2 = "";
    $attachments3 = "";
    $attachments4 = "";
    //where the files or attachments will saved ..(Storage Folder)
    $target_dir = "../../admin/logalDocumentsUploads/";
    //get the other details of form

    for($a=0;$a<$total1;$a++){
        //saving all the attached files into a string later we will push this string in to the table field.. 
        $attachments1 = $attachments1.$attachmentsKEY.$filesName1[$a];
        $target_file = $target_dir . basename($_FILES["upload1"]["name"][$a]);
        $newFilePath1 =$_FILES['upload1']['name'][$a];
        // $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
        $extension = pathinfo($newFilePath1, PATHINFO_EXTENSION);
            //check point for extension of files
          if(in_array($extension,$allowedExts)){
            //moving into directory
            if (move_uploaded_file($_FILES["upload1"]["tmp_name"][$a], $target_file)){
                       /// echo "The file ". basename( $_FILES["upload1"]["name"][$a]). " has been uploaded.";
                    }else{
                      //echo "error";
                    } 
              }else{
                 //echo "The File is not supported";
              }
    }//end first loop 
     

    //for the uploads attchments 
    for($b=0;$b<$total2;$b++){
        //saving all the attached files into a string later we will push this string in to the table field.. 
        $attachments2 = $attachments2.$attachmentsKEY.$filesName2[$b];
        $target_file = $target_dir . basename($_FILES["upload2"]["name"][$b]);
        $newFilePath2 =$_FILES['upload2']['name'][$b];
        // $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
        $extension = pathinfo($newFilePath2, PATHINFO_EXTENSION);
        //echo $extension;
            //check point for extension of files
          if(in_array($extension,$allowedExts)){
            //moving into directory
            if (move_uploaded_file($_FILES["upload2"]["tmp_name"][$b], $target_file)){
                       // echo "The file ". basename( $_FILES["upload2"]["name"][$b]). " has been uploaded.";
                    }else{
                      //echo "error";
                    }
              }else{
               // echo "The File is not supported";
              }
    }//end second loop 
    ////for the upload3 attachments 
    for($c=0;$c<$total3;$c++){
        $attachments3 = $attachments3.$attachmentsKEY.$filesName3[$c];
        $target_file = $target_dir . basename($_FILES["upload3"]["name"][$c]);
        $newFilePath3 =$_FILES['upload3']['name'][$c];
        // $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
        $extension = pathinfo($newFilePath3, PATHINFO_EXTENSION);
            //check point for extension of files
          if(in_array($extension,$allowedExts)){
            //moving into directory
            if (move_uploaded_file($_FILES["upload3"]["tmp_name"][$c], $target_file)){
                        //echo "The file ". basename( $_FILES["upload3"]["name"][$c]). " has been uploaded.";
                    }else{
                     // echo "error";
                    } 
              }else{
              //  echo "The File is not supported";
              }
    }//end third loop 

    for($d=0;$d<$total4;$d++){
        $attachments4 = $attachments4.$attachmentsKEY.$filesName4[$d];
        $target_file = $target_dir . basename($_FILES["upload4"]["name"][$d]);
        $newFilePath3 = $_FILES['upload4']['name'][$d];
        // $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
        $extension = pathinfo($newFilePath3, PATHINFO_EXTENSION);
            //check point for extension of files
          if(in_array($extension,$allowedExts)){
            //moving into directory
            if (move_uploaded_file($_FILES["upload4"]["tmp_name"][$d], $target_file)){
                        //echo "The file ". basename( $_FILES["upload3"]["name"][$c]). " has been uploaded.";
                    }else{
                     // echo "error";
                    } 
              }else{
              //  echo "The File is not supported";
              }
    }//end third loop 
     $instructorID = $_POST['instructorID'];
    $description = mysqli_escape_string($conn,$_POST['description']);
    $passrate = $_POST['passrate'];
    $qualifiedDate = $_POST['qualifiedDate'];
    $carinsuranceStatus = $_POST['carinsuranceStatus']; 
    //check whether the user has been  already submited the documents or not
    $queryCheck = mysqli_query($conn,"SELECT* FROM instructor_documents WHERE ins_id=$instructorID");
    if(mysqli_num_rows($queryCheck)==0)
   { 
      $query = "INSERT INTO `instructor_documents`(`ins_id`, `cnic_doc`, `ins_description`, `dba_doc`, `insurance_doc`, `ins_passrate`, `ins_dataQualified`, `insuranceStatus`, `ins_lecense_doc`, `recordTimeDate`) VALUES ($instructorID,'$attachments1','$description','$attachments2','$attachments3',$passrate,'$qualifiedDate','$carinsuranceStatus','$attachments4',CURRENT_TIMESTAMP)";
       $result = mysqli_query($conn,$query);
       if($result)
         header("location:../legalDocuments.php?info=1");
       else
         header("location:../legalDocuments.php?info=0");
     }else{
        header("location:../legalDocuments.php?info=2");
     }
}//end isset condition for submitting the form for the legal documents of isntructor

//for adding the account of instructor by using that id we will perform the transaction payment gateway (stripe api)
// if(!empty($_POST['stripeToken'])){
//      print_r($_POST);
// }
//for adding the instructor vehicle 
if(isset($_POST['addVehicle'])){
$vFamily = mysqli_escape_string($conn,$_POST['vFamily']);
$vModel = mysqli_escape_string($conn,$_POST['vModel']);
$vName = mysqli_escape_string($conn,$_POST['vName']);
$ins_id = $_POST['instructorID'];
$query = mysqli_query($conn,"INSERT INTO `instructor_vehicles`(`ins_id`, `vehicle_family`, `vehicle_model`, `vehicle_name`, `recordDate`) VALUES ($ins_id,'$vFamily','$vModel','$vName',NOW())");
if($query)
  header("location:../add-vehicle.php?status=1");
else 
 header("location:../add-vehicle.php?status=0");
}//end isset condition 
//for adding the monthly subscription account of instructor through an api
//this form request will comes from the instructorPaymentAccount.php page
if(isset($_POST['createAccount'])){
  //for setting up the links for the gocard api and libs

  //print_r($client);
    $instructorEmail = $_POST['instructorEmail'];
    //get the instructor id usng his email address
    $queryINSID  = mysqli_query($conn,"SELECT* FROM instructor WHERE email='$instructorEmail'");
    $rowINS = mysqli_fetch_array($queryINSID);
    $ins_id = $rowINS['id'];
    $givenName = mysqli_escape_string($conn,$_POST['givenName']);
    $familyName = mysqli_escape_string($conn,$_POST['familyName']);
    $countrCode = $_POST['country'];
    // $description = mysqli_escape_string($conn,$_POST['description']);
    // $addressLine1 = mysqli_escape_string($conn,$_POST['addressLine1']);
    // $city = mysqli_escape_string($conn,$_POST['city']);
    // $postalCode = mysqli_escape_string($conn,$_POST['postalCode']);
    //create the instructor account using the api...
    //for putting the info of client using the shown link 


    //for creating a customer 
    $create = $client->customers()->create([
          "params" => [
                      "email" => $instructorEmail,
                       "given_name" => $givenName,
                      "family_name" => $familyName,
                       "country_code" => $countrCode,
                     ]
        ]);
       $customerID =  $create->id; //here we get the customer id which is created now...
        //save this id into table databases
        $query = mysqli_query($conn,"INSERT INTO `instructor_gocard_account`(`ins_id`, `gocard_ins_id`, `datetime`) VALUES ($ins_id,'$customerID',CURRENT_TIMESTAMP)");
        if($query){
             header("location:../instructorPaymentAccount.php?info=1");
           }
    // $redirectFlow = $client->redirectFlows()->create([
    //     "params" => [
    //         // This will be shown on the payment pages
    //         "description" => $description,
    //         // Not the access token
    //         "session_token" => "dummy_session_token",
    //         "success_redirect_url" => "https://developer.gocardless.com/example-redirect-uri/",
    //         // Optionally, prefill customer details on the payment page
    //         "prefilled_customer" => [
    //           "given_name" => $givenName,
    //           "family_name" => $familyName,
    //           "email" => $instructorEmail,

    //           // "address_line1" => $addressLine1,
    //           // "city" => $city,
    //           // "postal_code" => $postalCode,
    //         ]
    //     ]
    //   ]);
    //after this 
     //echo $redirectFlow->id; //it will redirect it to a page which will takes the more information from the instructor 
     // header("location:instructorPaymentAccount.php?info=1");
// $redirectFlow = $client->redirectFlows()->complete(
//     $redirectFlow->id, //The redirect flow ID from above.
//     ["params" => ["session_token" => "dummy_session_token"]]
// );

// print("Mandate: " . $redirectFlow->links->mandate . "<br />");
// //Save this mandate ID for the next section.
// print("Customer: " . $redirectFlow->links->customer . "<br />");

  //   header("location:".$redirectFlow->redirect_url);
}//end isset conidtion here
//for adding the instructor bank account 
if(isset($_POST['AddbankAccount'])){
            $instructorID  = $_POST['instructorID'];
            $accountHolderName  = mysqli_escape_string($conn,$_POST['accountHolderName']);
            $accountNumber  = mysqli_escape_string($conn,$_POST['accountNumber']);
            $branchCode  = mysqli_escape_string($conn,$_POST['branchCode']);
            $countryCode  = mysqli_escape_string($conn,$_POST['country']);  
            $currencyCode  = mysqli_escape_string($conn,$_POST['currency']);  
            //get the customer id of ins from the table   
              $query = mysqli_query($conn,"SELECT * FROM `instructor_gocard_account` WHERE `ins_id` = $instructorID");
            // print_r($query);
            //   die;
              if(mysqli_num_rows($query)>0){
                  $row = mysqli_fetch_array($query);
                  $customerID  = $row['gocard_ins_id'];
                  ///add bank details for the instructors using api
                 $bank= $client->customerBankAccounts()->create([
                    "params" => ["account_number" => "$accountNumber",
                                 "branch_code" => "$branchCode",
                                 "account_holder_name" => "$accountHolderName",
                                 "country_code" =>"$countryCode",
                                 "currency"=>"$currencyCode",
                                 "links" => ["customer" => "$customerID"]]
                  ]);
                 $mandateID = $bank->id;
                 //echo $bankID;

                 //generate the subscription 
                 $subscription = $client->subscriptions()->create([
                  "params" => [
                      "amount" => 1500, // 15 GBP in pence
                      "currency" => "$currencyCode",
                      "interval_unit" => "monthly",  //set the paramters by admin
                      "day_of_month" => "5", //set the paramters by admin
                      "links" => [
                          "mandate" =>$mandateID
                                       // Mandate ID from the last section
                      ],
                      "metadata" => [
                          "subscription_number" => "ABC1234"
                      ]
                  ],
                  "headers" => [
                      "Idempotency-Key" => "random_subscription_specific_string"
                  ]
                ]);
                 $subscriptionID =  $subscription->id;
                 
                           $client->customerBankAccounts()->list([
            "params" => ["customer" => "$customerID",
                         "enabled" => true]
                  ]);

                 //update the  ids in to table
                 $updatequery = mysqli_query($conn,"UPDATE `instructor_gocard_account` SET `gocard_mandate_id`='$mandateID ',`gocard_sub_id`='$subscriptionID',`updateDateTime`=CURRENT_TIMESTAMP WHERE `gocard_ins_id`='$customerID' AND ins_id=$instructorID");
                 if($updatequery){
                  header("location:../instructorBankAccount.php?Subadded=1");
                 }else{
                     header("location:../instructorBankAccount.php?Subadded=0");
                 }
              }else{
                header("location:../instructorBankAccount.php?add=0");
              }
}//end isset conditin here for AddbankAccount submit button.
?>


