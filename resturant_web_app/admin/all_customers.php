<?php
  include 'includes/header.php';
?>
                     
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Customers</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="lower_width_th">#</th>
                                                    <th>Full Name</th>                                                    
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Date & Time</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                    $all_customers = mysqli_query($conn,"select* from customers");
                                                    while($row = mysqli_fetch_array($all_customers)){
                                                        $customer_id = $row['customer_id'];
                                                        $customer_full_name = $row['customer_full_name'];
                                                        
                                                        $customer_phone_number = $row['customer_phone_number'];
                                                        if($customer_phone_number==""){
                                                            $customer_phone_number='<span class="label label-inverse">Not Added Yet</span>';
                                                        }
                                                        $customer_password = $row['customer_password'];
                                                        $customer_picture = $row['customer_picture'];
                                                        $customer_email_sent = $row['customer_email_sent'];
                                                        $customer_email_verification_status = $row['customer_email_verification_status'];
                                                        $customer_email_verification_code = $row['customer_email_verification_code'];
                                                        $customer_record_date = human_timedate($row['customer_record_date']);
                                                        $customer_email_address = $row['customer_email_address'];

                                                        $request_status_btn  = '';
                                                        if($customer_email_sent==1){
                                                                 if ($customer_email_verification_status==0)
                                                                {
                                                                    $request_status_btn = '<span class="label label-inverse">Not Verified</span>';}
                                                                else if($customer_email_verification_status==1){
                                                                    $request_status_btn = '<span class="label label-success">Verified</span>';
                                                                }
                                                                 $customer_email_address = $row['customer_email_address']."(".$request_status_btn.")";
                                                        }
                                                       
                                                        

                                                        $actions ='<a href="view_customer_details.php?customer_id='.$customer_id.'" class="btn btn-info" title="View Customer Details"><i class="fa fa-eye"></i></a>';
                                                        $row = '<tr>
                                                        <td>'.$customer_id.'</td>
                                                        <td>'.$customer_full_name.'</td>
                                                        <td>'.$customer_email_address.'</td>
                                                        <td>'.$customer_phone_number.'</td>
                                                         <td>'.$customer_record_date.'</td>
                                                        <td>'.$actions.'</td>
                                                        </tr>';
                                                        echo $row;
                                                    }
                                                ?>
                                           
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
        include 'includes/footer.php';
?>
<script src="assets/pages/datatables.init.js"></script>
 <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
 } );
 </script>