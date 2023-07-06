<?php include 'includes/session_check.php';
include 'includes/database_connection.php'; 
//to get the instructor id 
$query = mysqli_query($conn,"SELECT* FROM `instructor` WHERE `email`='$ins_email'");
$row = mysqli_fetch_array($query);
$instructorID = $row['id'];
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">My Lesson Packages</a></li>
                            <li class="active">Add A Package</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if(isset($_GET['packageAdded'])){
                                    if($_GET['packageAdded']==1){
                                        echo '<div class="alert alert-success">Package Has Been Added Successfully</div>';
                                    }else if($_GET['packageAdded']==0){
                                         echo '<div class="alert alert-warning">Error in Adding Package Details</div>';
                                    }
                            } 
                        ?>
                      <div class="white-box">
                            <div class="box-title">Enter the Package Detials:</div>
                        <!-- for inserting or adding a pakage-->
                           <form class="form-material form-horizontal" method="POST" action="actions/insert.php">
                             <!--    <div class="col-lg-6">   -->

                                        <div class="form-group">
                                            <label class="col-md-12">Package Name
                                            </label>
                                                <input type="text" id="packagename" name="packagename" class="form-control"  maxlength="30"> 
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-12">Package Type</label>     
                                            <select class="form-control" name="packageType">
                                                    <option value="1">Basic</option>
                                                    <option value="2">Standard</option>
                                                    <option value="3">Premium</option>
                                            </select>
                                        </div>
                                        <input type="hidden" value="<?php echo $instructorID;?>" name="insID"/> 
                                        

                                        <div class="form-group">
                                             <label>Package For Days</label> 
                                               <input type="number" name="pkgdays" min="1" maxlength="10" class="form-control" required />
                                        </div>

                                        <div class="form-group">
                                             <label>Enter the Number Of Hours</label> 
                                               <input type="number" name="pkghours" min="1" maxlength="10" class="form-control" required />
                                        </div>
                                        

                                        <div class="form-group">
                                               <label>Enter the Amount(In USD)</label> 
                                               <input type="number" name="pkgamount" min="0" maxlength="10" class="form-control" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12" name="packageType">Package Description</label>
                                       <textarea class="form-control" type="text" name="packageDescription" rows="5"></textarea>
                                   </div>
                              
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="packageAdd" id="packageAdd">Add Package</button>
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