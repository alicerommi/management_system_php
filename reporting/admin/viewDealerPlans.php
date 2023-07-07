<?php
include_once "includes/session-check.php";
include_once "../includes/config.php";
if(isset($_GET['id'])){
                $dealerID = $_GET['id'];
                $Code = $_GET['code']; 
                $delearName  = mysqli_query($con,"SELECT* FROM `dealers` WHERE `dealer_id`=$dealerID");
                $record = mysqli_fetch_array($delearName);
                $delearName =$record['dealer_name'];    
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
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="../plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><strong>R</strong>eport</span></a></div>
              <!--   <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>        -->  
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
                            <li><a href="index.php">Dealers</a></li>
                            <li class="active">Dealer Action Plans</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                <div class="panel panel-warning">
    <div class="panel-heading">All Action Plans of <?php echo $delearName."(".$Code.")"; ?></div> 
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
                                 $query = "SELECT* FROM `actionplan` WHERE `ap_assignedto`='$delearName'";
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
            </div>
            <!-- /.container-fluid -->
           <?php 
           include 'includes/footer.html';
           ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include_once "includes/scripts.html";} ?>
</body>
</html>