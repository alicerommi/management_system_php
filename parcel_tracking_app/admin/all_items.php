<?php
  	include("header.php");
  	include("admin_classes/config.php");
?>
<div class="col-md-12 text-right" style="margin-top: 20px;">
				<a href="index.php" class="btn btn-primary" title="Add An Item"><i class="fa fa-plus"></i> Add A New Item</a>
		</div>



	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 20px;">
		<?php
			if(isset($_GET['deleted'])){
					if($_GET['deleted']==1){
						echo '<div class="alert alert-danger text-center" style="color:black; font-weight:600; margin-top:20px;">The record is deleted successfully.</div>';
					}else if($_GET['deleted']==0){
						echo '<div class="alert alert-warning text-center" style="color:black; font-weight:600; margin-top:20px;">Error in deleting record.</div>';
					}
			}
		?>
		
		 		<div class="panel panel-default" >
  <div class="panel-heading" style="color: black;">All Tracking Items</div>
  <div class="panel-body">
			    <div class="col-md-12">
			    		<table class="table table-bordered">	
			    					<thead>
			    					<th>Tracking ID</th>
			    					<th>Invoice Number</th>
			    					<th>Ship Type</th>
			    					<th>Booking Mode</th>
			    					<th>Actions</th>
			    					
			    					</thead>
			    					<tbody>
			    								<?php
			    									 $query = mysqli_query($db,"select* from courier");
                             while($row =  mysqli_fetch_array($query)){
                            
                           	
                            		$courier_id = $row['courier_id'];
                            		$tracking_id = $row['tracking_id'];  
                            		$ship_type = $row['shippment_type'];
$invoice_number = $row['invoice_number'];
$booking_mode = $row['booking_mode'];         
                                    // $catalogue = $row['catalogue'];
                                    // $consignor = $row['consignor'];
                                    // $consignee = $row['consignee'];
                                    // $cur_location = $row['cur_location'];
                                    // $date = $row['date'];
                                    // $time = $row['time'];
                                    // $status = $row['status'];
                                    $actions  = '<a class="btn btn-success" href="view_details.php?id='.$courier_id.'"><i class="fa fa-eye"></i></a> <a href="admin_classes/delete.php?courier_id='.$tracking_id.'" class="btn btn-danger"><i class="fa fa-trash"></i></a>';
                                    echo $row = '<tr>
                                    <td>'.$tracking_id.'</td>
                                    <td>'.$invoice_number.'</td>
                                    <td>'.$ship_type.'</td>
                                    <td>'.$booking_mode.'</td>
                                    <td>'.$actions.'</td>
                                    </tr>';
                                }
			    								?>
			    					</tbody>
			    		</table>

				
			    </div>
			    </div>
			      		</div>
				    
			    
  </div>
