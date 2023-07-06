<?php 
include 'includes/session_check.php';
if(isset($_GET['ins_id'])){
    $id = $_GET['ins_id'];
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
                            <h4 class="page-title">Instructor Profile</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                            <ol class="breadcrumb">
                                <li><a href="Instructors.php">Instrucotrs</a></li>
                                <li class="active">Profile</li>
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
            $address = $row['address'];
            $postcode = $row['postcode'];
            $instructorPrice_perHalfHour = $row['instructorPrice_perHalfHour'];
            $emailVeriStatus = $row['emailVeriStatus'];
            ?>
              <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box"> 
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                          <!--   <img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"> -->
                                            <?php if(strlen($image)>0){
                                               echo '<img src="images/'.$image.'" alt="img" class="thumb-lg img-circle"> ';
                                           }else{
                                            echo ' <img src="images/default.png" alt="img" class="thumb-lg img-circle">';  
                                          }
                                          ?>
                                        <h4 class="text-white"><?php echo ucwords($userName); ?></h4>
                                        <h5 class="text-white"><?php echo $email; ?></h5> </div>
                                </div>
                            </div>
                            <!-- <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1> </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <ul class="nav nav-tabs tabs customtab">
                               <!--  <li class="active tab">
                                    <a href="#home" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-home"></i></span> <span class="hidden-xs">Activity</span> </a>
                                </li> -->
                                <li class="active tab">
                                    <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                                </li>
                             <!--    <li class="tab">
                                    <a href="#messages" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> <span class="hidden-xs">Messages</span> </a>
                                </li> -->
                                <li class="tab">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted"><?php echo ucwords($userName);?></p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted">Not Added yet</p>
                                        </div>
                                       <!--  <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted"><?php // echo $email; ?></p>
                                        </div> -->
                                        <div class="col-md-3 col-xs-6"> <strong>Address</strong>
                                            <br>
                                            <p class="text-muted">
                                                    <?php

                                                    if(strlen($address)>0){
                                                        echo ucwords($address);
                                                    }else{
                                                        echo "Not Added Yet";
                                                    }
                                                    ?>

                                            </p>
                                        </div>

                                    </div>
                                     <hr>

                                     <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> 
                                            <strong>Post Code</strong>
                                            <br>
                                            <p class="text-muted">
                                                    <?php

                                                    if(strlen($postcode)>0){
                                                        echo ucwords($postcode);
                                                    }else{
                                                        echo "Not Added Yet";
                                                    }
                                                    ?>
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> 
                                            <strong>Rate Per Half Hour</strong>
                                            <br>
                                            <p class="text-muted">
                                                    <?php
                                                            if(strlen($instructorPrice_perHalfHour)>0){
                                                                echo "$".ucwords($instructorPrice_perHalfHour);
                                                            }else{
                                                                echo "Not Added Yet";
                                                            }
                                                             //$emailVeriStatus 
                                                    ?>
                                            </p>
                                        </div>
                                     

                                     <div class="col-md-3 col-xs-6"> 
                                            <strong>Email Verification</strong>
                                            <br>
                                            <p class="text-muted">
                                                    <?php
                                                            if(strlen($emailVeriStatus)==1){
                                                                echo "Verified";
                                                            }else{
                                                                echo "Not Verified";
                                                            }
                                                             //$emailVeriStatus 
                                                    ?>
                                            </p>
                                        </div>
                                        </div>
                                     <hr/>


                                    <!--<p class="m-t-30"> --><!-- Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                                    Not Added Yet
                                    <!-- <h4 class="font-bold m-t-30">Skill Set</h4>
                                    <hr>
                                    <h5>Wordpress <span class="pull-right">80%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5>HTML 5 <span class="pull-right">90%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5>jQuery <span class="pull-right">50%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5>Photoshop <span class="pull-right">70%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;"> <span class="sr-only">50% Complete</span> </div>
                                    </div> -->
                                </div>
                                <!-- <div class="tab-pane" id="messages">
                                    <div class="steamline">
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/genu.jpg" alt="user" class="img-circle" /> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"> <a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <div class="m-t-20 row">
                                                        <div class="col-md-2 col-xs-12"><img src="../plugins/images/img1.jpg" alt="user" class="img-responsive" /></div>
                                                        <div class="col-md-9 col-xs-12">
                                                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa</p> <a href="#" class="btn btn-success"> Design weblayout</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle" /> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                                    <div class="m-t-20 row"><img src="../plugins/images/img1.jpg" alt="user" class="col-md-3 col-xs-12" /> <img src="../plugins/images/img2.jpg" alt="user" class="col-md-3 col-xs-12" /> <img src="../plugins/images/img3.jpg" alt="user" class="col-md-3 col-xs-12" /></div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/ritesh.jpg" alt="user" class="img-circle" /> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../plugins/images/users/govinda.jpg" alt="user" class="img-circle" /> </div>
                                            <div class="sl-right">
                                                <div class="m-l-40"><a href="#" class="text-info">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p>assign a new task <a href="#"> Design weblayout</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal form-material">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text"  class="form-control form-control-line" value="<?php echo $userName; ?>"> </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" class="form-control form-control-line" name="example-email" value="<?php echo $email; ?>"  id="example-email" disabled> 
                                            </div>
                                        </div>
                                       <!--  <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password"  class="form-control form-control-line"> </div>
                                        </div> -->
                                        
                                         <!-- <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password"  class="form-control form-control-line"> </div>
                                        </div> -->
                                       <!--  <div class="form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                        </div> -->
                                      <!--   <div class="form-group">
                                            <label class="col-md-12">Message</label>
                                            <div class="col-md-12">
                                                <textarea rows="5" class="form-control form-control-line"></textarea>
                                            </div>
                                        </div> -->
                                       <!--  <div class="form-group">
                                            <label class="col-sm-12">Update Location</label>
                                            <div class="col-sm-12">
                                                <select class="form-control form-control-line">
                                                    <option>London</option>
                                                    <option>India</option>
                                                    <option>Usa</option>
                                                    <option>Canada</option>
                                                    <option>Thailand</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
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