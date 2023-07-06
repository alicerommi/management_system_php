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
                                        messages("Customer Has Been Added Successfully","success");
                                    }else if($_GET['added']==0){
                                          messages("Error in adding customer","danger");
                                    }
                                }

                                if(isset($_GET['already_exists'])){
                                    if($_GET['already_exists']==1){
                                         messages("customer with this email address is already exists","warning");
                                    }
                                }

                                show_button("all_users.php","View All Users","inverse","eye");
                            ?>

                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Add New Customer</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/insert.php" id="create_user">
                                                   <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Customer Name</label>
                                                                    <input type="text" name="customer_name" required class="form-control input-lg" maxlength="50">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Customer Address</label>
                                                                    <input type="address" name="customer_address" required class="form-control input-lg" maxlength="200">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Customer Phone</label>
                                                                    <input type="address" name="customer_phone" required class="form-control input-lg" maxlength="50">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Customer Access On Which vehicle Type</label>
                                                                    <select  id="customer_access_on_vehicle_type" class="form-control input-lg">
                                                                    <?php
                                                                            $query = mysqli_query($conn,"select* from vehicle_types");
                                                                             echo '<option value="" readonly>Nothing Selected</option>';
                                                                            while($row = mysqli_fetch_array($query)){
                                                                                $vehicle_type_id = $row['vehicle_type_id'];
                                                                                $vehicle_type_name = ucwords($row['vehicle_type_name']);
                                                                                echo '<option value="'.$vehicle_type_id.'" id="opt_'.$vehicle_type_id.'" class="access_without_all">'.$vehicle_type_name.'</option>';
                                                                            }
                                                                            echo '<option value="0">All</option>';
                                                                            ?>
                                                                           
                                                                            
                                                                    </select>
                                                                    <span class="help-block"><small>This will restrict the customer to see specific vehicle types.</small></span>
                                                                </div>

                                                                <div class="form-group" style="display:none;" id="hider">
                                                                    <label>Selected Access:</label>
                                                                    <div id="selected_access">
                                                                          
                                                                    </div>

                                                                </div>
                                                                
                                                                





                                                    </div>

                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Customer Email</label>
                                                                <input type="email" name="customer_email" maxlength="50" required class="form-control input-lg">
                                                               <!--  <span class="help-block"><small>Account Details Will Be Send Via This Email Address.</small></span> -->
                                                            </div>
                                                              <div class="form-group">
                                                                    <label>Contact Man Name</label>
                                                                    <input type="address" name="customer_conatct_man" required class="form-control input-lg" maxlength="50">
                                                                </div>


                                                            <div class="form-group">
                                                                <label>Ads Limit</label>
                                                                <input type="number" name="customer_ads_limit" required class="form-control" min="1" maxlength="10">
                                                            </div>
                                                            <div class="form-group ">
                                                                <label>Customer Password</label>
                                                                <input type="text" name="customer_pass" id="customer_pass" maxlength="50" required class="form-control input-lg">
                                                                <button class="btn btn-warning" id="pass_gene" type="button" style="margin-top: 10px;">Generate Password Now</button>
                                                            </div>
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-success pull-right" type="submit" name="add_new_customer">Save</button>
                                                    </div>

                                                    </div>
                                                    
                                                  
                                                
                                            </form>  
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
  //  $("#supportmsgs").dataTable();
    $.extend({
    password: function (length, special) {
    var iteration = 0;
    var password = "";
    var randomNumber;
    if(special == undefined){
        var special = false;
    }
    while(iteration < length){
        randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
        if(!special){
            if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
            if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
            if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
            if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
        }
        iteration++;
        password += String.fromCharCode(randomNumber);
    }
    return password;
  }
});
$(document).on('click','#pass_gene',function(){
        let number = 8 + Math.floor(Math.random() * 20);
        let password = $.password(number,false);
        $('#customer_pass').val(password);
});

$(document).on('change','#customer_access_on_vehicle_type',function(){
    $("#hider").show();
    let access = $(this).find(':selected').text();
     let access_val =  $(this).find(':selected').val();
    if (access_val!=""){
             $('#opt_'+access_val).remove();
              let arr = ['inverse','success','danger','warning','pink','purple','info'];
                let random_number = 0 + Math.floor(Math.random() * arr.length);
                let bt = arr[random_number];

            if (access_val==0){
                $(".access_without_all").remove();
                   // $("#selected_access").empty();
                    let input = '<input type="hidden" name="selected_access_for_user[]" class="different_roles" value="'+access_val+'">';
                    if ($(".different_roles").length)
                        {
                                    $(".different_roles").remove();
                                     $("#create_user").append(input);
                        }
                    else
                             $("#create_user").append(input);
                let btn = '<div class="col-md-3"><button type="button" class="btn btn-'+bt+' waves-effect waves-light m-b-5" title="'+access+'" disabled>'+access+'</button></div>';
                 $("#selected_access").empty().append(btn);

            }else {
               
               
                let btn = '<div class="col-md-3"><button type="button" class="btn btn-'+bt+' waves-effect waves-light m-b-5" title="'+access+'" disabled>'+access+'</button></div>';
                $("#selected_access").append(btn);
                let input = '<input type="hidden" name="selected_access_for_user[]"  class="different_roles" value="'+access_val+'">';
                $("#create_user").append(input);
            }
    }
});
</script>