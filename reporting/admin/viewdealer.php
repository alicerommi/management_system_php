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
               <!--  <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>       -->   
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
                            <li class="active">View Dealers</li>
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
                <style type="text/css">


 .modal-dialog {
    max-width: 500px;
    margin: 105px auto;
}
</style>
<div class="panel panel-success">
    <div class="panel-heading">View All Dealers</div> 
        <div class="panel-wrapper collapse in">
            <div class="panel-body">

                <table id="actionplans" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Dealer Code</th>
                                <th>Dealer Region</th>
                                <th>Dealer Info</th>
                               <!--  <th>Action Plan Asigned</th>
                                <th>Asigned Date</th>
                                <th>AP Status</th> -->
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Dealer Code</th>
                                <th>Dealer Region</th>
                                <th>Dealer Info</th>
                              <!--   <th>Asigned Date</th>
                                <th>AP Status</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                                <?php 
                                $query=mysqli_query($con,"SELECT * FROM dealers");
                                if(!$query){
                                    echo "Error 1:".mysqli_error($con);
                                }
                                while($data=mysqli_fetch_array($query)){ 
                                    $id = $data['dealer_id'];
                                    $name=$data['dealer_name'];
                                    $email=$data['dealer_email'];
                                    $code=$data['dealer_code'];
                                    $region= $data['dealer_region'];
                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $code; ?></td>
                                    <td><?php echo $region; ?></td>
                                    <td><button type="button"  class="btn btn-info dealerInfo" id=<?php echo $id;?> >View Dealer Info</td>
                                        
                                </tr>


                                <?php } ?>
                        </tbody>
            </table>

       </div>
    </div>

     <!-- modal for showing the information -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog modal-lg" >
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Dealer Information</h4>
                                                </div>

                                                <div class="modal-body" id = "ModalInfoBody">
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                  </div>
                                  <!-- Modal -->
</div><!-- end success panel here -->
                
                
                          


 
                
                <!-- /.modal for showing the information -->
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
            //for fetching th dealer information when admin clicks on the button 
            $(document).on('click','.dealerInfo',function(){
                    var dealerID = $(this).attr('id');
                      var dataString  = "id="+dealerID;
                      $.ajax({
                            url:"actions/fetchDealerInfo.php",
                            method:"POST",
                            data:dataString,
                            success:function(data){
                                $("#ModalInfoBody").html(data);
                                $("#myModal").modal('show');
                            }
                      });
            });
      });  


</script>
