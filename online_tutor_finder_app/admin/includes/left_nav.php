  <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
                        </div>
                         <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $admin_fullName; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                 
                                    <li><a href="includes/logout.php"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="index.php" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <!-- <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Mail </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="mail-inbox.html">Inbox</a></li>
                                    <li><a href="mail-compose.html">Compose Mail</a></li>
                                    <li><a href="mail-read.html">View Mail</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Calendar </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-palette"></i> <span> Elements </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-panels.html">Panels</a></li>
                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-bootstrap.html">BS Elements</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                    <li><a href="ui-notification.html">Notification</a></li>
                                    <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Components </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="components-grid.html">Grid</a></li>
                                    <li><a href="components-portlets.html">Portlets</a></li>
                                    <li><a href="components-widgets.html">Widgets</a></li>
                                    <li><a href="components-nestable-list.html">Nesteble</a></li>
                                    <li><a href="components-rangeslider.html">Sliders </a></li>
                                    <li><a href="components-gallery.html">Gallery </a></li>
                                    <li><a href="components-pricing.html">Pricing Table </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Icons </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="icons-material.html">Material Design</a></li>
                                    <li><a href="icons-ion.html">Ion Icons</a></li>
                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="form-elements.html">General Elements</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-advanced.html">Advanced Form</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-wysiwyg.html">WYSIWYG Editor</a></li>
                                    <li><a href="form-codeeditor.html">Code Editors</a></li>
                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                    <li><a href="tables-datatable.html">Data Table</a></li>
                                    <li><a href="tables-editable.html">Editable Table</a></li>
                                    <li><a href="tables-responsive.html">Responsive Table</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-poll"></i><span> Charts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="charts-morris.html">Morris Chart</a></li>
                                    <li><a href="charts-chartjs.html">Chartjs</a></li>
                                    <li><a href="charts-flot.html">Flot Chart</a></li>
                                    <li><a href="charts-peity.html">Peity Charts</a></li>
                                    <li><a href="charts-sparkline.html">Sparkline Charts</a></li>
                                    <li><a href="charts-radial.html">Radial charts</a></li>
                                    <li><a href="charts-other.html">Other Chart</a></li>
                                </ul>
                            </li>
 -->
                            



                                 

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-pages"></i><span> Our Teachers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="all-teacchers.php">All Teacher</a></li>
                                    <li><a href="add-teacher.php">Add A Teacher</a></li>
                                    <!-- <li><a href="view-AllData.php">All Data List</a></li> -->

                                   <!--  <li><a href="upload-file.php">Upload An Excel File</a></li> -->
                                    <!-- <li><a href="pages-timeline.html">Timeline</a></li> -->
                                    <!-- <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-email-template.html">Email template</a></li>
                                    <li><a href="pages-contact.html">Contact-list</a></li>
                                    <li><a href="pages-login.html">Login</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="pages-blank.html">Blank Page</a></li>
                                    <li><a href="pages-maintenance.html">Maintenance</a></li>
                                    <li><a href="pages-coming-soon.html">Coming-soon</a></li>
                                    <li><a href="pages-404.html">404 Error</a></li>
                                    <li><a href="pages-404_alt.html">404 alt</a></li>
                                    <li><a href="pages-500.html">500 Error</a></li> -->
                                </ul>
                            </li>


                               <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-invert-colors-on"></i><span> Our Students </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="all-students.php">All Students</a></li>
                                     <li><a href="add-student.php">Add A Student</a></li>
                                 
                                   
                                </ul>
                            </li>        
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="md md-share"></i><span>Requests Container</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul>
                                     <li>
                                        <a href="teacher-requests.php"><span>View Teacher Requests</span></a>
                                    </li>

                        
                                    <li>
                                        <a href="student-requests.php"><span>View Students Requests</span></a>
                                    </li>
                                </ul>
                            </li>


                             <!--  <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-comment"></i><span> Users Comments </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="users-comments.php">View All Comments</a></li>
                                   
                                </ul>
                            </li>    -->


                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md  md-mail"></i><span> User Comments </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="users_comments.php"> View All Comments</a></li>
                                    <!-- <li><a href="maps-vector.html"> Vector Map</a></li> -->
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