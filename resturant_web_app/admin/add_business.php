<?php
  include 'includes/header.php';
?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">

                            <?php
                                    show_button("all_businesses.php","View All Businesses","success","eye");
                            ?>
                            <div class="col-md-12">
                                <?php
                                    if(isset($_GET['added'])){
                                        if($_GET['added']==1){
                                            messages("Business Details Has Been Added Successfully","success");
                                        }else if($_GET['added']==0){
                                              messages("Error in Adding Business Details","warning");
                                        }
                                    }
                                    if(isset($_GET['alreadyExists'])){
                                            if($_GET['alreadyExists']==1){
                                                     messages("This business Already Exists","danger");
                                            }
                                    }

                                    // if(isset($_GET['address_exists'])){
                                    //         if($_GET['address_exists']==1){
                                    //                  messages("This Address is Already Exists","danger");
                                    //         }
                                    // }
                                ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add Business Details</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="add_a_location" action="actions/insert.php">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Business Name</label>
                                                    <input type="text" name="business_name" required class="form-control">
                                                </div>

                                                  <div class="form-group">
                                                        <label>Business Type</label>
                                                       <select class="form-control" name="business_type"  required>
                                                            <?php
                                                                  $query = mysqli_query($conn,"SELECT * FROM `business_types` ");
                                                           while($r = mysqli_fetch_assoc($query)){
                                                                    $business_type_id = $r['business_type_id'];
                                                                    $business_type_name = $r['business_type_name'];
                                                                    echo '<option value = "'.$business_type_id.'">'
                                                                    .$business_type_name.'</option>';
                                                            }
                                                            ?>
                                                       </select>
                                                </div>
                                                <div class="form-group">
                                                            <label>Business Email</label>
                                                             <input type="email" name="business_email" required class="form-control">
                                                </div>

                                                <div class="form-group">
                                                        <label>Business Phone#</label>
                                                        <input type="text" name="business_phone" required class="form-control">
                                                </div>
                                        </div>

                             <div class="col-md-6">

                                           

                                            <div class="form-group">
                                                        <label>Business Website</label>
                                                        <input type="text" name="business_website"  class="form-control">
                                            </div>
                                             <div class="form-group">
                                                    <label>Business Country</label>
                                                   <select class="form-control" name="country_name_selected" id="country_name_selected" required>
                                                    <option selected disabled>Nothing Selected</option>
                                                       <?php
                                                       $query = mysqli_query($conn,"SELECT * FROM `location_countries` order by location_country_name");
                                                       while($r = mysqli_fetch_assoc($query)){
                                                                $location_country_id = $r['location_country_id'];
                                                                $location_country_name = $r['location_country_name'];
                                                                echo '<option value = "'.$location_country_id.'">'
                                                                .$location_country_name.'</option>';
                                                        }
                                                        ?>
                                                   </select>
                                            </div>

                                            <div class="form-group">
                                                    <label>Business City</label>
                                                   <select class="form-control" name="city_name_selected" id="city_name_selected" required>
                                                   
                                                   </select>
                                            </div>

                                             <div class="form-group">
                                                    <label>Avaiable ZipCode</label>
                                                   <select class="form-control" name="zipcode_name_selected" id="zipcode_name_selected" required>
                                                   
                                                   </select>
                                                   <a style="margin-top: 10px; display: none; " id="location_helper" href="add_location.php" class="btn btn-info btn-sm" title="Add New Location"><i class="fa fa-plus"></i></a>
                                            </div>

                                            <!-- <input type="hidden" name="admin_added" > -->
                                            

                                        </div>

                                        <div class="form-group">
                                            <label>Business More Details</label>
                                                   <textarea class="form-control" rows="10" type="text" name="business_details"></textarea>
                                            </div>
                                       

                                             <div class="form-group text-right">
                                                   <button class="btn btn-success" type="submit" name="save_business_details">Save</button>
                                            </div>



                                       </form>    
                                   </div>
                               </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
      
<?php
        include 'includes/footer.php';
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#country_name_selected',function(){
            let country_id = $(this).find(':selected').val();
            $.ajax({
                url:'actions/fetch.php',
                data:{
                    fetch_cities:1,
                    country_id:country_id,
                },
                method:'post',
                dataType:'JSON',
                success:function(d){
                         $("#city_name_selected").empty().append('<option selected disabled>Nothing Selected</option>');
                         $("#zipcode_name_selected").empty();
                    for(let i=0;i<d.length;i++)
                        { 
                          let opt = '<option value='+d[i].location_city_id+'>'+d[i].location_city_name+'</option>';
                          $("#city_name_selected").append(opt);
                        }
                }
            });
        });

         $(document).on('change','#city_name_selected',function(){
            let city_id = $(this).find(':selected').val();
            $.ajax({
                url:'actions/fetch.php',
                data:{
                    fetch_zipcodes_areas:1,
                    location_city_id:city_id,
                },
                method:'post',
               
                success:function(d){
                         $("#zipcode_name_selected").empty();
                         let opt = ' <option selected disabled>Nothing Selected</option><option value='+d+'>'+d+'</option>';
                        $("#zipcode_name_selected").append(opt);
                        $("#location_helper").show();
                        
                }
            });
        })
    })
</script>