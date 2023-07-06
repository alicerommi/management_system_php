<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
</head>
<body>
     <!-- Preloader -->
      <!-- <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>  -->
    <div id="wrapper">
        <!-- Left navbar-header -->
             <?php include 'includes/navigation_header.php'; ?>  
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome <?php echo ucwords($instructorName); ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <?php
                        //for checking whether the instructor has submitted the legal documents or not 
                        $queryDocumentCheck = mysqli_query($conn,"SELECT* FROM instructor_documents WHERE ins_id=$id");
                        if(mysqli_num_rows($queryDocumentCheck)==0){
                            echo '
                            <div class="alert alert-danger"> 
                            Your Account is not Live because You have not Uploaded Legal Documents Yet!  <a href="legalDocuments.php">Upload Now</a></div>';
                        }
                    
                    ?>
                <div class="row">
                    
                    
                    
                   <!--  <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4>370</h4> <span class="text-muted">New Patient</span> </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-shopping-cart bg-info"></i>
                                <div class="bodystate">
                                    <h4>342</h4> <span class="text-muted">OPD Patient</span> </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4>13</h4> <span class="text-muted">Today's Ops.</span> </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-inverse"></i>
                                <div class="bodystate">
                                    <h4>$34650</h4> <span class="text-muted">Hospital Earning</span> </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!--/row -->
                <!-- .row -->
                <div class="row">
                    
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-plus-square"></i>
                                <div class="bodystate">
                                    <h4>
                                    <?php
                                    $query = "SELECT* FROM `schedule_bookings` WHERE `ins_id`=$id AND `approvedStatus`=0";
                                    $result = mysqli_query($conn,$query);
                                    $counter1 = mysqli_num_rows($result);
                                    if($counter1>0)
                                        echo $counter1;
                                    else
                                        echo "0";
                                    ?>
                                    </h4>
                                    <span class="text-muted">Pending Booking Requests</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="fa fa-check-square-o"></i>
                                <div class="bodystate">
                                    <h4>  
                                    <?php
                                    $query2 = "SELECT* FROM `schedule_bookings` WHERE `ins_id`=$id AND `approvedStatus`=1";
                                    $result2 = mysqli_query($conn,$query2);
                                    $counter2 = mysqli_num_rows($result2);
                                    if($counter2>0)
                                        echo $counter2;
                                    else
                                        echo "0";
                                    ?></h4>
                                    <span class="text-muted">Approved Booking Requests</span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                      <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                  <i class="fa fa-times"></i>
                                <div class="bodystate">
                                    <h4><?php
                                        $query3  = mysqli_query($conn,"SELECT* FROM `schedule_bookings` WHERE `ins_id`=$id AND `approvedStatus`=2");
                                        $counter3 = mysqli_num_rows($query3);
                                        if($counter3>0){
                                            echo $counter3;
                                        }else{
                                            echo "0";
                                        }
                                    ?></h4>
                                    <span class="text-muted">Disapproved Booking Requests</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>


                <!-- /.row -->
                <!--row -->
                <div class="row">
                   <div class="col-md-4 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-megna"></i>
                               <div class="bodystate">
                                    <h4><?php
                                        $query4  = mysqli_query($conn,"SELECT* FROM users WHERE emailVeriStatus=1");
                                        $counter4 = mysqli_num_rows($query3);
                                        if($counter4>0){
                                            echo $counter4;
                                        }else{
                                            echo "0";
                                        }
                                    ?></h4>
                                    <span class="text-muted">Total Number of Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Hospital Earning</h3>
                            <ul class="list-inline text-center">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>OPD</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>ICU</h5> </li>
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div> -->
                </div>
                <!-- row -->
                <!-- /row -->
                <div class="row">
                 <!--    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">New Patient List</h3>
                            <p class="text-muted">this is the sample data here for crm</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Diseases</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Deshmukh</td>
                                            <td>Prohaska</td>
                                            <td>@Genelia</td>
                                            <td><span class="label label-danger">Fever</span> </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Deshmukh</td>
                                            <td>Gaylord</td>
                                            <td>@Ritesh</td>
                                            <td><span class="label label-info">Cancer</span> </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sanghani</td>
                                            <td>Gusikowski</td>
                                            <td>@Govinda</td>
                                            <td><span class="label label-warning">Lakva</span> </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Roshan</td>
                                            <td>Rogahn</td>
                                            <td>@Hritik</td>
                                            <td><span class="label label-success">Dental</span> </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Joshi</td>
                                            <td>Hickle</td>
                                            <td>@Maruti</td>
                                            <td><span class="label label-info">Cancer</span> </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Nigam</td>
                                            <td>Eichmann</td>
                                            <td>@Sonu</td>
                                            <td><span class="label label-success">Dental</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-sm-6">
                        <!-- <div class="white-box">
                            <h3 class="box-title m-b-0">Laboratory Test</h3>
                            <p class="text-muted">this is the sample data here for crm</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ECG</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Genelia Deshmukh</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,-3,-2,-4,-5,-4,-3,-2,-5,-1</span> </td>
                                            <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 28.76%</span> </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Ajay Devgan</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,-1,-1,-2,-3,-1,-2,-3,-1,-2</span> </td>
                                            <td><span class="text-warning text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 8.55%</span> </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Hrithik Roshan</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,3,6,1,2,4,6,3,2,1</span> </td>
                                            <td><span class="text-success text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 58.56%</span> </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Steve Gection</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,3,6,4,5,4,7,3,4,2</span> </td>
                                            <td><span class="text-info text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 35.76%</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /.row -->

                
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul>
                                <li><b>Layout Options</b></li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
           <?php include('includes/footerText.php'); ?>
        </div>     



        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
           <?php include 'includes/footer_links.php'; ?>
   
</body>

</html>