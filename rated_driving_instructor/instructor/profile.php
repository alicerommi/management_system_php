<?php
include 'includes/session_check.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<?php include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
</head>
<body>
    <!-- Preloader -->
    <div id="wrapper">
        <!-- Navigation -->
           <?php include 'includes/navigation_header.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                   <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Profile page</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                            <ol class="breadcrumb">
                                <li><a href="index.php">Instructors</a></li>
                                <li class="active">Profile page</li>
                            </ol>
                        </div>
                    </div>           
                </div>
            <!--page content -->
            <?php 
                $query = "SELECT* FROM instructor WHERE id=$id";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($result);
                $userName = $row['name'];
                $email = $row['email'];
                $image = $row['image'];
                $address  = $row['address'];
                $postcode = $row['postcode'];
                $emailVeriStatus = $row['emailVeriStatus'];
                $legalDocVeriStatus = $row['legalVeri'];
                $ratePerHalfHour = $row['instructorPrice_perHalfHour'];
            ?>
              <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                          <!--   <div class="user-bg"> -->

                            <?php 
                                    // if(strlen($image)>0){ echo '<img src="images/'.$image.'"  alt="user" width="100%" class="img-circle"> '; }
                                    // else{ echo '<center><img src="images/default.png" alt="user-img" width="70%" class="user"></center>'; }
                            ?>
                                <!-- <img width="100%" alt="user" src="../plugins/images/big/d2.jpg"> -->
                            <!-- </div> -->
                            <div class="user-btm-box">
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-4 b-r"><strong>Name</strong>
                                        <p><?php echo ucwords($userName);  ?></p>
                                    </div>
                                    <div class="col-md-8"><strong>Email ID</strong>
                                        <p><?php echo $email; ?></p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Post Code</strong><br/>
                                        <?php  if(strlen($postcode)==0){
                                                        echo "Post Code is Not Added Yet";
                                                    }else{
                                                        echo $postcode;
                                                    } ?> 
                                        
                                         
                                    </div>
                                    <div class="col-md-6">
                                      <strong>Address</strong><br/>
                                            <?php 
                                                    if(strlen($address)==0){
                                                        echo "Address is Not Added Yet";
                                                    }else{
                                                        echo $address;
                                                    }
                                             ?>
                                    </div>
                                   <!--  <div class="col-md-6"><strong>Phone</strong>
                                        <p>+123 456 789</p>
                                    </div> -->
                                </div>
                                <hr/>

                                <!-- /.row -->
                                <!-- <hr> -->
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6  b-r"><strong>Email Verification Status</strong><br/>
                                            <?php
                                                if($emailVeriStatus!=0){
                                                    echo '<button type="button" class="btn btn-default btn-circle"><i class="fa fa-check"></i> </button>';
                                                }else{
                                                    echo '<button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i> </button>';
                                                }
                                             ?>
                                    </div>
                                     <div class="col-md-6"><strong>Legal Documents Verification Status</strong>
                                        <p>
                                            <?php
                                                if($sum==4){ //$sum is coming from the navigation_header file 
                                                    echo '<button type="button" class="btn btn-default btn-circle"><i class="fa fa-check"></i> </button>';
                                                }else{
                                                    echo '<button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i> </button>';
                                                }
                                             ?>
                                        </p>
                                    </div>

                                </div>
                                <hr/>
                                 <div class="col-md-12">
                                        <strong>Payment Account Added</strong>
                                        <p>Not added yet</p>
                                 </div>
                               
                                <!-- /.row -->
                               <!--  <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-google"></i></p>
                                    <h1>140</h1> </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <!-- .tabs -->
                            <ul class="nav nav-tabs tabs customtab">
                                <!-- <li class="active tab">
                                    <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                                </li> -->
                                <!-- <li class="tab">
                                    <a href="#biography" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Biography</span> </a>
                                </li> -->
                                <li class="tab active">
                                    <a href="#update" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Update Details</span> </a>
                                </li>

                                 <li class="tab">
                                    <a href="#updatePass" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Update Password</span> </a>
                                </li>
                            </ul>
                            <!-- /.tabs -->
                            <div class="tab-content">
                                <!-- .tabs 3 -->
                                <div class="tab-pane active" id="update">
                                    <form class="form-material form-horizontal" method="POST" action="actions/updateInfo.php">
                                         <?php 
                                         if(isset($_GET['info'])){
                                            if($_GET['info']==1){
                                            echo '<div class="alert alert-success">
                                              <strong>Success!</strong> The Information has been Updated.
                                            </div>';
                                            }else if($_GET['info']==0){
                                               echo' <div class="alert alert-danger">
                                                  <strong>Detail-Error!</strong> Error in Updating Details.
                                                </div>';
                                            }else if($_GET['info']==3){
                                                 echo '<div class="alert alert-success">
                                              <strong>Success!</strong> The Password has been Successfully Updated.
                                            </div>';
                                            }else if($_GET['info']==4){
                                                 echo' <div class="alert alert-danger">
                                                  <strong>Password-Error!</strong> Entered Password Combination is Mismatched.
                                                </div>';
                                            } 

                                        }//end main if condtion
                                         ?>   
                                        <div class="form-group">
                                            <label class="col-md-12" for="example-text">Name</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="name" name="name" class="form-control"  value="<?php echo $userName; ?>" maxlength="30"> </div>
                                        </div>
                                      <!--   <div class="form-group">
                                            <label class="col-md-12" for="bdate">Date of Birth
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="bdate" name="bdate" class="form-control mydatepicker" placeholder="enter your birth date" value="12/10/2017"> 
                                            </div>
                                        </div> -->
                                       <!--  <div class="form-group">
                                            <label class="col-sm-12">Gender</label>
                                            <div class="col-sm-12">
                                                <select class="form-control">
                                                    <option>Select Gender</option>
                                                    <option selected="selected">Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div> -->
                                       <!--  <div class="form-group">
                                            <label class="col-sm-12">Profile Image</label>
                                            <div class="col-sm-12"> 
                                               <?php 
                                                // if(strlen($image)>0)
                                                //     { echo '<img src="images/'.$image.'"  alt="" style="max-width:120px;" class="img-responsive"> '; }
                                                // else{ 
                                                //     echo '<img src="images/default.png" alt="" style="max-width:120px;" class="img-responsive">'; 
                                                // } ?>
                                
                                             </div>

                                            <div class="col-sm-12">
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                    
                                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> 

                                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select Image</span> <span class="fileinput-exists">Change</span>

                                                    <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="form-group" id="locationField">
                                            <label class="col-md-12" for="Address">Enter Your Address</label>
                                            <div class="col-md-12">
                                                <input id="autocomplete" placeholder="Enter your address"
                                                     onFocus="geolocate()" type="text" name="address" id="address" class="form-control"  value="<?php if(strlen($address)>0){
                                                        echo $address;
                                                     } ?>" required>
                                                         
                                                    </input>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" value="<?php echo $id; ?>" name="ins_id"/>
                                        <div class="form-group">
                                            <label class="col-md-12" for="postcode">Post Code
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="postcode" name="postcode" class="form-control" placeholder="Enter the post code e.g. bb3" value="<?php
                                                        if(strlen($postcode)==0){
                                                            //echo "Not Added Yet";
                                                        }else{
                                                            echo $postcode;
                                                        }
                                                ?>" maxlength ="10" required> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12">Schdule Price Per Half Hour(in USD):</label>
                                                <input class="form-control" id="halfHourRate" name="halfHourRate"  type="number" min="1" maxlength="10" value=<?php if(strlen($ratePerHalfHour)>0){
                                                    echo $ratePerHalfHour;
                                                }else {}?> >
                                        </div>

                                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="updateUserInfo" id="updateUserInfo">Submit</button>
                                    </form>
                                </div>
                                <!-- /.tabs 3 -->
                                <!-- tabs 4 start for upadting the password-->
                                 <div class="tab-pane" id="updatePass">
                                 <form class="form-material form-horizontal" method="POST" action="actions/updateInfo.php">
                                        <div class="form-group">
                                            <label class="col-md-12" for="Old Password">Enter Old Password
                                            </label>
                                            <div class="col-md-12">
                                                <input type="password" maxlength="20" id="oldPassword" name="oldPassword" class="form-control" required> 
                                            </div>
                                        </div>

                                        <input name="ins_id" type="hidden" value="<?php echo $id; ?>" />

                                        <div class="form-group">
                                            <label class="col-md-12" for="New Password">Enter New Password
                                            </label>
                                            <div class="col-md-12">
                                                <input type="password" maxlength="20" id="newPassword" name="newPassword" class="form-control" required> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            
                                            <label class="col-md-12" for="Confirm New Password">Confirm New Password
                                            </label>

                                            <div class="col-md-12">
                                                <input type="password" maxlength="20" id="confirmNewPassword" name="confirmNewPassword" class="form-control" required> 
                                            </div>

                                        </div>
                                         <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="updateUserPass">Update Password</button>
                                       
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->



           <?php include('includes/footerText.php'); ?>
        </div>     
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
           <?php include 'includes/footer_links.php'; ?>
</body>
</html>
<?php #script for autocomplete search with address using google api maps  ?>
 <script>
      
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRkdcfuduhpP_lGJ1MDxTxm14-SKiAcnc&libraries=places&callback=initAutocomplete"
        async defer></script>