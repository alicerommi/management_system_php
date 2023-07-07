            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                         <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $teacher_fullName; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="includes/logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Tutor</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
                            </li>       

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> My Students </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="view-my-students.php">View Students</a></li>
                                 
                                </ul>
                            </li>


                               <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Request Container </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                     <li><a href="all-student-requests.php">All Students Requests</a></li>
                                    <li><a href="approved-requests.php">Approved Requests</a></li>
                                    <li><a href="disapproved-requests.php">Disapproved Requests</a></li>
                                   
                                </ul>
                            </li>        
        
                              <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-comment"></i><span>My Profile </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="my-profile.php">Profile</a></li>
                                     <li><a href="my-courses.php">My Courses</a></li>
                                     <li><a href="my-qualifications.php">My Qualifications</a></li>
                                   
                                </ul>
                            </li>  

                            
                             <li>
                                <a href="includes/logout.php" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->