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
<!-- <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script> -->
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
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <!-- <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li> -->
                </ul>         
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
                            <li class="active">View Action Plan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <?php
                //an array for saving data later we will use this array for showing on the charts
                $data = array();
               //counters for couting the action plan status
                $countforIN = 0;
                $countforCancelled = 0;
                $countforNS = 0;
                $countforCompleted = 0;
                $chartData =array();

                                $queryActionPlan = mysqli_query($con,"SELECT* FROM actionplan");
                if(mysqli_num_rows($queryActionPlan)>0){
                            while($rowActionPlan = mysqli_fetch_array($queryActionPlan)){
                                     $actionPlanStatus = $rowActionPlan['ap_status'];
                                     if($actionPlanStatus=="in progress"){
                                                  $countforIN++;
                                                  $actionPlanassignedto  = $rowActionPlan['ap_assignedto'];
                                                  $dealerQuery = mysqli_query($con,"SELECT* FROM `dealers` WHERE `dealer_name`='$actionPlanassignedto'");
                                                  $dealerRow = mysqli_fetch_array($dealerQuery);
                                                  $dealerRegion = $dealerRow['dealer_region'];
                                                   // array_push($regionIN,$dealerRegion);
                                                   $data['regionIN']=  $dealerRegion;
                                                    $data['countforIN']= $countforIN ;
                                                     $str = "{name:".$dealerRegion.","."y:".$countforIN."},";
                                     }else if($actionPlanStatus=="completed"){
                                                  $countforCompleted++;
                                                  $actionPlanassignedto  = $rowActionPlan['ap_assignedto'];
                                                  $dealerQuery = mysqli_query($con,"SELECT* FROM `dealers` WHERE `dealer_name`='$actionPlanassignedto'");
                                                  $dealerRow = mysqli_fetch_array($dealerQuery);
                                                  $dealerRegion = $dealerRow['dealer_region'];
                                                  // array_push($regionCompleted,$dealerRegion);
                                                  $data['regionCompleted']=  $dealerRegion;
                                                  $data['countforCompleted']=$countforCompleted; 
                                                   $str = "{name:".$dealerRegion.","."y:".$countforCompleted."},";
                                     }else if($actionPlanStatus=="cancelled"){
                                                  $countforCancelled++;
                                                  $actionPlanassignedto  = $rowActionPlan['ap_assignedto'];
                                                  $dealerQuery = mysqli_query($con,"SELECT* FROM `dealers` WHERE `dealer_name`='$actionPlanassignedto'");
                                                  $dealerRow = mysqli_fetch_array($dealerQuery);
                                                  $dealerRegion = $dealerRow['dealer_region'];
                                                   // array_push($regionCancelled,$dealerRegion);
                                                   $data['regionCancelled']=  $dealerRegion;
                                                    $data['countforCancelled']= $countforCancelled;
                                                     $str = "{name:".$dealerRegion.","."y:".$countforCancelled."},";
                                     }else{
                                                    $countforNS++;
                                                    $actionPlanassignedto  = $rowActionPlan['ap_assignedto'];
                                                    $dealerQuery = mysqli_query($con,"SELECT* FROM `dealers` WHERE `dealer_name`='$actionPlanassignedto'");
                                                    $dealerRow = mysqli_fetch_array($dealerQuery);
                                                    $dealerRegion = $dealerRow['dealer_region'];
                                                    // array_push($regionNS,$dealerRegion);
                                                     $data['regionNS']=  $dealerRegion;
                                                     $data['countforNS'] = $countforNS;
                                                     $str = "{name:".$dealerRegion.","."y:".$countforNS."},";

                                            }
                                           // print_r($str);

                                            //$chartData = $str;
                                            array_push($chartData, $str);
                                              
                            }//end while loop
                       
                    }//end if condition

                    // print_r($chartData);
                    //  die;
                 // $dataS = json_encode($chartData);
                 //        echo $dataS;
                 //        die;
                // if($countforNS>0)
                //     $data['countforNS'] = $countforNS;
                // if($countforIN>0)
                //     $data['countforIN']= $countforIN ;
                // if($countforCancelled>0)
                //     $data['countforCancelled']= $countforCancelled;
                // if($countforCompleted>0)
                //     $data['countforCompleted']=$countforCompleted; 
                    
                  
                   //json_encode($data['region']);
                    //print_r($data);
                  //  die;
                    // echo $chartData;
                    // die;
                ?>
                <!-- <div class="row">
                    <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">View All Action Plans Charts</div> 
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                                 
                                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div> -->
                <!--/row -->
                
              
                <!--start view all actions plan here-->
<style type="text/css">
  .panel-green a, .panel-success a {
    color: #f1f3f1;
}
.btn {
    font-size: 12px;
  
}
.fa-eye:before {
 
    color: black;
  }
</style>
<div class="panel panel-success">
    <div class="panel-heading">View All Action Plans</div> 
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
                                 <th>Added By</th>
                                <th>Actions</th>
                                <!-- <th>More Details</th> -->
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
                                 <th>Added By</th>
                                <th>Actions</th>
                                 <!--  <th>More Details</th> -->
                               <!--  <th>Action Plan Asigned</th>
                                <th>Asigned Date</th>
                                <th>AP Status</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                                <?php 
                                 $query = "SELECT* FROM `actionplan`";
                                            $result = mysqli_query($con,$query);
                                         if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result)){
                                                    $ap_id = $row['ap_id'];
                                                    $title = $row['ap_title'];
                                                    $assignTo = $row['ap_assignedto'];
                                                    $dueDate = $row['ap_DueDate'];
                                                    $status = $row['ap_status'];
                                                    $recordDate = $row['ap_recordDate'];
                                                    $addedby = $row['added_by'];
                                ?>
                                        <tr>
                                            <td><?php echo ucwords($title); ?></td>
                                            <td><?php echo ucwords($assignTo); ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($dueDate)); ?></td>
                                            <td><?php echo ucwords($status); ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($recordDate));?></td>
                                            <td><?php echo ucwords($addedby); ?></td>

                                            <td>
                                                  <?php $strEdit  = "editactionplanDetails.php?id=".$ap_id;
                                                  $strView  = "viewactionplanDetails.php?id=".$ap_id;
                                                ?>
                                              <a type="button" class="btn btn-primary btn-rounded waves-effect edit"  id="<?php echo $ap_id; ?>" href=<?php echo $strEdit;?>><i class="fa fa-edit"></i> </a>

                                               <button type="button" class="btn btn-danger btn-rounded waves-effect delete" id="<?php echo $ap_id; ?>"><i class="fa fa-trash"></i> </button>
                                                
                                                <a class="btn btn-default btn-rounded waves-effect" href=<?php echo $strView;?>><i class="fa fa-eye" style="color:white"></i></a>
                                           </td>
                                <div id="confirmationModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title">Confirmation Modal</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                            <h2>Are you sure to Delete this Action Plan?</h2>
                                                        <!-- <form>
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="control-label">Recipient:</label>
                                                                <input type="text" class="form-control" id="recipient-name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="control-label">Message:</label>
                                                                <textarea class="form-control" id="message-text"></textarea>
                                                            </div>
                                                        </form> -->
                                                    </div> 
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">NO</button>
                                                        <button type="button" id="yes" class="btn btn-danger waves-effect waves-light">Yes</button>
                                                    </div>
                                                </div>
                                            </div>
                             </div>
                                          <!--   <td>
                                                     <a class="btn btn-danger btn-rounded waves-effect" href=<?php # echo $str;?>>Info</a>
                                            </td> -->

                                        </tr>
                                        <?php }
                                    }
                                        
                                     ?>
                        </tbody>
            </table>

       </div>
    </div>
</div><!-- end success panel here -->
                    <!--ends view all actions plan here-->
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

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','.delete',function(){
                var id = $(this).attr('id');
                $('#confirmationModal').modal('show');
                $(document).on('click','#yes',function(){
                    var dataString = "actionPlanId="+id;
                    $.ajax({
                        method:"post",
                        url:"actions/delete.php",
                        data:dataString,
                        success:function(){
                           location.reload();
                        }
                    });
                });
        });
    });

</script>
<script type="text/javascript">
   
</script>