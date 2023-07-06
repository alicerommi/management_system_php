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
                                        messages("Vehicle Model has been added","success");
                                    }else if($_GET['added']==0){
                                          messages("Error in adding Vehicle model","danger");
                                    }
                                }

                                if(isset($_GET['already_exists'])){
                                    if($_GET['already_exists']==1){
                                         messages("Record is already exists","warning");
                                    }
                                }

                               //  if(isset($_GET['invalidImage'])){
                               //      if($_GET['invalidImage']==1){
                               //           messages("Energy Supplier image format is wrong","warning");
                               //      }
                               //  }

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
                                            <h3 class="panel-title">Add Vehicle Models</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php">

                                                    <div class="form-group">
                                                        <label>Vehicle Type</label>
                                                        <select name="v_type" required class="form-control input-lg searchableSelect2">
                                                            <?php
                                                                $query = mysqli_query($conn,"select* from vehicle_types");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicle_type_id = $row['vehicle_type_id'];
                                                                    $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                    echo '<option value="'.$vehicle_type_id.'">'.ucwords($vehicle_type_name).'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                        <span class="help-block"><a href="vehicle_types.php" >Add A New Vehicle Type</a></span>
                                                    </div>

                                                     <div class="form-group">
                                                        <label>Choose Vehicle Manufactures</label>
                                                            <select name="vehicle_manufacture" class="form-control input-lg searchableSelect2" required>
                                                                    <?php 
                                                                        $query = mysqli_query($conn,"select* from vehicles_manufacture");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicle_manufacture_id = $row['vehicle_manufacture_id'];
                                                                    $vehicle_manufacture_name = ucwords($row['vehicle_manufacture_name']);
                                                                                echo '<option value='.$vehicle_manufacture_id.'>'.$vehicle_manufacture_name.'</option>';
                                                                         }
                                                                    ?>
                                                                 </select> 
                                                                 <span class="help-block"><a href="add_manufacture.php" >Add A New Manufacture</a></span>
                                                    </div>
                                                  
                                                    <div class="form-group">
                                                        <label>Model Name</label>
                                                        <input type="text" name="model_name" required class="form-control input-lg" maxlength="50">
                                                    </div>
                                                 <!--     <div class="form-group">
                                                        <label>Manufacture Name</label>
                                                        <input type="text" name="manufacture_name" required class="form-control input-lg" maxlength="50">
                                                    </div>
 -->


                                              
                                                
                                            
                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_model">Save</button>
                                                    </div>

                                                  
                                                
                                            </form>  
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">All Added Models</h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <!-- <th>#</th> -->
                                                            <th>Vehicle Model</th>
                                                            <th>Vehicle Type</th>
                                                            <th>Vehicle Manufacture</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                <?php
                                                                $query = mysqli_query($conn,"select* from vehicles_models join vehicle_types join vehicles_manufacture on vehicles_models.vehicle_type_id = vehicle_types.vehicle_type_id and vehicles_models.vehicle_manufacture_id = vehicles_manufacture.vehicle_manufacture_id");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicles_model_id = $row['vehicles_model_id'];
                                                                    $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                    $vehicles_model_name = ucwords($row['vehicles_model_name']);
                                                                    //  $actions = '<a href="actions/delete.php?delete_vehicle_model=1&vehicles_model_id='.$vehicles_model_id.'" class="btn btn-danger"><i class="fa fa-times"></i></a>';
                                                                    $actions = '<button class="btn btn-danger deleter_confirm" id="'.$vehicles_model_id.'"><i class="fa fa-trash"></i></button>';
                                                                    $vehicle_manufacture_name = ucwords($row['vehicle_manufacture_name']);
                                                                    echo '<tr>
                                                                    
                                                                    <td>'.$vehicles_model_name.'</td>
                                                                    <td>'.$vehicle_type_name.'</td>
                                                                     <td>'.$vehicle_manufacture_name.'</td>
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
                    let vehicles_model_id = $(this).attr('id');
                    $("#myLargeModalLabel").html('Are You Sure To Delete The Record?');
                    let delete_btn = '<a href="actions/delete.php?delete_vehicle_model=1&vehicles_model_id='+vehicles_model_id+'" class="btn btn-danger"> Confirm To Delete</a>';
                    $("#modalData").empty().append(delete_btn);
                    $("#customMODAL").show('modal');
                });
            $(document).on('click','.close',function(){
                 $("#customMODAL").hide();
            });
        });
</script>