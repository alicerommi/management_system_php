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
                           <!--  <li><a href="index.php">Instructor</a></li> -->
                           <li><a>My Payments</a></li>
                            <li class="active">Recived Payments</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                      <div class="col-lg-12">
                        <div class="panel panel-default">
                             <div class="panel-heading">View Recieved Payment Records</div> 
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                    <div class="white-box">
                                           <div class="table-responsive">
                                <div id="example23_wrapper" class="dataTables_wrapper">
                                  <table id="recievedPaymentTable" class="display nowrap dataTable" cellspacing="0" width="100%"  style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th>Payment ID</th>
                                            <th >Schdule ID</th>
                                            <th>Paid Amount</th>
                                            <th>Payment Status</th>
                                            <!-- <th>End Time</th>
                                            <th>Request Date</th> -->
                                           <!--  <th >Accept</th>
                                             <th >Reject</th>
                                              <th >View Profile</th> -->
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                                    </tfoot> -->
                                    <tbody>
                                        <?php
                                            //here we will shwo the all the payment of instructor .. 
                                            $query = mysqli_query($conn,"SELECT* FROM `schdules_payments` WHERE `payment_status`='succeeded'");
                                            if(mysqli_num_rows($query)>0){
                                                    while($row = mysqli_fetch_array($query)){
                                                            $paymentID = $row['id'];
                                                            $schduleID  = $row['schdule_id'];
                                                            $paidAmount  = $row['paid_amount'];
                                                            echo '<tr>
                                                            <td>'.$paymentID.'</td>
                                                            <td>'.$schduleID.'</td>
                                                            <td>$'.$paidAmount.'</td>
                                                            <td><span class="label label-success label-rouded">Success</span></td>
                                                            </tr>';
                                                    }
                                            }

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
 <!--Style Switcher -->
 <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(document).ready(function() {
    $('#recievedPaymentTable').DataTable();
    responsive: true;
} );
</script>