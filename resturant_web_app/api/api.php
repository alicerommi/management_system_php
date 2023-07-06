<?php
	session_start();
	include '../includes/database_connection.php';
	include 'request_traces.php';
	include '../includes/cleaner_input.php';
	include '../includes/functions.php';
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include '../includes/php_mailer/autoload.php';
	if(isset($_POST['client_site'])){

				#---------get the current location of customer 
				if(isset($_POST['fetch_current_location'])){
							$get_data = callAPI('GET', 'https://ip-api.io/api/json', false);
							echo $get_data;
				}

				#-----------get any pacakge details used in client site only
				if(isset($_POST['fetch_package_details'])){
					$package_id = intval($_POST['package_id']);
					$package_data  = mysqli_query($conn,"select * from packages where package_id = $package_id");
					echo json_encode(mysqli_fetch_assoc($package_data));
				} //end fetch_package_details


			#-----------insertion for the application
				if(isset($_POST['contact_us_form'])){

					
							$first_name = test_input($_POST['first_name']);
							$last_name = test_input($_POST['last_name']);
							$cell_number = test_input($_POST['cell_number']);
							$home_phone_number = test_input($_POST['home_phone_number']);
							$office_number = test_input($_POST['office_number']);
							$email = test_input($_POST['email']);
							$message = test_input(mysqli_escape_string($conn,$_POST['message']));

							$query = mysqli_query($conn,"INSERT INTO `user_messages`( `msg_user_first_name`, `msg_user_last_name`, `msg_user_phone_number`, `msg_user_home_phone_number`, `msg_user_ofc_number`, `msg_user_email`, `msg_user_query`) VALUES ('$first_name','$last_name','$cell_number','$home_phone_number','$office_number','$email','$message')");
							if($query){

									$msg = "Your Message Has Been Sent To Admin";
									$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg);
							}
							else{
									$msg = "Error in sending message";
									$res_msg=array('status'=>'error','fail'=>1,'msg'=>$msg ,'success'=>0);
							}
						
					echo json_encode($res_msg);
				}//contact_us_form

				if(isset($_POST['contact_us_form_on_site'])){
					
					if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                					$res_msg=array('invalid_code'=>1,'msg'=>'You have entered wrong captcha code');
             		}else{
							$first_name = test_input($_POST['first_name']);
							$last_name = test_input($_POST['last_name']);
							$cell_number = test_input($_POST['cell_number']);
							$home_phone_number = test_input($_POST['home_phone_number']);
							$office_number = test_input($_POST['office_number']);
							$email = test_input($_POST['email']);
							$message = test_input(mysqli_escape_string($conn,$_POST['message']));

							$query = mysqli_query($conn,"INSERT INTO `user_messages`( `msg_user_first_name`, `msg_user_last_name`, `msg_user_phone_number`, `msg_user_home_phone_number`, `msg_user_ofc_number`, `msg_user_email`, `msg_user_query`) VALUES ('$first_name','$last_name','$cell_number','$home_phone_number','$office_number','$email','$message')");
							if($query){

									$msg = "Your Message Has Been Sent To Admin";
									$res_msg=array('invalid_code'=>0,'status'=>'success','success'=>1,'msg'=>$msg);
							}
							else{
									$msg = "Error in sending message";
									$res_msg=array('invalid_code'=>0,'status'=>'error','fail'=>1,'msg'=>$msg ,'success'=>0);
							}
					}  //end capcah code else condition here	
					echo json_encode($res_msg);
				}//contact_us_form_on_site
				

				if(isset($_POST['fetch_cities'])){
					$country_id = intval($_POST['country_id']);
					$fetch_cities  = mysqli_query($conn,"select* from location_cities where location_country_id=$country_id and location_valid_flag=1");
					$data =array();
					$total_records = mysqli_num_rows($fetch_cities);
					while($row = mysqli_fetch_assoc($fetch_cities)){
						array_push($data,$row);
					}
					$res_msg=array('status'=>'success','success'=>1,'data'=>$data,'total'=>$total_records);
					echo json_encode($res_msg);
				}//end fetch_cities

				if(isset($_POST['fetch_city_zipcode'])){
					$city_id = $_POST['city_id'];
					$query = mysqli_query($conn,"select location_city_zipcode from location_cities where location_city_id=$city_id and location_valid_flag=1");
					$row = mysqli_fetch_assoc($query);
					#$res_msg=array('status'=>'success','success'=>1,'data'=>$data,'total'=>$row);
					echo json_encode($row);
				} // end fetch_city_zipcodes


				if(isset($_POST['business_request'])){
					
							if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                					$res_msg=array('invalid_code'=>1,'msg'=>'You have entered wrong captcha code');
             				}else{
							$first_name = test_input($_POST['first_name']);
							$last_name =test_input( $_POST['last_name']);

							$email_address = test_input($_POST['email_address']);
							//$business_location =test_input( $_POST['business_location']);
							$business_existence = test_input($_POST['business_existence']);
							$cell_phone_number = test_input($_POST['cell_phone_number']);
							$home_phone_number = test_input($_POST['home_phone_number']);
							$office_number = test_input($_POST['office_number']);
							$package_id = test_input($_POST['package_id']);
							$business_id = test_input($_POST['business_id']);

							$country = test_input($_POST['country']);
							$city = test_input($_POST['city']);
							
							$check_business = mysqli_query($conn,"select* from admin_added_business where requested_member_id = 0 and business_id=$business_id");
							if(mysqli_num_rows($check_business)>0){
								$check_email_address_of_member = mysqli_query($conn,"select* from membership_requests where member_email='$email_address'");
								if (mysqli_num_rows($check_email_address_of_member)==0){
										$sql = "INSERT INTO `membership_requests`( `member_first_name`, `member_last_name`, `member_email`, `member_business_existence_durantion`, `member_cell_phone_number`, `member_home_phone_number`, `member_office_number`, `member_country`, `member_city`, `request_status`, `request_datetime`, `member_new_business`, `package_id`,`business_id`) VALUES ('$first_name','$last_name','$email_address','$business_existence','$cell_phone_number','$home_phone_number','$office_number','$country','$city',0,NOW(),0,$package_id,$business_id)";
										$query = mysqli_query($conn,$sql);
										if($query){
											$member_id = mysqli_insert_id($conn);
											$update_status = mysqli_query($conn,"update admin_added_business set requested_member_id=$member_id where business_id=$business_id");
											if($update_status){

															if($files_are_on_server==1){
																$mail = new PHPMailer(true);
																$generated_token = getToken(8);  #sent to member
											    		  			try {
											    		  				$full_name = ucwords($first_name." ".$last_name);
								                                            $mail->setFrom($email_address, $company_name);
								                                            $mail->addAddress($company_email_add,$full_name); 
								                                            $mail->addReplyTo($company_email_add, 'Contact');
								                                            $mail->isHTML(true);                            // Set email format to HTML
								                                            $token = $email_verification_link."?member_email_verification_token=".$generated_token."&member_id=".$member_id;
								                                            mysqli_query($conn,"update membership_requests set member_email_verification_code='$generated_token' where requested_member_id=$member_id");

								                                            $mail->Subject = 'Membership Request Has Been Recieved';
								                                            $mail->Subject = 'Your '.$company_name.' email verification code';
								                                            $mail_body = '<!DOCTYPE html>
																							<html lang="en">
																							<head>
																							  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																							  
																							  </head><body>
																							  <div class="jumbotron">
																											  <h3>Hi '.$full_name.',</h3>

																											  <p>Your membership request has been recieved. We will review it and get back to you.</p>


																											  <p> Click On the provided link in order to verify your email address</p>


																											  <a href="'.$token.'" title="Verify My Email Address">Click Here</a> 

																											  <p>Our Team Will Contact You Within 24 Hours Through Email Address</p>
																											  
																											  <p>If you did not request this code then please contact us <a href="mailto:'.$company_email_add.'">here</a></p>
																							</div>
																						</body></html>';
																					 $mail->Body = 	$mail_body;
								                                            if($mail->send()){
								                                            	$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,'email_sent'=>1,'invalid_code'=>0);
								                                            }else{
								                                            	 $res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'email_sent'=>0,'invalid_code'=>0); 
								                                            }
								                                            
															}catch (Exception $e){
																$msg= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
								                                $res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'invalid_code'=>0); 
															}
														} // end files on server check here

															$msg = "Request Has Been Sent. Check Email Address In Order To Verify Email Address";
															$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,'invalid_code'=>0);
											}else{
															$msg = "Error in saving details";
															$res_msg=array('status'=>'error','success'=>0,'msg'=>$msg,'fail'=>1,'invalid_code'=>0);
											}

										}

								}else{
									$msg = "A member with this email is already exists";
									$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'invalid_code'=>0);	
									
								}
								

							}else{
								$msg = "The business you're trying to own is already owned by someone else";
								$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'invalid_code'=>0);		
							}
						}// eend else condition of recpacha code
							echo json_encode($res_msg);
				}//end business_request

				//start fill_membership_form
				if(isset($_POST['fill_membership_form'])){
					if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                					$res_msg=array('invalid_code'=>1,'msg'=>'You have entered wrong captcha code');
             		}else{
						$flag = 1;
					    $package_id = $_POST['package_id']; 
					    $business_name = $_POST['business_name']; 
					    $business_website = $_POST['business_website']; 
					    $business_type = $_POST['business_type']; 
					    $business_country_name_selected = $_POST['business_country_name_selected']; 
					    $business_city_selected = $_POST['business_city_selected'];
					    $new_city_added=0;
					    if ($business_city_selected=="new_city"){
					    		$new_city_added=1;
					    		$business_city_input = $_POST['business_city']; 
					    		$business_zipcode = $_POST['business_zipcode'];
					    		$check_location      =  mysqli_query($conn,"select* from location_cities where location_city_zipcode='$business_zipcode'");
					    		if (mysqli_num_rows($check_location)>0)
					    		{
					    					$flag = 0;
					    					$msg = "The City you are adding is already in the list.";
											$res_msg=array('status'=>'error','success'=>0,'msg'=>$msg,'fail'=>1,'invalid_code'=>0);
								}

					    } else{
					    	$location_id = $business_city_selected;
					    }
					    
					    $business_phone = $_POST['business_phone']; 
					    $business_email = $_POST['business_email']; 
					    $business_details = $_POST['business_details'];

					    $member_first_name = $_POST['member_first_name']; 
					    $member_last_name = $_POST['member_last_name']; 
					    $member_email_address = $_POST['member_email_address']; 
					    $member_business_country = $_POST['member_business_country']; 
					    $member_business_city = $_POST['member_business_city']; 
					    $member_business_existence = $_POST['member_business_existence']; 
					    $member_cell_phone_number = $_POST['member_cell_phone_number']; 
					    $member_home_phone_number = $_POST['member_home_phone_number']; 
					    $member_office_number = $_POST['member_office_number']; 
						
						$check_member_email_address = mysqli_query($conn,"select* from membership_requests where member_email='$business_email'");
						
						if(mysqli_num_rows($check_member_email_address)>0){
							$flag = 0;
							$msg = "Member with this email address is already exists";
							$res_msg=array('status'=>'error','success'=>0,'msg'=>$msg,'fail'=>1,'invalid_code'=>0);	
						}

						$check_business = mysqli_query($conn,"select* from admin_added_business where business_name = '$business_name' and business_type='$business_type'");

						if(mysqli_num_rows($check_business)>0){
							$flag = 0;
							$msg = "This business is already exists";
							$res_msg=array('status'=>'error','success'=>0,'msg'=>$msg,'fail'=>1,'invalid_code'=>0);	
						}

						if($flag==1){

							#--frist add a new city
							if($new_city_added==1){

								$add_city = mysqli_query($conn,"INSERT INTO location_cities(location_city_name,location_city_zipcode,location_country_id,location_valid_flag) VALUES('$business_city_input','$business_zipcode',$business_country_name_selected,0)");
								$location_id = mysqli_insert_id($conn);
							}
							#second add the business details
							$add_business = mysqli_query($conn,"INSERT INTO `admin_added_business`( `business_name`, `business_type`, `location_id`, `business_email`, `business_phone`, `business_site_link`, `business_more_details`) VALUES ('$business_name',$business_type,$location_id,'$business_email','$business_phone','$business_website','$business_details')");
							if($add_business){
								$added_business_id = mysqli_insert_id($conn);
								$sql="INSERT INTO `membership_requests`( `member_first_name`, `member_last_name`, `member_email`, `member_business_existence_durantion`, `member_cell_phone_number`, `member_home_phone_number`, `member_office_number`, `member_country`, `member_city`, `request_status`, `request_datetime`, `member_new_business`, `package_id`,`business_id`) VALUES ('$member_first_name','$member_last_name','$member_email_address','$member_business_existence','$member_cell_phone_number','$member_home_phone_number','$member_office_number','$member_business_country','$member_business_city',0,NOW(),1,$package_id,$added_business_id)";
								$add_member_request =mysqli_query($conn,$sql);

									if($add_member_request){
										$member_id = mysqli_insert_id($conn);
										$update_query  = mysqli_query($conn,"update admin_added_business set requested_member_id = $member_id where business_id=$added_business_id");
										$generated_token = getToken(8);
										#-0----send email to the member
										if ($files_are_on_server==1){
														$mail = new PHPMailer(true);
											    		  			try {
											    		  					$full_name = ucwords($member_first_name." ".$member_last_name);
								                                            $mail->setFrom($member_email_address, $company_name);
								                                            $mail->addAddress($company_email_add,$full_name); 
								                                            $mail->addReplyTo($company_email_add, 'Contact');
								                                            $mail->isHTML(true);                            // Set email format to HTML
								                                            $token = $email_verification_link."?member_email_verification_token=".$generated_token."&member_id=".$member_id;
								                                            mysqli_query($conn,"update membership_requests set member_email_verification_code='$generated_token' where requested_member_id=$member_id");

								                                            $mail->Subject = 'Membership Request Has Been Recieved';
								                                            $mail->Subject = 'Your '.$company_name.' email verification code';
								                                            $mail_body = '<!DOCTYPE html>
																							<html lang="en">
																							<head>
																							  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																							  
																							  </head><body>
																							  <div class="jumbotron">
																											  <h3>Hi '.$full_name.',</h3>

																											  <p>Your membership request has been recieved. We will review it and get back to you.</p>


																											  <p> Click On the provided link in order to verify your email address</p>


																											  <a href="'.$token.'" title="Verify My Email Address">Click Here</a> 

																											  <p>Our Team Will Contact You Within 24 Hours Through Email Address</p>
																											  
																											  <p>If you did not request this code then please contact us <a href="mailto:'.$company_email_add.'">here</a></p>
																							</div>
																						</body></html>';
																					 $mail->Body = 	$mail_body;
																					 if(!$mail->send()){
																					 		$msg= "Error in sending email";
								                                							$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'email_sent'=>0,'invalid_code'=>0);  
								                                					}
								                                					
																				} #end try
																				catch (Exception $e){
																					$msg= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
								                                					$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'invalid_code'=>0); 
																				}		

													$msg = "Request Has Been Send Successfully. Check Your Email To Verify Email Address";
													$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,'invalid_code'=>0);
										}else{
											$msg = "Request Has Been Send Successfully.";
											$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,"email_sent"=>"localhost_testing_envor",'invalid_code'=>0);
										}
									}else{
										$msg = "Error on ".mysqli_error($conn);
										$res_msg=array('status'=>'error','success'=>0,'msg'=>$msg,'fail'=>1,'invalid_code'=>0);	
									}
							}else{
										$msg = "Error on ".mysqli_error($conn);
										$res_msg=array('status'=>'error','success'=>0,'msg'=>$msg,'fail'=>1,'invalid_code'=>0);
							}
						}
					
					}//end capcat code else here
						echo json_encode($res_msg);
				}
				//end fill_membership_form

				if(isset($_POST['customer_register_form'])){

						$full_name = test_input($_POST['full_name']);
					    $customer_email_add = $_POST['customer_email_add'];
					    $customer_password = $_POST['customer_password'];
					    
						    $check = mysqli_query($conn,"select* from customers where customer_email_address='$customer_email_add'");
						   	$msg = '';
						    if(mysqli_num_rows($check)>0){
						    	$msg = 'Customer With This Email Is Already Exists';
						    	$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);
						    }else{
								    
								    $random_str = getToken(6);
								    $query = "INSERT INTO `customers`( `customer_full_name`, `customer_email_address`, `customer_password`) VALUES ('$full_name','$customer_email_add','$customer_password')";

								    $sql = mysqli_query($conn,$query);
								    if($sql){
								    	$last_id = mysqli_insert_id($conn);
								    		if ($files_are_on_server==1){
								    								$mail = new PHPMailer(true);
											    		  			try {
								                                            $mail->setFrom($company_email_add, $company_name);
								                                            $mail->addAddress($customer_email_add,$full_name); 
								                                            $mail->addReplyTo($company_email_add, 'Contact');
								                                            $mail->isHTML(true);                                  // Set email format to HTML
								                                            #$mail->Subject = 'Your Registeration Request To '.$company_name.' Has Been Recieved';
								                                            $mail->Subject = 'Your '.$company_name.' email verification code';
								                                            $mail_body = '<!DOCTYPE html>
																							<html lang="en">
																							<head>
																							  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																							  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
																							  </head><body>
																							  <div class="jumbotron">
																											  <h3>Hi '.$full_name.',</h3>
																											  <p>Here’s your verification code:<strong>'.$random_str.'</strong></p>
																											  <p>Enter it to finish verification of your email address.</p>
																											  <p>If you did not request this code then please contact us <a href="mailto:'.$company_email_add.'">here</a></p>
																							</div>
																						</body></html>';
								                                            // $mail->Body    = 'Please Click on the provided link in order to verification<br/><a href="customer_login.php">Click Here</a>';
																					 $mail->Body = 	$mail_body;
								                                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
								                                            $mail->send();
								                                            $msg = 'Details Saved! Check Your Email For Verification';

								                                            $update = mysqli_query($conn,"update customers set customer_email_sent=1,customer_email_verification_code='$random_str' where customer_id=$last_id");
								                                            $res_msg=array('status'=>'success','success'=>1,'msg'=>$msg);
								                                        } catch (Exception $e) {
								                                                     $msg= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
								                                                     $res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);  
								                                        }	
					                								}else{
					                										 	$update = mysqli_query($conn,"update customers set customer_email_sent=0 where customer_id=$last_id");
					                										 	$msg = 'Details Saved!';
								                                            	$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg);
					                								}
							  		}else{	
							  				$msg = "Error In Saving Details";
							  				$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);	
							  		}
						}//end mysqli_num_rows
					
					echo json_encode($res_msg);
				}	// customer_register_form
		//start customer_login
		if(isset($_POST['customer_login'])){
			$customer_email_login  = test_input($_POST['customer_email_login']);
			$customer_login_password  = $_POST['customer_login_password'];
			$user_type = $_POST['user_type'];
					
			if ($user_type=="customer"){

					$check = mysqli_query($conn,"select* from customers where customer_email_address='$customer_email_login' and customer_password='$customer_login_password'");
					if(mysqli_num_rows($check)>0){
						$row = mysqli_fetch_assoc($check);
						$customer_email_verification_status = intval($row['customer_email_verification_status']);
						$customer_id = $row['customer_id']; 
						$customer_block = $row['customer_block'];
						if($customer_block==0){
							if($customer_email_verification_status==1){
							 #customer email is verified then okay
								#---------insert into table
								$IP =  $_SERVER['REMOTE_ADDR'];
								$insert_login_detail = mysqli_query($conn,"INSERT INTO `customers_login_activities`( `customer_id`, `customer_login_activity_ip`, `customer_login_datetime`) VALUES ($customer_id,'$IP',NOW())");
								$update_user_online_status = mysqli_query($conn,"update customers set customer_login_flag=1 where customer_id=$customer_id");
								if ($insert_login_detail && $update_user_online_status)
									{
											$msg = "Correct Details";
								  			$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,'customer_id'=>$customer_id,'user_type'=>$user_type);
								  	}else{
								  			$msg = "Error From SQL -->insert_login_detail update_user_online_status";
								  			$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
								  	}

							}else{
									$msg = "Login Failed! You Have Not Verify Your Email Address";
									$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
							}
						}else if($customer_block==1){
								$msg = "Login Failed! Your Account Has Been Blocked";
								$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
						}

					}else{
							$msg = "Login Failed! You Have Entered Wrong Details";
							$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);	
					}
					echo json_encode($res_msg);
			}else if($user_type=="Business Owner"){

					if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                					$res_msg=array('invalid_code'=>1,'msg'=>'You have entered wrong captcha code','user_type'=>$user_type);
             		}else{
             				$check = mysqli_query($conn,"select* from membership_requests where member_email='$customer_email_login' and member_password='$customer_login_password'");
								if(mysqli_num_rows($check)==1){
									$row = mysqli_fetch_assoc($check);
									$member_block = $row['member_block'];
									$request_status = $row['request_status'];
									$member_request_id= $row['member_request_id'];
									if ($request_status==1){
										if($member_block==1){
											$msg = 'Your Business Account Has Been Blocked';
											$res_msg=array('invalid_code'=>0,'status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);
										}else if($member_block==0){
											$IP =  $_SERVER['REMOTE_ADDR'];
											$insert_login_detail = mysqli_query($conn,"INSERT INTO `member_login_activities`( `member_id`, `member_login_activity_ip`, `member_login_datetime`) VALUES ($member_request_id,'$IP',NOW())");
											
											$update_user_online_status = mysqli_query($conn,"update membership_requests set member_login_flag=1 where member_request_id=$member_request_id");
											
											$msg = "Correct Details";
											
											$res_msg=array('invalid_code'=>0,'status'=>'success','success'=>1,'msg'=>$msg,'business_owner_id'=>$member_request_id,'user_type'=>$user_type);
										}
									}else if($request_status==0){
											$msg = 'Your Membership Request is Pending Yet';
											$res_msg=array('invalid_code'=>0,'status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
									}else if ($request_status==2){
											$msg = 'Your Membership Request is Disapproved! Contact Us For More Details';
											$res_msg=array('invalid_code'=>0,'status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
									}else if($row['member_email_verification_status']==0){
											$msg = 'YOu have not verified your email address';
											$res_msg=array('invalid_code'=>0,'status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
									}
								}
								else{
										$msg = "Login Failed! You Have Entered Wrong Details";
										$res_msg=array('invalid_code'=>0,'status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,'user_type'=>$user_type);
								}

             		}//end else part of capcha code
					echo json_encode($res_msg);
			} //end Business Owner condition here
			
		}//customer_login

		#--------logout from the system if admin has blocked the customer
		if(isset($_POST['block_this_customer'])){
			$customer_id = $_SESSION['customer_id'];
			$check_from_db = mysqli_query($conn,"select* from customers where customer_id  = $customer_id and customer_block=1");
			if(mysqli_num_rows($check_from_db)==1){
				$update_customer_is_offline_logged = mysqli_query($conn,"update customers set customer_login_flag=0 where customer_id=$customer_id");
				if ($update_customer_is_offline_logged)
					{
						unset($_SESSION['customer_id']); 
						unset($_SESSION['customer_block']);
						unset($_SESSION['customer_session_key']);
						unset($_SESSION['customer_login_time_date']); 
						#header("Location:customer_login.php?customer_blocked_from_admin=1");
						$msg = 'Your Account Has Been Blocked From Admin!';
						$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg);
					}
				}else{
						#------if not blocked from admin then it will goes to its dashboard page
						$msg  = "Customer is not blocked";
						$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);
				}
				echo json_encode($res_msg);
			}//end block_this_customer











}else
#--------------------for business owner
if(isset($_POST['business_owner_site_app'])){

		if(isset($_POST['get_business_owner_last_login_activity'])){
				$business_owner_id = $_POST['business_owner_id'];
				$query = mysqli_query($conn,"select* from member_login_activities where member_id =$business_owner_id");
				if(mysqli_num_rows($query)>1){
						$query2 = mysqli_query($conn,"select max(member_login_activity_id)-1,member_login_datetime from member_login_activities  WHERE member_id=$business_owner_id");
						if (mysqli_num_rows($query2)>0){
							$member_login_datetime =  human_timedate($row['member_login_datetime']);
									$res_msg=array('status'=>'success','success'=>1,'last_login_time_date'=>$member_login_datetime,'msg'=>'No First Time Login');	
						}	else{
							$res_msg=array('status'=>'success','success'=>1,'msg'=>'No First Time Login');
						}
				}
				echo json_encode($res_msg);
		} //get_business_owner_last_login_activity
		#--------------------dashboard 
		if(isset($_POST['get_business_owner_profile']) ){
			$business_owner_id = $_POST['business_owner_id'];
			$query = mysqli_query($conn,"select* from membership_requests where member_request_id=$business_owner_id");
			if (mysqli_num_rows($query)>0){
				$row = mysqli_fetch_assoc($query);
				$arr['member_first_name'] = $row['member_first_name'];
				$arr['member_last_name'] = $row['member_last_name'];
				$arr['member_email'] = $row['member_email'];
				$arr['member_business_type'] = $row['member_business_type'];
				$arr['member_business_location'] = $row['member_business_location'];
				$arr['member_business_existence_durantion'] = $row['member_business_existence_durantion'];
				$arr['member_cell_phone_number'] = $row['member_cell_phone_number'];
				$arr['member_home_phone_number'] = $row['member_home_phone_number'];
				$arr['member_office_number'] = $row['member_office_number'];
				$arr['request_status'] = $row['request_status'];
				$arr['request_datetime'] = human_timedate($row['request_datetime']);
				$arr['approval_request_datetime'] = human_timedate($row['approval_request_datetime']);
				$arr['member_block'] = $row['member_block'];
				$arr['member_block_reason'] = $row['member_block_reason'];
				$arr['member_block_unblock_datetime'] = human_timedate($row['member_block_unblock_datetime']);
				$arr['member_password'] = $row['member_password'];
				$arr['member_pic'] = $row['member_pic'];
				$arr['member_profile_status'] = $row['member_profile_status'];
				$arr['member_login_flag'] = $row['member_login_flag'];
				$arr['member_about'] = $row['member_about'];


				$res_msg=array('status'=>'success','success'=>1,'owner_details'=>$arr);
			}else{
					$msg = "Owner Does Not Exists";
					$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);
			}
			echo json_encode($res_msg);
		}// .get_business_owner_profile
		//check the admin has blocked the owner or not
		if (isset($_POST['check_owner_is_blocked_from_admin'])){
			$business_owner_id = $_POST['business_owner_id'];
			$check  = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id");
			if(mysqli_num_rows($check)>0){
					$row = mysqli_fetch_assoc($check);
					$member_block = $row['member_block'];
					$member_block_reason = $row['member_block_reason'];
					$res_msg=array('status'=>'success','success'=>1,'owner_block_flag'=>$member_block,'member_block_reason'=>$member_block_reason);
			}else{
					$msg = "Owner Does Not Exists";
					$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);	
			}
			echo json_encode($res_msg);
		}//emd business_owner_id

		//////////////get  all the business owner login activites
		if(isset($_POST['get_business_owner_all_login_activity'])){
			$member_id   = $_POST['business_owner_id'];
			$query = mysqli_query($conn,"SELECT * FROM member_login_activities where member_id = $member_id order by member_login_datetime DESC");
			$data=array();
			while($row = mysqli_fetch_assoc($query)){
				$row['member_login_datetime'] =  human_timedate($row['member_login_datetime']);
				$data[] = $row;
			}
			$res_msg=array('status'=>'success','success'=>1,'login_track'=>$data);
			echo json_encode($res_msg);
		} // get_business_owner_all_login_activity

		if(isset($_POST['update_business_owner_profile_details'])){
			$business_owner_id = intval($_POST['business_owner_id']);
			$check = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id and member_block=0");
			if (mysqli_num_rows($check)==0){
				$msg = "The Business Owner Does Not Exist";
				$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>0);	
			}else{
				$AboutMe = mysqli_escape_string($conn,$_POST['AboutMe']);
				$first_name = test_input($_POST['first_name']);
				$last_name = test_input($_POST['last_name']);
				// print_r($_FILES['admin_image']);
				if(!empty($_FILES['admin_image']['name'])){
					$img_name = $_FILES['admin_image']['name'];
					$img_type = $_FILES['admin_image']['type'];
					$image_type = strtolower(str_replace("image/", "",  $img_type ) );
					$file_name = generate_unique_id()."_".generateRandomString(rand(10, 30)).".".$image_type;
					if ( in_array($image_type, $images_supported_array) ){
						if ( move_uploaded_file( $_FILES['admin_image']['tmp_name'], $business_owner_files_directory_images.$file_name  ) ) 
							{
								$update_query = "update membership_requests set member_first_name='$first_name',member_last_name='$last_name', member_pic='$file_name',member_about='$AboutMe',member_profile_status=1 where member_request_id=$business_owner_id";
								$update_member_details = mysqli_query($conn,$update_query);
								if($update_member_details){
									$msg = "Your Profile Has Been Updated Successfully";
									$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,"have_image"=>1,"business_owner_id"=>$business_owner_id,"image_name"=>$file_name,"owner_first_name"=>$first_name,"owner_last_name"=>$last_name);
								}else{
									$msg = "Error in updating profile ->sql query error". mysqli_error($conn);
									$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg ,"have_image"=>1);	
								}
							}else{
										$msg= "Error in uploading owner image";
										$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg ,"have_image"=>1);	
							}
						
					}else{
										$msg =  "The image you are trying to upload does not support (PNG,JPG,JPEG formats are supported)";
										$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"have_image"=>1);
					}
				}else{
								$update_query = "update membership_requests set member_first_name='$first_name',member_last_name='$last_name',member_about='$AboutMe' where member_request_id=$business_owner_id";
								$update_member_details = mysqli_query($conn,$update_query);
								if($update_member_details){
									$msg = "Your Profile Has Been Updated Successfully";
									$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg, "have_image"=>0,"business_owner_id"=>$business_owner_id,"owner_first_name"=>$first_name,"owner_last_name"=>$last_name);
								}else{
									$msg = "Error in updating profile ->sql query error". mysqli_error($conn);
									$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"have_image"=>0);	
								}
				}
				
			} //end check business owner condition here
			echo json_encode($res_msg);
		} //end update_business_owner_profile_details

		//update the password of business owner
		if(isset($_POST['update_password_form_business_owner'])){

				$business_owner_id = intval($_POST['business_owner_id']);
				$oldpass = $_POST['oldpass'];
				$RePassword = $_POST['RePassword'];
				$rePassword_again = $_POST['rePassword_again'];
				//check the old password is correct or not
				$check = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id and member_block=0");
				if(mysqli_num_rows($check)==0){
						$msg = "The Business Owner Does Not Exist";
						$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>0);	
				}else{
						$row = mysqli_fetch_assoc($check);
						$old_db_pass = $row['member_password'];
						if($old_db_pass==$oldpass){
							if (strlen($RePassword) >= $set_the_password_length_for_business_owner){ #7
									if($RePassword == $rePassword_again){
										$update_pass = mysqli_query($conn,"update membership_requests set member_password='$RePassword' where member_request_id=$business_owner_id");
										if($update_pass )
											{
													$msg = "Password Has Been Updated Successfully";
													$res_msg=array('status'=>'success','success'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id);
											}else{
													$msg = "Update password query error: ".mysqli_error($conn);
													$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"mysqli_error"=>1);	
											}
									}else{
											$msg = "New Passwords Combination Is Mismatched";
											$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,"mis_match_new_password_err"=>1);
									}

							}else{
								$msg = "New Password Lenght Must Be Equal To OR Greater Than 7";
								$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,"password_length_err"=>1);
							}
						}else{
											$msg = "Old Password Is Incorrect";
											$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,"old_password_wrong"=>1);
						}
				}

				echo json_encode($res_msg);
		} //end update_password_form_business_owner

		if(isset($_POST['fetch_all_membership_packages'])){
			$business_owner_id = $_POST['business_owner_id'];
			$check = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id and member_block=0");
			if(mysqli_num_rows($check)==0){
						$msg = "The Business Owner Does Not Exist";
						$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>0);	
			}else{
					$all_packages = mysqli_query ($conn,"select* from packages");
					$data = array();
					while($row = mysqli_fetch_assoc($all_packages)){
						$package_id = $row['package_id'];
						$row['package_id']  = $row['package_id'];
						$row['package_name']  = $row['package_name'];
						$row['package_details']  = $row['package_details'];
						$row['package_price_per_month']  = $row['package_price_per_month'];
						$row['package_price_per_month_usd']  = addDollar($row['package_price_per_month']);
						$row['package_per_customer']  = $row['package_per_customer'];
						$row['package_per_customer_usd']  = addDollar($row['package_per_customer']);
						$row['package_location']  = $row['package_location'];
						$row['package_added_datetime']  = human_timedate($row['package_added_datetime']);
						$data[] = $row;
					}
						$res_msg=array('status'=>'success','success'=>1,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,"all_packages"=>$data);	
			}
			echo json_encode($res_msg);
		} //end fetch_all_membership_packages
 
		if(isset($_POST['check_owner_purchased_package_or_not'])){  //check the owner has purchased any package for this month or not
			$business_owner_id = $_POST['business_owner_id'];
			$check = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id and member_block=0");
			if(mysqli_num_rows($check)==0){
						$msg = "The Business Owner Does Not Exist";
						$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>0);	
			}else{

				$check2 = mysqli_query($conn,"select * from purchased_packages where member_id=$business_owner_id");
				if (mysqli_num_rows($check2)==0){
					$msg = "This owner is new, have'nt purchased any membership package";
					$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>1);
				}else{
						$date = current_time_date(); #today day
						$sql ="select* from purchased_packages where '$date'>=purchased_package_datetime and '$date'<=purchased_package_datetime_expire and member_id = $business_owner_id";
						$query = mysqli_query($conn,$sql);
						$have_purchased_package = 0;
						if (mysqli_num_rows($query)==1){
							$have_purchased_package = 1;
							$row = mysqli_fetch_assoc($query);
							$data = array();
							$data['purchased_package_datetime_formatted'] = human_timedate($row['purchased_package_datetime']);
							$data['purchased_package_datetime_expire_formatted'] = human_timedate($row['purchased_package_datetime_expire']);
							$data['purchased_package_record_datetime_formatted'] = human_timedate($row['purchased_package_record_datetime']);

							$res_msg=array('status'=>'success','success'=>1,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,"have_purchased_package"=>$have_purchased_package,"details"=>$data);
						}else{
							$res_msg=array('status'=>'success','success'=>1,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,"have_purchased_package"=>$have_purchased_package);
						}
				}
			}
			echo json_encode($res_msg);
		} // end check_owner_purchased_package_or_not


		if(isset($_POST['get_specific_package_details'])){
			$package_id = intval($_POST['package_id']);
			$business_owner_id = intval($_POST['business_owner_id']);
			$check = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id and member_block=0");
			if(mysqli_num_rows($check)==0){
						$msg = "The Business Owner Does Not Exist";
						$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>0);	
			}else{

				$get_package_details = mysqli_query($conn,"select package_details from packages where package_id = $package_id");
				if(mysqli_num_rows($get_package_details)==0){
						$msg = "The Package Does Not Exists";
						$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>1);	
				}else{
						$row = mysqli_fetch_assoc($get_package_details);
						$package_details = $row['package_details'];
						$res_msg=array('status'=>'success','success'=>1,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,"package_details"=>$package_details);
				}

			}  //end else here
			echo json_encode($res_msg);
		} //end get_specific_package_details



		if(isset($_POST['purchase_specific_package'])){
				$package_id = intval($_POST['package_id']);
				$business_owner_id = intval($_POST['business_owner_id']);
				$check = mysqli_query($conn,"select* from membership_requests where member_request_id = $business_owner_id and member_block=0");
				if(mysqli_num_rows($check)==0){
					$msg = "The Business Owner Does Not Exist";
					$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>0);	
				}else{
						$get_package = mysqli_query($conn,"select* from packages where package_id=$package_id");
						if(mysqli_num_rows($get_package)==0){
							$msg = "The Package You're Trying To Purchase Does Not Exists";
							$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,'package_exist'=>0);	
						}else{
								$row = mysqli_fetch_assoc($get_package);
								$package_price_per_month = $row['package_price_per_month'];
								$package_per_customer = $row['package_per_customer'];
								$date = current_time_date(); #today day
								$expiry_date = get_future_date(1);  #--------1 month future date
								$paid_status=0;
								$trasaction_source = "DUMMY";
								#--------insert package payment details
								$purchase_package = mysqli_query($conn,"INSERT INTO `purchased_package_trasactions`(`trasaction_source`, `trasaction_member_id`, `trasaction_datetime`, `purchased_package_amount`) VALUES ('$trasaction_source',$business_owner_id,NOW(),'$package_price_per_month')");
								if ($purchase_package){
									$purchased_package_transaction_id = mysqli_insert_id($conn);
									$paid_status=1;
									$purchase_package_query = mysqli_query($conn,"INSERT INTO `purchased_packages`( `package_id`, `package_price`, `package_commission_price`, `member_id`, `purchased_package_datetime`, `purchased_package_datetime_expire`, `paid_status`, `purchased_package_transaction_id`) VALUES ($package_id,'$package_price_per_month','$package_per_customer',$business_owner_id,'$date','$expiry_date',$paid_status,$purchased_package_transaction_id)");
									if($purchase_package_query) {
										$msg =  "The Membership Package Has Been Purchased";
										$res_msg=array('status'=>'success','success'=>1,"business_owner_id"=>$business_owner_id,'owner_exists'=>1,'msg'=>$msg,'purchasing_datetime'=>human_timedate($date),'package_expiry_datetime'=>human_timedate($expiry_date));
									}else{
										$msg = "Error in purchase_package_query sql query ".mysqli_error($conn);
										$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>1);	
									}
								}else{
										$msg = "Error in purchase_package sql query ".mysqli_error($conn);
										$res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg,"business_owner_id"=>$business_owner_id,'owner_exists'=>1);	
								} 
						} //enmd else here
				} //end first else here
				echo json_encode($res_msg);
		}  //end purchase_specific_package
}	//end business_owner_site_app

else if(isset($_POST['customer_app'])){
			$customer_img_dir = "../uploads/customer_images/";

			// FETCH ALL THE businesses added from the admin api..
			if (isset($_POST['fetch_all_business_types'])){
				$query = mysqli_query($conn,"select * from business_types");
				$data = array(); 
				if (mysqli_num_rows($query)>0){
					while($row  = mysqli_fetch_assoc($query)){
							$data[] = $row;
					}
				}
				$res_msg=array('status'=>'success','success'=>1,'business_types'=>$data);	
				echo json_encode($res_msg);

			} // end fetch_all_business_types

			#-------------fetch all the businesses add from  admin
			if ( isset($_POST['fetch_all_businesses']) ){	

				$data['businesses_data'] =[]; 

				if (isset($_POST['limit_of_businesses'])){
					$limit = $_POST['limit_of_businesses'];

					$query = mysqli_query($conn,"SELECT * FROM `admin_added_business` join location_cities join location_countries join business_types on admin_added_business.location_id = location_cities.location_city_id and location_countries.location_country_id = location_cities.location_country_id  and business_types.business_type_id = admin_added_business.business_type  order by admin_added_business.business_id limit $limit");
				}else{
						$query = mysqli_query($conn,"SELECT * FROM `admin_added_business` join location_cities join location_countries join business_types on admin_added_business.location_id = location_cities.location_city_id and location_countries.location_country_id = location_cities.location_country_id  and business_types.business_type_id = admin_added_business.business_type order by admin_added_business.business_id");
				}

				while($row = mysqli_fetch_assoc($query)){
					$business_id = $row['business_id'];

					#-------fetch the details
					$query2 = mysqli_query($conn,"select* from admin_added_business_details where admin_added_business_id=$business_id");
					$have_details=0;
					$row2  = [];
					if (mysqli_num_rows($query2)>0){
						$have_details=1;
						$row2 = mysqli_fetch_assoc($query2);

					}
					$row2['have_details'] = $have_details; 
					

					#-------check the business have the images..
					$business_images = mysqli_query($conn,"select* from admin_added_business_images where admin_added_business_id = $business_id limit 1");
					$have_images = 0;
					if(mysqli_num_rows($business_images)>0){
							$have_images = 1;
							$row4 = mysqli_fetch_assoc($business_images); #-----just show one image
					}

					
					$row4['have_images'] = $have_images;
					$row4['admin_added_business_id'] = $business_id;
					$data['businesses_data'][]= $row;
					$data['businesses_details'][] = $row2;
					$data['businesses_images'][] =$row4;
				}//end while here
				#get the business details from another query
				echo json_encode($data);
			}// end fetch_all_businesses

			if(isset($_POST['fetch_countries'])){
				$query = mysqli_query($conn,"select* from location_countries");
				$data = array();
				while($row = mysqli_fetch_assoc($query)){
					array_push($data,$row);
				}
				echo json_encode($data);
			}//end fetch_countries

			if(isset($_POST['fetch_city_of_a_country'])){
				$country_id = $_POST['country_id'];
				$query = mysqli_query($conn,"select* from  location_cities where location_country_id=$country_id");
				if(mysqli_num_rows($query)==0){
						$res_msg=array('status'=>'success','success'=>1,'msg'=>'The cities not found for this country');
				}else{
					$data = array();
					while($row = mysqli_fetch_assoc($query)){
						array_push($data,$row);
					}
					$res_msg=array('status'=>'success','success'=>1,'data'=>$data);
				}
				echo json_encode($res_msg);
			}//end fetch_city_of_a_country

			if(isset($_POST['customer_verify_code'])){
				// print_r($_POST); die;
				$customer_email_address = $_POST['customer_email_address'];
				$customer_email_verify_code = $_POST['customer_email_verify_code'];
				$fetch_customer = mysqli_query($conn,"select* from customers where customer_email_address = '$customer_email_address'");
				if (mysqli_num_rows($fetch_customer)==1){
					$row = mysqli_fetch_assoc($fetch_customer);
					$customer_block = $row['customer_block'];
					if($customer_block==1){
						$res_msg=array('status'=>'success','success'=>1,'msg'=>'The customer has been blocked from admin');
					}else if($row['customer_email_verification_status']==0){
						if ($customer_email_verify_code== $row['customer_email_verification_code']){
							$update_details = mysqli_query($conn,"update customers set customer_email_verification_status=1, customer_email_verified_datetime=Now(),customer_login_flag=1 where customer_email_address = '$customer_email_address'");
							$full_name = $row['customer_full_name'];
							#$customer_email_add = $row['customer_email_address'];
							if ($update_details){
															if ($files_are_on_server==1){
								    								$mail = new PHPMailer(true);
											    		  			try {
								                                            $mail->setFrom($company_email_add, $company_name);
								                                            $mail->addAddress($customer_email_address,$full_name); 
								                                            $mail->addReplyTo($company_email_add, 'Contact');
								                                            $mail->isHTML(true);
								                                            $mail->Subject = 'Congrats, Your Email Address Has Been Verified';
								                                            $mail_body = '<!DOCTYPE html>
																							<html lang="en">
																							<head>
																							  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																							  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
																							  </head><body>
																							  <div class="jumbotron">
																											  <h3>Hi '.$full_name.',</h3>
																											  <p>Thanks, For verifying your email address.</p>
																											  <p>If you did not request, then please contact us <a href="mailto:'.$company_email_add.'">here</a></p>
																							</div>
																						</body></html>';
																					 $mail->Body = 	$mail_body;
								                                        
								                                            $mail->send();
								                                            $res_msg=array('status'=>'success','success'=>1,'msg'=>'Email Address has been verified','customer_data'=>$row);
								                                        } catch (Exception $e) {
								                                                     $msg= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
								                                                     $res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);  
								                                        }
								                                       }else{
								                                       		$res_msg=array('status'=>'success','success'=>1,'msg'=>'You are working in localhost');
								                                       }	
								
							}else{
								$res_msg=array('status'=>'error','success'=>0,'msg'=>'Error in verification');
							}
						}else{
							$res_msg=array('status'=>'success','success'=>1,'msg'=>'Verification code is not correct');
						}
					}else if ($row['customer_email_verification_status']==1){
						$res_msg=array('status'=>'success','success'=>1,'msg'=>'Email is already verified');
					}
				}else{
						$res_msg=array('status'=>'error','success'=>1,'msg'=>'The customer does not exists');
				}
				echo json_encode($res_msg);
			} //end customer_verify_code

			#-----update customer api
			if(isset($_POST['update_customer_details'])){
				$allowedExts = array("PNG", "JPEG", "JPG");
				$customer_id = $_POST['customer_id'];
				$country_id = $_POST['country_id'];
				$customer_zipcode = test_input($_POST['customer_zipcode']);
				$customer_city = test_input($_POST['customer_city']);
				$customer_about = mysqli_escape_string($conn,$_POST['customer_about']);
				$customer_phone = test_input($_POST['customer_phone']);
				$customer_picture = '';
				$query = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
				if (mysqli_num_rows($query)==0){
						$res_msg=array('status'=>'error','success'=>1,'msg'=>'The customer does not exists');
				}else{
						$customer_data = mysqli_fetch_array($query);
						$customer_picture = $customer_data['customer_picture'];

						if(!empty($_FILES['customer_image']['name'])){

							$file = $_FILES['customer_image']['name'];
							$extension =  strtoupper (pathinfo($file, PATHINFO_EXTENSION));
							$customer_picture = generateRandomString(5)."_".$customer_id.".".$extension;
							$target_file = $customer_img_dir . $customer_picture;
							if(in_array($extension,$allowedExts)){
								if (move_uploaded_file($_FILES["customer_image"]["tmp_name"], $target_file)){
									
								}else{
									$res_msg=array('status'=>'error','success'=>1,'msg'=>'error in uploading image');	
								}
							}else{
								$res_msg=array('status'=>'error','success'=>0,'msg'=>'Image format is not valid');
							}
						} //end pciture isset
						 $sql ="update customers set customer_country=$country_id, customer_city='$customer_city',customer_phone_number='$customer_phone',customer_zipcode='$customer_zipcode', customer_about='$customer_about',customer_picture='$customer_picture',customer_profile_status=1 where customer_id=$customer_id";

					$update_details = mysqli_query($conn,$sql);
					if ($update_details)
						$res_msg=array('status'=>'success','success'=>1,'msg'=>'The customer details has been saved');
					else
						$res_msg=array('status'=>'error','success'=>0,'msg'=>'Error in saving details');
				}  // end else here
				echo json_encode($res_msg);
			}#end update_customer_details

			if(isset($_POST['forget_customer_password'])){
				$customer_email = test_input($_POST['customer_email']);
				$check_customer = mysqli_query($conn,"select* from customers where customer_email_address='$customer_email'");

				if (mysqli_num_rows($check_customer)==1){
							$row = mysqli_fetch_assoc($check_customer);
							$customer_full_name = $row['customer_full_name'];
							$new_password = generateRandomString(10);
							$update_customer_password = mysqli_query($conn,"update customers set customer_password='$new_password' where customer_email_address='$customer_email'");
									if($files_are_on_server==1){
																	#--------send password to the customer email address
																	$mail = new PHPMailer(true);
											    		  			try {
								                                            $mail->setFrom($company_email_add, $company_name);
								                                            $mail->addAddress($customer_email,$customer_full_name); 
								                                            $mail->addReplyTo($company_email_add, 'Contact');
								                                            $mail->isHTML(true);
								                                            $mail->Subject = 'User Account Password Changed';
								                                            $mail_body = '<!DOCTYPE html>
																							<html lang="en">
																							<head>
																							  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																							  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
																							  </head><body>
																							  <div class="jumbotron">
																											  <h3>Hi '.$customer_full_name.',</h3>
																											  <p>Thanks, Your Account Password has been updated.</p>
																											  <p>Here’s your new password:<strong>'.$new_password.'</strong></p>
																											  <p>If you did not request, then please contact us <a href="mailto:'.$company_email_add.'">here</a></p>
																							</div>
																						</body></html>';
																					 $mail->Body = 	$mail_body;
								                                        
								                                            $mail->send();
								                                            $res_msg=array('status'=>'success','success'=>1,'msg'=>'Password has been sent to your email address');
								                                        } catch (Exception $e) {
								                                                     $msg= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
								                                                     $res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);  
								                                        }
						}	#end files_are_on_server condition here
						else{
								  $res_msg=array('status'=>'success','success'=>1,'msg'=>'Password Updated, yor are in localhost','customer_data'=>$row);
						}
				}else{

							$res_msg=array('status'=>'error','success'=>0,'msg'=>'customer with this email address does not exist');
				}
				echo json_encode($res_msg);
			}#end forget_customer_password


			if(isset($_POST['update_customer_password'])){
				$customer_id = $_POST['customer_id'];
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];
				$confirm_new_password = $_POST['confirm_new_password'];
				$check_customer = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
				if(mysqli_num_rows($check_customer)==0){
						$res_msg=array('status'=>'error','success'=>0,'msg'=>'customer does not exist');
				}else{
					$row = mysqli_fetch_assoc($check_customer);
					if($row['customer_password']==$old_password){
						if ($new_password==$confirm_new_password){
							if (strlen($new_password)<7){
									$res_msg=array('status'=>'error','success'=>0,'msg'=>'new password length must be greater than 7.','error'=>1);
							}else{
								#-------update password
								$update = mysqli_query($conn,"update customers set customer_password='$new_password' where customer_id=$customer_id");
								if($update)
									{
										$res_msg=array('status'=>'success','success'=>1,'msg'=>'Password has been changed.');
									}
								else{
										$res_msg=array('status'=>'error','success'=>0,'msg'=>'Error in updating password.');
								}

							}
						}else{
								$res_msg=array('status'=>'error','success'=>0,'msg'=>'New Password and confirm password does not matched');
						}
					}else{
						$res_msg=array('status'=>'success','success'=>1,'msg'=>'old password is wrong');
					}
				}
				echo json_encode($res_msg);
			}#update_customer_password


			if(isset($_POST['customer_logout'])){
				$customer_id = intval($_POST['customer_id']);
				$check_customer = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
				if(mysqli_num_rows($check_customer)==0){
						$res_msg=array('status'=>'error','success'=>0,'msg'=>'customer does not exist');
				}else{
					$update = mysqli_query($conn,"update customers set customer_login_flag=0 where customer_id=$customer_id");
					if ($update)
						$res_msg=array('status'=>'success','success'=>1,'msg'=>'Customer has log out successfully');
					else
						$res_msg=array('status'=>'error','success'=>0,'msg'=>'Error in updating');
				}	
				echo json_encode($res_msg);
			}#cend customer_logout
			





} // end customer_app

else {
		#------------------if any condition does not matched with 
	$msg = "This Request is invalid. You're not allowed to access this api";
	$res_msg=array('status'=>'error','success'=>0,'fail'=>1,"msg"=>$msg);
	echo json_encode($res_msg);
}	
?>