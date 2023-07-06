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
                            if(isset($_GET['county_configuration_id'])){
                                $county_configuration_id = intval($_GET['county_configuration_id']);
                                $query = mysqli_query($conn,"SELECT * FROM `county_with_suppliers` join energy_supplier_types where  county_with_suppliers.county_configuration_id = $county_configuration_id");
                                $row = mysqli_fetch_assoc($query);
                                #$postcode = $row['postcode'];
                                $county_id_get = intval($_GET['county_id']);
                               
                                #$county_service_type = $row['county_service_type'];
                                #$energy_supplier_id_db = $row['energy_supplier_id'];
                                // $postcode_home_rate_per_unit = $row['postcode_home_rate_per_unit'];
                                // $postcode_business_rate_per_unit = $row['postcode_business_rate_per_unit'];
                                // $energy_supplier_type_name_db = $row['energy_supplier_type_name'];
                                #$energy_supplier_type_name_db = $row['energy_supplier_type_name'];
                                $county_home_rate_per_unit = $row['county_home_rate_per_unit'];
                                $county_business_rate_per_unit = $row['county_business_rate_per_unit'];
                                $county_standing_charges_for_home = $row['county_standing_charges_for_home'];
                                $county_standing_charges_for_business = $row['county_standing_charges_for_business'];
                                #$county_service_type = $row['county_service_type'];
                            }
                            ?>
                                <div class = "panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update County Configuration Details</h3>
                                    </div>
                                    <div class="panel-body">
                                            <div class="col-md-6">
                                                <form method="post" action= "actions/update.php">
                                                          <div class="form-group">
                                                        <label>Choosen County</label>
                                                        <select name="choosen_county" class="form-control" disabled>
                                                                    <?php
                                                                    $query = mysqli_query($conn,"select* from counties");
                                                                    while($row = mysqli_fetch_array($query)){
                                                                        $county_id = $row['county_id'];
                                                                        $county_name = $row['county_name'];
                                                                        if ($county_id_get==$county_id)
                                                                            echo '<option value="'.$county_id.'" >'.ucwords($county_name).'</option>';
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>   
                                                    <input type="hidden" name="county_configuration_id" value="<?= $county_configuration_id?>">

                                                    <input type="hidden" name="county_id" value="<?= $county_id?>">

                                                   <!--  <div class="form-group">
                                                        <label >Choose Energy Supplier Type</label>
                                                        <select class="form-control" id="supplider_types" name="supplier_types" disabled>
                                                             -->
                                                            <?php
                                                            // $query = mysqli_query($conn,"SELECT * FROM `energy_supplier_types`");

                                                            // while($row = mysqli_fetch_array($query)){
                                                            //     $energy_supplier_type_id=$row['energy_supplier_type_id'];
                                                            //     $energy_supplier_type_name=$row['energy_supplier_type_name'];
                                                            //     if ($energy_supplier_type_id==$county_service_type)
                                                            //         echo '<option id="energy_source_'.$energy_supplier_type_id.'" value = "'.$energy_supplier_type_id.'">'.$energy_supplier_type_name.'</option>';

                                                            // }
                                                            ?>
                                                    <!--     </select>
                                                    </div> -->    

                                                <!--     <div class="form-group" id="all_suppliers">
                                                        <label>Choose <?php #ucwords($energy_supplier_type_name_db." ") ?>Supplier</label>
                                                        <select class="form-control" name="selected_supplier"> -->
                                                            <?php
                                                            // if($county_service_type==1){

                                                            //         $query2 =mysqli_query($conn,"select* from gas_energy_suppliers");
                                                            //         while($row2 = mysqli_fetch_array($query2)){
                                                            //             $energy_supplier_name = $row2['energy_supplier_name'];
                                                            //             $energy_supplier_id = $row2['energy_supplier_id']; 
                                                            //             if ($energy_supplier_id_db==$energy_supplier_id)
                                                            //             {echo '<option value="'.$energy_supplier_id.'" selected>'.$energy_supplier_name.'</option>';}
                                                            //             else
                                                            //                 {echo '<option value="'.$energy_supplier_id.'">'.$energy_supplier_name.'</option>';}
                                                            //         }

                                                           
                                                            // }else {
                                                            //     $query2 =mysqli_query($conn,"select* from electricity_energy_suppliers");
                                                            //         while($row2 = mysqli_fetch_array($query2)){
                                                            //             $electricity_provider_id = $row2['electricity_provider_id'];
                                                            //             $electricity_provider_name = $row2['electricity_provider_name']; 
                                                            //             if  ($energy_supplier_id_db==$electricity_provider_id)
                                                            //            { echo '<option value="'.$electricity_provider_id.'" selected>'.$electricity_provider_name.'</option>';}
                                                            //             else
                                                            //                 {echo '<option value="'.$electricity_provider_id.'">'.$electricity_provider_name.'</option>';}
                                                            //     }  // end while
                                                            // }//end else
                                                            ?>
                                                     <!--    </select>
                                                    </div> -->
                                                    <?php
                                                                    if(strlen($county_home_rate_per_unit)>0){
                                                        ?>  
                                                               <div class="form-group" id="home_type">
                                                                    <label class="control-label">Rate Per Unit For Home (£)</label>
                                                                    <input type="number" min="1" name="home_rate_per_unit" class=" form-control" value="<?= $county_home_rate_per_unit;?>" required>
                                                            </div>

                                                              <div class="form-group" id="home_type_standing_charges" style="">
                                                                    <label class="control-label">Standing Charges For Home (£)</label>
                                                                    <input type="number" min="1" name="home_standing_charges" value="<?= $county_standing_charges_for_home ?>" class=" form-control" required>
                                                                        <span class="help-block"><small>E.g: 3P=3/100*365</small></span>
                                                                </div>
                                                        <?php
                                                        } ?> 

                                                </div>
                                                <div class="col-md-6">
                                                        

                                                        <?php if(strlen($county_business_rate_per_unit)>0){ ?>
                                                             <div class="form-group m-b-0" id="business_type" style="     margin-top: 20px;">
                                                                    <label class="control-label">Rate Per Unit For Business (£)</label>
                                                                    <input name="business_rate_per_unit" type="number" value="<?php echo $county_business_rate_per_unit; ?>" min="1" required class="form-control"> 
                                                            </div>
                                                            

                                                             <div class="form-group m-b-0" id="business_type_standing_charges" style="margin-top: 10px;">
                                                                    <label class="control-label">Standing Charges For Business (£)</label>
                                                                    <input name="business_standing_charges" value="<?= $county_standing_charges_for_business ?>" type="number" min="1" required class="form-control"> 
                                                                        <span class="help-block"><small>E.g: 3P=3/100*365</small></span>
                                                            </div>    
                                                            <?php
                                                        }
                                                            ?>
                                                         
                                                  

                                                    <div class="form-group pull-right" style="margin-top: 20px;">
                                                        <button class="btn btn-primary" type="submit" name="update_a_county">Update Details</button>
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