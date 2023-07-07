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
                                  <h4 class="pull-left page-title">View All The Students Pending Requests</h4>
                                <ol class="breadcrumb pull-right">
                                 
                                    <li><a href="#">Request Container</a></li>
                                    <li class="active">View Student Requests</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <?php  $query = mysqli_query($conn,"SELECT * FROM `student` where student_accountStatus=0");
                                        if(mysqli_num_rows($query)>0){
                                             while($row=mysqli_fetch_array($query)){

                                              //SELECT `student_id`, `student_name`, `student_email`, `student_password`, `student_accountStatus`, `student_contact`, `student_address`, `student_image`, `student_recordDate` FROM `student` WHERE 1
                                                $student_id = $row['student_id'];
                                                $student_name = $row['student_name'];
                                                $student_email = $row['student_email'];
                                                $student_accountStatus = $row['student_accountStatus'];
                                             //   teacher_joining_date
                                                $student_contact = $row['student_contact'];
                                              //  $student_image = $row['student_image'];
                                                $student_address = $row['student_address'];
                                             //   $teacher_city = $row['teacher_city'];
                                                $student_image = "../client/uploads/".$row['student_image'];
                                                $student_recordDate = $row['student_recordDate'];
                                               // $teacher_about = $row['teacher_about'];

                                             ?>
                            <div class="col-sm-6 col-lg-6">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="media-main">
                                            <a class="pull-left" href="#">
                                                <img class="thumb-lg img-circle" src="<?php echo $student_image; ?>" alt="Teacher Image">
                                            </a>
                                            <div class="pull-right btn-group-sm">
                                                <a href="#" class="btn btn-primary waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View Info">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="#" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Accept">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Reject">
                                                    <i class="fa fa-close"></i>
                                                </a>
                                            </div>
                                            <br/>
                                            <div class="info">
                                                <h4><?php echo "Name: ". $student_name; ?></h4>
                                                <h4><?php echo "Conatct Number: ".$student_contact; ?></h4>
                                               
                                                  <h4><?php echo "Address: ".ucwords($student_address); ?></h4>
                                                <p class="text-muted"><?php echo "Request Date: " .$student_recordDate; ?></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                      
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- end col -->
                            <?php
                                 }//end while loop 
                                        }//end num rows conditions
                                        else{
                                            ?>
                    <div class="col-sm-12 text-center">
                        <div class="home-wrapper">
                            <h1 class="icon-main text-danger"><i class="md md-terrain"></i></h1>
                            <h1 class="home-text text-uppercase">No Pending Requests For STudents</h1>
                            <!-- <h4>Please check back in sometime.</h4> -->
                            <!-- COUNTDOWN -->      
                          
                          <!-- /COUNTDOWN -->
                        </div>
                    </div>
                    <?php

                                        }
                                ?>
                        </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>