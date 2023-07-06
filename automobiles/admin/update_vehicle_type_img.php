<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <?php
                            
                            show_back_button("vehicle_types.php","Go Back");

                                if(isset($_GET['updated'])){
                                    if($_GET['updated']==1){
                                        messages("Updated Successfully","success");
                                    }else if($_GET['updated']==0){
                                          messages("Error in updating","danger");
                                    }
                                }

                                if(isset($_GET['vehicle_type_id'])){
                                    $vehicle_type_id = intval($_GET['vehicle_type_id']);
                                    $query = mysqli_query($conn,"SELECT * FROM `vehicle_types` where vehicle_type_id=$vehicle_type_id");
                                    $row = mysqli_fetch_array($query);
                                    $vehicle_type_name = $row['vehicle_type_name'];
                                    $vehicle_type_img = $row['vehicle_type_img'];
                                    $dir = "../uploads/vehicle_types/";
                                }else{
                                    messages("There are some missing parameters","danger");
                                    die;
                                }


                                if(isset($_GET['uploading_err'])){
                                    if($_GET['uploading_err']==1){
                                                  messages("Error in uploading vehicle type image","warning");
                                    }
                                }
                              
                            ?>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Update Vehicle Type Image</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/update.php" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <label>Vehicle Type Name</label>
                                                        <input type="text" name="vehicle_type_name"  value="<?=$vehicle_type_name; ?>" class="form-control input-lg" maxlength="50">
                                                    </div>
                                                    <input type="hidden" value="<?=$vehicle_type_id;  ?>" name="vehicle_type_id">
                                                   
                                                    <?php
                                                        if($vehicle_type_img!="" || strlen($vehicle_type_img)!=0){
                                                            echo '<h4>Current Image</h4>';
                                                            echo '<div class="form-group">
                                                                   <a href="'.$dir.$vehicle_type_img.'" title="See Image">
                                                                    <img src="'.$dir.$vehicle_type_img.'" class="img_to_show image-responsive" style="height:200px;width:200px">
                                                                    </a>
                                                                </div>';
                                                        }
                                                    ?>
                                                   
                                                    <div class="form-group"> <label>Update Image</label>
                                                        <input type="file" name="type_img" id="type_img" class="form-control">
                                                    </div>
                                                    


                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="update_vehicle_type">Update</button>
                                                    </div>
                                            </form>  
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
});                      
</script>
