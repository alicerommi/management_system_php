<?php
include "../../includes/config.php";
//for fetching the dealer info and showing it using a modal
if(isset($_POST['id'])){
	$numberOfActionPlans  = 0;
	$dealerID = $_POST['id'];
	$query = mysqli_query($con,"SELECT* FROM dealers WHERE dealer_id=$dealerID");
	$data = mysqli_fetch_array($query);
	 	$name=$data['dealer_name'];
		$email=$data['dealer_email'];
		$code=$data['dealer_code'];
		$region= $data['dealer_region'];
		$address = $data['dealer_address'];
		$nameOfResponsibePerson = $data['dealer_nameOfResponsibePerson'];
		//for getting the total number of action plan which this dealer has add an action plan
		$query2 = mysqli_query($con,"SELECT* FROM `actionplan` WHERE `ap_assignedto` = '$name'");
			 if(mysqli_num_rows($query2)>0){
			 	$numberOfActionPlans = mysqli_num_rows($query2);
			 	// $data2 = mysqli_fetch_array($query2);
			 	// $ap_id = $data2['ap_id'];
			 	// $ap_title = $data2['ap_title'];
			 }
			echo '  
                     <table class="table table-bordered">  
                         
                          <tr>  
                          	 	<td>Name</td>		
                               	<td>'.$name.'</td>  
                          </tr> 
                          <tr>
                           			<td>Code</td>
                           			<td>'.$code.'</td>
                          </tr>  
                          <tr>
                          	 <td>Name Of Responsibe Person</td>
                          	 <td>'.$nameOfResponsibePerson.'</td>
                          </tr>

                          <tr>
                          		<td>Region</td>
                          		<td>'.$region.'</td>
                          </tr> 

                          <tr>
                          		<td>Address</td>
                          		<td>'.$address.'</td>
                          </tr>
                          <tr>
                          		<td>Number of Action Plans</td>
                          		<td>'.$numberOfActionPlans.'</td>
                          </tr>';

                          if($numberOfActionPlans>0){
                          	echo '<tr><td>View All Action Plans of Dealer</td><td><a href="viewDealerPlans.php?id='.$dealerID.'&code='.$code.'" class="btn btn-block btn-outline btn-default waves-effect">View Action Plans</a></td></tr>';
                          }
                     echo '</table> ';  
}//end set condition
?>
					