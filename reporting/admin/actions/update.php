<?php
include_once "../../includes/config.php";
///for editing the action plan
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if(isset($_POST['editAP'])){

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
		
		$actionplanID = $_POST['actionPlanID'];

		//now updating the action plan
		$query = "UPDATE `actionplan` SET `ap_title`='$titletab1',`ap_assignedto`='$assignedTotab1',`ap_description`='$descriptiontab1',`ap_status`='$statustab1',`ap_DueDate`='$dueDatetab1',`ap_level1DueDate`='$dueDatetab2Col1',`ap_level1Status`='$statustab2Col1',`ap_level1requirements`='$requirementstab2Col1',`ap_level2DueDate`='dueDatetab2Col2',`ap_level2Status`='$statustab2Col2',`ap_level2requirements`='$requirementstab2Col2',`ap_level3DueDate`='$dueDatetab2Col3',`ap_level3Status`='$statustab2Col3',`ap_level3requirements`='$requirementstab2Col3',`ap_kpiName`='$kpinameTab3',`ap_kpibaseValue`='$basevalueTab3',`ap_targetValue`='$targetvalueTab3',`ap_finalValue`='$finalvalueTab3' WHERE `ap_id`=$actionplanID";
		// echo $query;
		$result = mysqli_query($con,$query);
		if($result){
				header("location:../editactionplanDetails.php?id=".$actionplanID."&info=1");
		}else{
			header("location:../editactionplanDetails.php?id=$actionplanID&info=0");
		}	
		
}
?>
