<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <?php
                            

                                if(isset($_GET['added'])){
                                    if($_GET['added']==1){
                                        messages("Added Successfully","success");
                                    }else if($_GET['added']==0){
                                          messages("Error in adding county","danger");
                                    }
                                }

                                if(isset($_GET['already_exists'])){
                                    if($_GET['already_exists']==1){
                                         messages("Type with this name is already exists","warning");
                                    }
                                }

                                if(isset($_GET['uploading_err'])){
                                    if($_GET['uploading_err']==1){
                                                  messages("Error in uploading vehicle type image","warning");
                                    }
                                }

                                if(isset($_GET['deleted'])){
                                if ($_GET['deleted']==1)
                                    messages("record deleted","danger");
                                else if($_GET['deleted']==0)
                                    messages("Error in deletion","warning");
                               }
                            ?>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Add Vehicle Types</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label>Vehicle Type Name</label>
                                                        <input type="text" name="Vehicle_type_name" required class="form-control input-lg" maxlength="50">
                                                    </div>

                                                    <div class="form-group"> <label>Vehicle Type Image</label>
                                                        <input type="file" name="type_img" id="type_img" class="form-control" required>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_vehicle_type">Save</button>
                                                    </div>
                                            </form>  
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">All Added Vehicles Types</h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Type Name</th>
                                                            <th>Have Image</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                <?php
                                                                $query = mysqli_query($conn,"select* from vehicle_types");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicle_type_id = $row['vehicle_type_id'];
                                                                    $vehicle_type_img = $row['vehicle_type_img'];
                                                                    $flag= "No";
                                                                    if(strlen($vehicle_type_img)>0){
                                                                        $flag= "Yes";
                                                                    }
                                                                    $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                    $actions = '<button class="btn btn-danger deleter_confirm" id="'.$vehicle_type_id.'"><i class="fa fa-trash"></i></button> <a class="btn btn-inverse" href="update_vehicle_type_img.php?vehicle_type_id='.$vehicle_type_id.'" title="Update vehicle Type Image"><i class="fa fa-pencil"></i></a>';
                                                                    echo '<tr>
                                                                    <td>'.$vehicle_type_id.'</td>
                                                                    <td>'.$vehicle_type_name.'</td>
                                                                    <td>'.$flag.'</td>
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
<?php
    include 'includes/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
          $("#supportmsgs").dataTable();
                $(document).on('click','.deleter_confirm',function(){
                    let vehicle_type_id = $(this).attr('id');
                    $("#myLargeModalLabel").html('Are You Sure To Delete The Record?');
                    let delete_btn = '<div class="form-group"><a href="actions/delete.php?delete_vehicle_type=1&vehicle_type_id='+vehicle_type_id+'" class="btn btn-danger">Confirm To Delete</a>';
                    $("#modalData").empty().append(delete_btn);
                    $("#customMODAL").show('modal');
                });
            $(document).on('click','.close',function(){
                 $("#customMODAL").hide();
            });
        });

                        //////////////// document checker used in job apply form
                         $("#type_img").change(function () {
                                var fileExtension = ['png', 'jpeg', 'jpg'];
                                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                                    $(this).val('');
                                            swal({
                                                 cancel: true,
                                                      type: "warning",   
                                                  title: "Error!",
                                                  text: "Supported Files Are: "+fileExtension.join(', '),
                                                   button: true,
                                                    timer: 10000,
                                                });
                                }
                         });
</script>
