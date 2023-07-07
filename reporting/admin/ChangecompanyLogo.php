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
             <!--    <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>          -->
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
                            <li class="active">Add Action Plan</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                     <div class="col-md-6">
                         <div class="panel panel-default">
                        <div class="panel-heading">Update Logo</div> 
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body">
                                    <?php 
                                    if(isset($_GET['status'])){
                                           $status = $_GET['status'];
                                           if($status==0){
                                                echo '<div class="alert alert-warning"> The File is not Supported</div>';
                                           }else if($status==1){
                                                 echo '<div class="alert alert-success"> The File is successfully Uploaded</div>';
                                           }else if($status==0){
                                              echo '<div class="alert alert-warning"> Error in Uploading</div>';
                                           } 
                                    }
                                    ?>
                                      <form data-toggle="validator" action="actions/updateLogo.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputName" >Choose Logo</label>
                                                <input type="file" name = "image" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button type="submit" name = "updateLOGO" class="btn btn-default">Submit</button>
                                            </div>
                                        </form> 
                                 </div> 

                                </div>

                     </div></div>
                </div>
                <!--/row -->
            </div>
            <!-- /.container-fluid -->
                <?php include 'includes/footer.html'; ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <?php include_once "includes/scripts.html";} ?>
</body>

</html>