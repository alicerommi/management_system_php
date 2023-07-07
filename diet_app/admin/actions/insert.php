<?php
//it will includes all the insert operation 
include '../../includes/database_connection.php';
if(isset($_POST['AddCate'])){
		$categoryName = $_POST['categoryName'];
		//check the category name
		$check = mysqli_query($conn,"SELECT* FROM category where category_name='$categoryName'");
		if(mysqli_num_rows($check)>0){
			header("location:../categories.php?alreadyExists=1");
		}else{
					$query = mysqli_query($conn,"INSERT INTO `category`( `category_name`,  `category_recordDate`,`category_active`) VALUES ('$categoryName',CURRENT_TIME,1)");
					if($query){
						header("location:../categories.php?cateAdd=1");
					}else{
					header("location:../categories.php?cateAdd=0");
					}
	}
}//end AddCate
//add an item 

if(isset($_POST['addItem'])){
$itemName = test_input($_POST['itemName']);
$choosenCate = $_POST['choosenCate'];
$checkItem = mysqli_query($conn,"SELECT* FROM items where item_name='$itemName' and category_id=$choosenCate and item_active=1");
		if(mysqli_num_rows($checkItem)>0){
			header("location:../add-items.php?itemExists=1");
		}
	else{
		$query = mysqli_query($conn,"INSERT INTO `items`( `category_id`, `item_name`, `item_recordDate`, `item_active`) VALUES ($choosenCate,'$itemName',CURRENT_TIME,1)");
			if($query){
				header("location:../add-items.php?itemAdded=1");
			}else{
				header("location:../add-items.php?itemAdded=0");
			}
		}

}//end addItem isset here


//add a plan here

if(isset($_POST['addPlan']))
{

	$imageName= '';
	$planName    = test_input($_POST['planName']);
		$planDescription = mysqli_escape_string($conn,$_POST['planDescription']);
		$planShortDescription = mysqli_escape_string($conn,$_POST['planShortDescription']);
	if(!empty($_FILES['planImage']['name'])){
			$imageName = $_FILES['planImage']['name'];
			$path = "../uploads/";
			$target_file = $path.basename($_FILES['planImage']['name']);
			$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($extension=="png" || $extension=="jpg" || $extension=="jpeg"){
			if(move_uploaded_file($_FILES['planImage']['tmp_name'], $target_file)){
				$query = mysqli_query($conn,"INSERT INTO `dietplan`( `dietplan_name`, `dietplan_description`, `dietplan_active`,`dietplan_shortdescription`,`dietplan_image`,`dietplan_recordDate`) VALUES ('$planName','$planDescription',1,'$planShortDescription','$imageName',CURRENT_TIME)");
				$lastId = mysqli_insert_id($conn);
				if($query)
						header("location:../add-planfilter.php?planAdded=1&dietplan_id=$lastId");
					else
						header("location:../add-planfilter.php?planAdded=0&dietplan_id=$lastId");
				}//end move uploaded file check
		}else{
				header("location:../add-plan.php?imageSupport=0&planAdded=1&dietplan_id=$lastId");
		}//end image type check here

		
	}	else{
		$query = mysqli_query($conn,"INSERT INTO `dietplan`( `dietplan_name`, `dietplan_description`, `dietplan_active`,`dietplan_shortdescription`,`dietplan_image`,`dietplan_recordDate`) VALUES ('$planName','$planDescription',1,'$planShortDescription','$imageName',CURRENT_TIME)");
				$lastId = mysqli_insert_id($conn);
				if($query)
						header("location:../add-planfilter.php?planAdded=1&dietplan_id=$lastId");
					else
						header("location:../add-planfilter.php?planAdded=0&dietplan_id=$lastId");
		}//end else condition here 

}//end addplan here


//for inserting the dietplan detail 
if(isset($_POST['addPlanDetail'])){
$plandetailsName = test_input($_POST['plandetailsName']);
$choosenPlan = test_input($_POST['choosenPlan']);
$choosenItem = test_input($_POST['choosenItem']);
$plandetailsDescription = mysqli_escape_string($conn,$_POST['plandetailsDescription']);

$checkItem = mysqli_query($conn,"SELECT* FROM plandetail WHERE item_id=$choosenItem AND dietplan_id=$choosenPlan");
if(mysqli_num_rows($checkItem)>0){
	header("location:../add-plandetail.php?alreadyExists=1");
}
	else{
			$query = mysqli_query($conn,"INSERT INTO `plandetail`(`plandetail_name`, `plandetail_description`, `dietplan_id`, `item_id`, `plandetails_active`,`plandetail_recordDate`) VALUES ('$plandetailsName','$plandetailsDescription',$choosenPlan,$choosenItem,1,CURRENT_TIME)");
			if($query)
				header("location:../add-plandetail.php?added=1");
			else
				header("location:../add-plandetail.php?added=0");
			}
}


//for inserting the filters
if(isset($_POST['addPlanFilter'])){
		$choosenPlan = $_POST['choosenPlan'];
		$choosenItem = $_POST['choosenItem'];
		$choosenFilter = $_POST['choosenFilter'];
		$check = mysqli_query($conn,"SELECT* FROM planfilter WHERE dietplan_id=$choosenPlan AND item_id = $choosenItem AND planfilter_active=1");
		if(mysqli_num_rows($check)>0){
			echo "2";
				//header("location:../add-planfilter.php?alreadyExists=1");
		}else{
			$insert = mysqli_query($conn,"INSERT INTO `planfilter`( `item_id`, `dietplan_id`, `flag`, `planfilter_recordDate`, `planfilter_active`) VALUES ($choosenItem,$choosenPlan,'$choosenFilter',CURRENT_TIME,1)");
			if($insert){
				echo "1";
			}else{
				echo "0";
			}
		}


}//end addPlanFilter


//for adding the images in sldier

if(isset($_POST['addSliderImage'])){
			$image_heading =mysqli_escape_string($conn,$_POST['sliderHeading']);
			$image_para=mysqli_escape_string($conn,$_POST['sliderParagraph']);
			$imageName = $_FILES['sliderImage']['name'];
			$path = "../uploads/slider_images/";
			$target_file = $path.basename($_FILES['sliderImage']['name']);
			$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($extension=="png" || $extension=="jpg" || $extension=="jpeg"){
			if(move_uploaded_file($_FILES['sliderImage']['tmp_name'], $target_file)){
				$query = mysqli_query($conn,"INSERT INTO `slider_images`(`image_name`,`image_heading`,`image_para`,`image_recordDate`) VALUES ('$imageName','$image_heading','$image_para',NOW())");
				if($query){
					header("location:../slider-images.php?imageAdded=1");
				}
				else{
					header("location:../slider-images.php?imageAdded=0");
				}
			}
		}else{
			header("location:../slider-images.php?imageSupport=0");
		}
}//end addSliderImage here




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>