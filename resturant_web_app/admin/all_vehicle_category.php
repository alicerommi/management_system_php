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
                                        <h3 class="panel-title">All Vehicle Categories</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="lower_width_th">#</th>
                                                    <th>Vehicle Category Name</th>
                                                    <th>Added Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $all_categories = mysqli_query($conn,"select* from vehicle_categories");
                                                while($row= mysqli_fetch_array($all_categories)){
                                                    $vehicle_cate_id = $row['vehicle_cate_id'];
                                                    $vehicle_cate_name = $row['vehicle_cate_name'];
                                                    $vehicle_cate_detail = $row['vehicle_cate_detail'];
                                                    $vehicle_cate_recorddate = human_timedate($row['vehicle_cate_recorddate']);
                                                    $actions = '<button class="btn btn-primary cate_details" data-toggle="modal" id="'.$vehicle_cate_id.'"  title="View Category Details"><i class="fa fa-eye"></i></button>';
                                                    $data_tr ='<tr>
                                                    <td>'.$vehicle_cate_id.'</td>
                                                    <td>'.$vehicle_cate_name.'</td>
                                                    <td>'.$vehicle_cate_recorddate.'</td>
                                                    <td>'.$actions.'</td>
                                                    </tr>'; 
                                                    echo $data_tr;
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

            $(document).on('click','.cate_details',function(){
                let cate_id = $(this).attr('id');
                $.ajax({
                    url:'actions/fetch.php',
                    method:'post',
                    dataType:'json',
                    data:{
                        fetch_veh_cate_details:1,
                        cate_id:cate_id,
                    },
                    success:function(data){
                        $("#modal_heading").empty().html(data.vehicle_cate_name+' Details');
                          $("#modal_data").empty().append(data.vehicle_cate_detail);
                        $("#custom_modal").modal('show');
                    }   

                });
            });    

 } );
 </script>