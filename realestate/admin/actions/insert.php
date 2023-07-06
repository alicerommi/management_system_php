<?php
include '../../includes/database_connection.php';
if(isset($_POST['adminRegister'])){ //for admin registerations
	$allowedExts = array("jpg","png","jpeg");
	$uploadDir = "../uploads/";
	$fileName = basename($_FILES['file-upload']['name']);
	$file = $uploadDir.basename($_FILES['file-upload']['name']);
	$imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
	// echo $imageFileType;
	// die;
	$name = test_input($_POST['name']);
	$email = test_input($_POST['email']);
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	$checkEmail = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email='$email'");
	if(mysqli_num_rows($checkEmail)>0){
			header("location:../register.php?emailExists=1");
	}else
		if($password===$confirmpassword){
			if(in_array($imageFileType,$allowedExts)){
				if(move_uploaded_file($_FILES['file-upload']['tmp_name'], $file)){
					$res = mysqli_query($conn,"INSERT INTO `admin`(`admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_recordDate`) VALUES ('$name','$email','$password','$fileName',NOW())");
						if($res)	
							header("location:../register.php?status=1");
						else
							header("location:../register.php?status=0");
				}
			}else{
				header("location:../register.php?fileNotSupport=1");
			}
		}else{
			header("location:../register.php?passMisMatch=1");
		}
}//end isset condition here 

//for inserting the date for a property
// propertyType
// address
if(isset($_POST['address'])){
	$propertyType = test_input($_POST['propertyType']);

  $propertyStatus = $_POST['propertystatus'];
	
  $propertyName = test_input($_POST['propertyName']);
    $area = test_input($_POST['area']); 
    $address = test_input($_POST['address']); 
    $floor = test_input($_POST['floor']); 
    $unit = test_input($_POST['unit']); 
    $covered = test_input($_POST['covered']); 
    $total = test_input($_POST['total']); 
    $antiguedad = test_input($_POST['antiguedad']); 
    $furnished = test_input($_POST['furnished']); 
    $price = test_input($_POST['price']);
    $Moneda = $_POST['Moneda'];
    if($Moneda=='Dollar')
        {$price = 'U$D'.$price;}
      else
        { $price = "$".$price;}

    $lat = test_input($_POST['lat']);
    $lng = test_input($_POST['lng']);
    $orientation = test_input($_POST['orientation']); 
    $palier = test_input($_POST['palier']); 
     $state = test_input($_POST['state']);
    $cstate = test_input($_POST['cstate']); 
    $office = test_input($_POST['office']); 

    $meetingroom = test_input($_POST['meetingroom']);
	$reception = test_input($_POST['reception']);
    $heating = test_input($_POST['heating']); 
    $hotwater = test_input($_POST['hotwater']); 
    $brightness = test_input($_POST['brightness']); 
    $luminosity = test_input($_POST['luminosity']);
    $cfloors = test_input($_POST['cfloors']); 
    $bath = test_input($_POST['bath']); 
    $toilet = test_input($_POST['toilet']); 
    $expenses = test_input($_POST['expenses']); 
    $abl = test_input($_POST['abl']); 
    $aysa = test_input($_POST['aysa']); 
    $contract = test_input($_POST['contract']); 
    $quantity = test_input($_POST['quantity']); 
    $officeOfFloors = test_input($_POST['officeOfFloors']);
    $surveillance = test_input($_POST['surveillance']); 
    $garage = test_input($_POST['garage']); 
    $baulera = test_input($_POST['baulera']); 



  	  $queryInsert = "INSERT INTO `property`( `property_name`, `property_type`,`property_status`,`property_state1`,`property_area`, `property_address`, `property_floor`, `property_typeOfUnit`, `property_coveredSurface`, `property_totalSurface`, `property_antiquity`, `property_furnished`, `property_price`, `property_locationLat`, `property_locationLng`, `property_orientation`, `property_palier`, `property_state`, `property_office`,`property_meetingroom`,`property_reception`, `property_heating`, `property_hotwater`, `property_brightness`, `property_luminsoity`, `propety_floor2`, `property_bathrooms`, `property_toilete`, `property_expenses`, `property_abl`, `property_aysa`, `property_contractDuration`, `property_quantityOfFloors`, `property_officesOfFloors`, `property_surveillance`, `property_garage`, `property_baulera`, `property_recordDate`) VALUES ('$propertyName','$propertyType','$propertyStatus','$state','$area','$address','$floor','$unit','$covered','$total','$antiguedad','$furnished','$price','$lat','$lng','$orientation','$palier','$cstate','$office','$meetingroom','$reception','$heating','$hotwater','$brightness','$luminosity','$cfloors','$bath','$toilet','$expenses','$abl','$aysa','$contract','$quantity','$officeOfFloors','$surveillance','$garage','$baulera',NOW())";
  	
  	$res = mysqli_query($conn,$queryInsert);
  	if($res)
  		echo 1;
  	else
  		echo 0;
}

//for inserting the details of a project

if(isset($_POST['addProject'])){
  $pname   = test_input($_POST['pname']);
$description   = test_input(mysqli_real_escape_string($conn,$_POST['description']));
$amenties   =  test_input(mysqli_real_escape_string($conn,$_POST['amenties']));
$services   =  test_input(mysqli_real_escape_string($conn,$_POST['services']));
$info   =  test_input(mysqli_real_escape_string($conn,$_POST['info']));
$location   = test_input($_POST['location']);
$query = "INSERT INTO `projects`(`project_name`, `project_location`, `project_desctiption`, `project_services`, `project_amenties`, `project_info`, `project_recordDate`) VALUES ('$pname','$location','$description','$services','$amenties','$info',NOW())";
// die;
$res = mysqli_query($conn,$query);
if($res){
  header("location:../add-project.php?added=1");
}else 
  header("location:../add-project.php?added=0");
}//end isset here 


//for inserting the socila links 
if(isset($_POST['addSocialLinks'])){

$facebook  = $_POST['facebook'];
$twitter  = $_POST['twitter'];
$googleplus  = $_POST['googleplus'];
$linkedin  = $_POST['linkedin'];
$vimeo  = $_POST['vimeo'];
$query = mysqli_query($conn,"INSERT INTO `footersocial_medialinks`( `fb_link`, `twitter_link`, `gplus_link`, `linkedIn_link`, `vimeo_link`, `sm_linkrecordDate`) VALUES ('$facebook','$twitter','$googleplus','$linkedin','$vimeo',NOW())");
if($query){
  header("location:../add-sociallinks.php?added=1");
}else 
  header("location:../add-sociallinks.php?added=0");
}//end isset condition here 

//for uploading the footer logo 
if(isset($_POST['uploadFooterLogo'])){
  $filename = $_FILES['fileupload']['name'];
  $uploadDir = "../uploads/footer-logo/";
    $file = $uploadDir.basename($_FILES['fileupload']['name']);
  $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  
  if($imageFileType=="jpg" || $imageFileType=="png"){
    if(move_uploaded_file($_FILES['fileupload']['tmp_name'], $file)){
        $query = mysqli_query($conn,"INSERT INTO `footer_logo`(`footer_logo_image`, `footer_logo_recordDate`) VALUES ('$filename',NOW())");
       if($query){
          header("location:../add-sociallinks.php?addedLogo=1");
        }else {
          header("location:../add-sociallinks.php?addedLogo=0");
        }
    }
  }else{ //logoMisMatchFormat
    header("location:../add-sociallinks.php?logoMisMatchFormat=1");
  }

}//end isset condition here 

//for inserting AddFooterText paragraph
if(isset($_POST['AddFooterText'])){
  $about = test_input($_POST['about']);
  $query = mysqli_query($conn,"INSERT INTO `footer_text`( `footer_text`, `footer_text_recordDate`) VALUES ('$about',NOW())");
    if($query){
          header("location:../add-sociallinks.php?addedAboutText=1");
        }else {
          header("location:../add-sociallinks.php?addedAboutText=0");
        }
}//end isset condition here 

//for inserting AddCopyrightText 
if(isset($_POST['AddCopyrightText'])){
  $copyright = test_input($_POST['copyright']);
  $query = mysqli_query($conn,"INSERT INTO `footer_copyrighttext`( `footer_copyrightText`, `footer_crRecordDate`) VALUES ('$copyright',NOW())");
   if($query){
          header("location:../add-sociallinks.php?addedcopyright=1");
        }else {
          header("location:../add-sociallinks.php?addedcopyright=0");
        }
}

//addign footer1textLinks 
if(isset($_POST['footer1textLinks'])){
$heading   = $_POST['heading'];
$link1   = $_POST['link1'];
$link2   = $_POST['link2'];
$link3   = $_POST['link3'];
$link4   = $_POST['link4'];
$link5   = $_POST['link5'];

$sql = "INSERT INTO `footer_links`( `footer_headingtext`, `footer_link1`, `footer_link2`, `footer_link3`, `footer_link4`, `footer_link5`, `footer_links_type`, `footer_linkRecordDate`) VALUES ('$heading','$link1','$link2','$link3','$link4','$link5',1,NOW())";
// die;
$query = mysqli_query($conn,$sql);

 if($query){
          header("location:../add-footer-text.php?addedlinkFooter1=1");
        }else {
          header("location:../add-footer-text.php?addedlinkFooter1=0");
        }

}//end isset condition 

if(isset($_POST['footer2textLinks'])){

$heading  = $_POST['heading2'];
$link1  = $_POST['link6'];
$link2  = $_POST['link7'];
$link3   = $_POST['link8'];
$link4   = $_POST['link9'];
$link5   = $_POST['link10'];

$query = mysqli_query($conn,"INSERT INTO `footer_links`( `footer_headingtext`, `footer_link1`, `footer_link2`, `footer_link3`, `footer_link4`, `footer_link5`, `footer_links_type`, `footer_linkRecordDate`) VALUES ('$heading','$link1','$link2','$link3','$link4','$link5',2,NOW())");
 if($query){
          header("location:../add-footer-text.php?addedlinkFooter2=1");
        }else {
          header("location:../add-footer-text.php?addedlinkFooter2=0");
        }
}//emd sset condotpn 

//for inserting the company info in footer 
if(isset($_POST['addComInfo'])){
  $officeaddress  = $_POST['officeaddress'];
$call  = $_POST['call'];
$email  = $_POST['email'];

$query = mysqli_query($conn,"INSERT INTO `com_detail`(`com_address`, `com_contact`, `com_email`, `com_recordDate`) VALUES ('$officeaddress','$call','$email',NOW())");
if($query){
          header("location:../add-footer-text.php?AddressAdded=1");
        }else {
          header("location:../add-footer-text.php?AddressAdded=0");
        }

}

///uinsert the slider image description 

if(isset($_POST['upload-images'])){
   $image_description =  $_POST['imageDescription'];
  $tempFile = $_FILES['file']['tmp_name'];
  $folder = "../uploads/slider-images/";
  $targetFilePath = $folder.$_FILES['file']['name'];  
  $fileName = $_FILES['file']['name'];
  $extn = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
  if($extn=="jpg" || $extn == "png" || $extn=="jpeg"){
    if(move_uploaded_file($tempFile, $targetFilePath)){
        $res = mysqli_query($conn,"INSERT INTO `slider_images`( `simage_name`, `simage_description`, `s_image_recordDate`) VALUES ('$fileName','$image_description',NOW())");
        if($res) 
          header("location:../add-slider-images.php?sliderImageAdded=1");
        else
          header("location:../add-slider-images.php?sliderImageAdded=0");
      }
    }else{
      header("location:../add-slider-images.php?imageFormat=0");
    }
}


if(isset($_POST['commentReply'])){
    $m_id = $_POST['m_id'];
    $msgReply = $_POST['msgReply'];
    $select = mysqli_query($conn,"SELECT * FROM contact where contact_id=$m_id");
    $row = mysqli_fetch_array($select);
   $contact_email = $row['contact_uemail'];
    $query = mysqli_query($conn,"UPDATE `contact` SET `contact_reply`='$msgReply',`ans_status`=1 WHERE contact_id=$m_id");
    if($query){
           header("location:../read_message.php?replySend=1&contact_id=".$m_id);
     }else {
     header("location:../read_message.php?replySend=0&contact_id=".$m_id);
    }
}

function emailSender($contact_email,$msgReply){
    $to = $contact_email;
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $subject = "<h1>Answer From Administrator</h1>";
      // $message .= "<p>".$msgReply."</p>";
    $message .= "<p>".$msgReply."</p>";
    mail($to, $subject, $message, $headers);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




?>