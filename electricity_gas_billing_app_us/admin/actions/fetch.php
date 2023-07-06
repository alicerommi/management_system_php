<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';

		if(isset($_POST['fetch_msg'])){
			$msg_id = $_POST['msg_id'];
			$query = mysqli_query($conn,"select* from users_msgs where msg_id = $msg_id");
			$row  = mysqli_fetch_array($query);
			echo json_encode($row);
		}

		if(isset($_POST['fetch_form_data'])){
			#$data = array();
			$form_id = intval($_POST['form_id']);
			$query = mysqli_query($conn,"select* from customer_form_filling join counties join county_with_suppliers on  customer_form_filling.customer_id=$form_id and customer_form_filling.customer_county=counties.county_id and county_with_suppliers.county_id=customer_form_filling.customer_county");
			$row = mysqli_fetch_assoc($query);
			$customer_energy_soruce_type = $row['customer_energy_soruce_type'];
			$customer_supplier_id = intval($row['customer_supplier_id']);
			#$customer_business_or_home= $row['customer_business_or_home'];
			#$data[] = $row;
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
					$county_standing_charges = $row['county_standing_charges_for_home']."X";
					$unit_rate =$row['county_home_rate_per_unit']; 
				}else{
					$county_standing_charges  = $row['county_standing_charges_for_business']."X";
					$unit_rate = $row['county_business_rate_per_unit'];
				}

				$total =round($unit_rate*$customer_number_of_units,2)+round(($county_standing_charges/100)*365,2);
					echo '<h4>Customer Details</h4>
                    <table class="table table-bordered ">
                        <tr>
                                <td style="    width: 50%;">Customer Name</td>
                                <td>'.$customer_name.'</td>
                        </tr>
                        <tr>
                                <td style="    width: 50%;">Customer Phone Number</td>
                                <td>'.$customer_contact.'</td>
                        </tr>
                         <tr>
                                <td style="    width: 50%;">Entry Date & Time</td>
                                <td>'.$customer_record_date.'</td>
                        </tr>

                    </table>

                    <h4>Customer Form Data</h4>
                    <table class="table table-bordered ">
                                <tr>
                                        <td style="    width: 50%;">Customer Property Type</td>
                                        <td>'.ucwords($customer_business_or_home).'</td>
                                </tr>
                                <tr>
                                        <td style="    width: 50%;">Customer County Name</td>
                                        <td>'.$county_name.'</td>
                                </tr>

                                 <tr>
                                        <td style="    width: 50%;">Customer Energy Source</td>
                                        <td>'.ucwords($customer_energy_soruce_type).'</td>
                                </tr>

                                <tr>
                                        <td style="    width: 50%;">Energy Supplier Name</td>
                                        <td>'.ucwords($energy_provider_name).'</td>
                                </tr>
                                 <tr>
                                        <td style="    width: 50%;">Customer Bill Type</td>
                                        <td>'.ucwords($customer_bill_type).'</td>
                                </tr>
                                 <tr>
                                        <td style="    width: 50%;">Customer Bill Amount</td>
                                        <td>£'.$customer_bill_amount.'</td>
                                </tr>


                    </table>

                     <h4>Calculations & Formulas</h4>
                    <table class="table table-bordered ">
                                <tr>
                                        <td style="width: 50%;">Number of Units</td>
                                        <td>'.$customer_number_of_units.'</td>
                                </tr>
                              
                                <tr>
                                        <td style="width: 50%;">Unit Rate (Set By Admin)</td>
                                        <td>'.$unit_rate.'</td>
                                </tr>

                                 <tr>
                                        <td style="width: 50%;">Calculation (Units*Unit Rate) </td>
                                        <td>'.$unit_rate.'x'.$customer_number_of_units.'='.round($unit_rate*$customer_number_of_units,2).'</td>
                                </tr>

                                <tr>
                                        <td style="width: 50%;">Standing Charges (Set By Admin)</td>
                                        <td>'.$county_standing_charges.'</td>
                                </tr>

                                <tr>
                                        <td style="width: 50%;">Standing Charges Calculations (X/100)x365</td>
                                        <td>'.round(($county_standing_charges/100)*365,2).'</td>
                                </tr>

                                <tr>	
                                		<td style="width: 50%;">Total (Units*Unit Rate+Standing Charges Calculations) [('.round($unit_rate*$customer_number_of_units,2).')+('.round(($county_standing_charges/100)*365,2).')]</td>
                                		<td>£'.$total.'</td>
                                </tr>

                    </table>';

			//if ($customer_business_or_home=="home"){
					// $unit_rate
			//}
				
				#$data[] = $row;
				// $data[] = ;
			#echo json_encode($row);
		}//end fetch_form_data


		if(isset($_POST['fetch_suppliers'])){
			$type = test_input($_POST['type']);
			if($type=="gas"){
				$query = mysqli_query($conn,"select* from gas_energy_suppliers");
				$str = "<label>Choose Gas Supplier</label><select name='selected_supplier' class='form-control'> ";
				while($row = mysqli_fetch_array($query)){
					$energy_supplier_id = $row['energy_supplier_id'];
					$energy_supplier_name = $row['energy_supplier_name'];
					$str = $str.'<option value="'.$energy_supplier_id.'">'.ucwords($energy_supplier_name).'</option>';
				}
				echo $str.'</select>';
			}else{
				$query = mysqli_query($conn,"select* from `electricity_energy_suppliers` ");
				$str = "<label>Choose Electricity Supplier</label><select name='selected_supplier' class='form-control'> ";
				while($row = mysqli_fetch_array($query)){
					$energy_supplier_id = $row['electricity_provider_id'];
					$energy_supplier_name = $row['electricity_provider_name'];
					$str = $str.'<option value="'.$energy_supplier_id.'">'.ucwords($energy_supplier_name).'</option>';
				}
				echo $str.'</select>';
			}
		} //// end fetch_suppliers
?>