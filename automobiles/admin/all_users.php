<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php                        
                                        if(isset($_GET['deleted'])){
                                            if($_GET['deleted']==1){
                                                messages("Customer Has Been Deleted Successfully","danger");
                                            }else if($_GET['deleted']==0){
                                                  messages("Error in deleting customer","warning");
                                            }
                                        }
                                        
                                         if(isset($_GET['operation'])){
                                            if($_GET['operation']==1){
                                                messages("Operation Successfully Done","danger");
                                            }else if($_GET['operation']==0){
                                                  messages("Error in doing operation","warning");
                                            }
                                        }
                                         show_button("add_a_user.php","Add A New User","purple","plus");
                            ?>
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">All Added Customers</h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <!-- <th>Address</th> -->
                                                            <th>Contact Man</th>
                                                            <!-- <th>Phone</th> -->
                                                            <th>Status</th>
                                                         <!--    <th>Allowed</th> -->
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                <?php
                                                                $query = mysqli_query($conn,"select * from customers");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $customer_id = $row['customer_id'];
                                                                    $customer_name = ucwords($row['customer_name']);
                                                                    $customer_email = $row['customer_email'];
                                                                    $customer_password = $row['customer_password'];
                                                                    $customer_added_by = $row['customer_added_by'];
                                                                    $customer_address = $row['customer_address'];
                                                                    $customer_contact_man = $row['customer_contact_man'];
                                                                    $customer_phone = $row['customer_phone'];
                                                                    $customer_block = $row['customer_block'];

                                                                    if($customer_block==1){
                                                                        $customer_block= "Blocked";
                                                                         $btn = '<button type="button" class="btn btn-danger waves-effect waves-light m-b-5" title="Blocked" disabled>'.$customer_block.'</button>';
                                                                         $customer_block = $btn;
                                                                    }else{
                                                                        $customer_block= "Active";
                                                                        $btn = '<button type="button" class="btn btn-purple waves-effect waves-light m-b-5" title="Active" disabled>'.$customer_block.'</button>';
                                                                        $customer_block = $btn;
                                                                    }

                                                                    $flag = $row['customer_block'];
                                                                    $access_query=mysqli_query($conn,"SELECT * FROM `customer_access_vehicles` where customer_id = $customer_id");
                                                                    $str = "";
                                                                    while($rr = mysqli_fetch_array($access_query)){
                                                                        $customer_access_vehicle_type_id = $rr['customer_access_vehicle_type_id'];
                                                                        if($customer_access_vehicle_type_id==0){
                                                                            $str = "All";
                                                                        }else{
                                                                            $query2 = mysqli_query($conn,"select* from vehicle_types where vehicle_type_id = $customer_access_vehicle_type_id");
                                                                            
                                                                            if (mysqli_num_rows($query2)==1)
                                                                                {   $r = mysqli_fetch_array($query2);
                                                                                    $str= $str.",".ucwords($r['vehicle_type_name']);
                                                                                }   
                                                                            else
                                                                            {
                                                                                    while($rr = mysqli_fetch_array($query2) ){
                                                                                        $str= $str.",".ucwords($rr['vehicle_type_name']);
                                                                                    }
                                                                            }
                                                                        }
                                                                    }
                                                                    if($flag == 0){
                                                                        $str2 = "Block This Customer";
                                                                    }else{
                                                                        $str2 = "Unblock This Customer";
                                                                    }
                                                                     $del = '<button class="btn btn-danger deleter_confirm" id="'.$customer_id.'"><i class="fa fa-trash"></i></button>';
                                                                   $actions = $del.' <button class="btn btn-info cus_info" id="'.$customer_id.'" title="See More Details of '.$customer_name.'"><i class="fa fa-eye"></i></button> <a class="btn btn-success" href="update_customer.php?customer_id='.$customer_id.'" title="Update Customer Details"><i class="fa fa-pencil"></i></a> <a href="actions/update.php?block_or_unblock=1&flag='.$flag.'&customer_id='.$customer_id.'" class="btn btn-purple" title="'.$str2.'">'.$str2.'</a>';


                                                                    echo '<tr>
                                                                   
                                                                    <td>'.$customer_name.'</td>
                                                                    <td>'.$customer_email.'</td>
                                                                     
                                                                <td>'.$customer_contact_man.'</td>
                                                                
                                                                <td>'.$customer_block.'</td>
                                                                
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
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){

        jQuery(".searchableSelect2").select2({  width: '100%'});  
          $("#supportmsgs").dataTable();
                $(document).on('click','.deleter_confirm',function(){
                    let customer_id = $(this).attr('id');
                    $("#myLargeModalLabel").html('Are You Sure To Delete The Record?');
                    let delete_btn = '<a href="actions/delete.php?delete_user=1&customer_id='+customer_id+'" class="btn btn-danger" title="Delete This Customer">Confirm To Delete</a>';
                    $("#modalData").empty().append(delete_btn);
                    $("#customMODAL").show('modal');
                });

                $(document).on('click','.close',function(){
                         $("#customMODAL").hide();
                });

                 $(document).on('click','.cus_info',function(){
                    let cus_id = $(this).attr('id');
                    $.ajax({
                        url:'actions/fetch.php',
                        method:'post',
                        data:{
                            customer_id:cus_id,

                        },
                        success:function(d){
                            $("#myLargeModalLabel").html("Customer Details");
                            $("#modalData").empty().append(d);
                            $("#customMODAL").modal('show');
                        }
                    });
                });
        });
</script>