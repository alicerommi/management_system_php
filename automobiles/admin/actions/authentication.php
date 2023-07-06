<?php session_start();
		include '../includes/database_connection.php';
		if(isset($_POST['loginAdmin'])){
					$captcha_code = $_POST['captcha_code'];
					if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                			header("location:../login.php?wrong_code=1");	
             		}else{
							$adminName = $_POST['adminName'];
							$adminPass = $_POST['adminPass'];
							$query = mysqli_query($conn,"select* from admin where admin_email='$adminName' and admin_password='$adminPass'");
							if(mysqli_num_rows($query)==1){
														$row = mysqli_fetch_array($query);	
														$admin_id = $row['admin_id'];
														$_SESSION['automobiles_adminSession'] = $adminName;

														if(!empty($_POST["remember"])) {
																setcookie ("admin_login",$adminName,time()+ (10 * 365 * 24 * 60 * 60));
														} else {
														if(isset($_COOKIE["admin_login"])) {
															setcookie ("admin_login","");
														}
													}
														header("location:../index.php");
							}else{
									header("location:../login.php?wrong=1");	
							}
				} // end captcha_code
		} //end loginAdmin	
?>