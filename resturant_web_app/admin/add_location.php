<?php
  include 'includes/header.php';
?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                             <?php
                                    show_button("all_locations.php","Show All Locations","purple","eye");
                            ?>
                            <div class="col-md-12">
                                <?php
                                    if(isset($_GET['added'])){
                                        if($_GET['added']==1){
                                            messages("Location Has Been Added Successfully","success");
                                        }else if($_GET['added']==0){
                                              messages("Error in Adding Location","warning");
                                        }
                                    }
                                    if(isset($_GET['country_exists'])){
                                            if($_GET['country_exists']==1){
                                                     messages("This country is Already Exists","danger");
                                            }
                                    }

                                    if(isset($_GET['address_exists'])){
                                            if($_GET['address_exists']==1){
                                                     messages("This Address is Already Exists","danger");
                                            }
                                    }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add A Location</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="add_a_location" action="actions/insert.php">
                                            <div class="form-group">
                                                    <label>Choose A Country</label>
                                                   <select class="form-control" name="country_name_selected" id="country_name_selected" required>
                                                    <option selected disabled>Nohting Selected</option>
                                                       <?php
                                                       $query = mysqli_query($conn,"SELECT * FROM `location_countries` order by location_country_name");
                                                       while($r = mysqli_fetch_assoc($query)){
                                                                $location_country_id = $r['location_country_id'];
                                                                $location_country_name = $r['location_country_name'];
                                                                echo '<option value = "'.$location_country_id.'">'
                                                                .$location_country_name.'</option>';
                                                        }
                                                           

                                                        ?>
                                                        <option value="n">Add A New Country?</option>
                                                   </select>
                                            </div>
                                            <div id="new_country_input"></div>
                                              <div class="form-group">
                                                        <label>City Name</label>
                                                          <input type="text" name="city_name" class="form-control" required> 
                                                </div>

                                                <div class="form-group">
                                                    <label>Zip Code</label>
                                                    <input type="text" name="zip_code" class="form-control" required>    
                                                </div>

                                            <div class="form-group pull-right">
                                                <button class="btn btn-primary" type="submit" name="add_location">Save</button>
                                            </div>
                                            
                                        </form>
                                      

                                    </div>
                                </div>
                            </div>
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->
      
<?php
        include 'includes/footer.php';
?>
<script type="text/javascript">
        $(document).ready(function(){
            $(document).on('change','#country_name_selected',function(){
                let value = $(this).find(':selected').val();
                let input ='<div class="form-group"><label>Country Name</label><input type="text" name="country_name" class="form-control" required></div>';
                if(value=="n"){
                    $("#new_country_input").empty().append(input);
                }else{
                    $("#new_country_input").empty();
                }
            });
        });
</script>