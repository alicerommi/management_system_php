<?php
  	include("header.php");
  	include("admin_classes/config.php");
?>
<style type="text/css">
	.row_header{
			font-weight: 600;
			    width: 200px;
	}
</style>



		
	<div class="col-md-12 text-right" style="margin-top: 20px;">
				<a href="all_items.php" class="btn btn-info" title="View All The Tracking Items"><i class="fa fa-eye"></i> View All Tracking Items</a>
		</div>

	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 20px;">
	<?php
			if(isset($_GET['added'])){
					if($_GET['added']==1){
						echo '<div class="alert alert-success text-center" style="color:black; font-weight:600; margin-top:20px;">The record is inserted successfully.</div>';
					}else if($_GET['added']==0){
						echo '<div class="alert alert-warning text-center" style="color:black; font-weight:600; margin-top:20px;">Error in inserting record.</div>';
					}
			}
		?>

		 		<div class="panel panel-default" >
				  <div class="panel-heading" style="color: black;">View Tracking & Shipment History</div>
				  <div class="panel-body">
			    <div class="col-md-12">
			    	<?php
			    		$id = intval($_GET['id']);
			    		$query = mysqli_query($db,"select* from courier where courier_id=$id");
			    		$row = mysqli_fetch_array($query);
		    			$tracking_id = $row['tracking_id'];
			    	// 		shippment_type
$consignment_number = $row['consignment_number'];
$item_name = $row['item_name'];
$weight = $row['weight'];
$invoice_number = $row['invoice_number'];
$booking_mode = $row['booking_mode'];
$mode = $row['mode'];
								$shipper_name = $row['shipper_name'];
								$shipper_address = $row['shipper_address'];
								$shipper_phone = $row['shipper_phone'];
								$reciver_name = $row['reciver_name'];
								$reciver_address = $row['reciver_address'];
								$reciver_phone = $row['reciver_phone'];
								$shippment_type = $row['shippment_type'];
			    	?>
			    		<table class="table table-bordered">
			    						<tr>
			    								<td class="row_header">Tracking ID</td>
			    								<td><?php echo $tracking_id; ?></td>
			    								
			    						</tr>
			    						<tr>
			    								<td class="row_header">Consignment Number</td>
			    								<td><?php echo $consignment_number; ?></td>
			    								
			    						</tr>


			    						<tr>
			    								<td class="row_header">Item Name</td>
			    								<td><?php echo $item_name; ?></td>
			    								
			    						</tr>

			    						<tr>
			    								<td class="row_header">Invoice Number</td>
			    								<td><?php echo $invoice_number; ?></td>
			    								
			    						</tr>

			    							<tr>
			    								<td class="row_header">Booking Mode</td>
			    								<td><?php echo $booking_mode; ?></td>
			    								
			    						</tr>


			    							<tr>
			    								<td class="row_header">Mode</td>
			    								<td><?php echo $mode; ?></td>
			    								
			    						</tr>


			    							<tr>
			    								<td class="row_header">Item Weight</td>
			    								<td><?php echo $weight; ?></td>
			    								
			    						</tr>
			    						<tr>
			    								<td class="row_header">Shipper Name</td>
			    								<td><?php echo $shipper_name; ?></td>
			    								
			    						</tr>
			    						<tr>
			    							<td class="row_header">Shipper Address</td>
			    								<td><?php echo $shipper_address; ?></td>
			    								
			    						</tr>
			    						<tr>
			    								<td class="row_header">Shipper Phone</td>
			    								<td><?php echo $shipper_phone; ?></td>
			    								
			    						</tr>

			    						<tr>
			    								<td class="row_header">Receiver Name</td>
			    								<td><?php echo $reciver_name; ?></td>
			    								
			    						</tr>
			    						<tr>
			    								<td class="row_header">Receiver Address</td>
			    								<td><?php echo $reciver_address; ?></td>
			    								
			    						</tr>

			    						<tr>
			    								<td class="row_header">Receiver Phone</td>
			    								<td><?php echo $reciver_phone; ?></td>
			    								
			    						</tr>

			    						<tr>
			    								<td class="row_header">Shipment Type</td>
			    								<td><?php echo $shippment_type; ?></td>
			    								
			    						</tr>

			    		</table>

				
			    </div>
			    </div>
			      		</div>

			      			<div class="panel panel-default" >
				  <div class="panel-heading" style="color: black;">Add & View Shipment History</div>
				  <div class="panel-body">
				  	<div class="col-md-12">
				  			<form method="post" action="admin_classes/insert.php">
				  					<div class="col-md-6">
							  					<input type="hidden" name="id" value="<?php echo $tracking_id;?>">
							  					<input type="hidden" name="bbid" value="<?php echo $_GET['id'];?>">
							  					
							  					<div class="form-group">
							  						<label>Enter Location</label>

							  								<input type="text" name="location" class="form-control" required>
							  					</div>
							  					<div class="form-group">
							  						<label>Enter Date</label>
							  							<input type="date" name="date" class="form-control" required>
							  					</div>
							  					

				  				</div>
				  				<div class="col-md-6">
				  					<div class="form-group">
							  							<label>Enter Time</label>
							  								<input type="time" name="time" class="form-control" required>
							  					</div>
				  					<div class="form-group">
				  							<label>Enter Status</label>
				  								<input type="text" name="status" class="form-control" required>
				  					</div>
				  					<div class="form-group text-right">
				  						<button type="submit" class="btn btn-info" name="addStatus">Save</button>
				  					</div>
				  				</div>
				  			</form>
				  	</div>

			    <div class="col-md-12">
			    	<?php
			    		
			    		$query2 = mysqli_query($db,"select* from time_status where tracking_id='$tracking_id'");

			    		
			    	?>
			    		<table class="table table-bordered">
			    						<thead>
			    								<th>Current Location</th>
			    								<th>Date</th>
			    								<th>Time</th>
			    								<th>Status</th>
			    						</thead>
			    						<tbody>
			    							<?php
			    								while($row2 = mysqli_fetch_array($query2)){
			    							$status_date = $row2['status_date'];
											$status_time = $row2['status_time'];
											$shipment_status = $row2['shipment_status'];
											$status_cur_location = $row2['status_cur_location'];
			    									echo '<tr>
			    									<td>'.$status_cur_location.'</td>
			    									<td>'.$status_date.'</td>
			    									<td>'.$status_time.'</td>
			    										<td>'.$shipment_status.'</td>
			    									</tr>';
			    								}
			    							?>
			    						</tbody>	

			    		</table>

				
			    </div>
			    </div>
			      		</div>
				    
			    
  </div>
