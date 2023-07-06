<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <?php
                         show_button("all_counties_configuration.php","All Configured Counties","info","eye");
                        ?>
                        <div class="row">
                            <?php
                            if(isset($_GET['already_exists'])){
                                if ($_GET['already_exists']==1){
                                    messages("The configuration is already exists","warning");
                                }
                            }
                            if(isset($_GET['added'])){
                                if($_GET['added']==1){
                                     messages("The rates for the county are added successfully","success");
                                }else{
                                         messages("Error in adding county configuration","warning");
                                }
                            }
                            ?>
                                <div class = "panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add County Configuration Details</h3>
                                    </div>
                                    <div class="panel-body">
                                            <div class="col-md-6">
                                                <form method="post" action= "actions/insert.php">
                                                    <!--  <div class="form-group">
                                                        <label>Enter Post Code</label>
                                                        <input type="text" name="zipcode" class="form-control" required maxlength="10">
                                                    </div>   -->
                                                    <div class="form-group">
                                                        <label>Choose A County</label>
                                                        <select name="choosen_county" class="form-control" required>
                                                            <option selected disabled>Select A County</option>
                                                                    <?php
                                                                    $query = mysqli_query($conn,"select * from counties where county_id not in (SELECT county_id from county_with_suppliers)");
                                                                    while($row = mysqli_fetch_array($query)){
                                                                        $county_id = $row['county_id'];
                                                                        $county_name = $row['county_name'];
                                                                        echo '<option value="'.$county_id.'">'.ucwords($county_name).'</option>';
                                                                    }
                                                                    ?>
                                                        </select>
                                                    </div>   


                                                   <!--  <div class="form-group">
                                                        <label >Choose Energy Supplier Type</label>
                                                        <select class="form-control" id="supplider_types" name="supplier_types">
                                                            <option value="" selected disabled>Choose Supplier Type</option> -->
                                                            <?php
                                                            // $query = mysqli_query($conn,"SELECT * FROM `energy_supplier_types`");

                                                            // while($row = mysqli_fetch_array($query)){
                                                            //     $energy_supplier_type_id=$row['energy_supplier_type_id'];
                                                            //     $energy_supplier_type_name=$row['energy_supplier_type_name'];
                                                            //     echo '<option id="energy_source_'.$energy_supplier_type_id.'"  value = "'.$energy_supplier_type_id.'">'.$energy_supplier_type_name.'</option>';
                                                            // }
                                                            ?>
                                                   <!--      </select>
                                                    </div>    
 -->
                                                    <!-- <div class="form-group" id="all_suppliers">
                                                        
                                                        
                                                    </div> -->
                                                     <div class="form-group" id="home_type" style="">
                                                                    <label class="control-label">Rate Per Unit For Home (£)</label>
                                                                    <input type="number" min="1" name="home_rate_per_unit" class=" form-control" required>
                                                                </div>
                                                                <div class="form-group" id="home_type_standing_charges" style="">
                                                                    <label class="control-label">Standing Charges For Home (P)</label>
                                                                    <input type="number" min="1" name="home_standing_charges" class=" form-control" required>
                                                                    <span class="help-block"><small>E.g: 3P=3/100*365</small></span>
                                                                </div>

                                                </div>
                                                <div class="col-md-6">

                                                   <!--  <div class="form-group">
                                                        <label id="label_supplider_types">Choose Place Type</label>
                                                        <select class="form-control" id="energy_using_types" name="energy_using_types">
                                                            <option value="0" selected disabled>Choose Place Type</option>
                                                            <?php
                                                            
                                                                // echo '<option id="business_type_home"  value = "home">Home</option>';
                                                                // echo '<option id="business_type_business"  value = "business">Business</option>';
                                                            
                                                             ?>
                                                        </select>
                                                    </div> -->
                                                    
                                                              
                                                             <div class="form-group m-b-0" id="business_type" style="     margin-top: 20px;">
                                                                    <label class="control-label">Rate Per Unit For Business (£)</label>
                                                                    <input name="business_rate_per_unit" type="number" min="1" required class="form-control"> 
                                                            </div>

                                                            <div class="form-group m-b-0" id="business_type_standing_charges" style="margin-top: 10px;">
                                                                    <label class="control-label">Standing Charges For Business (P)</label>
                                                                    <input name="business_standing_charges" type="number" min="1" required class="form-control"> 
                                                                    <span class="help-block"><small>E.g: 3P=3/100*365</small></span>
                                                            </div>



                                                         
                                                

                                                    <div class="form-group pull-right" style="margin-top: 20px;">
                                                        <button class="btn btn-primary" type="submit" name="set_a_postcode">Save</button>
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
<script type="text/javascript">
    $(document).ready(function(){
        // $(document).on('change','#supplider_types',function(){
        //     let type = $(this).find(':selected').text();
        //     $.ajax({
        //         url:'actions/fetch.php',method:'post',data:{type:type,fetch_suppliers:1},success:function(data){
        //                 $("#all_suppliers").empty().append(data);
        //         }
        //     })//end ajax
        // });
        // let counter = 0;
        // $(document).on('change','#energy_using_types',function(){
        //     counter = counter+1;
        //     let type = $(this).find(':selected').val();
        //     $("#business_type_"+type.trim()).fadeOut();
        //     $("#energy_using_types").val(0);
        //     if (type=="home"){
        //         $("#home_type").show();
        //         $("#home_type_standing_charges").show();

        //     }else{
        //         $("#business_type").show();
        //         $("#business_type_standing_charges").show();
        //     }
        //     if(counter==2){
        //         $("#label_supplider_types").fadeOut();
        //         $(this).fadeOut();
        //     }
           
        // });

    });
</script>