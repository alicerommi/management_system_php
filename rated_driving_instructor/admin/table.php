<?php 
include 'includes/session_check.php';
include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
<link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
           <?php 
            include 'includes/navigation_header.php'; ?>
        <!-- Left navbar-header end -->
          <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">All Instructors</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructors</a></li>
                            <li class="active">View Instructors</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                  <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <!--  <div class="panel-heading">View Approved Booking Requests</div>  -->
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">  
                                      <div class="white-box">
                                           <div class="table-responsive">
                                            <div id="example23_wrapper" class="dataTables_wrapper">
                                              <div id="allrequests_wrapper" class="dataTables_wrapper no-footer">
                                              <table id="allinstructors" class="display nowrap dataTable no-footer" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="allrequests_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th >
                                                        Instruc Name</th>
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
                                                  
                                                </tbody>
                                                </table> 


                                    </div>
                                  </div>
                                </div>
                                </div>  
                             </div>
                             </div>
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
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script></body>
 <script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script>
    $(document).ready(function() {
    $('#allinstructors').DataTable();
    responsive: true;
} );
</script>
</body>
</html>