<?php session_start();
	include '../admin/includes/database_connection.php';
	include '../translations/he.php';
	// use PHPMailer\PHPMailer\PHPMailer;
 //    use PHPMailer\PHPMailer\Exception;
 //    include '../includes/php_mailer/autoload.php';
    function to_english($str){
  				return $str;
	}

	if(isset($_POST['fetch_manufacture_of_vehicle'])){
		
		$noting = to_hebrew("Nothing Selected",$language_array);
		$vehicle_type_id = $_POST['vehicle_type_id'];
		$sql = "SELECT * FROM `vehicles_models` join vehicles_manufacture on vehicles_models.vehicle_manufacture_id = vehicles_manufacture.vehicle_manufacture_id and vehicles_models.vehicle_type_id=$vehicle_type_id";
		
					$query = mysqli_query($conn,$sql);
					echo '<option disabled selected>'.$noting.'</option>';
					
					$arr = array();
					if(mysqli_num_rows($query)>0)
						echo '<option value="0">הכל</option>';
					while($rr = mysqli_fetch_array($query))
					{

						$vehicle_manufacture_id = $rr['vehicle_manufacture_id'];
						$vehicle_manufacture_name = $rr['vehicle_manufacture_name'];
						if(!in_array($vehicle_manufacture_name, $arr))
							{echo '<option value="'.$vehicle_manufacture_id.'">'.$vehicle_manufacture_name.'</option>';
								array_push($arr, $vehicle_manufacture_name);
							}
					}
		
	}

	if(isset($_POST['fetch_models_of_vehicle'])){
		$vehicle_manufacture_id = $_POST['vehicle_manufacture_id'];
		$vehicle_type_id = $_POST['vehicle_type_id'];
		  $sql = "SELECT * FROM `vehicles_models` join vehicles_manufacture on vehicles_models.vehicle_manufacture_id = vehicles_manufacture.vehicle_manufacture_id and vehicles_models.vehicle_type_id=$vehicle_type_id and vehicles_models.vehicle_manufacture_id=$vehicle_manufacture_id order by vehicles_models.vehicles_model_id desc" ;
		 

				$query = mysqli_query($conn,$sql);
				   echo '<option value="0">הכל</option>';
					while($rr = mysqli_fetch_array($query))
					{
						$vehicles_model_id = $rr['vehicles_model_id'];
						$vehicles_model_name = $rr['vehicles_model_name'];
						echo '<option value="'.$vehicles_model_id.'">'.$vehicles_model_name.'</option>';		
					}
	}


	// if(isset($_POST['apply_manufacture_filter'])){
	// 			$ForSale = to_english("For Sale");
 //            $seller_name_keyword  = to_english("seller name");
 //            $seller_address_keyword  = to_english("seller address");
 //            $view_details_btn =  to_english("more details");

 //            $vehicle_type=$_POST['vehicle_type'];
	// 			$vehicle_manufacture=$_POST['vehicle_manufacture'];

	// } //end apply_manufacture_filter

	
	if(isset($_POST['filter_home_page'])){

		  $ForSale = to_english("For Sale");
            $seller_name_keyword  = to_english("seller name");
            $seller_address_keyword  = to_english("seller address");
            $view_details_btn =  to_english("more details");
            

           
				$vehicle_type=$_POST['vehicle_type'];
				$vehicle_manufacture=$_POST['vehicle_manufacture'];


				$vehicle_model=$_POST['vehicle_model'];
				$gbh2_customer_id = $_SESSION['gbh2_customer_id'];
				
				$sql = "SELECT * FROM `vehicles_ads` join customers on  vehicles_ads.customer_id = customers.customer_id  and vehicles_ads.vehicle_ad_sold_status=0 and customers.customer_block=0 and vehicles_ads.vehicle_type_id=$vehicle_type";

				if($vehicle_manufacture!=0){
					$sql = $sql." "."and vehicles_ads.vehicle_manufacture_id=$vehicle_manufacture";
				}


				if($vehicle_model!=0){
					$sql =  $sql."and vehicles_ads.vehicle_model_id=$vehicle_model ";
				}



				$sql = $sql." order by vehicles_ads.vehicle_ad_id desc";
				// echo $sql;
				// die;
				$query = mysqli_query($conn,$sql);
				
				$html = "";
				if(mysqli_num_rows($query)>0){
					  $test_t0_date = to_hebrew("Test To Date",$language_array);
						 $ForSale = to_hebrew("For Sale",$language_array);
							while($row  = mysqli_fetch_array($query)){
                  						$vehicle_ad_id = $row['vehicle_ad_id'];
		                              $vehicle_type_id_db =$row['vehicle_type_id'];
		                              $vehicle_ad_sold_status  =$row['vehicle_ad_sold_status'];
		                              $vehicle_ad_sold_status_words = $ForSale;
		                              // if($vehicle_ad_sold_status==1){
		                              //     $vehicle_ad_sold_status_words = "Sold";
		                              // }
		                              $vehicle_manufacture_id =$row['vehicle_manufacture_id'];
		                              $vehicle_ad_added_timestamp = date("d-m-Y",strtotime($row['vehicle_ad_added_timestamp']));
		                              $vehicle_ad_year = $row['vehicle_ad_year'];
		                              $vehicle_ad_hand = $row['vehicle_ad_hand'];
		                              $vehicle_ad_km = $row['vehicle_ad_km'];
		                              $vehicle_ad_test_to_date = $row['vehicle_ad_test_to_date']; 
		                              $vehicle_ad_license_level = $row['vehicle_ad_license_level'];
		                              $vehicle_ad_current_ownership = $row['vehicle_ad_current_ownership'];
		                              $vehicle_ad_previous_ownership = $row['vehicle_ad_previous_ownership'];
		                              $vehicle_ad_ownership_type = $row['vehicle_ad_ownership_type'];
		                              $vehicle_ad_tire_condition = $row['vehicle_ad_tire_condition'];
		                              $vehicle_ad_accidents = $row['vehicle_ad_accidents'];
		                              $vehicle_treatment_with_oil = $row['vehicle_treatment_with_oil'];
		                              $vehicle_ad_have_seller_invoice = $row['vehicle_ad_have_seller_invoice'];
		                              $vehicle_ad_vehicle_issue = $row['vehicle_ad_vehicle_issue'];
		                              $vehicle_ad_free_text = $row['vehicle_ad_free_text'];
		                              $vehicle_ad_price = $row['vehicle_ad_price'];
		                              $vehicle_model_id =$row['vehicle_model_id'];
		                                $query1 = mysqli_query($conn,"select* from vehicles_manufacture where vehicle_manufacture_id=$vehicle_manufacture_id");
		                                $row1 = mysqli_fetch_array($query1);
		                                $vehicle_manufacture_name = $row1['vehicle_manufacture_name'];


		                                $querey2 = mysqli_query($conn,"select * from vehicles_models where vehicles_model_id=$vehicle_model_id and vehicle_manufacture_id=$vehicle_manufacture_id");
		                                
		                              
		                                 $row2 = mysqli_fetch_array($querey2);
		                                 
		                                $vehicles_model_name = $row2['vehicles_model_name'];

		                                $querey3 = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id=$vehicle_type_id_db");
		                                   $row3 = mysqli_fetch_array($querey3);
		                                $vehicle_type_name = $row3['vehicle_type_name'];

		                                ///////////////fetch ad image only one

		                                $ad_img_query = mysqli_query($conn,"select* from vehicle_images where vehicle_ad_id= $vehicle_ad_id limit 1");
		                                $ad_img_row = mysqli_fetch_array($ad_img_query);
		                                $ad_img = "uploads/vehicles_images/".$ad_img_row['vehicle_image_name'];
		                                 $customer_business_logo_img ="";
                                
                                 if(strlen($row['customer_business_logo'])>0){
                                    $src= "uploads/customer_business_logos/".$row['customer_business_logo'];
                                     $customer_business_logo_img =  '<div class="busiess_lgo_shower">
                                                <img src="'.$src.'" class="business_logo_of_seller">
                                               </div>';
                                }


		                               // $customer_id = $row['customer_id'];
		                                ////////////////////////fetch seller details /////////////////
		                                // $customer_data = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
		                                // $row_customer = mysqli_fetch_array($customer_data);
		                               $seller_name = $row['customer_name'];
		                              $seller_address = $row['customer_address'];

                                $html= $html.'<div class="col-lg-4 col-md-6 col-xs-12 col-sm-12 w-100 abc">
                                          <div class="card sc_car-items">
                                            <div class="top-box-badge">'.$ForSale.'</div>
                                            <div class="card-image">
                                              <img alt="'.$vehicle_type_name.'" class="img-fluid" src="'.$ad_img.'">
                                            </div>

                                            <div class="card-body sc_car-info">
                                              <div class="sc_car-header">

                                                 <div class="div1_header_items">
                                               		<h4 class="sc_car_item_title">
                                                        <a href="#">'.$vehicle_type_name.'</a>
                                                    </h4>

                                                	<span class="sc_car_item_type">
                                                        <p href="#" title="'.$vehicle_manufacture_name.'">'.$vehicle_manufacture_name.'</p>
                                                        <p href="#" title="'.$vehicles_model_name.'" > '.$vehicles_model_name.'</p>
                                                          <p href="#" > '.$vehicle_ad_year.'</p>
                                                      </span>


                                                
                                                <div class="sc_car_item_price">
                                                        <span class="cars_price">
                                                          <span class="cars_price_label">'.$vehicle_ad_sold_status_words.'</span>
                                                          <span class="cars_price_data_large"><strong>'.$vehicle_ad_price.'</strong></span>
                                                        </span>
                                                      </div>
                                              </div>
                                              '.$customer_business_logo_img.'
                                               </div>
                                              <div class="sc_cars_items_params">
                                                <span class="sc_cars_items_milistone">
                                                  <span class="sc_cars_icon"><i class="fas fa-tachometer-alt"></i></span>
                                                  <span class="sc_cars_text">'.$vehicle_ad_km.'</span>
                                                </span>
                                                <span class="sc_cars_items_milistone">
                                                  <span class="sc_cars_icon"><i class="fas fa-user"></i></span>
                                                  <span class="sc_cars_text">'.$vehicle_ad_hand.'</span>
                                                </span>
                                                <span class="sc_cars_items_milistone">
                                                  <span class="sc_cars_icon">'.$test_t0_date.'</span>
                                                  <span class="sc_cars_text">'.$vehicle_ad_test_to_date.'</span>
                                                </span>
                                                
                                              </div>

                                              <div class="sc_cars_items_footer">
                                               <span class="sc_cars_items_address ">
                                                  <span class="sc_cars_items_label formatter">'.$seller_name_keyword.'</span>
                                                  <span class="sc_cars_optional_link ">'.$seller_name.'</span>
                                                </span>


                                                <span class="sc_cars_items_address">
                                                  <span class="sc_cars_items_label formatter">'.$seller_address_keyword.'</span>
                                                  <span class="sc_cars_optional_link">'.$seller_address.'</span>
                                                </span>


                                                
                                                    <div class="button mt-5 text-center w-100">
                                                      <a href="view_vehicle_details.php?vehicle_ad_id='.$vehicle_ad_id.'" class="btn btn-primary"><span>
                                                          '.$view_details_btn.'  
                                                        </span></a>
                                                    </div>
                                                


                                              </div>
                                            </div>

                                          </div>
                                        </div>';

                }//end while loop here
                $res_msg = array("success"=>1,"html"=>$html,"result_found"=>1,"shown_results"=>1);
            }//end if here
            else{
            	$check  = mysqli_query($conn,"select* from customer_demand where customer_id=$gbh2_customer_id and model_id=$vehicle_model and manufacture_id=$vehicle_manufacture and vehicle_type_id=$vehicle_type");
            	if (mysqli_num_rows($check)==0)
	            	{
	            		$query = mysqli_query($conn,"INSERT INTO `customer_demand`( `customer_id`, `model_id`, `manufacture_id`, `vehicle_type_id`) VALUES ($gbh2_customer_id,$vehicle_model,$vehicle_manufacture,$vehicle_type)");
	            	if($query){
	            		$res_msg = array("success"=>1,"result_found"=>0,"shown_results"=>0);
	            	}else{
	            		$res_msg = array("success"=>0,"result_found"=>0,"shown_results"=>0);
	            	}
	            	}else{
	            			$res_msg = array("success"=>1,"result_found"=>0,"shown_results"=>0);
	            	}
            	
            }//end else here
            echo json_encode($res_msg);
	}//end filter_home_page




// function email_notification($company_email_address,$customer_email,$customer_name){


// 	$mail = new PHPMailer(true);	
// 	try {
// 		$company_name = "GBH2";           
// 		$company_email_add = "info@instantenergy.co.uk";
// 		$mail->setFrom($company_email_add, $company_name);
// 		$mail->addAddress($customer_email,ucwords($customer_name)); 
// 		$mail->addReplyTo($company_email_add, 'Contact');
// 		$mail->isHTML(true);
// 		$mail->Subject = 'Hello From Instant Energy';
// 		$mail_body = '<!DOCTYPE html><html lang="en"><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head><body><div class="jumbotron">
// 																									  <div class="text-center">
// 		<img src="http://zamarket.com.pk/projects/automobiles/assets/images/logo.jpg" style="height:400px;" alt="Company Logo"></div>															  
		
// 		<h4>Hi '.ucwords($customer_name).',</h4>
// 		<p><strong>Here’s your Quote for '.$county_name.':</strong></p>
// 		<p>Based on the usage you gave us, your energy would cost <strong>£'.$total.'</strong> with Instant.</p>

// 		<h4>Here is more details about your quotation:</h4>
// 		'.$html_code.'

// 		<p>We do not have any additional charges. This quote is what you will pay based on the usage you gave us.</p> 
// 		</div></body></html>';
// 		$mail->Body=$mail_body;
// 		$mail->send();
// 		echo "1";
// 	}catch (Exception $e) {
// 		echo "0";
// 	}


// }  //end email_notification here

?>