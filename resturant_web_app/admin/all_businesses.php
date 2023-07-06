<?php
  include 'includes/header.php';
?>
                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">

                            <?php
                                    show_button("add_business.php","Add A New Business","success","plus");
                            ?>
                            <div class="col-md-12">
                                  <?php
                                    if(isset($_GET['delete_business'])){
                                        if($_GET['delete_business']==1){
                                                messages("All The Data Related To This Business Has Been Deleted","danger");
                                        }else if($_GET['delete_business']==0){
                                                 messages("Error in deletion","warning");
                                        }
                                    }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Businesses</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Business Name</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Business Type</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $all_business = mysqli_query($conn,"SELECT * FROM `admin_added_business` inner join location_cities join location_countries join business_types on location_countries.location_country_id=location_cities.location_country_id and admin_added_business.location_id = location_cities.location_city_id and business_types.business_type_id = admin_added_business.business_type");
                                                while($row = mysqli_fetch_assoc($all_business)){
                                                    $location_city_name = $row['location_city_name'];
                                                    $location_city_zipcode = $row['location_city_zipcode'];
                                                    $business_id = $row['business_id'];
                                                    $business_name = $row['business_name'];
                                                    $business_type_name = $row['business_type_name'];
                                                    $business_type = $row['business_type'];
                                                    $business_email = $row['business_email'];
                                                    $location_country_name = $row['location_country_name'];

                                                    $full_address =$location_city_name.", ".$location_city_zipcode.", ".$location_country_name;
                                                    
                                                    // $view_details ='<a class="btn btn-info btn-sm" title="View Business Details" href="view_bussiness_details.php?business_id='.$business_id.'"><i class="fa fa-eye"></i></a>';
                                                    
                                                    // $update_details = '<a href="update_business_details.php?business_id='.$business_id.'" class="btn btn-purple btn-sm" title="Update This Business Details"><i class="fa fa-pencil"></i></a>';
                                                    $add_listings_in_business = "";
                                                    if($business_type==1){
                                                        $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_resturant_details.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                        $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Menus For This Resturant" href="add_resturant_menus.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';
                                                    }else if($business_type==2){
                                                         $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_bar_details.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';

                                                          $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Bar" href="add_bar_menus.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';


                                                    }else

                            
                                                    if($business_type==4){
                                                             $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_vehicles_details.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                                 $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Vehicles For This Business" href="add_vehicles.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';
                                                    }else if($business_type==5){


                                                        $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_adult_entertanmaint.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                                 $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_adult_entertanmaint_drinks.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a> <a class="btn btn-inverse btn-sm" title="Add Food Menus For This Business" href="add_adult_entertanmaint_menus.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';
                                                    }else if($business_type==6){
                                                         $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_jazz.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                         $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_jazz_drinks.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';      
                                                    }else if($business_type==7){
                                                        $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_concert.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                         $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_concert_drinks.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';     
                                                    }else if($business_type==8){
                                                        $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_afrobeats.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                         $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_afrobeats_drinks.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>';     
                                                    }else if($business_type==9){
                                                            $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_raggea.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                         $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_raggea_drinks.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>'; 
                                                    }else if($business_type==10){
                                                         $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_event.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                         $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_menus_for_event.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a> <a class="btn btn-inverse btn-sm" title="Add Drinks For This Business" href="add_drinks_for_event.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>'; 
                                                    }else if($business_type==11){
                                                         $add='<a class="btn btn-success btn-sm" title="Add More Details For This Business" href="add_details_for_club.php?business_id='.$business_id.'"><i class="fa fa-plus"></i></a>';
                                                         $add_listings_in_business = '<a class="btn btn-purple btn-sm" title="Add Drinks For This Business" href="add_menus_for_club.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a> <a class="btn btn-inverse btn-sm" title="Add Drinks For This Business" href="add_drinks_for_club.php?business_id='.$business_id.'"><i class="fa fa-list"></i></a>'; 
                                                    }



                                                    $actions = $add.'  <a href="actions/delete.php?business_id='.$business_id.'&delete_business=1" class="btn btn-danger btn-sm" title="Delete This Business"><i class="fa fa-trash"></i></a> '.$add_listings_in_business;

                                                    echo '<tr>
                                                    <td>'.$business_id.'</td>
                                                    <td>'.$business_name.'</td>
                                                    <td>'.$business_email.'</td>
                                                    <td>'.$full_address.'</td>
                                                    <td>'.$business_type_name.'</td>
                                                    <td>'.$actions.'</td>
                                                    </tr>';
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
 } );
 </script>
