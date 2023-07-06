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
                                        <h3 class="panel-title">All Membership Packages</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="lower_width_th">#</th>
                                                    <th>Package Name</th> 
                                                    <th>Package Amount (Per Month)</th>
                                                    <th>Per Customer Amount</th>                                         
                                                    <th>Added Date & Time</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                    $all_request = mysqli_query($conn,"select* from packages");

                                                    while($row = mysqli_fetch_array($all_request)){

                                                            $package_id = $row['package_id'];
                                                            $package_name = $row['package_name'];
                                                            $package_price_per_month = $row['package_price_per_month'];
                                                            $package_per_customer = $row['package_per_customer'];
                                                            $package_added_datetime = human_timedate($row['package_added_datetime']);

                                                        $actions = '<button class="btn btn-primary package_details" data-toggle="modal" id="'.$package_id.'"  title="View Package Details"><i class="fa fa-eye"></i></button> <a  class="btn btn-info" href="update_membership_package.php?package_id='.$package_id.'" title="Update Package Details"><i class="fa fa-pencil"></i></a>';
                                                        $row = '<tr>
                                                        <td>'.$package_id.'</td>
                                                        <td>'.$package_name.'</td>
                                                        <td>$'.$package_price_per_month.'</td>
                                                        <td>$'.$package_per_customer.'</td>
                                                          <td>'.$package_added_datetime.'</td>
                                                      
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
                 $(document).on('click','.package_details',function(){
                let package_id = $(this).attr('id');
                $.ajax({
                    url:'actions/fetch.php',
                    method:'post',
                    dataType:'json',
                    data:{
                        fetch_package_details:1,
                        package_id:package_id,
                    },
                    success:function(data){
                        $("#modal_heading").empty().html(data.package_name+' Details');
                          $("#modal_data").empty().append(data.package_details);
                          $("#modal_data").append("<h5>Location:</h5>"+data.package_location);
                        $("#custom_modal").modal('show');
                    }   

                });
            });    
 } );
 </script>