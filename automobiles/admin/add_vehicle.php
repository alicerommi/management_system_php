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
                                         messages("Vehicle Model with this name is already exists","warning");
                                    }
                                }

                               //  if(isset($_GET['invalidImage'])){
                               //      if($_GET['invalidImage']==1){
                               //           messages("Energy Supplier image format is wrong","warning");
                               //      }
                               //  }

                               // if(isset($_GET['deleted'])){
                               //  if ($_GET['deleted']==1)
                               //      messages("County has been deleted","danger");
                               //  else if($_GET['deleted']==0)
                               //      messages("Error in deletion","warning");
                               // } 

                            ?>

                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Add A Vehicle</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php">


                                                    <div class="form-group">
                                                        <label>Vehicle Name</label>
                                                        <input type="text" name="vehicle_name" required class="form-control input-lg" maxlength="50">
                                                    </div>

                                                     <div class="form-group">
                                                        <label>Choose Vehicle Type</label>
                                                            <select name="v_type" class="form-control input-lg searchableSelect2" required>
                                                                    <?php
                                                                        $query=  mysqli_query($conn,"select* from vehicle_types");
                                                                         while($row = mysqli_fetch_array($query)){
                                                                                    $vehicle_type_id = $row['vehicle_type_id'];
                                                                                  $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                                                               
                                                                                echo '<option value='.$vehicle_type_id.'>'.$vehicle_type_name.'</option>';
                                                                         }
                                                                    ?>
                                                                 </select> 
                                                                 <span class="help-block"><a href="vehicle_types.php" >Add A New Vehicle Type</a></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Choose Vehicle Model</label>
                                                            <select name="v_model" class="form-control input-lg searchableSelect2" required>
                                                                    <?php 
                                                                        $query = mysqli_query($conn,"select* from vehicles_models");
                                                                         while($row = mysqli_fetch_array($query)){
                                                                                  $vehicles_model_id = $row['vehicles_model_id'];
                                                                                     $vehicles_model_name = ucwords($row['vehicles_model_name']);
                                                                                echo '<option value='.$vehicles_model_id.'>'.$vehicles_model_name.'</option>';
                                                                         }
                                                                    ?>
                                                                 </select> 
                                                                 <span class="help-block"><a href="add_model.php" >Add A New Model</a></span>
                                                    </div>



                                                    <div class="form-group">
                                                        <label>Choose Vehicle Manufactures</label>
                                                            <select name="v_model" class="form-control input-lg" required>
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








                                                  <!--   <div class="form-group">
                                                        <label>Manufacture Name</label>
                                                        <input type="text" name="county_name" required class="form-control input-lg" maxlength="50">
                                                    </div> -->
                                              
                                                    
                                            
                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_vehicle">Save</button>
                                                    </div>

                                                  
                                                
                                            </form>  
                                        </div>
                                    </div>  
                              <!--   </div>
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">All Added Vehicles</h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Model Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> -->
                                                                <?php
                                                                // $query = mysqli_query($conn,"select* from vehicles_models");
                                                                // while($row = mysqli_fetch_array($query)){
                                                                //     $vehicles_model_id = $row['vehicles_model_id'];
                                                                   
                                                                //     $vehicles_model_name = ucwords($row['vehicles_model_name']);
                                                                //     $actions = '<a href="actions/delete.php?delete_vehicle_model=1&vehicles_model_id='.$vehicles_model_id.'" class="btn btn-danger"><i class="fa fa-times"></i></a>';
                                                                //     echo '<tr>
                                                                //     <td>'.$vehicles_model_id.'</td>
                                                                //     <td>'.$vehicles_model_name.'</td>
                                                                //     <td>'.$actions.'</td>
                                                                //     </tr>';
                                                                // }
                                                                ?>
                                   <!--                  </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        
                                </div> -->
                                </div>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>
<script type="text/javascript">
    $("#supportmsgs").dataTable();
</script>


<script type="text/javascript">
                      jQuery(document).ready(function() {
                                         // jQuery(".searchableSelect1").select2({
                                         //    width: '100%'
                                         //   }); 
                                          jQuery(".searchableSelect2").select2({
                                        
                                            width: '100%'
                                           }); 

                                           // jQuery(".searchableSelect3").select2({
                                        
                                           //  width: '100%'
                                           // }); 
                                                      
                        });      
                                              
</script>