<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php
                                if(isset($_GET['added'])){
                                    if($_GET['added']==1){
                                        messages("Vehicle Manufacture has been added","success");
                                    }else if($_GET['added']==0){
                                          messages("Error in adding Vehicle Manufacture","danger");
                                    }
                                }

                                if(isset($_GET['already_exists'])){
                                    if($_GET['already_exists']==1){
                                         messages("Vehicle Manufacture with this name is already exists","warning");
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
                                            <h3 class="panel-title">Add Vehicle Manufacture</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php">
                                                    <div class="form-group">
                                                        <label>Manufacture Name</label>
                                                        <input type="text" name="manufacture_name" required class="form-control input-lg" maxlength="50">
                                                    </div>
                                            
                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_manufacture">Save</button>
                                                    </div>

                                                  
                                                
                                            </form>  
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">All Added Manufactures</h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Manufacture Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                <?php
                                                                $query = mysqli_query($conn,"select* from vehicles_manufacture");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $vehicle_manufacture_id = $row['vehicle_manufacture_id'];
                                                                   
                                                                    $vehicle_manufacture_name = ucwords($row['vehicle_manufacture_name']);
                                                                    //$actions = '<a href="actions/delete.php?delete_vehicle_manufacture=1&vehicle_manufacture_id='.$vehicle_manufacture_id.'" class="btn btn-danger"><i class="fa fa-times"></i></a>';
                                                                    $actions = '<button class="btn btn-danger deleter_confirm" id="'.$vehicle_manufacture_id.'"><i class="fa fa-trash"></i></button>';
                                                                    echo '<tr>
                                                                    <td>'.$vehicle_manufacture_id.'</td>
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
          $("#supportmsgs").dataTable();
                $(document).on('click','.deleter_confirm',function(){
                    let vehicle_manufacture_id = $(this).attr('id');
                    $("#myLargeModalLabel").html('Are You Sure To Delete The Record?');
                    let delete_btn = '<a href="actions/delete.php?delete_vehicle_manufacture=1&vehicle_manufacture_id='+vehicle_manufacture_id+'" class="btn btn-danger">Confirm To Delete</a>';
                    $("#modalData").empty().append(delete_btn);
                    $("#customMODAL").show('modal');
                });
            $(document).on('click','.close',function(){
                 $("#customMODAL").hide();
            });
        });
</script>