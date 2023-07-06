<?php
    include 'includes/header.php';
?>                 
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <?php
                            show_back_button("all_users.php","Go Back");
                                if(isset($_GET['updated'])){
                                    if($_GET['updated']==1){
                                        messages("Customer Details Has Been Updated Successfully","success");
                                    }else if($_GET['updated']==0){
                                          messages("Error in updating customer","danger");
                                    }
                                }

                                // if(isset($_GET['already_exists'])){
                                //     if($_GET['already_exists']==1){
                                //          messages("customer with this email address is already exists","warning");
                                //     }
                                // }
                            if(isset($_GET['customer_id'])){
                                $customer_id = $_GET['customer_id'];
                                $query = mysqli_query($conn,"select * from customers where customer_id = $customer_id");
                                    $row = mysqli_fetch_array($query);
                                     $customer_name = ucwords($row['customer_name']);
                                    $customer_email = $row['customer_email'];
                                     $customer_password = $row['customer_password'];
                                     $customer_added_by = $row['customer_added_by'];
                                     $customer_address = ucwords($row['customer_address']);
                                     $customer_contact_man = ucwords($row['customer_contact_man']);
                                     $customer_phone =ucwords( $row['customer_phone']);
                                     $customer_block = ucwords($row['customer_block']);
                                     $customer_ads_limit = $row['customer_ads_limit'];
                                    if($customer_block==1){
                                         $customer_block= "Blocked";
                                     }else{
                                         $customer_block= "Active";
                                     }
                                     $access_array = array();
                                     $access_query=mysqli_query($conn,"SELECT * FROM `customer_access_vehicles` where customer_id = $customer_id");
                                     while($rr  = mysqli_fetch_array($access_query)){
                                         array_push($access_array,$rr['customer_access_vehicle_type_id']);
                                     }//end while here
                            }else{
                                   messages("there are some missing parameters","warning"); 
                                   die;
                            }

                            ?>

                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Update Customer Details</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form method="post" action= "actions/update.php" id="create_user">
                                                   <div class="col-md-6">
                                                          
                                                                <div class="form-group">
                                                                    <label>Customer Name</label>
                                                                    <input type="text" name="customer_name" required class="form-control input-lg" maxlength="50" value="<?= $customer_name;?>">
                                                                </div>
                                                                  <input type="hidden" name="customer_id" value="<?=$customer_id ?>">
                                                                <div class="form-group">
                                                                    <label>Customer Address</label>
                                                                    <input type="address" name="customer_address" required class="form-control input-lg" maxlength="200" value="<?= $customer_address?>">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Customer Phone</label>
                                                                    <input type="address" name="customer_phone" required class="form-control input-lg" maxlength="50" value="<?= $customer_phone ?>">
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
                                                                                if (!in_array($vehicle_type_id, $access_array))
                                                                                    {
                                                                                        echo '<option value="'.$vehicle_type_id.'" id="opt_'.$vehicle_type_id.'" class="access_without_all">'.$vehicle_type_name.'</option>';
                                                                                    }
                                                                            }
                                                                            if (!in_array(0, $access_array)){
                                                                                echo '<option value="0">All</option>';
                                                                            }
                                                                            ?>
                                                                           
                                                                            
                                                                    </select>
                                                                    <span class="help-block"><small>This will restrict the customer to see specific vehicle types.</small></span>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Selected Access:</label>
                                                                    <div id="selected_access">
                                                                            <?php
                                                                            $arr = ['inverse','success','danger','warning','pink','purple','info'];
                                                                            $random_number = rand(0,sizeof($arr)-1);
                                                                            $bt = $arr[$random_number];
                                                                            
                                                                                $size = sizeof($access_array);
                                                                                if($size==1 && $access_array[0]==0){
                                                                                    $access = "All";
                                                                                    $access_val = 0; 
                                                                                     echo $btn = '<div class="col-md-3"><button type="button" class="btn btn-'.$bt.' waves-effect waves-light m-b-5" title="'.$access.'">'.$access.'</button></div>';
                                                                                    echo  $input = '<input type="hidden" name="selected_access_for_user[]"  class="different_roles" value="'.$access_val.'">';

                                                                                }else{
                                                                                        for ($i=0; $i <$size ; $i++) { 
                                                                                            $access_id = $access_array[$i];
                                                                                            $query = mysqli_query($conn,"SELECT * FROM `vehicle_types` where  vehicle_type_id=$access_id");
                                                                                            $access_val = $access_id;
                                                                                            $row = mysqli_fetch_array($query);
                                                                                            $access = ucwords($row['vehicle_type_name']);
                                                                                              echo $btn = '<div class="col-md-3" id="btn_div_'.$access_id.'"><button type="button" id="'.$access_id.'" class="remover_access btn btn-'.$bt.' waves-effect waves-light m-b-5" title="'.$access.'">'.$access.'</button></div>';

                                                                                                echo  $input = '<input type="hidden" id="value_mapper'.$access_id.'" name="selected_access_for_user[]"  class="different_roles" value="'.$access_val.'">';
                                                                                        }// end for here
                                                                                }//end else 
                                                                            ?>
                                                                    </div>

                                                                </div>
                                                                
                                                                





                                                    </div>

                                                    <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Customer Email</label>
                                                                <input type="email"  maxlength="50" required class="form-control input-lg" value="<?=$customer_email ?>" readonly>
                                                               <!--  <span class="help-block"><small>Account Details Will Be Send Via This Email Address.</small></span> -->
                                                            </div>
                                                              <div class="form-group">
                                                                    <label>Contact Man Name</label>
                                                                    <input type="address" name="customer_conatct_man" required class="form-control input-lg" maxlength="50" value="<?= $customer_phone ?>">
                                                                </div>
                                                                   <div class="form-group">
                                                                <label>Ads Limit</label>
                                                                <input type="number" name="customer_ads_limit" value="<?= $customer_ads_limit?>" required class="form-control" min="1" maxlength="10">
                                                            </div>
                                                            <div class="form-group ">
                                                                <label>Customer Password</label>
                                                                <input type="text" name="customer_pass" id="customer_pass" maxlength="50" required class="form-control input-lg" value="<?= $customer_password ?>">
                                                                <button class="btn btn-warning" id="pass_gene" type="button" style="margin-top: 10px;">Change Password Now</button>
                                                            </div>
                                                    <div class="form-group pull-right">
                                                        <button class="btn btn-success pull-right" type="submit" name="update_new_customer">Update Details</button>
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
    //$("#hider").show();
    let access = $(this).find(':selected').text();
     let access_val =  $(this).find(':selected').val();
    if (access_val!=""){
            if($(".different_roles").length){
                    if($(".different_roles").val()==0){
                        $('#selected_access').empty();
                        let i =  '<option value="0">All</option>';
                        $("#customer_access_on_vehicle_type").append(i);
                        $(".different_roles").remove();
                    }
            }

             $('#opt_'+access_val).remove();
                let arr = ['inverse','success','danger','warning','pink','purple','info'];
                let random_number = 0 + Math.floor(Math.random() * arr.length);
                let bt = arr[random_number];

            if (access_val==0){
                $(".access_without_all").remove();
                   // $("#selected_access").empty();
                    let input = '<input type="hidden" name="selected_access_for_user[]" id="value_mapper'+access_val+'" class="different_roles" value="'+access_val+'">';
                    if ($(".different_roles").length)
                        {
                                    $(".different_roles").remove();
                                     $("#create_user").append(input);
                        }
                    else
                             $("#create_user").append(input);
                let btn = '<div class="col-md-3" id="btn_div_'+access_val+'"><button type="button" class="remover_access btn btn-'+bt+' waves-effect waves-light m-b-5"   id="'+access_val+'" title="'+access+'">'+access+'</button></div>';
                 $("#selected_access").empty().append(btn);

            }else {
               
               
                let btn = '<div class="col-md-3" id="btn_div_'+access_val+'"><button type="button" class="remover_access btn btn-'+bt+'" id="'+access_val+'" waves-effect waves-light m-b-5" title="'+access+'">'+access+'</button></div>';
                $("#selected_access").append(btn);
                let input = '<input type="hidden" name="selected_access_for_user[]"  id="value_mapper'+access_val+'" class="different_roles" value="'+access_val+'">';
                $("#create_user").append(input);
            }
    }

   



});
    $("form").on('click', '.remover_access', function () {

        let acc_id = $(this).attr('id');
        if(acc_id!=0){
                let acc_name = $(this).attr('title');
                let str='<option value="'+acc_id+'" id="opt_'+acc_id+'" class="access_without_all">'+acc_name+'</option>';
                $("#customer_access_on_vehicle_type").append(str);
                $("#btn_div_"+acc_id).remove();
                $("#value_mapper"+acc_id).remove();
        }else{  
            $("#btn_div_"+acc_id).remove();
            $("#value_mapper"+acc_id).remove();
            $.ajax({
                    url:'actions/fetch.php',
                    data:{fetch_v_types:1},
                    method:'post',
                    success:function(d){
                            $("#customer_access_on_vehicle_type").append(d);
                    }
            });
        }       
        //alert(acc_id);
    });
</script>