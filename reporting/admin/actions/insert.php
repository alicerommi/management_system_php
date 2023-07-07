<?php
include_once "../../includes/config.php";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['addDealer'])){
	$name=test_input($_POST['name']);
	$email=test_input($_POST['email']);
	$pw=test_input($_POST['password']);
	$nameOfResponsibePerson = test_input($_POST['nameOfResponsibePerson']);
	$region = mysqli_escape_string($con,$_POST['region']);
	$address = mysqli_escape_string($con,$_POST['address']);
	$dealercode="DLR".rand(100,500);
	//check the code is already exists or not 
	$checkCode = mysqli_query($conn,"SELECT* FROM dealers WHERE dealer_code=$dealercode");
	while(mysqli_num_rows($checkCode)>0){
		$dealercode="DLR".rand(100,500);
		$checkCode = mysqli_query($conn,"SELECT* FROM dealers WHERE dealer_code=$dealercode");
	}
	$query=mysqli_query($con,"INSERT INTO dealers(dealer_name,dealer_email,dealer_password,dealer_code,dealer_region,dealer_address,dealer_nameOfResponsibePerson) VALUES('$name','$email','$pw','$dealercode','$region','$address','$nameOfResponsibePerson')");
	if($query){
	header("Location: ../newdealer.php?dealer=added");
	}
	else{
	echo "There was this error: " . mysqli_query($con);
	}
}

///for inserting the action plan

if(isset($_POST['submit'])){

		//count the number of files.. for col1
		$total1 = count($_FILES['uploadTab2Col1']['name']);
		//count the number of files.. for col2
		$total2 = count($_FILES['uploadTab2Col2']['name']);
		//count the number of files.. for col3
		$total3 = count($_FILES['uploadTab2Col3']['name']);
		//extension of file checking
		$allowedExts = array(
			  "pdf", 
			  "doc", 
			  "docx",
			  "xlsx",
			  "jpg",
			  "csv"
		); 
		$filesName1 = $_FILES['uploadTab2Col1']['name'];
		$filesName2 = $_FILES['uploadTab2Col2']['name'];
		$filesName3 = $_FILES['uploadTab2Col3']['name'];
		//get extension of files and pushing it into an array 	
		//for files 1 
		$ext1 = array();
		//as we are saving the all file names in to table field so we need to concatenate the files name
		$attachmentsKEY = "&key123456789=";
		$attachments1 = "";
		$attachments2 = "";
		$attachments3 = "";
		//where the files or attachments will saved ..(Storage Folder)
		$target_dir = "../actionPlanAttachments/";
		
		
		for($a=0;$a<$total1;$a++){
				//saving all the attached files into a string later we will push this string in to the table field.. 
				$attachments1 = $attachments1.$attachmentsKEY.$filesName1[$a];
				$target_file = $target_dir . basename($_FILES["uploadTab2Col1"]["name"][$a]);
				$newFilePath1 =$_FILES['uploadTab2Col1']['name'][$a];
				// $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
				$extension = pathinfo($newFilePath1, PATHINFO_EXTENSION);

						//check point for extension of files
				 
					if(in_array($extension,$allowedExts)){
						//moving into directory
						if (move_uploaded_file($_FILES["uploadTab2Col1"]["tmp_name"][$a], $target_file)){
						  					echo "The file ". basename( $_FILES["uploadTab2Col1"]["name"][$a]). " has been uploaded.";
										}else{
											echo "error";
										}	

							}else{

								echo "The File is not supported";
							
							}
		}//end first loop 
		
		//for the tab2col2 attchments 
		for($b=0;$b<$total2;$b++){
				//saving all the attached files into a string later we will push this string in to the table field.. 
				$attachments2 = $attachments2.$attachmentsKEY.$filesName2[$b];
				$target_file = $target_dir . basename($_FILES["uploadTab2Col2"]["name"][$b]);
				$newFilePath2 =$_FILES['uploadTab2Col2']['name'][$b];
				// $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
				$extension = pathinfo($newFilePath2, PATHINFO_EXTENSION);
				//echo $extension;
						//check point for extension of files
					if(in_array($extension,$allowedExts)){
						//moving into directory
						if (move_uploaded_file($_FILES["uploadTab2Col2"]["tmp_name"][$b], $target_file)){
						  					echo "The file ". basename( $_FILES["uploadTab2Col2"]["name"][$b]). " has been uploaded.";
										}else{
											echo "error";
										}
							}else{
								echo "The File is not supported";
							}
		}//end second loop 

		//end for the tab2col2 attachments

		//for the tab2col3 attachments 
		for($c=0;$c<$total3;$c++){
				$attachments3 = $attachments3.$attachmentsKEY.$filesName3[$c];
				$target_file = $target_dir . basename($_FILES["uploadTab2Col3"]["name"][$c]);
				$newFilePath3 =$_FILES['uploadTab2Col3']['name'][$c];
				// $tempFilePath = "../".$_FILES['uploadTab2Col1']['name'][$a];
				$extension = pathinfo($newFilePath3, PATHINFO_EXTENSION);
				
						//check point for extension of files
					if(in_array($extension,$allowedExts)){
						//moving into directory
						if (move_uploaded_file($_FILES["uploadTab2Col3"]["tmp_name"][$c], $target_file)){
						  					echo "The file ". basename( $_FILES["uploadTab2Col3"]["name"][$c]). " has been uploaded.";
										}else{
											echo "error";
										}	

							}else{

								echo "The File is not supported";
							
							}
		}//end third loop 

    		//for tab1 
    	$titletab1 = mysqli_escape_string($con,test_input($_POST['titletab1']));
    	$assignedTotab1 = $_POST['assignedTotab1'];
    	$statustab1 = $_POST['statustab1'];
    	$descriptiontab1= mysqli_escape_string($con,test_input($_POST['descriptiontab1']));
    	$dueDatetab1 = $_POST['dueDatetab1'];
    	//for tab2 .. contains three cols
    		//for col1
    	$dueDatetab2Col1 = $_POST['dueDatetab2Col1'];
    	$statustab2Col1 = $_POST['statustab2Col1'];
    	$requirementstab2Col1 = mysqli_escape_string($con,$_POST['requirementstab2Col1']);
    	$filestab2Col1 = $attachments1;

    		//for col2
    	$dueDatetab2Col2 = $_POST['dueDatetab2Col2'];
    	$statustab2Col2 = $_POST['statustab2Col2'];
    	$requirementstab2Col2 = mysqli_escape_string($con,$_POST['requirementstab2Col2']);
    	$filestab2Col2 = $attachments2;
	    	//for col3 
    	$dueDatetab2Col3 = $_POST['dueDatetab2Col3'];
    	$statustab2Col3 = $_POST['statustab2Col3'];
    	$requirementstab2Col3 = mysqli_escape_string($con,$_POST['requirementstab2Col3']);
    	$filestab2Col3 = $attachments3;
    		//for tab3 
    	$kpinameTab3 = $_POST['kpinameTab3'];
		//$kpivalueTab3 = $_POST['kpivalueTab3'];
		$basevalueTab3 = $_POST['basevalueTab3'];
		$targetvalueTab3 = $_POST['targetvalueTab3'];
		$finalvalueTab3 = $_POST['finalvalueTab3'];
		
		//now inserting data into table
		$query = "INSERT INTO `actionplan`(`ap_title`, `ap_assignedto`, `ap_description`, `ap_status`, `ap_DueDate`, `ap_level1DueDate`, `ap_level1Status`, `ap_level1requirements`, `ap_level1attachFiles`, `ap_level2DueDate`, `ap_level2Status`, `ap_level2requirements`, `ap_level2attachFiles`, `ap_level3DueDate`, `ap_level3Status`, `ap_level3requirements`, `ap_level3attachFiles`, `ap_kpiName`,`ap_kpibaseValue`, `ap_targetValue`, `ap_finalValue`, `ap_recordDate`,`added_by`) VALUES ('$titletab1','$assignedTotab1','$descriptiontab1','$statustab1','$dueDatetab1','$dueDatetab2Col1','$statustab2Col1','$requirementstab2Col1','$attachments1','$dueDatetab2Col2','$statustab2Col2','$requirementstab2Col2','$attachments2','$dueDatetab2Col3','$statustab2Col3','$requirementstab2Col3','$attachments3','$kpinameTab3','$basevalueTab3','$targetvalueTab3','$finalvalueTab3',NOW(),'admin')";
		// echo $query;
		$result = mysqli_query($con,$query);
		if($result){
				header("location:../addactionplan.php?info=1");
		}else{
			header("location:../addactionplan.php?info=0");
		}	
		// print_r($_FILES['uploadTab2Col1']['name']);
	
		// print_r($_FILES['uploadTab2Col2']['name']);

		// print_r($_FILES['uploadTab2Col3']['name']);	
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		// die;
}
?>


