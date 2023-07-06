<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <?php
                         show_back_button("all_counties_configuration.php","Back To Configured Counties");
                        ?>
                        <div class="row">
                            <?php
                            if(isset($_GET['updated'])){
                                if($_GET['updated']==1){
                                     messages("The details are updated successfully","success");
                                }else{
                                         messages("Error in updating","warning");
                                }
                            }
                            if(isset($_GET['postcode_id'])){
                                $postcode_id = intval($_GET['postcode_id']);
                                $query = mysqli_query($conn,"SELECT * FROM `postcode_with_suppliers` join energy_supplier_types where postcode_with_suppliers.postcode_service_type= energy_supplier_types.energy_supplier_type_id and  postcode_with_suppliers.postcode_id = $postcode_id");
                                $row = mysqli_fetch_assoc($query);
                                $postcode = $row['postcode'];
                                $postcode_service_type = $row['postcode_service_type'];
                                $energy_supplier_id_db = $row['energy_supplier_id'];
                                $postcode_home_rate_per_unit = $row['postcode_home_rate_per_unit'];
                                $postcode_business_rate_per_unit = $row['postcode_business_rate_per_unit'];
                                $energy_supplier_type_name_db = $row['energy_supplier_type_name'];
                            }
                            ?>
                                <div class = "panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update Post Code & Details</h3>
                                    </div>
                                    <div class="panel-body">
                                            <div class="col-md-6">
                                                <form method="post" action= "actions/update.php">
                                                     <div class="form-group">
                                                        <label>Enter Post Code</label>
                                                        <input type="text" name="zipcode" class="form-control" required maxlength="10" readonly value="<?php echo $postcode;?>">
                                                    </div>     
                                                    <input type="hidden" name="postcode_id" value="<?= $postcode_id?>">


                                                    <div class="form-group">
                                                        <label >Choose Energy Supplier Type</label>
                                                        <select class="form-control" id="supplider_types" name="supplier_types" readonly>
                                                            
                                                            <?php
                                                            $query = mysqli_query($conn,"SELECT * FROM `energy_supplier_types`");

                                                            while($row = mysqli_fetch_array($query)){
                                                                $energy_supplier_type_id=$row['energy_supplier_type_id'];
                                                                $energy_supplier_type_name=$row['energy_supplier_type_name'];
                                                                if ($postcode_service_type==$energy_supplier_type_id)
                                                                    echo '<option id="energy_source_'.$energy_supplier_type_id.'" value = "'.$energy_supplier_type_id.'">'.$energy_supplier_type_name.'</option>';

                                                            }
                                                            ?>
                                                        </select>
                                                    </div>    

                                                    <div class="form-group" id="all_suppliers">
                                                        <label>Choose <?= ucwords($energy_supplier_type_name_db." ") ?>Supplier</label>
                                                        <select class="form-control" name="selected_supplier">
                                                            <?php
                                                            if($postcode_service_type==1){

                                                                    $query2 =mysqli_query($conn,"select* from gas_energy_suppliers");
                                                                    while($row2 = mysqli_fetch_array($query2)){
                                                                        $energy_supplier_name = $row2['energy_supplier_name'];
                                                                        $energy_supplier_id = $row2['energy_supplier_id']; 
                                                                        if ($energy_supplier_id_db==$energy_supplier_id)
                                                                        {echo '<option value="'.$energy_supplier_id.'" selected>'.$energy_supplier_name.'</option>';}
                                                                        else
                                                                            {echo '<option value="'.$energy_supplier_id.'">'.$energy_supplier_name.'</option>';}
                                                                    }

                                                           
                                                            }else {
                                                                $query2 =mysqli_query($conn,"select* from electricity_energy_suppliers");
                                                                    while($row2 = mysqli_fetch_array($query2)){
                                                                        $electricity_provider_id = $row2['electricity_provider_id'];
                                                                        $electricity_provider_name = $row2['electricity_provider_name']; 
                                                                        if  ($energy_supplier_id_db==$electricity_provider_id)
                                                                       { echo '<option value="'.$electricity_provider_id.'" selected>'.$electricity_provider_name.'</option>';}
                                                                        else
                                                                            {echo '<option value="'.$electricity_provider_id.'">'.$electricity_provider_name.'</option>';}
                                                                }  // end while
                                                            }//end else
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">

                                                    
                                                    <div id="rate_setting_for_types">
                                                        <?php
                                                        if(strlen($postcode_home_rate_per_unit)>0){
                                                        ?>  
                                                               <div class="form-group" id="home_type">
                                                                    <label class="control-label">Rate Per Unit For Home (£)</label>
                                                                    <input type="number" min="1" name="home_rate_per_unit" class=" form-control" value="<?= $postcode_home_rate_per_unit;?>" required>
                                                            </div>
                                                        <?php
                                                        } if(strlen($postcode_business_rate_per_unit)>0){ ?>
                                                             <div class="form-group m-b-0" id="business_type" style="     margin-top: 20px;">
                                                                    <label class="control-label">Rate Per Unit For Business (£)</label>
                                                                    <input name="business_rate_per_unit" type="number" value="<?php echo $postcode_business_rate_per_unit; ?>" min="1" required class="form-control"> 
                                                            </div>    
                                                            <?php
                                                        }
                                                            ?>
                                                         
                                                    </div>

                                                    <div class="form-group pull-right" style="margin-top: 20px;">
                                                        <button class="btn btn-primary" type="submit" name="update_a_postcode">Update Details</button>
                                                    </div>


                                                </div>
                                                
                                                    
                                                </form>    
                                            </div>
                            </div>
                    </div> 
                </div> 
            </div>
</div>
<?php
    include 'includes/footer.php';
?>