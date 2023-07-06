<?php
  include 'includes/header.php';
?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                                <?php 
                                                                if(isset($_GET['deleted_country'])){
                                                                    if($_GET['deleted_country']==1)
                                                                         messages("Sucess! The Country And Its Linked Cities Have Been Deleted","danger");
                                                                    else if($_GET['deleted_country']==0)
                                                                        messages("Error! Deletion Error","warning");
                                                                }
                                ?>
                            <div class="col-md-12">

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Added Countries</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Country Name</th>
                                                    <th>Linked Cities</th>
                                                    <th>Linked Business</th>
                                                   <!--  <th>Actions</th> -->
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $all_countries = mysqli_query($conn,"SELECT * FROM `location_countries`");
                                                while($row = mysqli_fetch_assoc($all_countries)){
                                                    $location_country_id = $row['location_country_id'];
                                                    $location_country_name = $row['location_country_name'];
                                                    $location_added_datetime =  human_timedate($row['location_added_datetime']);
                                                    
                                                    
                                                    $count_linked_cities = mysqli_query($conn,"select count(*) as linked_cities from location_cities where location_country_id= $location_country_id");
                                                    $linked_row = mysqli_fetch_assoc($count_linked_cities);
                                                    $num_of_linked_cities = $linked_row['linked_cities'];

                                                    $count_linked_business = mysqli_query($conn,"select count(*) as total_linked_cities from (select * from  admin_added_business join location_cities where location_id in (select location_city_id from location_cities ) and location_cities.location_city_id= admin_added_business.location_id and location_cities.location_country_id=$location_country_id) as D");
                                                    $linked_row = mysqli_fetch_assoc($count_linked_business);
                                                    $num_of_linked_business = $linked_row['total_linked_cities'];


                                                    $view_cities_btns = "";
                                                   # if ($num_of_linked_cities>0)
                                                       # $view_cities_btns = '<a href="view_linked_country_cities.php?country_id='.$location_country_id.'" class="btn btn-inverse" title="View Linked Cities"><i class="fa fa-eye"></i></a>';
                                                    #if ($num_of_linked_business>0)
                                                        #$view_businesses_btns = '<a href="view_linked_businesses.php?country_id='.$location_country_id.'" class="btn btn-info" title="View Linked Business"><i class="fa fa-eye"></i></a>';

                                                    #$actions =  '<a class="btn btn-purple" title="Update Country Details" href="update_country.php?country_id='.$location_country_id.'"><i class="fa fa-pencil"></i></a> '.$view_cities_btns.' '.$view_businesses_btns;
                                                    
                                                    echo '<tr>
                                                    <td>'.$location_country_id.'</td>
                                                    <td>'.$location_country_name.'</td>
                                                    <td>'.$num_of_linked_cities.'</td>
                                                      <td>'.$num_of_linked_business.'</td>
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
