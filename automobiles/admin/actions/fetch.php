<?php
		include '../includes/database_connection.php';
		include '../includes/functions.php';
          include '../includes/alert_messages.php';
		//fetch customer details
		if(isset($_POST['customer_id'])){
				$customer_id =  intval($_POST['customer_id']);
															echo '<table class="table table-striped table-bordered">
                                                    				<tbody>';
                                                                
                                                                $query = mysqli_query($conn,"select * from customers where customer_id = $customer_id");
                                                                $access_array = array();
                                     $access_query=mysqli_query($conn,"SELECT * FROM `customer_access_vehicles` where customer_id = $customer_id");
                                     while($rr  = mysqli_fetch_array($access_query)){
                                         array_push($access_array,$rr['customer_access_vehicle_type_id']);
                                     }//end while here
                                     $str = "";
                                                                $row = mysqli_fetch_array($query);
                                                                // print_r($row);
                                                                // die;
                                                                               $size = sizeof($access_array);

                                                                                if($size==1 && $access_array[0]==0){
                                                                                     $arr = ['inverse','success','danger','warning','pink','purple','info'];
                                                                            $random_number = rand(0,sizeof($arr)-1);
                                                                            $bt = $arr[$random_number];
                                                                                    $access = "All";
                                                                                    $access_val = 0; 
                                                                                      $str = '<div class="col-md-3"><button type="button" class="btn btn-'.$bt.' waves-effect waves-light m-b-5" title="'.$access.'" disabled>'.$access.'</button></div>';
                                                                                    // echo  $input = '<input type="hidden" name="selected_access_for_user[]"  class="different_roles" value="'.$access_val.'">';

                                                                                }else{

                                                                                        for ($i=0; $i <$size ; $i++) { 
                                                                                             $arr = ['inverse','success','danger','warning','pink','purple','info'];
                                                                                                $random_number = rand(0,sizeof($arr)-1);
                                                                                                $bt = $arr[$random_number];
                                                                                            $access_id = $access_array[$i];
                                                                                            $query = mysqli_query($conn,"SELECT * FROM `vehicle_types` where  vehicle_type_id=$access_id");
                                                                                            $access_val = $access_id;
                                                                                            $row2 = mysqli_fetch_array($query);
                                                                                            $access = ucwords($row2['vehicle_type_name']);
                                                                                               $str = $str.' <button type="button" class="btn btn-'.$bt.' waves-effect waves-light m-b-5" title="'.$access.'" disabled>'.$access.'</button>';
                                                                                                // echo  $input = '<input type="hidden" name="selected_access_for_user[]"  class="different_roles" value="'.$access_val.'">';
                                                                                        }// end for here
                                                                                }//end else 
                                                                    #$customer_id = $row['customer_id'];
                                                                    $customer_name = ucwords($row['customer_name']);
                                                                    $customer_email = $row['customer_email'];
                                                                    $customer_password = $row['customer_password'];
                                                                    $customer_added_by = $row['customer_added_by'];
                                                                    $customer_address = ucwords($row['customer_address']);
                                                                    $customer_contact_man = ucwords($row['customer_contact_man']);
                                                                    $customer_phone =ucwords( $row['customer_phone']);
                                                                    $customer_block = ucwords($row['customer_block']);
                                                                     $customer_ads_limit = $row['customer_ads_limit'];
                                                                    if($customer_block==1){
                                                                        $customer_block= "Blocked";
                                                                    }else{
                                                                        $customer_block= "Active";
                                                                    }

                                                                    // $access_query=mysqli_query($conn,"SELECT * FROM `customer_access_vehicles` where customer_id = $customer_id");
                                                                    // $str = "";
                                                                    // while($rr = mysqli_fetch_array($access_query)){
                                                                    //     $customer_access_vehicle_type_id = $rr['customer_access_vehicle_type_id'];
                                                                    //     if($customer_access_vehicle_type_id==0){
                                                                    //         $str = "All";
                                                                    //     }else{
                                                                    //         $query2 = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id = $customer_access_vehicle_type_id");
                                                                            
                                                                    //         if (mysqli_num_rows($query2)==1)
                                                                    //             {   $r = mysqli_fetch_array($query2);
                                                                    //                 $str= $str.",".ucwords($r['vehicle_type_name']);
                                                                    //             }   
                                                                    //         else
                                                                    //         {
                                                                    //                 while($rr = mysqli_fetch_array($query2) ){

                                                                    //                     $str= ucwords($rr['vehicle_type_name']).",".$str;
                                                                    //                 }
                                                                    //         }
                                                                    //     }
                                                                    // }
                                                                  // $actions = '<a href="actions/delete.php?delete_user=1&customer_id='.$customer_id.'" class="btn btn-danger"><i class="fa fa-times"></i></a>';
                                                        
                                                            //$actions = '<a title="Delete This Customer" href="actions/delete.php?delete_user=1&customer_id='.$customer_id.'" class="btn btn-danger"><i class="fa fa-times"></i></a> <a class="btn btn-success" href="update_customer.php?customer_id='.$customer_id.'" title="Update Customer Details"><i class="fa fa-pencil"></i></a>';

                                                            echo '<tr>
                                                            <td>Customer Address</td>
                                                              <td>'.$customer_address.'</td>
                                                            </tr>';
                                                            echo '<tr>
                                                            <td>Contact Man</td>
                                                            <td>'.$customer_contact_man.'</td>
                                                            </tr>';
                                                            echo '<tr>
                                                            <td>Customer Phone#</td>
                                                            <td>'.$customer_phone.'</td>
                                                            </tr>';
                                                            echo '<tr>
                                                            <td>Password</td>
                                                            <td>'.$customer_password.'</td>
                                                            </tr>';
                                                             echo '<tr>
                                                            <td>Ads Limit</td>
                                                            <td>'.$customer_ads_limit.'</td>
                                                            </tr>';
                                                            echo '<tr>
                                                            <td>Allowed Types</td>
                                                            <td>'.$str.'</td>
                                                            </tr>';


                                                           
                                                    echo '</tbody>
                                                </table>';
}

if(isset($_POST['form_filter'])){
      //print_r($_POST);
    //  die;
      $vehicle_type_id = $_POST['vehicle_type_id'];
     
      $query = "select* from vehicles_models join vehicle_types join vehicles_manufacture on vehicles_models.vehicle_type_id = vehicle_types.vehicle_type_id and vehicles_models.vehicle_manufacture_id = vehicles_manufacture.vehicle_manufacture_id and vehicles_models.vehicle_type_id=$vehicle_type_id";
      if(!empty($_POST['manufacture_filter']))
        {
            $manufacture_filter= strtolower($_POST['manufacture_filter']);
            $query = $query." and vehicles_manufacture.vehicle_manufacture_name='".$manufacture_filter."'";
        }

      if(!empty($_POST['model_filter']))
        {
            $model_filter= strtolower($_POST['model_filter']);
            $query = $query." and vehicles_models.vehicles_model_name='".$model_filter."'";
        }

        $sql = mysqli_query($conn,$query);
        if(mysqli_num_rows($sql)>0){
                                                    echo '<thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Vehicle Model</th>
                                                            <th>Vehicle Manufacture</th>
                                                              <th>Vehicle Type</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="filter_res">';
                                                                $count =0;
                                                                while($row = mysqli_fetch_array($sql)){
                                                                    $vehicles_model_id = $row['vehicles_model_id'];
                                                                    $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                    $vehicles_model_name = ucwords($row['vehicles_model_name']);
                                                                    $vehicle_manufacture_name = ucwords($row['vehicle_manufacture_name']);
                                                                    $count  = $count +1;
                                                                    echo '<tr>
                                                                     <td>'.$count.'</td>
                                                                    <td>'.$vehicles_model_name.'</td>
                                                                     <td>'.$vehicle_manufacture_name.'</td>
                                                                    <td>'.$vehicle_type_name.'</td>
                                                                    </tr>';
                                                                }
                    echo '</tbody>';
            }else{
                  //  echo '<div class="alert alert-danger"> No Result Found For Your Query</div>';
                     danger_message("No Result Found For Your Query");
            }
} //end form_filter


if(isset($_POST['filter_applier'])){
    $vehicle_type_id = $_POST['vehicle_type_id'];
      echo '<thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Vehicle Model</th>
                                                          
                                                            <th>Vehicle Manufacture</th>
                                                              <th>Vehicle Type</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody id="filter_res">';
                                                                $count =0;
                                                                $query = mysqli_query($conn,"select* from vehicles_models join vehicle_types join vehicles_manufacture on vehicles_models.vehicle_type_id = vehicle_types.vehicle_type_id and vehicles_models.vehicle_manufacture_id = vehicles_manufacture.vehicle_manufacture_id and vehicles_models.vehicle_type_id=$vehicle_type_id");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicles_model_id = $row['vehicles_model_id'];
                                                                    $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                    $vehicles_model_name = ucwords($row['vehicles_model_name']);
                                                                    $vehicle_manufacture_name = ucwords($row['vehicle_manufacture_name']);
                                                                    $count  = $count +1;
                                                                    echo '<tr>
                                                                     <td>'.$count.'</td>
                                                                    <td>'.$vehicles_model_name.'</td>
                                                                     <td>'.$vehicle_manufacture_name.'</td>
                                                                    <td>'.$vehicle_type_name.'</td>
                                                                    </tr>';
                                                                }
                                                                echo '</tbody>';
}//end filter_applier



    if(isset($_POST['fetch_v_types'])){
                                                                        $query = mysqli_query($conn,"select* from vehicle_types");
                                                                         while($row = mysqli_fetch_array($query)){
                                                                                $vehicle_type_id = $row['vehicle_type_id'];
                                                                                $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                                if (!in_array($vehicle_type_id, $access_array))
                                                                                    {
                                                                                        echo '<option value="'.$vehicle_type_id.'" id="opt_'.$vehicle_type_id.'" class="access_without_all">'.$vehicle_type_name.'</option>';
                                                                                    }
                                                                            }
    }  //end fetch_v_types


?>