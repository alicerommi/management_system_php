<?php
include_once "includes/session-check.php";
include_once "../includes/config.php";
if(isset($_GET['id'])){
	$ap_id = $_GET['id'];
}
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
    <title>Admin | Repoting Tool</title>
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
              <!--   <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>    -->      
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
                            <li class="active">View More Details of Action Plan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <!--<div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4>0</h4> <span class="text-muted">Not Started</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4>0</h4> <span class="text-muted">In-process</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4>0</h4> <span class="text-muted">Completed</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-inverse"></i>
                                <div class="bodystate">
                                    <h4>0</h4> <span class="text-muted">Cancelled</span> </div>
                            </div>
                        </div>
                    </div>
                </div>-->
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
                <!--start to view the action plan details -->
                	<?php 
                	$query = "SELECT* FROM actionplan WHERE ap_id=$ap_id";
                	//echo $query;
               		$result = mysqli_query($con,$query);
               		if(mysqli_num_rows($result)>0){
               			$row = mysqli_fetch_array($result);
               			
               			$title = $row['ap_title'];
                        $assignTo = $row['ap_assignedto'];
                        $dueDate = $row['ap_DueDate'];
                        $status = $row['ap_status'];
                        $description = $row['ap_description'];
                        //for level 1 details
                        $ap_level1DueDate = $row['ap_level1DueDate'];
                        $ap_level1Status = $row['ap_level1Status'];
                        $ap_level1requirements = $row['ap_level1requirements'];
                        $ap_level1attachFiles = $row['ap_level1attachFiles'];
                        //for level2 details
                         $ap_level2DueDate = $row['ap_level2DueDate'];
                        $ap_level2Status = $row['ap_level2Status'];
                        $ap_level2requirements = $row['ap_level2requirements'];
                        $ap_level2attachFiles = $row['ap_level2attachFiles'];
                        //for level 3 
                         $ap_level3DueDate = $row['ap_level3DueDate'];
                        $ap_level3Status = $row['ap_level3Status'];
                        $ap_level3requirements = $row['ap_level3requirements'];
                        $ap_level3attachFiles = $row['ap_level3attachFiles'];
                        //for kpi information
                        /*
			`ap_kpiName`, `ap_kpiValue`, `ap_baseValue`, `ap_targetValue`, `ap_finalValue`, `ap_recordDate`,
                        */
						$ap_kpiName = $row['ap_kpiName'];
						//$ap_kpiValue = $row['ap_kpiValue'];
						$ap_baseValue = $row['ap_kpibaseValue'];
						$ap_targetValue = $row['ap_targetValue'];
						$ap_finalValue = $row['ap_finalValue'];


               		}



                	?>

                	<div class="row">
                		<div class="col-md-12">
                				<div class="panel panel-default">
			                            <div class="panel-heading">Details of <?php echo  ucwords($title);?>
			                                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
			                            </div>
			                            <div class="panel-wrapper collapse in" aria-expanded="true" style="">
			                                <div class="panel-body">
			                                  		
			                                		<div class="col-md-6 b-r">
			                                			
			                                			<strong >Action Plan Title:</strong><hr/>
			                                			<strong >Action Plan Assingned To:</strong><hr/>
			                                			<strong >Action Plan Status:</strong><hr/>
			                                			<strong >Action Plan Due Date:</strong><hr/>
			                                			<strong >Action Plan Description:</strong><hr/>



			                                		</div>

			                                		<div class="col-md-6">
			                                			<p ><?php echo ucwords($title)?></p><hr/>
			                                			<p ><?php echo ucwords($assignTo);?></p><hr/>
			                                			<p ><?php echo ucwords($status);?></p><hr/>
			                                			<p ><?php echo date("d-m-Y",strtotime($dueDate));?></p><hr/>
			                                			<p ><?php echo $description;?></p><hr/>
			                                		</div>



			                                  </div>
			                               <!--  <div class="panel-footer"> Panel Footer </div> -->
			                            </div>
                       			 </div>



                		</div>
                	</div>

                	<div class="row">
                			<div class="col-md-12">
                				<div class="panel panel-default">
			                            <div class="panel-heading"><?php echo "First Implementation Details"?>
			                                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
			                            </div>
			                            <div class="panel-wrapper collapse in" aria-expanded="true" style="">
			                                <div class="panel-body">
			                                		<div class="col-md-4 b-r">
			                                			<strong >Due Date</strong><hr/>
			                                			<strong >Status:</strong><hr/>
			                                			<strong >Requirements:</strong><hr/>
			                                			<strong >Attached Files:</strong><hr/>
			                                		</div>

			                                		<div class="col-md-8">
			                                			<p ><?php echo date("d-m-Y",strtotime($ap_level1DueDate));?></p><hr/>
			                                			<p ><?php echo $ap_level1Status;?></p><hr/>
			                                			<p ><?php echo $ap_level1requirements;?></p><hr/>
			                                			<p ><?php 
			                                			$pieces = explode("&key123456789=",$ap_level1attachFiles);
			                                			//print_r($pieces);
			                                			for($i=1;$i<sizeof($pieces);$i++){
			                                				$file = $pieces[$i];
			                                				echo "<a href='../dealer/actionPlanAttachments/".$file."'>$file</a><br/";			                                				
			                                			}
			                                			?></p><hr/>
			                                			
			                                		</div>
			                                  </div>
			                               <!--  <div class="panel-footer"> Panel Footer </div> -->
			                            </div>
                       			 </div>
                		</div>
                	</div>
                		<div class="row">
                			<div class="col-md-12">
                				<div class="panel panel-default">
			                            <div class="panel-heading"><?php echo "Second Implementation Details"?>
			                                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
			                            </div>
			                            <div class="panel-wrapper collapse in" aria-expanded="true" style="">
			                                <div class="panel-body">
			                                  		
			                                		<div class="col-md-4 b-r">	
			                                			<strong >Due Date</strong><hr/>
			                                			<strong >Status:</strong><hr/>
			                                			<strong >Requirements:</strong><hr/>
			                                			<strong >Attached Files:</strong><hr/>
			                                		</div>

			                                		<div class="col-md-8">
			                                			<p ><?php echo date("d-m-Y",strtotime($ap_level2DueDate));?></p><hr/>
			                                			<p ><?php echo $ap_level2Status;?></p><hr/>
			                                			<p ><?php echo $ap_level2requirements;?></p><hr/>
			                                			<p ><?php 
			                                			$pieces = explode("&key123456789=",$ap_level2attachFiles);
			                                			//print_r($pieces);
			                                			
			                                			for($i=1;$i<sizeof($pieces);$i++){
			                                				$file = $pieces[$i];
			                                				echo "<a href='../dealer/actionPlanAttachments/".$file."'>$file</a><br/";			                                				
			                                			}
			                                			$file = "logo_ldg.png"; //Let say If I put the file name Bang.png
															//echo "<a href='download1.php?nama=".$file."'>download</a> ";
			                                			?></p>
			                                			<hr/>
			                                		</div>
			                                  </div>
			                               <!--  <div class="panel-footer"> Panel Footer </div> -->
			                            </div>
                       			 </div>
                		</div>
                	</div>

                		<div class="row">
                			<div class="col-md-12">
                				<div class="panel panel-default">
			                            <div class="panel-heading"><?php echo "Third Implementation Details"?>
			                                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
			                            </div>
			                            <div class="panel-wrapper collapse in" aria-expanded="true" style="">
			                                <div class="panel-body">
			                                		<div class="col-md-4 b-r">
			                                			<strong >Due Date:</strong><hr/>
			                                			<strong >Status:</strong><hr/>
			                                			<strong >Requirements:</strong><hr/>
			                                			<strong >Attached Files:</strong><hr/>
			                                		</div>

			                                		<div class="col-md-8">
			                                			<p ><?php echo date("d-m-Y",strtotime($ap_level3DueDate));?></p><hr/>
			                                			<p ><?php echo $ap_level3Status;?></p><hr/>
			                                			<p ><?php echo $ap_level3requirements;?></p><hr/>
			                                			<p ><?php 
			                                			$pieces = explode("&key123456789=",$ap_level3attachFiles);
			                                			//print_r($pieces);
			                                			
			                                			for($i=1;$i<sizeof($pieces);$i++){
			                                				$file = $pieces[$i];
			                                				echo "<a href='../dealer/actionPlanAttachments/".$file."'>$file</a><br/";			                                				
			                                			}
			                                			?></p>
			                                			<hr/>
			                                			
			                                		</div>



			                                  </div>
			                               <!--  <div class="panel-footer"> Panel Footer </div> -->
			                            </div>
                       			 </div>
                		</div>
                	</div>

                		<div class="row">
                			<div class="col-md-12">
                				<div class="panel panel-default">
			                            <div class="panel-heading"><?php echo "KPI Details"?>
			                                <div class="panel-action"><a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a> <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a></div>
			                            </div>
			                            <div class="panel-wrapper collapse in" aria-expanded="true" style="">
			                                <div class="panel-body">
			                                		<div class="col-md-4 b-r">
			                                			<strong >KPI Name:</strong><hr/>
			                                			<!-- <strong >KPI Value:</strong><hr/> -->
			                                			<strong >KPI Base Value:</strong><hr/>
			                                			<strong >Target Value:</strong><hr/>
			                                			<strong >Final Value:</strong><hr/>
			                                		</div>

			                                		<div class="col-md-8">
			                                			<p ><?php echo $ap_kpiName;?></p><hr/>
			                                			<p ><?php echo $ap_baseValue;?></p><hr/>
			                                			<p ><?php echo $ap_targetValue;
			                                			?>
			                                			</p>
			                                			<hr/>
			                                			<p ><?php echo $ap_finalValue;
			                                			?>
			                                			</p><hr/>
			                                		</div>
			                                  </div>
			                               <!--  <div class="panel-footer"> Panel Footer </div> -->
			                            </div>
                       			 </div>
                		</div>
                	</div>
                 <!--end to view the action plan details -->
                
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