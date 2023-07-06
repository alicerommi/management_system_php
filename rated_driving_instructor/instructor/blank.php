<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; 
  if(isset($_GET['id'])){
    $ins_id= $_GET['id'];
    $query = mysqli_query($conn,"SELECT* FROM instructor WHERE id=$ins_id");
    $row = mysqli_fetch_array($query);
    $ins_email = $row['email'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">Add Account For Payment
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Add Payment Account</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="white-box">
                    <div class="row">
                          <div class="col-md-6">  
                              <form method="post">
                                  <div class="form-group">
                                      <label>Your Email Address</label> 
                                      <input type="text" name="email" value="<?php echo $ins_email; ?>" class="form-control" readonly> 
                                  </div>
                              </form>
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
   
</body>

</html>