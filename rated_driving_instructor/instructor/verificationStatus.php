<?php
    include 'includes/database_connection.php';
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
 <title>Rated Driving Instructor - Instructor Dashboard</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.min.css" rel="stylesheet">                      
<!-- color CSS -->
<link href="css/colors/megna.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>white-
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- <style type="text/css">
  .error-box {
    height: 100%;
    position: fixed;
    background: url(../../plugins/images/bodybg.jpg) no-repeat center center #fff !important;
    width: 100%;
}

</style> -->
<style type="text/css">
    .navbar-header {
      background: #f24282;
}


</style>


</head>

<body>
<div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="login.php"><b><img src="logos/logo.png" alt="home" height="20%" width="30%" /></b><span class="hidden-xs"><strong>Rated</strong>Driving </span></a></div>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

<!-- Preloader -->
<!-- <div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div> -->


<section id="wrapper" class="error-page" >
  <div class="error-box" >
    <div class="error-body text-center">
     <!--  <h1>500</h1> -->
    <div class="col-md-9">
      <h3 class="text-uppercase">

      <?php
            if(isset($_GET['vlink'])){
              $vlink = $_GET['vlink'];
              //for matching the vlink process
              $query = "SELECT* FROM instructor WHERE `vLink`='$vlink'";
              $result = mysqli_query($conn,$query);
              $row = mysqli_fetch_array($result);
              $id = $row['id'];
              if(mysqli_num_rows($result)==1){
                $updateLink = "UPDATE instructor SET emailVeriStatus=1 WHERE id=$id";
                $res = mysqli_query($conn,$updateLink);
               
                  if($res){
                            
                          echo '<h3>Congrats!</h3>';
                          
                          echo '<div class="alert alert-success">The Email Verification Process Has Been Completed</div></h3>';
                  }
                }else{
                      echo '<div class="alert alert-danger">Error Occurs in Email Verification Process</div></h3>';
                }
            }
               echo '<a href="../user/" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Go to Website</a> 
          <a href="login.php" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Login To Your Account</a>'; 
?>
        
    </div>
     </div>
     <!--  <p class="text-muted m-t-30 m-b-30">Please try after some time</p> -->
  </div>
</section>
<!-- <div class="login-box login-sidebar">
            <div class="white-box">
            </div>
        </div> -->
<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/tether.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>

</body>
</html>
