<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
?>
                    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12" style="
    margin-top: -35px;
">
                                
                                <ol class="breadcrumb pull-right">
                                   <!--  <li><a href="#">Dream</a></li> -->
                                    <li class="active">Teacher Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                      <div class="row">
                            <?php
                            $query = mysqli_query($conn,"SELECT * FROM `teacher` where teacher_email='$teacher_email'");
                                                
                                                  $row=mysqli_fetch_array($query);
                                                    $TID= $row['teacher_id'];
                                                        $teacher_email = $_SESSION['teacher_email'];
                                                          $query = mysqli_query($conn,"SELECT std.*,tea.*, std_req.* from student std,teacher tea,student_request std_req where std_req.srequest_tea_id = tea.teacher_id AND std_req.`srequest_std_id` = std.student_id AND tea.teacher_id=3 and std_req.srequest_status=1");
                                                          while($row = mysqli_fetch_array($query)){
                                                            $student_id = $row['student_id'];
                                                            $student_name = $row['student_name'];
                                                            $student_email= $row['student_email'];
                                                            $srequest_recordDate = date("d-m-Y",strtotime($row['srequest_recordDate']));
                                                            $srequest_id = $row['srequest_id'];

                                                            $srequest_status = $row['srequest_status'];
                                                           if($srequest_status==1){
                                                                $lastButtons = '<td><button class="btn btn-purple" readonly><i class="fa fa-check"></i>Accepted</button></td>';
                                                            }
                                                            $student_image = $row['student_image'];
                                                            $student_contact = $row['student_contact'];
                                                            ?>  

                        <div class="col-sm-6 col-lg-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="media-main">
                                            <a class="pull-left" href="#">
                                                <?php
                                                if(strlen($student_image)==0){
                                                    echo'   <img class="thumb-lg img-circle" src="../client/uploads/default.png" alt="">';
                                                }else{
                                                    $img = "../client/uploads/".$student_image;
                                                    echo '<img class="thumb-lg img-circle" src="'.$img.'" alt="">';
                                            }
                                                ?>
                                            </a>
                                            <div class="pull-right btn-group-sm">
                                                <a href="#" class="btn btn-success waves-effect waves-light tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active student">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4><?php echo $student_name; ?></h4>
                                                 <p class="text-muted"><?php echo $student_email; ?></p>
                                                <p class="text-muted"><?php echo $student_contact; ?></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                        
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                            <?php
                        }//end while lloop here
                            ?>


                      </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
<?php
    include 'includes/footer.html';
?>