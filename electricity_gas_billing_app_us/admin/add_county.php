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
                                        messages("County has been added","success");
                                    }else if($_GET['added']==0){
                                          messages("Error in adding county","danger");
                                    }
                                }

                                if(isset($_GET['already_exists'])){
                                    if($_GET['already_exists']==1){
                                         messages("County with this name is already exists","warning");
                                    }
                                }

                                if(isset($_GET['invalidImage'])){
                                    if($_GET['invalidImage']==1){
                                         messages("Energy Supplier image format is wrong","warning");
                                    }
                                }

                               if(isset($_GET['deleted'])){
                                if ($_GET['deleted']==1)
                                    messages("County has been deleted","danger");
                                else if($_GET['deleted']==0)
                                    messages("Error in deletion","warning");
                               } 

                            ?>

                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Add County</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php">
                                                    <div class="form-group">
                                                        <label>County Name</label>
                                                        <input type="text" name="county_name" required class="form-control" maxlength="50">
                                                    </div>
                                              
                                                
                                            
                                                    <div class="form-group">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_county">Save</button>
                                                    </div>

                                                  
                                                
                                            </form>  
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">All Added Counties</h3>
                                        </div>
                                        <div class="panel-body">
                                         <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>County Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                                <?php
                                                                $query = mysqli_query($conn,"select* from counties");
                                                                while($row = mysqli_fetch_array($query)){
                                                                    $county_id = $row['county_id'];
                                                                    $county_name = $row['county_name'];
                                                                    $actions = '<a href="actions/delete.php?delete_county=1&county_id='.$county_id.'" class="btn btn-danger"><i class="fa fa-times"></i></a>';
                                                                    echo '<tr>
                                                                    <td>'.$county_id.'</td>
                                                                    <td>'.$county_name.'</td>
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
    $("#supportmsgs").dataTable();
</script>