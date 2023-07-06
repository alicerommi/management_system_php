<?php session_start();
	include '../admin/includes/database_connection.php';
		$img_dir = "../uploads/vehicles_images/";
	$vid_dir = "../uploads/vehicles_video/";


	if(isset($_GET['remove_logo'])){
			$customer_id = $_SESSION['gbh2_customer_id'];
			$sql = "update customers set customer_business_logo='' where customer_id=$customer_id";
			$update = mysqli_query($conn,$sql);
			if($update){
					header("Location:../profile_settings.php?removed=1");
			}else{
				header("Location:../profile_settings.php?removed=1");
			}
	}

	if(isset($_POST['update_customer_password'])){
		$current_pass = $_POST['current_pass'];
		$new_pass = $_POST['new_pass'];
		$confi_new_pass = $_POST['confi_new_pass'];

		$customer_id = $_SESSION['gbh2_customer_id'];
		$fetch_customer_details = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
		$row = mysqli_fetch_array($fetch_customer_details);
		if($row['customer_password']===$current_pass){
			if ($new_pass == $confi_new_pass){
				if(strlen($new_pass)>7){
						$update = mysqli_query($conn,"update customers set customer_password='$new_pass' where customer_id = $customer_id");
						if($update){
							header("Location:../profile_settings.php?udpated_pass=1");
						}else{
							header("Location:../profile_settings.php?udpated_pass=0");
						}
				}else{
						header("Location:../profile_settings.php?new_pass_lenght_not_greater=1");
				}
			}else{
				header("Location:../profile_settings.php?new_not_match=1");
			}
		}else{
			header("Location:../profile_settings.php?old_not_match=1");
		}
	} //end update_customer_password


	if(isset($_POST['update_vehicle_form'])){
					$vehicle_ad_id =$_POST['vehicle_ad_id'];

					$customer_id = $_SESSION['gbh2_customer_id'];
				    //$vehicle_type = $_POST['vehicle_type'];
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

				    $vehicle_type = $_POST['vehicle_type'];
					$vehicle_manufacture = $_POST['vehicle_manufacture'];
					$vehicle_model = $_POST['vehicle_model'];


				    $sql= "UPDATE `vehicles_ads` SET `vehicle_type_id`=$vehicle_type,`vehicle_model_id`=$vehicle_model,`vehicle_manufacture_id`=$vehicle_manufacture,`vehicle_ad_year`='$year',`vehicle_ad_hand`='$hand',`vehicle_ad_km`='$km',`vehicle_ad_test_to_date`='$test_to_date',`vehicle_ad_license_level`='$license_level',`vehicle_ad_current_ownership`='$current_own',`vehicle_ad_previous_ownership`='$previous_own',`vehicle_ad_ownership_type`='$ownership',`vehicle_ad_tire_condition`='$tire_condition',`vehicle_ad_accidents`='$accidents',`vehicle_treatment_with_oil`='$after_treatment_with_oil',`vehicle_ad_have_seller_invoice`='$seller_invoice',`vehicle_ad_vehicle_issue`='$v_issue',`vehicle_ad_free_text`='$free_text',`vehicle_ad_price`='$price',`vehicle_ad_updated_timestamp`=NOW() WHERE vehicle_ad_id=$vehicle_ad_id and customer_id =$customer_id";
				  		$update = mysqli_query($conn,$sql); 	
				  	if($update){
				  		$last_id = $vehicle_ad_id;
				  			 // 	if(!empty($_FILES['vehicles_images']['name'])){
				  				// 	$size = sizeof($_FILES['vehicles_images']['name']);
				  					
				  				// 	 for($i=0;$i<$size;$i++){
										// 	    	$img =   $_FILES['vehicles_images']['name'][$i];
										// 	    	$img_type =strtolower(pathinfo($img, PATHINFO_EXTENSION));
										// 	    	$image_name =	"v_updated_img_".$last_id."_".$i."_".getName(rand(2,20)).".".$img_type;
										// 	    	if(move_uploaded_file($_FILES['vehicles_images']['tmp_name'][$i], $img_dir.$image_name)){
										// 	    		$a= mysqli_query($conn,"INSERT INTO `vehicle_images`(`vehicle_image_name`, `vehicle_ad_id`) VALUES ('$image_name',$last_id)");
										// 	    		if(!$a){echo mysqli_error($conn);}
										// 	    	}else{
										// 	    		echo "Img Error uploading";
										// 	    	}
								  //   	// die;
						    // 			}//end image loop
				  				// }

							  	if(!empty($_FILES['video_file']['name'])){
							  				$video_file = $_FILES['video_file']['name'];
										    $video_file_ext = strtolower(pathinfo($video_file, PATHINFO_EXTENSION));
										    $video_name = $last_id."vehicle_video_".getName(rand(5,50)).".".$video_file_ext;
										    if(move_uploaded_file( $_FILES['video_file']['tmp_name'], $vid_dir.$video_name)){
										    	$a = mysqli_query($conn,"INSERT INTO `vehicle_videos`(`vehicle_video_name`, `vehicle_ad_id`) VALUES ('$video_name',$last_id)");
										    	if(!$a){echo mysqli_error($conn);}
										    }else{
										    		echo "Video Error uploading";
										    }
							  	}
				  		header("Location:../update_vehicle.php?updated=1&vehicle_ad_id=".$vehicle_ad_id);
				  	}else{
				  		header("Location:../update_vehicle.php?updated=0&vehicle_ad_id=".$vehicle_ad_id);
				  	}


				  
	}


if(isset($_GET['sold_vehicles_details'])){
	$sold_date =date("Y-m-d");
	$ad_id = $_GET['vehicle_ad_id'];
	$sold_time = date("h:i:s");
	$customer_id = $_SESSION['gbh2_customer_id'];
$sql = "update vehicles_ads set vehicle_ad_sold_status=1,vehicle_ad_sold_date='$sold_date',vehicle_ad_sold_time='$sold_time' where vehicle_ad_id=$ad_id and customer_id=$customer_id";
///	die;
	$update = mysqli_query($conn,$sql);
	if($update){
		header("Location:../sold_vehicles.php?done=1");
	}else{
		header("Location:../sold_vehicles.php?done=0");
	}
}


if(isset($_FILES['update_v_images'])){
	$vehicle_ad_id = $_POST['vehicle_ad_id'];
	$counter = count($_FILES['update_v_images']['name']);
	//die;

	$str = "";
	$count = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id=$vehicle_ad_id");
	if(mysqli_num_rows($count)+$counter>8){
		$arr = array("msg"=> "Max images limit is 8","error"=>1,"success"=>0);
	}else{
			$arrrrr = array();
					 for($i=0;$i<$counter;$i++){
					$img =   $_FILES['update_v_images']['name'][$i];
					$img_type =strtolower(pathinfo($img, PATHINFO_EXTENSION));
					$image_name =	"v_updated_img_".$vehicle_ad_id."_".$i."_".getName(rand(2,20)).".".$img_type;
					if(move_uploaded_file($_FILES['update_v_images']['tmp_name'][$i], $img_dir.$image_name)){
						$a= mysqli_query($conn,"INSERT INTO `vehicle_images`(`vehicle_image_name`, `vehicle_ad_id`) VALUES ('$image_name',$vehicle_ad_id)");
							$last_id = mysqli_insert_id($conn);
							$vehicle_image_id = $last_id;
						//array_push($arrrrr,$img_dir.$image_name.replace("..",''));	
							$src = "uploads/vehicles_images/".$image_name;
						$str =$str. '<div class="col-md-3" id="img_div'.$vehicle_image_id.'"><img src="'.$src.'" width="200px;" height="200px" id="'.$vehicle_image_id.'"><button type="button" class="btn btn-danger btn-sm btn_img" style="margin-top: 20px; margin-bottom: 20px;" id="'.$vehicle_image_id.'" data-id="'.$vehicle_ad_id.'"><i class="fas fa-trash"></i></button></div>';

					}
					$arr = array("error"=>0,"success"=>1,"html"=>$str);
								    	// die;
			}//end image loop

	}
	echo json_encode($arr);

}

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