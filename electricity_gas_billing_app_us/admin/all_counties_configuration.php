<?php
		include 'includes/header.php';
?>
	<div class="content-page">
                <div class="content">
                    <div class="container">
                        <?php
                            show_button("add_a_postcode.php","Add New County Configuration","info","plus");
                            if(isset($_GET['deleted'])){
                                if($_GET['deleted']==1)
                                    messages("Deleted Successfully","danger");
                                else if($_GET['deleted']==0)
                                    messages("Error in deletion","warning");
                            }
                        ?>
                         <div class="row">

                            <div class="col-md-12">
                                <div id="err_msg">
                                      
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Configured Counties</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="supportmsgs" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                           <!--  <th>ID</th> -->
                                                            <!-- <th>#</th> -->
                                                            <th>County Name</th>
                                                          <!--   <th>Supplier Name</th>
                                                            <th>Service Type</th> -->
                                                            <th>Home Rate(£)</th>
                                                            <th>Business Rate(£)</th>
															<th>Added Date</th> 
                                                            <th>Last Update</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                            <?php 
                                                                $query = mysqli_query($conn,"SELECT * FROM `county_with_suppliers` join counties on counties.county_id = county_with_suppliers.county_id");
                                                                #$i=0;
                                                                while($row= mysqli_fetch_array($query)){
                                                                     $icon='<a href="#" title="X: Value which will later used: (X/100*365)"><i class="fa fa-eye"></i></a>';
                                                                    $county_configuration_id = $row['county_configuration_id'];
                                                                    $county_id = $row['county_id'];
                                                                    #$county_service_type = $row['county_service_type'];
                                                                    $county_standing_charges_for_home = $row['county_standing_charges_for_home'];
                                                                    $county_home_rate_per_unit = $row['county_home_rate_per_unit']." (".$icon.$county_standing_charges_for_home.")";
                                                                    #$energy_supplier_id = intval($row['energy_supplier_id']);
                                                                   
                                                                    $county_standing_charges_for_business = $row['county_standing_charges_for_business'];
                                                                    $county_business_rate_per_unit = $row['county_business_rate_per_unit']." (".$icon.$county_standing_charges_for_business.")";
                                                                    
                                                                    $county_add_timestamp =human_timedate( $row['county_add_timestamp']);
                                                                $county_update_datetime = human_timedate($row['county_update_datetime']);
                                                                        // $county_details = mysqli_query($conn,"select* from counties where county_id = $county_id");
                                                                        // $row_county = mysqli_fetch_array($county_details);
                                                                        $county_name = ucwords($row['county_name']);


                                                                        // if($county_service_type==1){ #for gas
                                                                        //     $query2 =mysqli_query($conn,"select* from gas_energy_suppliers where energy_supplier_id=$energy_supplier_id");
                                                                        //     $row2 = mysqli_fetch_array($query2);
                                                                        //     $energy_supplier_name = $row2['energy_supplier_name'];
                                                                        //     $energy_supplier_type_name = "Gas";
                                                                        // }   else{ #--for electricity
                                                                        //         $query2 =mysqli_query($conn,"select* from electricity_energy_suppliers where electricity_provider_id=$energy_supplier_id");
                                                                        //         $row2 = mysqli_fetch_array($query2);
                                                                        //         $energy_supplier_name = $row2['electricity_provider_name'];
                                                                        //         $energy_supplier_type_name = "Electricity";

                                                                        // }

                                                                        $actions = ' <a class="btn btn-inverse btn-sm"   title="Update The County Configuration" href="update_county_configuration_settings.php?county_configuration_id='.$county_configuration_id.'&county_id='.$county_id.'"><i class="fa fa-pencil"></i></a> <a class="btn btn-danger btn-sm" href="actions/delete.php?delete_post_code=1&county_configuration_id='.$county_configuration_id.'" title="Delete This Entry"><i class="fa fa-times"></i></a>';

                                                                          echo '<tr>
                                                                            <td>'.$county_name.'</td>
                                                                            <td>'.$county_home_rate_per_unit.'</td>
                                                                              <td>'.$county_business_rate_per_unit.'</td>
                                                                               <td>'.$county_add_timestamp.'</td>
                                                                               <td>'.$county_update_datetime.'</td>
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
                        </div> <!-- End Row -->  
<?php
		include 'includes/footer.php';
?>
<script type="text/javascript">
    $("#supportmsgs").dataTable();
</script>