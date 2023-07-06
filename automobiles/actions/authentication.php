<?php session_start();
	include '../admin/includes/database_connection.php';

	if(isset($_POST['do_login_customer'])){
		$txtemail = mysqli_escape_string($conn,trim($_POST['txtemail']));
								$txtPassword = mysqli_escape_string($conn,trim($_POST['txtPassword']));
					$captcha_code = $_POST['captcha_code'];
					if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                			header("location:../login.php?wrong_code=1?gbh2_customer_email=".$txtemail."&pass=".$txtPassword);	
             		}else{
								
								$query = mysqli_query($conn,"select* from customers where customer_email='$txtemail' and customer_password='$txtPassword'");
								if(mysqli_num_rows($query)==1){
										$row = mysqli_fetch_assoc($query);
										$customer_block= $row['customer_block'];
										if($customer_block==1){
											header("location:../login.php?customer_blocked=1");
										}else{
											$_SESSION['gbh2_customer_id'] = $row['customer_id'];
											$_SESSION['gbh2_customer_email'] = $txtemail;
											if(!empty($_POST["remember"])) {
																setcookie ("gbh2_customer_login",$txtemail,time()+ (10 * 365 * 24 * 60 * 60));
														} else {
														if(isset($_COOKIE["gbh2_customer_login"])) {
															setcookie ("gbh2_customer_login","");
														}
											}
											header("location:../customer_vehicles_selection.php");
										}
								}else{
									header("location:../login.php?wrong=1");
								}
				} // end captcha_code
		} //end loginAdmin	
		if(isset($_POST['second_screen'])){
			// print_r($_POST);
			// die;
			if(isset($_POST['selected_vehicles'])  ){
				$vehicle_types_arr = $_POST['selected_vehicles'];
				
				$gbh2_customer_id = intval($_SESSION['gbh2_customer_id']);
				$check_customer_first =  mysqli_query($conn,"select* from customers where customer_id=$gbh2_customer_id");
				if(mysqli_num_rows($check_customer_first)==1){
										$row = mysqli_fetch_assoc($check_customer_first);
										$customer_block= $row['customer_block'];
										if($customer_block==1){
													header("location:../customer_vehicles_selection.php?customer_blocked=1");
										}else{
											$customer_db_array_access_query = mysqli_query($conn,"select* from customer_access_vehicles where customer_id = $gbh2_customer_id");
											if(mysqli_num_rows($customer_db_array_access_query)==0){
												header("location:../customer_vehicles_selection.php?customer_no_type_error=1");
											}else if(mysqli_num_rows(mysqli_query($conn,"select* from customer_access_vehicles where customer_id = $gbh2_customer_id and customer_access_vehicle_type_id=0"))==1){	
												$_SESSION['gbh2_selected_types_all']=1;
												$_SESSION['gbh2_selected_types_without_all']=0;
												header("location:../index.php?welcome_note=1");
											}else{
												$access_array = array ();
												//$all_match=0;
												while($rrr = mysqli_fetch_assoc($customer_db_array_access_query)){
													$val = intval($rrr['customer_access_vehicle_type_id']);
													array_push($access_array, $val);
												} //end while here
												$same = ( count( $access_array ) == count( $vehicle_types_arr ) && !array_diff( $access_array, $vehicle_types_arr ) );

												if($same){
														$_SESSION['gbh2_selected_types_all']=0;
														$_SESSION['gbh2_selected_types_without_all']=1;
														header("location:../index.php?welcome_note=1");
												}else{
													header("location:../customer_vehicles_selection.php?vehicles_type_match=0");
												}

											}//end else here
										} //end first else heree
				}
			}else{
				header("location:../customer_vehicles_selection.php?choose_any_type_error=1");
			}
		}

?>