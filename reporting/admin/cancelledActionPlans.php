<?php
include_once "includes/session-check.php";
include_once "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php if(isset($_SESSION['admin'])){ ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Admin | Reporting Tool</title>
<?php include_once "includes/header.html"; ?>
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
               <div class="top-left-part">
                    <a class="logo" href="index.php">
                            <b>
                                <img src="images/main.png" alt="home"    style="height: 100%;"/>
                            </b><span class="hidden-xs"><strong>P</strong>eugeot</span>
                    </a>
                </div>
                <!-- <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>          -->
        </nav>
<?php include "includes/left-navbar.html"; ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="logout.php" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Log Out</a>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Action Plans</a></li>
                            <li class="active">Cancelled Action Plans</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                       <div class="panel panel-success">
    <div class="panel-heading">View All Cancelled Action Plans</div> 
        <div class="panel-wrapper collapse in">
            <div class="panel-body">

                <table id="actionplans" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Dealer Name</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>More Details</th>
                               <!--  <th>Action Plan Asigned</th>
                                <th>Asigned Date</th>
                                <th>AP Status</th> -->
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Title</th>
                                <th>Dealer Name</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                  <th>More Details</th>
                               <!--  <th>Action Plan Asigned</th>
                                <th>Asigned Date</th>
                                <th>AP Status</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                                <?php 
                                /*
                                not started
completed
cancelled
                                */
                                 $query = "SELECT* FROM `actionplan` WHERE `ap_status`='cancelled'";
                                            $result = mysqli_query($con,$query);
                                         if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result)){
                                                    
                                                    $ap_id = $row['ap_id'];
                                                    $title = $row['ap_title'];
                                                    $assignTo = $row['ap_assignedto'];
                                                    $dueDate = $row['ap_DueDate'];
                                                    $status = $row['ap_status'];
                                                    $recordDate = $row['ap_recordDate'];
                                ?>
                                        <tr>
                                            <td><?php echo ucwords($title); ?></td>
                                            <td><?php echo ucwords($assignTo); ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($dueDate)); ?></td>
                                            <td><?php echo ucwords($status); ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($recordDate));?></td>
                                            <?php $str  = "viewactionplanDetails.php?id=".$ap_id;?>
                                            <td>
                                                     <a class="btn btn-block btn-default" href=<?php echo $str;?>>Info</a>
                                            </td>

                                        </tr>
                                        <?php }
                                    }
                                        
                                     ?>
                        </tbody>
            </table>

       </div>
    </div>
</div><!-- end success panel here -->
                </div>
            </div>
                <!--/row -->
                
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
                           <!-- <ul class="m-t-20 chatonline">
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
                            </ul> -->
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
              <?php include('includes/footer.html');?> 
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include_once "includes/scripts.html";} ?>
</body>

</html>