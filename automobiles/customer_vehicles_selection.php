<?php session_start();
	include 'admin/includes/database_connection.php';
  include 'translations/he.php';
   // require_once ( 'includes/translation_api/vendor/autoload.php');
	if(isset($_SESSION['gbh2_customer_id']) && isset($_SESSION['gbh2_customer_email']) )
	{	$gbh2_customer_id = $_SESSION['gbh2_customer_id'];
		$gbh2_customer_email = $_SESSION['gbh2_customer_email'];
		$sql = "SELECT * FROM customers WHERE customer_id=$gbh2_customer_id and customer_email='$gbh2_customer_email'";
		$fetch_customer_details = mysqli_query($conn,$sql);
		if(mysqli_num_rows($fetch_customer_details)==0){
				header("location:includes/logout.php");
		}	 //end num rows conditionsw
		else{
			$row = mysqli_fetch_array($fetch_customer_details);
			$customer_block= $row['customer_block'];
			$customer_name = $row['customer_name'];
 			if($customer_block==1){
				unset($_SESSION['gbh2_customer_id']);
				unset($_SESSION['gbh2_customer_email']);
				header("location:login.php?customer_blocked=1");
			}
		}
	} //end isset condiiton
	else{
			header("location:login.php");
	}

   function to_english($str){
  return $str;
 }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo to_hebrew("Selection Of Vehicles Types",$language_array); ?> || GBH2</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	       <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	      <script src="//code.jquery.com/jquery.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
	    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
	    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    	<link rel="manifest" href="favicons/site.webmanifest">
    	<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

      <link rel="stylesheet prefetch" href="assets/css/custom.css">

    	<style type="text/css">
        body {
     /* background-image: url("assets/images/second_cover.jfif");*/
       background-color: white;
       /* -webkit-background-size: cover; 
    -moz-background-size: cover;    
    -o-background-size: cover;      
    background-size: cover;   */     
}
.directional_class{
  direction: rtl;
}
    		.btn-inverse{
    			background-color: #212121 !important;
    border: 1px solid #212121 !important;
    color: #ffffff;
    		}
    		.check
				{
				    opacity:0.5;
					color:#996;
				}
				.img-check{
					width: 100%;
					height: 200px;
				}
				.bold_type_name{

					font-weight: 600;
				}
				.product-section {
/*  background-color: #f0f0f0;*/
      background-color: transparent;
   /* padding: 3.5rem 0;*/
  padding: 3.5rem 0; }
  .product-section .heading h2 {
    font-size: 3rem;
    font-weight: 600;
    font-style: normal;
    font-family: "Raleway", sans-serif;
    position: relative;
    text-align: center;
    vertical-align: middle; }
  .product-section .heading p {
    font-family: "Raleway", sans-serif;
    font-size: 16px;
    font-weight: 400;
    font-style: normal;
    vertical-align: middle;
    color: #777777; }
  .product-section .product-details {
    display: -webkit-flex;
    display: -ms-flex;
    display: -moz-flex;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 1.50rem; }
    .product-section .product-details .card {
      margin-right: 1.50rem;
      border: none;
      box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.15);
      overflow: hidden; }
      .product-section .product-details .card:hover .filter-image {
        bottom: 0; }
      .product-section .product-details .card .pro-image {
        width: 100%; }
        .product-section .product-details .card .pro-image img {
          width: 100%; }
      .product-section .product-details .card .product-cont {
        padding: 1rem 1.40rem; }
        .product-section .product-details .card .product-cont h6 {
          font-family: "Raleway", sans-serif;
          font-size: 15px;
          font-weight: 600;
          font-style: normal;
          position: relative;
          color: #777777; }
        .product-section .product-details .card .product-cont .dollar {
          font-size: 1.05rem;
          font-weight: 600;
          font-style: normal;
          font-family: "Raleway", sans-serif;
          position: relative;
          text-transform: uppercase;
          color: #252525; }
          .product-section .product-details .card .product-cont .dollar span {
            text-decoration: line-through;
            font-size: 14px; }
      .product-section .product-details .card .filter-image {
        position: absolute;
        background: #ffa500;
        width: 100%;
        bottom: -50px; }
      .product-section .product-details .card figcaption {
        text-align: center; }
        .product-section .product-details .card figcaption a {
          font-size: 20px;
          position: relative;
          color: #ffa500;
          width: 40px;
          height: 40px;
          border-radius: 2px;
          line-height: 40px;
          text-align: center;
          display: inline-block;
          background-color: #fff; }
          [class*=" imghvr-"],
[class^="imghvr-"] {
  background-color: #fff !important; }

[class*=" imghvr-"] figcaption, [class^="imghvr-"] figcaption {
  top: 350px !important;
  background-color: #ffa500 !important; }
  .btn-new{
  /*	background-color: #ffa500;
    color: #fff;
    font-size: 16px;
    font-family: "Raleway", sans-serif;
    font-weight: 600;
    border-radius: 0;
    text-transform: uppercase;
    margin-top: 2rem;
    border: 2px solid #ffa500;*/

    background-color: #516bf0;
    color: #fff;
    font-size: 20px;
    font-family: "Raleway", sans-serif;
    font-weight: 600;
    border-radius: 0;
    text-transform: uppercase;
    margin-top: 2rem;
    border: 2px solid #e6e4e0;
}

  .btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn-new{
    display: block;
    width: 100%;
}

.btn-new:hover{
	   background-color: transparent;
    color: black;
    border: 2px solid black;
    -webkit-transition: 0.25s ease;
    -moz-transition: 0.25s ease;
    -ms-transition: 0.25s ease;
    transition: 0.25s ease;
}

.product-cont h4 {
	width: 100%;
   /* -webkit-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.15);
    box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.15);*/
/*    padding: 2rem 0;*/
    font-weight: 600;
    font-family: "Raleway", sans-serif;
    font-size: 22px;
}

.img-check{
	cursor: pointer;
}
    	</style>
  
    </head>
	<body class="directional_class">
			<div class="container">
    <div class="row">
        <div class="product-section" style="margin-top: 50px;">
           
               

                		<?php
			      				if(isset($_GET['choose_any_type_error'])){
			      					if($_GET['choose_any_type_error']==1){
                        {
                                                $str =  to_hebrew("Alert! You have to choose any vehicle type",$language_array);
                        			      						  echo '<div class="alert alert-danger text-center">'.$str.'</div>';
                        }
			      					}
			      				}


			      			if(isset($_GET['customer_blocked'])){
                                if($_GET['customer_blocked']==1)
                                        {
                                          $str =  to_hebrew("You have been blocked from the gbh2 admin",$language_array);
                                          $str2=  to_hebrew("Help! Contact Admin For Details",$language_array);
                                          echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                                        echo '<div class="alert alert-info text-center">'.$str2.'</div>';
                                      }
                            }

                            if(isset($_GET['customer_no_type_error'])){
                            	if($_GET['customer_no_type_error']==1){
                                  $str =  to_hebrew("Alert! The Admin have not set any vehicle against your account",$language_array);
                                          $str2=  to_hebrew("Help! Contact Admin For Details",$language_array);
                            		 echo '<div class="alert alert-warning text-center">'.$str.'</div>';
                            		  echo '<div class="alert alert-info text-center">'.$str2.'</div>';
                            	}
                            }

                            if(isset($_GET['vehicles_type_match'])){
                            		if($_GET['vehicles_type_match']==0){
                                    $str =  to_hebrew("Alert! the vehicles types does not matched. Try Again!",$language_array);
                            			 echo '<div class="alert alert-danger text-center">'.$str.'</div>';
                            		}
                            	}
			      			?>
                	
                    <div class="col-md-12 text-center">
                        					
                        <div class="heading">
                            <h2> <?php
                               $str =  to_hebrew("Last Step! To Select The Vehicles Types",$language_array);
                             echo $str; ?></h2>
                            <!-- <strong></strong> -->
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        </div>
                    </div>
                    <div class="col-md-12" style="padding: 0;">
                    

                        <div class="product-details">


                          


										  <form method="post" action="actions/authentication.php" id="form">

										    <div class="form-group">
												<?php
														  $customer_id= $_SESSION['gbh2_customer_id'];
														  $query = mysqli_query($conn,"SELECT * FROM `vehicle_types`");
														  $dir = "uploads/vehicle_types/";
														 
														  while($row = mysqli_fetch_array($query)){
														  	$vehicle_type_id = $row['vehicle_type_id'];
															$vehicle_type_name = ucwords($row['vehicle_type_name']);
															$vehicle_type_img = $dir.$row['vehicle_type_img'];


														        echo '<div class="col-md-4" style="padding: 0;">
									                                <div class="card imghvr-push-up" id="'.$vehicle_type_id.'">
									                                    <div class="pro-image">
									                                        <img src="'.$vehicle_type_img.'"  class="img-responsive img-check" title="'.$vehicle_type_name.'" alt="'.$vehicle_type_id.'">

									                                    </div>
									                                    <div class="product-cont">
									                                        <h4 class="text-center">'.$vehicle_type_name.'</h4>
									                                    </div>
									                                	
									                                </div>
									                            </div>';


														  }
														 // $vehicle_type_name = "All Vehicles";
														 
												?>

										 	</div>
										<!--  	<input type="hidden" name="c_id" value="<?php #echo intval($_SESSION['gbh2_customer_id']); ?>"> -->	
										<div class="col-md-12" style="margin-top: 20px">
										 	<div class="form-group text-center">
										 		<button class="btn btn-new btn-lg" name="second_screen" type="submit" style="direction: rtl;"> <?php echo to_hebrew("Proceed To Main Website",$language_array); ?> </button>
	                                                                   <br>
								          <a href="logout.php" class="btn btn-primary btn-sm" name="" type=""><?php echo  to_hebrew("Logout",$language_array); ?></a>
						          </a>
										 	</div>
										</div>
										
										</form>	
                        
                        
                        </div>
                    </div>
                </div>
           
     
    </div>
</div>
    
 

 
  
  
	</body>

</html>
<script type="text/javascript">
$(document).ready(function(e){
    		$(".img-check").click(function(){
    			$(this).toggleClass("check");
    			let vehicle_type_id = $(this).attr('alt');
    			if ($(this).hasClass("check")){
    				let str = '<input type="hidden" name="selected_vehicles[]"  id="vehicle_type'+vehicle_type_id+'" value='+vehicle_type_id+'>';
    				$("#form").append(str);
    			}else{
    				$("#vehicle_type"+vehicle_type_id).remove();
    			}
				
				if($(".alert").length){
					$(".alert").hide();
				}
			});
});
</script>