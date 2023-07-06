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
                                        <h3 class="panel-title">All Membership Requests</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="lower_width_th">#</th>
                                                    <th>Full Name</th>                                                    
                                                    <th>Email</th>
                                                    <th>Business Type</th>
                                                    <th>Request Status</th>
                                                    <th>Date & Time</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                    $all_request = mysqli_query($conn,"select* from membership_requests");
                                                    while($row = mysqli_fetch_array($all_request)){
                                                        $member_request_id = $row['member_request_id'];
                                                        $member_first_name = $row['member_first_name'];
                                                        $member_last_name = $row['member_last_name'];

                                                        $full_name = $member_first_name ." ".$member_last_name;
                                                        $member_email = $row['member_email'];
                                                        $member_business_type = $row['member_business_type'];
                                                        $request_datetime = human_timedate($row['request_datetime']);
                                                        $request_status = $row['request_status'];
                                                        $request_status_btn  = '';
                                                        if ($request_status==0)
                                                            {$request_status_btn = '<span class="label label-inverse" id="request_status_action">Pending</span>';}
                                                        else if($request_status==1){
                                                            $request_status_btn = '<span class="label label-success" id="request_status_action">Approved</span>';
                                                        }else if($request_status==2){
                                                             $request_status_btn = '<span class="label label-danger" id="request_status_action">Disapproved</span>';
                                                        }

                                                        $actions ='<a href="view_membership_request_details.php?member_request_id='.$member_request_id.'" class="btn btn-info" title="View Request Details"><i class="fa fa-eye"></i></a>';
                                                        $row = '<tr>
                                                        <td>'.$member_request_id.'</td>
                                                        <td>'.$full_name.'</td>
                                                        <td>'.$member_email.'</td>
                                                        <td>'.$member_business_type.'</td>
                                                          <td>'.$request_status_btn.'</td>
                                                         <td>'.$request_datetime.'</td>
                                                      
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