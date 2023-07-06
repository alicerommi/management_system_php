<?php
  include 'includes/header.php';
?>
                  
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row pull-right">
                            <div class="col-sm-12 pull-right">
                               <a href="all_customers.php" class="btn btn-purple"><i class="ion-ios7-arrow-back"></i> Back</a>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                            if(isset($_GET['customer_id'])){
                                $customer_id = $_GET['customer_id'];
                                $query = mysqli_query($conn,"select* from customers where customer_id=$customer_id");
                                $row = mysqli_fetch_array($query);
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
                                #$customer_email_address = $row['customer_email_address'];
                                $request_status_btn  = '';
                                if($customer_email_sent==1){
                                        if ($customer_email_verification_status==0)
                                    {
                                         $request_status_btn = '<span class="label label-inverse">Not Verified</span>';}
                                    else if($customer_email_verification_status==1){
                                         $request_status_btn = '<span class="label label-success">Verified</span>';
                                    }
                                    $customer_email_address = $row['customer_email_address']."(".$request_status_btn.")";
                                 }else{
                                    $request_status_btn = "Localhost User";
                                    $customer_email_address = $row['customer_email_address']."(".$request_status_btn.")";
                                 }
                                 $customer_profile_status = $row['customer_profile_status'];
                                 if($customer_profile_status==1){
                                    $customer_profile_status = "Complete";
                                 }else{
                                    $customer_profile_status = "Incomplete";
                                 }
                                 $customer_login_flag = $row['customer_login_flag'];
                                 if($customer_login_flag==1){
                                    $customer_login_flag= "Online";
                                 }else{
                                    $customer_login_flag= "Offline";
                                 }

                                // $member_block = $row['member_block'];
                                // $member_block_reason = $row['member_block_reason'];   
                            }
                            ?>
                           
                            <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Customer Details</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$customer_full_name; ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Phone#</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$customer_phone_number ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$customer_email_address; ?></p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Registeration Date & Time</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $customer_record_date;?></p>
                                                </div>
                                              

                                            


                                                
                                                <div class="about-info-p m-b-0">
                                                    <strong>Customer Profile Status</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $customer_profile_status;?></p>
                                                </div>

                                                <div class="about-info-p m-b-0">
                                                    <strong>Customer Online Status</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $customer_login_flag;?></p>
                                                </div>


                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                       

                                    </div>
                                   
                                    <?php 
                                    if(false){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                               <h3 class="panel-title">Block/Unblock Customer</h3> 
                                            </div> 
                                            <div class="panel-body">
                                                <div class="about-info-p m-b-0">
                                                    <strong>Block Customer</strong>
                                                    <br>
                                                    <?php
                                                        if($member_block==1){
                                                            echo '<button class="btn btn-danger block_actions" title="Unblock This Customer" data-id="unblock" id="'.$customer_id.'"><i class="md md-done-all"></i></button>';
                                                        }else if($member_block==0){
                                                            echo '<button class="btn btn-danger block_actions" title="Block This Customer" data-id="block" id="'.$customer_id.'"><i class="md md-block"></i></button>';
                                                        }

                                                    ?>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                <?php } ?>
                          
                        </div> <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
      
<?php
        include 'includes/footer.php';
?>