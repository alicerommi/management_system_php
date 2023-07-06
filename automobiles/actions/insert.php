<?php session_start();
	include '../admin/includes/database_connection.php';
	$img_dir = "../uploads/vehicles_images/";
	$vid_dir = "../uploads/vehicles_video/";
	$logo_dir = "../uploads/customer_business_logos/";
	// print_r($_POST);
	// print_r($_FILES);
	// die;




if(isset($_FILES['insert_v_images'])){
	//$vehicle_ad_id = $_POST['vehicle_ad_id'];
	$counter = count($_FILES['insert_v_images']['name']);
	
			$arrrrr = array();
			$str = "";
				for($i=0;$i<$counter;$i++){
					 $id = getName(rand(2,9));
					$img =   $_FILES['insert_v_images']['name'][$i];
					$img_type =strtolower(pathinfo($img, PATHINFO_EXTENSION));

					$image_name =	"insert_img_".$i."_".getName(rand(2,20)).".".$img_type;
					if(move_uploaded_file($_FILES['insert_v_images']['tmp_name'][$i], $img_dir.$image_name)){
						//$a= mysqli_query($conn,"INSERT INTO `vehicle_images`(`vehicle_image_name`, `vehicle_ad_id`) VALUES ('$image_name',$vehicle_ad_id)");
						//	$last_id = mysqli_insert_id($conn);
						//	$vehicle_image_id = $last_id;
						//array_push($arrrrr,$img_dir.$image_name.replace("..",''));	
							$src = "uploads/vehicles_images/".$image_name;
							$str = $str. '<img src="'.$src.'" style="width: 100px; height: 120px;" id="img_'.$id.'"><button type="button" id="del_btn_'.$id.'" class="btn btn-danger btn-sm btn_img"  ><i class="fas fa-trash"></i></button><input type="hidden" value="'.$image_name.'" id="input_'.$id.'" name="vehicles_images[]">';

					}
					$arr = array("error"=>0,"success"=>1,"html"=>$str,"total_uploaded_files"=>$counter);
								    	// die;
			}//end image loop
				echo json_encode($arr);
	}//end insert_v_images
	








	// error_reporting(1);
	if(isset($_POST['add_vehicle_form'])){
					$vehicle_manufacture_id = $_POST['vehicle_manufacture'];
					//$vehicle_model = $_POST['vehicle_model']
					$vehicle_model = $_POST['vehicle_model'];
					
					$customer_id = $_SESSION['gbh2_customer_id'];
				    $vehicle_type = $_POST['vehicle_type'];
				    $year = $_POST['year'];
				    $hand = $_POST['hand'];
				    $km = $_POST['km'];
				    $test_to_date = $_POST['test_to_date'];
				    $license_level = $_POST['license_level'];
				    $current_own = $_POST['current_own'];
				    $previous_own = $_POST['previous_own'];
				    $ownership = $_POST['ownership'];
				    $tire_condition = $_POST['tire_condition'];
				    $accidents = $_POST['accidents'];
				    $after_treatment_with_oil = $_POST['after_treatment_with_oil'];
				    $seller_invoice = $_POST['seller_invoice'];
				  
				    $v_issue = $_POST['v_issue'];
				    $free_text =  mysqli_escape_string($conn,$_POST['free_text']);
				    $price = $_POST['price'];

				    $sql ="INSERT INTO `vehicles_ads`(`vehicle_type_id`, `vehicle_model_id`,`vehicle_manufacture_id`, `vehicle_ad_year`, `vehicle_ad_hand`, `vehicle_ad_km`, `vehicle_ad_test_to_date`, `vehicle_ad_license_level`, `vehicle_ad_current_ownership`, `vehicle_ad_previous_ownership`, `vehicle_ad_ownership_type`, `vehicle_ad_tire_condition`, `vehicle_ad_accidents`, `vehicle_treatment_with_oil`, `vehicle_ad_have_seller_invoice`, `vehicle_ad_vehicle_issue`, `vehicle_ad_free_text`, `customer_id`,`vehicle_ad_added_timestamp`,`vehicle_ad_price`) VALUES ($vehicle_type,$vehicle_model,$vehicle_manufacture_id,'$year','$hand','$km','$test_to_date','$license_level','$current_own','$previous_own','$ownership','$tire_condition','$accidents','$after_treatment_with_oil','$seller_invoice','$v_issue','$free_text',$customer_id,NOW(),'$price')";
				    $query = mysqli_query($conn,$sql);

				    if($query)
				   	{	

				   			 $last_id = mysqli_insert_id($conn);
				   			// print_r($_FILES);
				   			// die;
				   			//  $size = sizeof($_FILES['vehicles_images']['name']);
						    // for($i=0;$i<$size;$i++){
								  //   	$img =   $_FILES['vehicles_images']['name'][$i];
								  //   	$img_type =strtolower(pathinfo($img, PATHINFO_EXTENSION));
								  //   	$image_name =	"v_img_".$last_id."_".$i."_".getName(rand(2,20)).".".$img_type;
								  //   	if(move_uploaded_file($_FILES['vehicles_images']['tmp_name'][$i], $img_dir.$image_name)){
								  //   		$a= mysqli_query($conn,"INSERT INTO `vehicle_images`(`vehicle_image_name`, `vehicle_ad_id`) VALUES ('$image_name',$last_id)");
								  //   		if(!$a){echo mysqli_error($conn);}
								  //   	}else{
								  //   		echo "Img Error uploading";
								  //   	}
								  //   	// die;
						    // }//end image loop

				   			 $size = sizeof($_POST['vehicles_images']);
				   			 for($i=0;$i<$size;$i++){
				   			 		$name = $_POST['vehicles_images'][$i];
				   			 		$a = mysqli_query($conn,"INSERT INTO `vehicle_images`(`vehicle_image_name`, `vehicle_ad_id`) VALUES ('$name',$last_id)");
				   			 }//end for loop here


						    if(!empty($_FILES['video_file']['name'])){
							    $video_file = $_FILES['video_file']['name'];
							    $video_file_ext = strtolower(pathinfo($video_file, PATHINFO_EXTENSION));
							    $video_name = $last_id."vehicle_video_".getName(rand(0,50)).".".$video_file_ext;
							    if(move_uploaded_file( $_FILES['video_file']['tmp_name'], $vid_dir.$video_name)){
							    	$a = mysqli_query($conn,"INSERT INTO `vehicle_videos`(`vehicle_video_name`, `vehicle_ad_id`) VALUES ('$video_name',$last_id)");
							    	if(!$a){echo mysqli_error($conn);}
							    }else{
							    		echo "Video Error uploading";
						    	}
						   }
						    header("Location:../add_vehicle.php?added=1");
					}//end query check here
					else{
						header("Location:../add_vehicle.php?added=0");
					}
	}  //end add_vehicle_form

if(isset($_POST['business_address'])){
	
	$customer_id = $_SESSION['gbh2_customer_id'];
	$have_img = 0;
	if(!empty($_FILES['business_logo']['name']))
	{
		$have_img = 1;
		$business_logo= $_FILES['business_logo']['name'];
		$img_type =strtolower(pathinfo($business_logo, PATHINFO_EXTENSION));
		$image_name =	$customer_id."business_logo_".getName(rand(2,20)).".".$img_type;
	}	
				$business_address = $_POST['business_address'];
				if($have_img==1){
					if(move_uploaded_file( $_FILES['business_logo']['tmp_name'], $logo_dir.$image_name)){
						echo $sql = "UPDATE `customers` SET `customer_business_logo`='$image_name',`customer_business_address`='$business_address' WHERE `customer_id`=$customer_id";
												$update  = mysqli_query($conn,$sql);
					}else{
						echo "error uploading";
					}
					if($update){
					header("Location:../profile_settings.php?updated_de=1");
					}else
					{header("Location:../profile_settings.php?updated_de=0");}
				}else{
					$sql ="update customers set customer_business_address='$business_address' where customer_id=$customer_id";
					$update  = mysqli_query($conn,$sql);
					if($update){
					header("Location:../profile_settings.php?updated_de=1");
					}else
					{header("Location:../profile_settings.php?updated_de=0");}
				}	
}	  //end savesettings


function getName($n) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		    $randomString = ''; 
		  
		    for ($i = 0; $i < $n; $i++) { 
		        $index = rand(0, strlen($characters) - 1); 
		        $randomString .= $characters[$index]; 
		    } 
		  
		    return $randomString; 
} 
?>