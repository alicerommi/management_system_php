<?php
  	include("header.php");
  	include("admin_classes/config.php");
?>
<div class="col-md-12 text-right" style="margin-top: 20px;">
				<a href="all_items.php" class="btn btn-info" title="View All The Tracking Items"><i class="fa fa-eye"></i> View All Tracking Items</a>
		</div>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		
		<?php
			if(isset($_GET['added'])){
					if($_GET['added']==1){
						echo '<div class="alert alert-success text-center" style="color:black; font-weight:600; margin-top:20px;">The record is inserted successfully.</div>';
					}else if($_GET['added']==0){
						echo '<div class="alert alert-warning text-center" style="color:black; font-weight:600; margin-top:20px;">Error in inserting record.</div>';
					}
			}
		?>
			
		 		<div class="panel panel-default" style="margin-top: 20px;">
  <div class="panel-heading" style="color: black;">Enter Shipping Information</div>
  <div class="panel-body">
			    <div class="col-md-12">
			    	<form action="admin_classes/insert.php" method="post">
			      		<div class="col-md-6">
			      						<div class="form-group">
			      							<label>Enter The Tracking ID</label>
			      							<input type="text" name="tracking_id" required class="form-control">
			      						</div>
			    			<!-- <div class="form-group">
			    				<label>Enter CATALOGUE</label>
			    				<textarea type="text" name="CATALOGUE" required class="form-control" rows="4" cols="5"></textarea>
			    			</div>
			    			<div class="form-group">
			    				<label>Enter CONSIGNOR</label>
			    				<textarea type="text" name="CONSIGNOR" required class="form-control" rows="4" cols="5"></textarea>
			    			</div>
			    				<div class="form-group">
			    				<label>Enter CONSIGNEE</label>
			    				<textarea type="text" name="CONSIGNEE" required class="form-control" rows="4" cols="5"></textarea>
			    			</div> -->
			    				<div class="form-group">
			    				<label>Enter Delievery  Time</label>
			    				<input type="time" name="time" required class="form-control" rows="4" cols="5">
			    			</div>

			    			<div class="form-group">
			    				<label>Enter  Delievery Date</label>
			    				<input type="date" name="date" required class="form-control" rows="4" cols="5">
			    			</div>

			    			<div class="form-roup">
			    				<label>Enter Current Location</label>
			    				<input type="text" name="current_loca" required class="form-control" rows="4" cols="5">
			    			</div>

			    				<div class="form-group">
			    				<label>Enter Consignment Number</label>
			    				<input type="text" name="consignment" required class="form-control" rows="4" cols="5">
			    			</div>

			    			<div class="form-group">
			    				<label>Enter Item Name</label>
			    				<input type="text" name="item_name" required class="form-control" rows="4" cols="5">
			    			</div>

			    			<div class="form-group">
			    				<label>Enter Item Weight</label>
			    				<input type="text" name="item_wright" required class="form-control" rows="4" cols="5">
			    			</div>


								<div class="form-group">
			    				<label>Enter Invoice Number</label>
			    				<input type="text" name="invoice_number" required class="form-control" rows="4" cols="5">
			    			</div>

			    				<div class="form-group">
			    				<label>Enter Booking Mode</label>
			    				<input type="text" name="booking_mode" required class="form-control" rows="4" cols="5">
			    			</div>

			    		

			    			
			      		</div>

			      			<div class="col-md-6">
			      								
			      				<div class="form-group">
			      							<label>Enter Shipper Name</label>
			      							<input type="text" name="shipper_name" required class="form-control">
			      						</div>
			      								<div class="form-group">
			      							<label>Enter Shipper Phone</label>
			      							<input type="text" name="shipper_phone" required class="form-control">
			      						</div>

			      						
			      						<div class="form-group">
			      							<label>Enter Shipper Address</label>
			      							<input type="text" name="shipper_address" required class="form-control">
			      						</div>



			      				<div class="form-group">
			      							<label>Enter Receiver Name</label>
			      							<input type="text" name="reciever_name" required class="form-control">
			      						</div>
			      								<div class="form-group">
			      							<label>Enter Receiver Phone</label>
			      							<input type="text" name="reciever_phone" required class="form-control">
			      						</div>

			      						
			      						<div class="form-group">
			      							<label>Enter Receiver Address</label>
			      							<input type="text" name="reciever_address" required class="form-control">
			      						</div>
			      							

			      							<div class="form-group">
			      							<label>Enter Ship Type</label>
			      							<input type="text" name="ship_type" required class="form-control">
			      						</div>

			      						<div class="form-group">
			    				<label>Enter Status</label>
			    				<input type="text" name="status" required class="form-control" rows="4" cols="5">
			    			</div>
			    			<div class="form-group">
			    				<label>Enter Mode</label>
			    				<input type="text" name="mode" required class="form-control" rows="4" cols="5">
			    			</div>

			    			<div class="text-right">
	<button class="btn btn-success" name="save" type="submit">Save</button>
</div>


			      							



			      						


			      			</div>
	</form>
			    </div>
			    </div>
			      		</div>
				    
			    
  </div>
</div>