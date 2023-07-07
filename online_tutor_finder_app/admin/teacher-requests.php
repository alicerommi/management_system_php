<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    $adminRow = mysqli_fetch_array($query);
    $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">


                                <h4 class="pull-left page-title">View All The Teachers Pending Requests</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Request Container</a></li>
                                    <li class="active">View Teacher Requests</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <?php

                            if(isset($_GET['Accstatus'])){
                                if($_GET['Accstatus']==1){
                                    echo '<div class="alert alert-success">The Teacher Request Has Been Accepted Successfully</div>';
                                }else if($_GET['Accstatus']==0){
                                    echo '<div class="alert alert-danger">Error in Performing Action</div>';
                                }
                            }

                            if(isset($_GET['Rejstatus'])){
                                if($_GET['Rejstatus']==1){
                                    echo '<div class="alert alert-success">The Teacher Request Has Been Accepted Successfully</div>';
                                }else if($_GET['Rejstatus']==0){
                                    echo '<div class="alert alert-danger">Error in Performing Action</div>';
                                }
                            }

                            ?>

                            <?php  $query = mysqli_query($conn,"SELECT * FROM `teacher` where teacher_account_status=0");
                                        if(mysqli_num_rows($query)>0){
                                             while($row=mysqli_fetch_array($query)){

                                                //SELECT `teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`, `teacher_img`, `teacher_age`, `teacher_about`, `teacher_recordDate` FROM `teacher` WHERE 1
                                                $teacher_id = $row['teacher_id'];
                                                $teacher_name = $row['teacher_name'];
                                                $teacher_email = $row['teacher_email'];
                                                $teacher_password = $row['teacher_password'];
                                             //   teacher_joining_date
                                                $teacher_account_status = $row['teacher_account_status'];
                                                $teacher_contact = $row['teacher_contact'];
                                                $teacher_address = $row['teacher_address'];
                                                $teacher_city = $row['teacher_city'];
                                                $teacher_img = $row['teacher_img'];
                                                $teacher_age = $row['teacher_age'];
                                                $teacher_about = $row['teacher_about'];

                                             ?>
                            <div class="col-sm-6 col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="media-main">
                                            <a class="pull-left" href="#">
                                                <?php if(strlen($teacher_img)>0) { 
                                                   $teacher_img= "../client/uploads/".$teacher_img;
                                                    ?>
                                                <img class="thumb-lg img-circle" src="<?php echo $teacher_img; ?>" alt="Teacher Image">
                                            <?php }else{ ?>
                                                 <?php   ?>
                                                <img class="thumb-lg img-circle" src="../client/uploads/default.png" alt="Teacher Image">
                                                <?php 
                                            }
                                                ?>
                                            </a>
                                            <div class="pull-right btn-group-sm">
                                               <!--  <a href="" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View Info">
                                                    <i class="fa fa-eye"></i>
                                                </a> -->

                                                <a href="actions/action.php?action=accept&TID=<?php echo $teacher_id ?>" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Accept">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="actions/action.php?action=reject&TID=<?php echo $teacher_id ?>" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Reject">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                            <br/>
                                            <div class="info">
                                                <h4><?php echo "Name: ". $teacher_name; ?></h4>
                                                <h4><?php echo "Conatct Number: ".$teacher_contact; ?></h4>
                                                 <h4><?php echo "City: ".ucwords($teacher_city); ?></h4>
                                                  <h4><?php echo "Address: ".ucwords($teacher_address); ?></h4>
                                                <p class="text-muted"><?php echo $teacher_about; ?></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                      
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- end col -->
                            <?php
                                 }//end while loop 
                                        }else{
                                            echo ' <div class="col-sm-12 text-center">
                        <div class="home-wrapper">
                            <h1 class="icon-main text-danger"><i class="md md-terrain"></i></h1>
                            <h1 class="home-text text-uppercase">No Pending Requests For Teachers</h1>
                            <a href="all-teacchers.php" class="btn btn-primary">View All Teachers</a>
                        </div>
                    </div>';

                                        }//end num rows conditions
                                ?>
                        </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>