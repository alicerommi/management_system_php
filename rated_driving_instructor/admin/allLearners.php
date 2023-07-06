<?php 
include 'includes/session_check.php';
include 'includes/database_connection.php'; ?>
<?php 
if(isset($_GET['ins_id'])){
    $id = $_GET['ins_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
<link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- Preloader -->
    <div id="wrapper">
        <!-- Navigation -->
           <?php 
            include 'includes/navigation_header.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
            <div class="container-fluid">
                 <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">All Learners</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="Instructors.php">Learners</a></li>
                            <li class="active">View All Learners</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <!--  <div class="panel-heading">View Approved Booking Requests</div>  -->
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                    <div class="white-box">
                                      <!--   <h3 class="box-title m-b-0">Data Export</h3> -->
                                      <!--   <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF &amp; Print</p> -->
                                        <div class="table-responsive">
                                            <div id="example23_wrapper" class="dataTables_wrapper">
                                              <div id="allrequests_wrapper" class="dataTables_wrapper no-footer">
                                              <table id="alllearner" class="display nowrap dataTable no-footer" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="allrequests_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th >
                                                        Learner Name</th>
                                                        <th>
                                                            Joining Date
                                                        </th>
                                                        <th>
                                                            Verification Status
                                                        </th>
                                                        <th>
                                                                View Profile
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = mysqli_query($conn,"SELECT* FROM users");
                                                    if(mysqli_num_rows($query)>0){
                                                        while($userRow = mysqli_fetch_array($query)){
                                                            //SELECT `id`, `username`, `email`, `password`, `verificationLink`, `emailVeriStatus`, `date`, `postcode`, `address`, `image`, `online_flag` FROM `users` WHERE 1
                                                            $id = $userRow['id'];
                                                            $username = $userRow['username'];
                                                              $date = date('d-m-Y',strtotime($userRow['date']));
                                                            $emailVeriStatus = $userRow['emailVeriStatus'];
                                                            if($emailVeriStatus==1)
                                                                $str = '<span class="label label-success label-rouded">Verified</span>';
                                                            else if($emailVeriStatus==0)
                                                                $str = '<span class="label label-warning label-rouded">Not Verified</span>';

                                                            $profile = '<a href="learner-profile.php?learner_id='.$id.'" class="btn btn-default">View Details</a>';
                                                            echo '<tr>'.
                                                            '<td>'.$username.'</td>'.
                                                            '<td>'.$date.'</td>'.
                                                            '<td>'.$str.'</td>'.
                                                            '<td>'.$profile.'</td>'.
                                                            '</tr>';

                                                        }//end while loop here
                                                    }//end if condition here 
                                                    ?>                                                
                                               </tbody>
                                            </table>
                                           </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                         </div>
                    </div><!-- end success panel here -->
        
                </div>

                </div>


            </div>
            


            
           <?php include('includes/footerText.php'); ?>
        </div>     
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
           <?php include 'includes/footer_links.php'; ?>
               <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script></body>

 <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(document).ready(function() {
    $('#alllearner').DataTable();
    responsive: true;
} );
</script>
</body>
</html>