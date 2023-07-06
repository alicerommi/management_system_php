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
                               <a href="all_requests.php" class="btn btn-purple"><i class="ion-ios7-arrow-back"></i> Back</a>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                            <?php
                            if(isset($_GET['member_request_id'])){
                                $member_request_id = $_GET['member_request_id'];
                                $query = mysqli_query($conn,"select* from membership_requests where     member_request_id=$member_request_id");
                                $row = mysqli_fetch_array($query);
                                $member_first_name = $row['member_first_name'];
                                $member_last_name = $row['member_last_name'];
                                //$full_name = $member_first_name ." ".$member_last_name;
                                $member_email = $row['member_email'];
                                $member_business_type = $row['member_business_type'];
                                $request_datetime = human_timedate($row['request_datetime']);
                                $request_status = $row['request_status'];
                                $request_status_btn  = '';
                                $member_business_location = $row['member_business_location'];
                                $member_business_existence_durantion = $row['member_business_existence_durantion'];
                                $member_cell_phone_number = $row['member_cell_phone_number'];
                                $member_home_phone_number = $row['member_home_phone_number'];
                                $member_office_number = $row['member_office_number'];
                                if ($request_status==0)
                                    {$request_status_btn = '<span class="label label-inverse" id="request_status_action">Pending</span>';}
                                else if($request_status==1){
                                    $request_status_btn = '<span class="label label-success" id="request_status_action">Approved</span>';
                                }else if($request_status==2){
                                     $request_status_btn = '<span class="label label-danger" id="request_status_action">Disapproved</span>';
                                }
                                $approval_request_datetime = human_timedate($row['approval_request_datetime']);
                                $member_block = $row['member_block'];
                                $member_block_reason = $row['member_block_reason'];   
                            }
                            ?>
                           
                            <div class="col-md-4">
                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">Membership Request Details</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                <div class="about-info-p">
                                                    <strong>First Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$member_first_name; ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Last Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$member_last_name ?></p>
                                                </div>
                                                <div class="about-info-p">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><?=$member_email; ?></p>
                                                </div>
                                                <div class="about-info-p m-b-0">
                                                    <strong>Business Type</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $member_business_type;?></p>
                                                </div>
                                              

                                                 <div class="about-info-p m-b-0">
                                                    <strong>Request Date & Time</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $request_datetime;?></p>
                                                </div>

                                                 <div class="about-info-p m-b-0">
                                                    <strong>Request Status</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $request_status_btn;?></p>
                                                </div>

                                                <?php
                                                    if($request_status==0){
                                                        $actions = '<button class="btn btn-success accept" id="'.$member_request_id.'"><i class="fa fa-check"></i></button> <button class="btn btn-danger reject" id="'.$member_request_id.'"><i class="fa fa-trash"></i></button>';
                                                              echo '<div class="about-info-p m-b-0">
                                                                 <strong>Admin Actions</strong>
                                                            <br>
                                                         <p class="text-muted">'.$actions.'</p>
                                                            </div>';
                                                    }

                                                ?>

                                                
                                                <div class="about-info-p m-b-0">
                                                    <strong>Admin Action Date & Time</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $approval_request_datetime;?></p>
                                                </div>
                                            </div> 
                                        </div>
                                        <!-- Personal-Information -->

                                       

                                    </div>
                                    <div class="col-md-4">

                                        <!-- Personal-Information -->
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                               <h3 class="panel-title">Membership Request Details</h3> 
                                            </div> 
                                            <div class="panel-body"> 
                                                  <div class="about-info-p m-b-0">
                                                    <strong>Business Location</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $member_business_location;?></p>
                                                </div>
                                                 <div class="about-info-p m-b-0">
                                                    <strong>Business Existence Duration</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $member_business_existence_durantion;?></p>
                                                </div>
                                                   <div class="about-info-p m-b-0">
                                                    <strong>Business Phone Number</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $member_cell_phone_number;?></p>
                                                    
                                                </div>

                                                  <div class="about-info-p m-b-0">
                                                    <strong>Business Home Phone Number</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $member_home_phone_number;?></p>
                                                        
                                                </div>


                                                  <div class="about-info-p m-b-0">
                                                    <strong>Business Office Number</strong>
                                                    <br>
                                                    <p class="text-muted"><?= $member_office_number;?></p>
                                                    
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                    if(false){
                                    ?>
                                    <div class="col-md-4">
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                               <h3 class="panel-title">Block/Unblock Member</h3> 
                                            </div> 
                                            <div class="panel-body">
                                                <div class="about-info-p m-b-0">
                                                    <strong>Block Member</strong>
                                                    <br>
                                                    <?php
                                                        if($member_block==1){
                                                            echo '<button class="btn btn-danger block_actions" title="Unblock This Member" data-id="unblock" id="'.$member_request_id.'"><i class="md md-done-all"></i></button>';
                                                        }else if($member_block==0){
                                                            echo '<button class="btn btn-danger block_actions" title="Block This Member" data-id="block" id="'.$member_request_id.'"><i class="md md-block"></i></button>';
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
<script type="text/javascript">
        $(document).ready(function(){
                $(document).on('click','.reject',function(){
                    var request_id = $(this).attr('id');
                    $.ajax({
                        url:'actions/update.php',
                        method:'post',
                        data:{
                            request_id:request_id,
                            membership_request_action:1,
                            action:2
                        },
                        success:function(data){
                            if(data==1){
                                  swal({
                                    cancel: true,
                                    title: "Success!",
                                    text: 'The Membership Request Has Been Rejected',
                                    icon: "success",
                                    button: false,
                                    timer: 5000,
                                     }); 
                                  setTimeout(function(){
                                    location.reload();
                                    },5000);

                            }else{
                                swal({
                                    cancel: true,
                                    title: "Error!",
                                    text: 'Error in Rejecting',
                                    icon: "error",
                                    button: false,
                                    timer: 5000,
                                 });

                               setTimeout(function(){
                                    location.reload();
                                    },5000);
                            }
                            
                        }
                    });

                });

                 $(document).on('click','.accept',function(){
                    var request_id = $(this).attr('id');
                    $.ajax({
                        url:'actions/update.php',
                        method:'post',
                        data:{
                            request_id:request_id,
                            membership_request_action:1,
                             action:1
                        },
                        success:function(data){
                               if(data==1){
                                  swal({
                                    cancel: true,
                                    title: "Success!",
                                    text: 'The Membership Request Has Been Accepted',
                                    icon: "success",
                                    button: false,
                                    timer: 5000,
                                     }); 
                                    setTimeout(function(){
                                    location.reload();
                                    },5000);
                            }else{
                                swal({
                                    cancel: true,
                                    title: "Error!",
                                    text: 'Error in Accepting',
                                    icon: "error",
                                    button: false,
                                    timer: 5000,
                                 });
                                  setTimeout(function(){
                                    location.reload();
                                    },5000);

                            }
                        }   
                    });
                    
                });
        });

</script>
