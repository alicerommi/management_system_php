<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
<link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
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
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Approved Booking Requests</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                               <!--table will start from here  for viewing the pending requests-->
                    <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                             <div class="panel-heading">View Approved Booking Requests</div> 
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">

              
                                    <div class="white-box">
                                      <!--   <h3 class="box-title m-b-0">Data Export</h3> -->
                                      <!--   <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF &amp; Print</p> -->
                                        <div class="table-responsive">
                                            <div id="example23_wrapper" class="dataTables_wrapper">
                                              <table id="allrequests" class="display nowrap dataTable" cellspacing="0" width="100%"  style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th >Requester Name</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Request Date</th>
                                                        <th >Reqest Status</th>
                                                        
                                                          <th >View Profile</th>
                                                    </tr>
                                                </thead>
                                                <!-- <tfoot>
                                                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                                                </tfoot> -->
                                                <tbody>
                                                    <?php
                                                        //here we will shwo the all the requests of users.. 
                                                        $query = "SELECT* FROM `schedule_bookings` WHERE ins_id=$id AND `approvedStatus`=1";
                                                        $result = mysqli_query($conn,$query);
                                                        if(mysqli_num_rows($result)>0){
                                                            while($record = mysqli_fetch_array($result)){
                                                                    $schdule_ID = $record['id'];
                                                                    $userID = $record['user_id'];
                                                                    $startTime = $record['start'];
                                                                    $endTime = $record['end'];
                                                                    $title = $record['title'];
                                                                    $requestDate = $record['recordDate'];
                                                                    $approvedStatus = $record['approvedStatus'];
                                                                    //now by using the user id we will get the user details from another table
                                                                    $query2 = "SELECT* FROM `users` WHERE `id`=$userID";
                                                                    $result2 = mysqli_query($conn,$query2);
                                                                    if(mysqli_num_rows($result2)==1){
                                                                        $userRecord = mysqli_fetch_array($result2);
                                                                        $userName = $userRecord['username'];
                                                                    }
                                                    ?>
                                                <tr >     
                                                        <td><?php echo ucwords($userName); ?></td>
                                                        <td><?php //$str = "2018-03-01 07:30:00";
                                                            $split1 = explode(" ",$startTime);
                                                            echo $split1[1];
                                                            ?></td>
                                                        <td><?php
                                                        $split2 = explode(" ",$endTime);
                                                            echo $split2[1];
                                                        ?></td>
                                                        <td><?php echo date("d-m-Y",strtotime($requestDate));?></td>
                                                        <td>
                                                            <?php 
                                                        echo '<span class="label label-success label-rouded">Approved</span>';
                                                        ?>
                                                        </td>
                                                         <td><?php 
                                                       // echo '<a href="userInfo.php?userID='.$userID.'"></a>';
                                                        echo '
                                                <a class="btn btn-block btn-default" href="userInfo.php?userID='.$userID.'">View Profile</a>
                                            ';
                                                        ?></td>
                                                    </tr>
                                            <?php 
                                               }//end the while loop condition here
                                                        }//end num_rows condition here
                                            ?>

                                                </tbody>
                                            </table>

                                            </div>
                                        </div>
                                </div>
                            </div>
                         </div>
                    </div><!-- end success panel here -->
        
                </div>
                  
                </div> <!--END OF ROW WHICH CONTAINS THE TABLE-->
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
 <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(document).ready(function() {
    $('#allrequests').DataTable();
    responsive: true;
} );
</script>