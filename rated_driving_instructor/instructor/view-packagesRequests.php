<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
<link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .panel-white .panel-heading, .panel-default .panel-heading {
    color: #2b2b2b;
    background-color: #36e2b7;
    }
 
.modal-dialog {
 
  top: 200px;
  right: 100px;
  bottom: 0;
  left: 0;
 
  overflow: auto;
  overflow-y: auto;
}

</style>

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
                             <li><a href="index.php">Packages Requests</a></li>
                            <li class="active">All Packages Requests</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">View All Package Booking Requests</div> 
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
                                            <th>Pkg id</th>
                                            <th >Requester Name</th>
                                          <!--   <th>Start Time</th>
                                            <th>End Time</th> -->
                                            <th>Request Date</th>
                                            <th >Accept</th>
                                             <th >Reject</th>
                                              <th >View Profile</th>
                                              <th>PKG INFO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //first to get the instrcutor id 
                            $queryInstructorID = mysqli_query($conn,"SELECT* FROM `instructor` WHERE `email`='$ins_email'");

                                        $instrcutorRow = mysqli_fetch_array($queryInstructorID);
                                        $insID = $instrcutorRow['id'];
                                        //here we will get the all packages requessts
                                        $queryPackages = mysqli_query($conn,"SELECT* FROM `packages` WHERE `ins_id`=$insID");
                                        //make an array which will collect the packages id in which the ins id is same then we will mathc that array with the packages requests
                                        $arrayPackageID = array();
                                        if(mysqli_num_rows($queryPackages)>0){
                                            while($r  = mysqli_fetch_array($queryPackages)){
                                                array_push($arrayPackageID, $r['package_id']);
                                            }
                                        }

                                    //get rows from the package booking requests table..

                                        $query  = mysqli_query($conn,"SELECT* FROM `packages_booking`");
                                        while($row = mysqli_fetch_array($query)){
                                            
                                            $package_idBooking = $row['package_id'];
                                            
                                            if(in_array($package_idBooking,$arrayPackageID)){
                                                $userID = $row['user_id'];
                                                //get the employee info
                                                $pkgRequestDate = $row['package_requestDate'];
                                                $bookingDate = date("d-m-Y",strtotime($pkgRequestDate));
                                                $PKGrequestStatus = $row['package_requestStatus'];
                                                $pkgBookingID = $row['package_booking_id'];

                                                  //now by using the user id we will get the user details from another table
                                                        $query2 = "SELECT* FROM `users` WHERE `id`=$userID";
                                                        $result2 = mysqli_query($conn,$query2);
                                                        if(mysqli_num_rows($result2)==1){
                                                            $userRecord = mysqli_fetch_array($result2);
                                                            $userName = $userRecord['username'];
                                                        }
                                                         //printing out the rows in table
                                                        echo '<td>'.$pkgBookingID .'</td>
                                                        <td>'.ucwords($userName).'</td>
                                                        <td>'.$bookingDate .'</td>';
                                                         
                                                        if($PKGrequestStatus==0){
                                                        echo '<td><button type="button" class="btn btn-default btn-circle waves-effect accept" name='.$pkgBookingID.'><i class="fa fa-check"></i> </button></td>
                                                        <td><button type="button" class="btn btn-warning btn-circle waves-effect reject" name='.$pkgBookingID.'><i class="fa fa-times"></i> </td>
                                                        ';
                                                            }//end if condition
                                                            else if($PKGrequestStatus==1) {

                                                                echo '<td><span class="label label-success label-rouded">Approved</span></td>';
                                                                echo '<td></td>';

                                                            } else{
                                                              echo '<td></td>';
                                                              echo' <span class="label label-danger label-rouded">Disapproved</span>';
                                                              

                                                            }

                             echo '<td><a class="btn btn-block btn-default" href="userInfo.php?userID='.$userID.'">View Profile</a></td>';  

                                 echo '<td>
                                    <button class="btn btn-block btn-info btn-rounded pkgdetails" name='.$package_idBooking.' data-toggle="modal">PKG Info</button>
                                    </td>';
                               echo'                              
                              <div class="modal fade" id="pkginfo" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Package Information</h4>
                                    </div>
                                    <div class="modal-body" id="packageInfoBody">

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>'; 

 
                                            }//end while loop here
                                        } 
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
    $('#allrequests').DataTable();
    responsive: true;
} );
</script>
<script type="text/javascript">
        $(document).ready(function(){
            //for accept button
             $(document).on('click','.accept',function(){
                var pkg_ID =$(this).attr('name');
                var action = "accept";
                var dataString = "pkg_ID="+pkg_ID+"&action="+action;
                $.ajax({
                    method:"POST",
                    url:"bookingRequests/requestsActions.php",
                    data:dataString,
                    success:function(){
                        alert("The Package Request has been Accepted");
                         location.reload();
                    },
                });
              });
             //for reject button
              $(document).on('click','.reject',function(){
                    var pkg_ID =$(this).attr('name');
                    var action = "reject";
                    var dataString = "pkg_ID="+pkg_ID+"&action="+action;
                    $.ajax({
                        method:"POST",
                        url:"bookingRequests/requestsActions.php",
                        data:dataString,
                        success:function(){
                                    alert("The Package Request has been Rejected");
                                     location.reload();
                        },
                    });
              });
              
              //for getting the package information  on the modal
              $(document).on('click','.pkgdetails',function(){
                var packageID = $(this).attr('name');
                var dataString = "package_id="+packageID;
                $.ajax({
                    method:"POST",
                    url:"bookingRequests/requestsActions.php",
                    data:dataString,
                    success:function(data){
                        $('#packageInfoBody').html(data);
                        $('#pkginfo').modal('show');
                    }
                });

              });//end here
        });



</script>
