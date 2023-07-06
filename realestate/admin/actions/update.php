<?php
include '../../includes/database_connection.php';
//for updating the property information 
if(isset($_POST['property_id'])){
	$property_id = $_POST['property_id'];
	
	$propertyType = test_input($_POST['propertyType']);
	$propertyName = test_input($_POST['propertyName']);
  $propertystatus = $_POST['propertystatus'];
    $area = test_input($_POST['area']); 
    $address = test_input($_POST['address']); 
    $floor = test_input($_POST['floor']); 
    $unit = test_input($_POST['unit']); 
    $covered = test_input($_POST['covered']); 
    $total = test_input($_POST['total']); 
    $antiguedad = test_input($_POST['antiguedad']); 
    $furnished = test_input($_POST['furnished']); 
    $price = test_input($_POST['price']); 
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

    $updateQuery = "UPDATE `property` SET `property_name`='$propertyName',`property_type`='$propertyType', `property_status`='$propertystatus',`property_state1`='$state',`property_area`='$area',`property_address`='$address',`property_floor`='$floor',`property_typeOfUnit`='$unit',`property_coveredSurface`='$covered',`property_totalSurface`='$total',`property_antiquity`='$antiguedad',`property_furnished`='$furnished',`property_price`='$price',`property_locationLat`='$lat',`property_locationLng`='$lng',`property_orientation`='$orientation',`property_palier`='$palier',`property_state`='$cstate',`property_office`='$office',`property_meetingroom`='$meetingroom',`property_reception`='$reception',`property_heating`='$heating',`property_hotwater`='$hotwater',`property_brightness`='$brightness',`property_luminsoity`='$luminosity',`propety_floor2`='$cfloors',`property_bathrooms`='$bath',`property_toilete`='$toilet',`property_expenses`='$expenses',`property_abl`='$abl',`property_aysa`='$aysa',`property_contractDuration`='$contract',`property_quantityOfFloors`='$quantity',`property_officesOfFloors`='$officeOfFloors',`property_surveillance`='$surveillance',`property_garage`='$garage',`property_baulera`='$baulera' WHERE `property_id`=$property_id";
    
    $res  = mysqli_query($conn,$updateQuery);
    if($res)
    	echo "1";
    else
    	echo "0";
}//end isset conidtion here 
//update the project details 
if(isset($_POST['updateproject'])){
    $project_id = test_input($_POST['project_id']);
    $pname = test_input($_POST['pname']);
    $description = test_input($_POST['description']);
    $amenties = test_input($_POST['amenties']);
    $location = test_input($_POST['location']);
    $services = test_input($_POST['services']);
    $info = test_input($_POST['info']);
    $query = mysqli_query($conn,"UPDATE `projects` SET `project_name`='$pname',`project_location`='$location',`project_desctiption`='$description',`project_services`='$services',`project_amenties`='$amenties',`project_info`='$info' WHERE `project_id` = $project_id");
    if($query){
        header("location:../edit-project-details.php?updateStatus=1&project_id=".$project_id);
    }else
    header("location:../edit-project-details.php?updateStatus=0&project_id=".$project_id);
}

//for inserting the socila links 
if(isset($_POST['updateSocialLinks'])){

$facebook  = $_POST['facebook'];
$twitter  = $_POST['twitter'];
$googleplus  = $_POST['googleplus'];
$linkedin  = $_POST['linkedin'];
$vimeo  = $_POST['vimeo'];
$sm_linkid  = $_POST['sm_linkid'];
$insta = $_POST['insta'];

$query = mysqli_query($conn,"UPDATE `footersocial_medialinks` SET `fb_link`='$facebook',`twitter_link`='$twitter',`gplus_link`='$googleplus',`linkedIn_link`='$linkedin',`vimeo_link`='$vimeo',`instagram_link`='$insta' WHERE sm_linkid=$sm_linkid");
if($query){
  header("location:../add-sociallinks.php?updated=1");
}else 
  header("location:../add-sociallinks.php?updated=0");
}//end isset condition here 


//for inserting AddFooterText paragraph
if(isset($_POST['updateFooterText'])){
    $footer_text_id = $_POST['footer_text_id'];
  $about = test_input($_POST['about']);
  $query = mysqli_query($conn,"UPDATE `footer_text` SET `footer_text`='$about' WHERE footer_text_id = $footer_text_id");
    if($query){
          header("location:../add-sociallinks.php?updatedAboutText=1");
        }else {
          header("location:../add-sociallinks.php?updatedAboutText=0");
        }
}//end isset condition here 


//for uploading the footer logo 
if(isset($_POST['uploadFooterLogo'])){
  $filename = $_FILES['fileupload']['name'];
  $uploadDir = "../uploads/footer-logo/";
    $file = $uploadDir.basename($_FILES['fileupload']['name']);
  $imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
  $footer_logo_id = $_POST['footer_logo_id'];
  if($imageFileType=="jpg" || $imageFileType=="png"){
    if(move_uploaded_file($_FILES['fileupload']['tmp_name'], $file)){
        $query = mysqli_query($conn,"UPDATE `footer_logo` SET`footer_logo_image`='$filename' WHERE footer_logo_id=$footer_logo_id");
       if($query){
          header("location:../add-sociallinks.php?updateLogo=1");
        }else {
          header("location:../add-sociallinks.php?updateLogo=0");
        }
    }
  }else{ //logoMisMatchFormat
    header("location:../add-sociallinks.php?logoMisMatchFormat=1");
  }

}//end isset condition here




//for inserting AddCopyrightText 
if(isset($_POST['UpdateCopyrightText'])){
  $copyright = test_input($_POST['copyright']);
  $copyrightID = $_POST['copyrightID'];
 // echo "UPDATE `footer_copyrighttext` SET `footer_copyrightText`='$copyright' WHERE footer_copyrightId = $copyrightID"; 
  $query = mysqli_query($conn,"UPDATE `footer_copyrighttext` SET `footer_copyrightText`='$copyright' WHERE footer_copyrightId = $copyrightID");
   if($query){
          header("location:../add-sociallinks.php?updatedcopyright=1");
        }else {
          header("location:../add-sociallinks.php?updatedcopyright=0");
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
$footer_link_id = $_POST['footer_link_id'];

 $sql = "UPDATE `footer_links` SET `footer_headingtext`='$heading', `footer_link1`='$link1', `footer_link2`='$link2', `footer_link3`='$link3', `footer_link4`='$link4', `footer_link5`='$link5', `footer_links_type`=1 WHERE footer_link_id=$footer_link_id";
//die;
$query = mysqli_query($conn,$sql);

 if($query){
          header("location:../add-footer-text.php?updatedlinkFooter1=1");
        }else {
          header("location:../add-footer-text.php?updatedlinkFooter1=0");
        }

}//end isset condition 



if(isset($_POST['footer2textLinks'])){
$heading  = $_POST['heading2'];
$link1  = $_POST['link6'];
$link2  = $_POST['link7'];
$link3   = $_POST['link8'];
$link4   = $_POST['link9'];
$link5   = $_POST['link10'];
$footer_link_id = $_POST['footer_link_id'];
 $sql = "UPDATE `footer_links` SET `footer_headingtext`='$heading', `footer_link1`='$link1', `footer_link2`='$link2', `footer_link3`='$link3', `footer_link4`='$link4', `footer_link5`='$link5', `footer_links_type`=2 WHERE footer_link_id=$footer_link_id";
$query = mysqli_query($conn,$sql);
 if($query){
          header("location:../add-footer-text.php?updatedlinkFooter2=1");
        }else {
          header("location:../add-footer-text.php?updatedlinkFooter2=0");
        }
}//emd sset condotpn 



//for inserting the company info in footer 
if(isset($_POST['addComInfo'])){
  $officeaddress  = $_POST['officeaddress'];
$call  = $_POST['call'];
$email  = $_POST['email'];
$com_detail_id = $_POST['com_detail_id'];
$query = mysqli_query($conn,"UPDATE `com_detail` SET `com_address`='$officeaddress',`com_contact`='$call',`com_email`='$email' WHERE com_detail_id=$com_detail_id");
if($query){
          header("location:../add-footer-text.php?AddressUpdated=1");
        }else {
          header("location:../add-footer-text.php?AddressUpdated=0");
        }

}


if(isset($_POST['updateHomepagePara'])){
        $homepage_pid = test_input($_POST['homepage_pid']);

        $paragraph1 = test_input($_POST['paragraph1']);

        $heading = test_input($_POST['heading']);

        $paragraph2 = test_input($_POST['paragraph2']);

       $btnText = test_input($_POST['btnText']);

       $btnLink = test_input($_POST['btnLink']);

       $query=  mysqli_query($conn,"UPDATE `homepage_paragraph` SET `homepage_p1`='$paragraph1',`homepage_p2Heading`='$heading',`homepage_p2`='$paragraph2',`homepage_p2btnText`='$btnText',`homepage_p2btnLink`='$btnLink' WHERE `homepage_pid`=$homepage_pid");
       if($query){
        header("location:../home-page-paragraph.php?updatedPara=1");
       }else{
        header("location:../home-page-paragraph.php?updatedPara=0");
       }
}

//update the admin password 
if(isset($_POST['ChangePasswordForm'])){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confpass = $_POST['confpass'];
    $adminID = $_POST['adminID'];
    $select   = mysqli_query($conn,"SELECT* FROM admin where admin_id =$adminID");
    $rowAdmin = mysqli_fetch_array($select);
    $admin_password= $rowAdmin['admin_password'];
    if($admin_password== $oldpass ){
        if($confpass==$newpass){
            $query = mysqli_query($conn,"UPDATE `admin` SET `admin_password`='$confpass' WHERE admin_id=$adminID");
            if($query){
              header("location:../profile.php?passChange=1");
            }else{
              header("location:../profile.php?passChange=0");
            }
        }else{
         header("location:../profile.php?newPassMisMatch=0");
        }
    }else{
        header("location:../profile.php?oldPassMisMatch=0");
    }
}//end isset condition 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>