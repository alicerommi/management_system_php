<?php session_start();
	include '../admin/includes/database_connection.php';
	include '../admin/includes/functions.php';
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include '../includes/php_mailer/autoload.php';
    #--------defend the files are on server or not
    $files_are_on_server=1;


	if(isset($_POST['contact_form_save'])){
		if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                	header("Location:../contact.php?code_error=1");
        }else{
					$Name = $_POST['Name'];
					$Email = $_POST['Email'];
					$Message = mysqli_escape_string($conn,$_POST['Message']);
					$Phone = $_POST['Phone'];
					$query=  mysqli_query($conn,"INSERT INTO `users_msgs`( `msg_name`, `msg_email`, `msg_phone`,`msg_content`) VALUES ('$Name','$Email','$Phone','$Message')");
					if($query)
						header("Location:../contact.php?msg_send=1");
					else
						header("Location:../contact.php?msg_send=0");
		}
	}

if(isset($_POST['save_this_form'])){
            if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                $msg = array('error'=>1,'code_error'=>1,'success'=>0,'msg'=>ucwords('the validation code is wrong'));
             }else{
					$home_or_business = $_POST['home_or_business'];
					$selected_county = $_POST['selected_county'];
					$selected_energy_source = $_POST['selected_energy_source'];
					if($selected_energy_source=="electricity"){
						$energy_supplier_id = $_POST['electricity_energy_supplier'];
					}else{
						$energy_supplier_id = $_POST['gas_energy_supplier'];
					}
					$bill_period_selection = $_POST['bill_period_selection'];
					$bill_amount = $_POST['bill_amount'];
					$contact_name = $_POST['contact_name'];
					$contact_number = $_POST['contact_number'];
					$number_of_units = $_POST['number_of_units'];
					//first to check that the county have set a value from admin
					$check_county_value_set = mysqli_query($conn,"SELECT * FROM `county_with_suppliers` where county_id = $selected_county");

					if(mysqli_num_rows($check_county_value_set)==1){
						$county_row = mysqli_fetch_array($check_county_value_set);
						$county_configuration_id = $county_row['county_configuration_id'];
						if($home_or_business=="home"){
								$county_home_rate_per_unit = $county_row['county_home_rate_per_unit'];
								$county_standing_charges_for_home = $county_row['county_standing_charges_for_home'];
								$calculation1 = $number_of_units*$county_home_rate_per_unit;
								$standing_charges_percentage_formula_val = ($county_standing_charges_for_home/100)*365;
								$total_calculation1 = $calculation1 + $standing_charges_percentage_formula_val;
								$total_calculation1 = round($total_calculation1,2);

						}else{
								$county_business_rate_per_unit = $county_row['county_business_rate_per_unit'];
								$county_standing_charges_for_business = $county_row['county_standing_charges_for_business'];
								$standing_charges_percentage_formula_val = ($county_standing_charges_for_business/100)*365;
								$calculation1 = $number_of_units*$county_business_rate_per_unit;
								$total_calculation1 = $calculation1 + $standing_charges_percentage_formula_val;
								$total_calculation1 = round($total_calculation1,2);

						}
						$sql = "INSERT INTO `customer_form_filling`( `customer_name`, `customer_contact`, `customer_business_or_home`, `customer_county`, `customer_energy_soruce_type`, `customer_supplier_id`, `customer_bill_type`, `customer_bill_amount`, `customer_number_of_units`, `customer_standing_charges`, `customer_total_charges`) VALUES ('$contact_name','$contact_number','$home_or_business',$selected_county,'$selected_energy_source','$energy_supplier_id','$bill_period_selection','$bill_amount','$number_of_units','$standing_charges_percentage_formula_val','$total_calculation1')";
						
						$insert = mysqli_query($conn,$sql);
						if ($insert)
							{
								$last_id = mysqli_insert_id($conn);

									$query = mysqli_query($conn,"select* from customer_form_filling join counties join county_with_suppliers on  customer_form_filling.customer_id=$last_id and customer_form_filling.customer_county=counties.county_id and county_with_suppliers.county_id=customer_form_filling.customer_county");
									$row = mysqli_fetch_assoc($query);
									$customer_energy_soruce_type = $row['customer_energy_soruce_type'];
									$customer_supplier_id = intval($row['customer_supplier_id']);
									if ($customer_energy_soruce_type=="electricity")
									{	
													$sql = "select* from electricity_energy_suppliers where electricity_provider_id=$customer_supplier_id";
													$query2 = mysqli_query($conn,$sql);
													$row2 = mysqli_fetch_assoc($query2);
													$row['energy_provider_name'] = $row2['electricity_provider_name'];
									}
									else
										{
											$sql = "select* from gas_energy_suppliers where energy_supplier_id=$customer_supplier_id";
											$query2 = mysqli_query($conn,$sql);
											$row2 = mysqli_fetch_assoc($query2);
											$row['energy_provider_name'] = $row2['energy_supplier_name'];
										}

									$customer_name   = $row['customer_name'];
									$customer_contact    = $row['customer_contact'];
									$customer_business_or_home   = $row['customer_business_or_home'];
									$customer_county     = $row['customer_county'];
									$customer_energy_soruce_type     = $row['customer_energy_soruce_type'];
									$customer_supplier_id    = $row['customer_supplier_id'];
									$customer_bill_type  = $row['customer_bill_type'];
									$customer_bill_amount    = $row['customer_bill_amount'];
									$customer_number_of_units    = $row['customer_number_of_units'];
									$customer_standing_charges   = $row['customer_standing_charges'];
									$customer_total_charges  = $row['customer_total_charges'];
									$customer_record_date    = $row['customer_record_date'];
									$customer_record_date = human_timedate($customer_record_date);
									$county_name = ucwords($row['county_name']);
									$energy_provider_name = $row['energy_provider_name'];

									if ($customer_business_or_home=="home"){
										$county_standing_charges = $row['county_standing_charges_for_home'];
										$unit_rate =$row['county_home_rate_per_unit']; 
									}else{
										$county_standing_charges  = $row['county_standing_charges_for_business'];
										$unit_rate = $row['county_business_rate_per_unit'];
									}

									$total =round($unit_rate*$customer_number_of_units,2)+round(($county_standing_charges/100)*365,2);
									$button = '<div class="text-center">
		                                            <button class="btn btn-primary" name="switch_now" id="switch_now">Start Your Switch <i class="fa fa-forward"></i></button>
		                                    </div><br/><br/>';
									$html_code=
									'		

									<div class="panel panel-success" id="switched_div_after_form1">
		                                        <div class="panel-heading text-center">
		                                            <h4> Go Instant For £'.$total.' </h4>
		                                        </div>
		                                        <div class="panel-body" id="penel_body_after_form1">
					                    			<table class="table table-bordered ">
							                                <tr>
							                                        <td style="width: 70%;  font-size:20px;font-weight:600; color:#005321">Number of Units</td>
							                                        <td style="font-size: 20px;color: #005321;font-weight: 700;">'.$customer_number_of_units.'</td>
							                                </tr>
							                                <tr>
							                                        <td style="width: 70%; font-size:20px;font-weight:600; color:#005321">Unit Rate (Set By Admin)</td>
							                                        <td style="font-size: 20px;color: #005321;font-weight: 700;">'.$unit_rate.'</td>
							                                </tr>
							                                 <tr>
							                                        <td style="width: 70%; font-size:20px;font-weight:600; color:#005321">Calculation (Units*Unit Rate) </td>
							                                        <td style="font-size: 20px;color: #005321;font-weight: 700;">'.$unit_rate.'x'.$customer_number_of_units.'='.round($unit_rate*$customer_number_of_units,2).'</td>
							                                </tr>
							                                <tr>
							                                        <td style="width: 70%; font-size:20px;font-weight:600; color:#005321">Standing Charges (Set By Admin)</td>
							                                        <td style="font-size: 20px;color: #005321;font-weight: 700;">'.$county_standing_charges.'</td>
							                                </tr>
							                                <tr>
							                                        <td style="width: 70%; font-size:20px;font-weight:600; color:#005321">Standing Charges Calculations (X/100)x365</td>
							                                        <td style="font-size: 20px;color: #005321;font-weight: 700;">'.round(($county_standing_charges/100)*365,2).'</td>
							                                </tr>
							                                <tr>	
							                                		<td style="width: 70%; font-size:20px;font-weight:600; color:#005321">Total (Units*Unit Rate+Standing Charges Calculations) [('.round($unit_rate*$customer_number_of_units,2).')+('.round(($county_standing_charges/100)*365,2).')]</td>
							                                		<td style="font-size: 20px;color: #005321;font-weight: 700;">£'.$total.'</td>
							                                </tr>
					                    			</table>
		                    					</div>
		                    	</div>';
		                    	#------------send email to customer
		                    	if ($files_are_on_server==1){	
		                    		$mail = new PHPMailer(true);
		                    		try {
		                    			$company_name = "Instant Energy";
		                    			$company_email_add = "info@instantenergy.co.uk";
										$mail->setFrom($company_email_add, $company_name);
										$mail->addAddress($customer_email_add,ucwords($customer_name)); 
										$mail->addReplyTo($company_email_add, 'Contact');
										$mail->isHTML(true);
										$mail->Subject = 'Hello From Instant Energy';
										$mail_body = '<!DOCTYPE html>
																									<html lang="en">
																									<head>
																									  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																									  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
																									  </head><body>
																									  <div class="jumbotron">
																									  
																									  <div class="text-center">
																									  	<img src="http://instantenergy.co.uk/images/cropped.png" alt="Company Logo">
																									  </div>
																									  <h2>Go Instant For £'.$total.'</h2>
																										<h4>Hi '.ucwords($customer_name).',</h4>
																										<p><strong>Here’s your Quote for '.$county_name.':</strong></p>
																										<p>Based on the usage you gave us, your energy would cost <strong>£'.$total.'</strong> with Instant.</p>

																										<h4>Here is more details about your quotation:</h4>
																										'.$html_code.'

																										<p>We do not have any additional charges. This quote is what you will pay based on the usage you gave us.</p> 
																													  </div></body></html>';
										$mail->Body=$mail_body;
										$mail->send();
									}catch (Exception $e) {
										                                                     $msg= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
										                                                     $res_msg=array('status'=>'error','success'=>0,'fail'=>1,'msg'=>$msg);  
									}
		                    	}
								$msg = array('error'=>0,'success'=>1,'msg'=>'The details has been saved','html_code'=>$html_code);
							}
						else
							{$msg = array('error'=>1,'success'=>0,'msg'=>'Error in saving details');}
					}else{
						$msg = array('error'=>1,'success'=>0,'msg'=>'The value is not set by the administrator for chosen county.');
					}
				}//end capcha else here
			echo json_encode($msg);
	}
?>