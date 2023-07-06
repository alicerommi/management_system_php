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
                                                        <th>Instructor Name</th>
                                                        <!-- <th>Joining Date</th> -->
                                                        <th>Profile</th>
                                                        <th>Calender</th>
                                                        <th>Packages</th>
                                                        <th>Requests</th>
                                                        <th>Reviews</th>
                                                        <th>Legal Document</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php 
                                                   //write query for fetching the instrctor details
                                                  $query = "SELECT* FROM `instructor` WHERE `emailVeriStatus`=1";
                                                  $result  = mysqli_query($conn,$query);
                                                  while($row = mysqli_fetch_array($result)){
                                                    $name = $row['name'];
                                                    $image = $row['image'];
                                                    $ins_id =  $row['id'];
                                                     $date = $row['date']; 
                                                     //get the instructor packages 
                                                        $query2 = mysqli_query($conn,"SELECT* FROM packages WHERE ins_id=$ins_id");
                                                        if(mysqli_num_rows($query2)>0){
                                                              $packages = '<a class="btn btn-default" href="instructor-packages.php?ins_id='.$ins_id.'">Packages</a>';
                                                        }else{
                                                            $packages = '<a class="btn btn-default" href="instructor-packages.php?ins_id='.$ins_id.'" style="pointer-events:none;opacity:0.5;">No Packages</a>';
                                                        }
                                                        //for checking whether the instructor has send the documents to admin or not
                                                        $query3 = mysqli_query($conn,"SELECT* FROM instructor_documents WHERE ins_id=$ins_id");
                                                        if(mysqli_num_rows($query3)>0){
                                                            $legalDocuments = '<a class="btn btn-default" href="viewDocuments.php?ins_id='.$ins_id.'">Documents</a>';
                                                          }else{
                                                             $legalDocuments = '<a class="btn btn-default" href="viewDocuments.php?ins_id='.$ins_id.'" style="pointer-events:none;opacity:0.5;">Documents</a>';
                                                          }

                                                        //$rowPackage  = mysqli_fetch_array($query2);
                                                     $profile = '<a class="btn btn-default" href="instructor-profile.php?ins_id='.$ins_id.'">Profile</a>';
                                                     //get the booking requests for an instructor 
                                                     $queryRequests  = mysqli_query($conn,"SELECT * FROM `schedule_bookings` WHERE ins_id=$ins_id");
                                                     if(mysqli_num_rows($queryRequests)>0){
                                                         $schduleRequests = '<a class="btn btn-default" href="instructor-schduleRequests.php?ins_id='.$ins_id.'">Requests</a>';
                                                     }else{
                                                        $schduleRequests = '<a class="btn btn-default" href="instructor-schduleRequests.php?ins_id='.$ins_id.'" style="pointer-events:none;opacity:0.5;">Requests</a>';
                                                     }
                                                      //for checking the isntructor has got the reviews or not
                                                      $query4 = mysqli_query($conn,"SELECT* FROM instructor_reviews WHERE ins_id=$ins_id");
                                                      if(mysqli_num_rows($query4)>0){
                                                      $reviews = '<a class="btn btn-default" href="instructor-reviews.php?ins_id='.$ins_id.'">Reviews</a>';}
                                                      else{ 
                                                      $reviews = '<a class="btn btn-default" href="instructor-reviews.php?ins_id='.$ins_id.'" style="pointer-events:none;opacity:0.5;">Reviews</a>';
                                                      }
                                                        //check the instructor has some schdules on calender or not
                                                     $query5= mysqli_query($conn,"SELECT pac.*, pac_book.*, sch_book.* from packages pac, packages_booking pac_book, schedule_bookings sch_book where pac.package_id=pac_book.package_booking_id and pac.ins_id=sch_book.ins_id and sch_book.ins_id=$ins_id");
                                                     if(mysqli_num_rows($query5)>0){
                                                       $calender = '<a class="btn btn-default" href="instructor-calender.php?ins_id='.$ins_id.'">Calender</a>';
                                                     }else{
                                                       $calender = '<a class="btn btn-default" href="instructor-calender.php?ins_id='.$ins_id.'" style="pointer-events:none;opacity:0.5;">Calender</a>';
                                                     }                                                     
                                                    echo '<tr>';
                                                    echo '<td>'.ucwords($name).'</td>';
                                                    // echo '<td>'.date('d-m-Y',strtotime($date)).'</td>';
                                                    echo '<td>'.$profile.'</td>';
                                                    echo '<td>'.$calender.'</td>';
                                                    echo '<td>'.$packages.'</td>';
                                                    echo '<td>'.$schduleRequests.'</td>';
                                                    echo '<td>'.$reviews.'</td>';
                                                    echo '<td>'.$legalDocuments.'</td>';
                                                    echo '</tr>';
                                                  } ?>
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