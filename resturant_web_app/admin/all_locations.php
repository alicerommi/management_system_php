<?php
  include 'includes/header.php';
?>
                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                              <?php
                                    show_button("add_location.php","Add New Location","purple","plus");
                            ?>
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Added Locations</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>City Name</th>
                                                    <th>Zip Code</th>
                                                    <th>Country Name</th>
                                                    <th>Added Date</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $all_locations = mysqli_query($conn,"select * from location_cities inner join location_countries where location_cities.location_country_id  = location_countries.location_country_id");
                                                while($row = mysqli_fetch_assoc($all_locations)){
                                                    $location_city_name = $row['location_city_name'];
                                                    $location_city_zipcode = $row['location_city_zipcode'];
                                                    $location_city_added_datetime = human_timedate($row['location_city_added_datetime']);
                                                    $location_country_name = $row['location_country_name'];
                                                    $location_city_id = $row['location_city_id'];
                                                    echo '<tr>
                                                    <td>'.$location_city_id.'</td>
                                                    <td>'.$location_city_name.'</td>
                                                    <td>'.$location_city_zipcode.'</td>
                                                    <td>'.$location_country_name.'</td>
                                                    <td>'.$location_city_added_datetime.'</td>
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
