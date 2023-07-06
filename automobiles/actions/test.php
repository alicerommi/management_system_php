<?php	
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include '../includes/php_mailer/autoload.php';
$customer_name = "abc";
$customer_email_id = "rehmana578@gmail.com";
$last_id = "3";
$vehicle_manufacture_id = $vehicle_model =$vehicle_type=1; 
$fn = email_sender($customer_name,$customer_email_id,$last_id,$vehicle_manufacture_id,$vehicle_model,$vehicle_type);
echo $fn;
    
function email_sender($full_name,$email_address,$vehicle_ad_id,$vehicle_manufacture_id,$vehicle_model,$vehicle_type){
																$company_name = "GBH Trader";
																$company_email_add = "gbhtradeco@srv.linuxisrael.co.il";
																$mail = new PHPMailer(true);
											    		  			try {
								                                            $mail->setFrom($email_address, $company_name);
								                                            $mail->addAddress($company_email_add,$full_name); 
								                                            $mail->addReplyTo($company_email_add, 'GBH Trade Notification');
								                                            $mail->isHTML(true);
								                                           $url = "https://www.gbhtrade.co.il/view_vehicle_details.php?vehicle_ad_id=".$vehicle_ad_id;

								                                            $mail->Subject = 'Good News! We have found a vehicle for you';
								                                            //$mail->Subject = 'Your '.$company_name.' email verification code';
								                                            $mail_body = '<!DOCTYPE html>
																							<html lang="en">
																							<head>
																							  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
																							  
																							  </head><body>
																							  <div class="jumbotron">
																											  <h3>Hi '.ucwords($full_name).',</h3>

																											  <p>We have found a vehicle for you, we noticed you were finding a vehicle but at that time we dont have the vehicle with that specifications. Now, we found that vehicle for you.</p>

																											  <p>For Viewing details of vehicle, please login and see the details on this link.</p>
																											  
																											  <a class="btn btn-success" href="'.$url.'">Click To See Vehicle Details</a>
																											  
																							</div>
																						</body></html>';
																					 $mail->Body = 	$mail_body;
								                                            if($mail->send()){
								                                            	return  "Email Has Been Sent";
								                                            }else{
								                                            	return "Error in sending email";
								                                            }
															}catch (Exception $e){
																return 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
															}
} //end email sender function ehre
  ?>