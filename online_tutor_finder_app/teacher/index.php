<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM teacher WHERE teacher_email = '$teacher_email'");
    $teachRow = mysqli_fetch_array($query);
    $teacher_fullName = ucwords($teachRow['teacher_name']);
    $teacher_id = $teachRow['teacher_id']
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
                              <?php echo '<h4 class="pull-left page-title">Welcome '.$teacher_fullName.' !</h4>'; ?>
                                <ol class="breadcrumb pull-right">
                                    <!-- <li><a href="#">Camera</a></li> -->
                                    <li class="active">Teacher Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <div class="row">



                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-info"><i class="md md-bookmark"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 
                                        $query = mysqli_query($conn,"SELECT * FROM `teacher`");
                                        if(mysqli_num_rows($query)==0)
                                            echo "0";
                                        else
                                        echo mysqli_num_rows($query); ?></span>
                                        Total Teachers
                                    </div>


                                   
                                </div>
                            </div>

                             <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="md md-account-child"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 
                                        $query = mysqli_query($conn,"SELECT * FROM `student`");
                                        if(mysqli_num_rows($query)==0)
                                            echo "0";
                                        else
                                        echo mysqli_num_rows($query); ?></span>
                                        Active Students
                                    </div>


                                
                                </div>
                            </div>

                              <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="md md-done-all"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 
                                                $query = mysqli_query($conn,"SELECT std.*,tea.*, std_req.* from student std,teacher tea,student_request std_req where std_req.srequest_tea_id = tea.teacher_id AND std_req.`srequest_std_id` = std.student_id AND tea.teacher_id=3 and std_req.srequest_status=1");
                                                         if(mysqli_num_rows($query)==0)
                                                                 echo "0";
                                                        else
                                                             echo mysqli_num_rows($query);

                                             ?></span>
                                        Approved Students
                                    </div>


                                
                                </div>
                            </div>
                           
                             <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class=" md md-face-unlock"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 

                                         $query = mysqli_query($conn,"select* from admin");
                                                         if(mysqli_num_rows($query)==0)
                                                                 echo "0";
                                                        else
                                                             echo mysqli_num_rows($query); 
                                        ?></span>
                                        System Administrators
                                    </div>
                                </div>
                            </div>

                          
                           


                           <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-danger"><i class="md md-clear"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 

                                              $query = mysqli_query($conn,"SELECT std.*,tea.*, std_req.* from student std,teacher tea,student_request std_req where std_req.srequest_tea_id = tea.teacher_id AND std_req.`srequest_std_id` = std.student_id AND tea.teacher_id=3 and std_req.srequest_status=2");
                                                         if(mysqli_num_rows($query)==0)
                                                                 echo "0";
                                                        else
                                                             echo mysqli_num_rows($query);
                                        ?></span>
                                        Disapproved Students
                                    </div>


                                   
                                </div>
                            </div>

                            
                            
                             <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="md md-content-paste"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 
                                       $query = mysqli_query($conn,"SELECT * FROM `qualifications` WHERE `teacher_id`=$teacher_id");
                                          if(mysqli_num_rows($query)==0)
                                                                 echo "0";
                                                        else
                                                             echo mysqli_num_rows($query);

                                        ?></span>
                                        Total Qualifications

                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="md md-insert-invitation"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php 
                                         $query = mysqli_query($conn,"SELECT * FROM `subjects` WHERE `teacher_id`=$teacher_id");
                                          if(mysqli_num_rows($query)==0)
                                                                 echo "0";
                                                        else
                                                             echo mysqli_num_rows($query);
                                        ?></span>
                                        Total Courses
                                    </div>


                                
                                </div>
                            </div>


                        </div> <!-- End row-->

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>