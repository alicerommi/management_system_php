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
                              <?php echo '<h4 class="pull-left page-title">Welcome '.$admin_fullName.' !</h4>'; ?>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <div class="row">
                              <?php
                                        //total added dreams
                                    $query = mysqli_query($conn,"SELECT* FROM dream_table");
                                    $totalDreams = mysqli_num_rows($query);

                                    ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-info"><i class="md md-bookmark"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $totalDreams; ?></span>
                                        Total Dreams
                                    </div>


                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Dreams </h5>
                                          <!--   <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete </span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            $query =  mysqli_query($conn,"SELECT* FROM user_comments");
                            $counter0 = mysqli_num_rows($query);
                            ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="md md-comment"></i></span>

                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $counter0;?></span>
                                       Users Comments
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Comments </h5>
                                            <!-- <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                    <span class="sr-only">90% Complete</span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                                $questionNum = mysqli_query($conn,"SELECT* FROM dream_questions");
                                $counter1 = mysqli_num_rows($questionNum);
                            ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="md md-question-answer"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $counter1;?></span>
                                       Total Questions
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Questions </h5>
                                           <!--  <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                                    <span class="sr-only">57% Complete</span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $alphaNum = mysqli_query($conn,"SELECT* FROM alphabets_table");
                                $counter2 = mysqli_num_rows($alphaNum);
                            ?>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="md md-beenhere"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                             <span class="counter text-dark"><?php echo $counter2;?></span>
                                        Total Alphabets
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Alphabets </h5>
                                            <!-- <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End row-->

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>