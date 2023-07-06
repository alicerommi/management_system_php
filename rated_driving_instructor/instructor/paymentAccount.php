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
<!-- Stripe JavaScript library -->
<!--   <script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->
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
                      <h4 class="page-title">Add Account For Payment</h4>
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Add Stripe Payment Account</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                
                    <div class="row">
                          <div class="col-md-6">  
                            <div class="white-box">
                              <form method="post" action="actions/insert.php" id="paymentFrm">
                                  <div class="form-group">
                                      <label>Your Email Address</label> 
                                      <input type="text" name="email" value="<?php echo $ins_email; ?>" class="form-control" readonly> 
                                  </div>
                                  <input type="hidden" name="ins_id" value="<?php echo $ins_id; ?>">
                                  <div class="form-group">
                                      <button class="btn btn-success" name="addAccount" type="submit">Create</button>

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
