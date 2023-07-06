<?php include 'includes/session_check.php';
include 'includes/database_connection.php'; 
//to get the instructor id 
if(isset($_GET['package_id'])){
    $package_id = $_GET['package_id'];
}else{
    die;
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">My Lesson Packages</a></li>
                            <li class="active">Edit Your Package</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if(isset($_GET['editStatus'])){
                                    if($_GET['editStatus']==1){
                                        echo '<div class="alert alert-success">Package Has Been Added Successfully</div>';
                                    }else if($_GET['editStatus']==0){
                                         echo '<div class="alert alert-warning">Error in Adding Package Details</div>';
                                    }
                            } 
                        ?>
                      <div class="white-box">
                            <div class="box-title">Edit the Package Detials:</div>
                        <!-- for inserting or adding a pakage-->
                           <form class="form-material form-horizontal" method="POST" action="actions/updateInfo.php">
                             <!--    <div class="col-lg-6">   -->
                                    <?php 
                                    $query = mysqli_query($conn,"SELECT* FROM `packages` WHERE `package_id`=$package_id");
                                        $row = mysqli_fetch_array($query);
                                        $pName = $row['package_name'];
                                        $ptype = $row['package_type'];
                                        $pHours = $row['package_durationHours'];
                                        $pAmount = $row['package_amount'];
                                        $pDescription = $row['package_description'];
                                        $instructorID = $row['ins_id'];
                                          $package_days = $row['package_days'];
                                    ?>
                                        <div class="form-group">
                                            <label class="col-md-12">Package Name
                                            </label>
                                                <input type="text" id="packagename" name="editpackagename" value="<?php echo $pName; ?>" class="form-control"  maxlength="30"> 
                                        </div>

                                        <div class="form-group">
                                        <label class="col-md-12">Package Type</label>     
                                            <select class="form-control" name="editpackageType" >
                                                <?php 
                                                    if($ptype==1)
                                                         {
                                                            echo '<option value="1" selected>Basic</option>';
                                                           echo ' <option value="2">Standard</option>
                                                    <option value="3">Premium</option>';
                                                        }
                                                     else if($ptype==2){
                                                        echo '<option value="1">Basic</option>';
                                                        echo '<option value="2" selected>Standard</option>';
                                                        echo '<option value="3">Premium</option>';
                                                    }

                                                    else {
                                                         echo '<option value="1">Basic</option>
                                                         <option value="2">Standard</option>';
                                                        echo ' <option value="3" selected>Premium</option>';

                                                    }
                                                ?>   


                                            </select>
                                        </div>

                                        <input type="hidden" value="<?php echo $package_id;?>" name="packageID"/> 
                                        
                                         <div class="form-group">
                                             <label>Package For Days</label> 
                                               <input type="number" name="editpkgdays" min="1" maxlength="10" max="8" class="form-control" value="<?php echo $package_days; ?>" />
                                        </div>

                                        <div class="form-group">
                                             <label>Enter the Number Of Hours</label> 
                                               <input type="number" name="editpkghours" min="1" value="<?php echo $pHours; ?>" maxlength="10" class="form-control"  />
                                        </div>
                                        
                                        <div class="form-group">
                                               <label>Enter the Amount(In USD)</label> 
                                               <input type="number" name="editpkgamount" min="0" maxlength="10" class="form-control"  value="<?php echo $pAmount; ?>" />
                                        </div>

                                    <div class="form-group">
                                        <label class="col-md-12" >Package Description</label>
                                        <textarea name="editpackageDescription" rows="5" maxlength="500" class="form-control"><?php echo $pDescription; ?></textarea>
                                       </textarea>
                                    </div>

                                        <button type="submit" class="btn btn-info waves-effect waves-light m-r-10" name="packageEdit" id="packageEdit">Update Package</button>
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

