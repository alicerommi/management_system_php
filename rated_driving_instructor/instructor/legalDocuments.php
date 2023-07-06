<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php';
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
                    	<h4 class="page-title">Legal Documents</h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                         <ol class="breadcrumb">
                                <li><a href="index.php">Instructors</a></li>
                                <li class="active">My Legal Documents</li>
                            </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
              <!--ADI number,
verified proof of address
brief synopsis of instrcutor
verified DBA
public liability insurance
pass rate and date qualified
car insurance 
driving license


-->
                    <div class="row">
                        <div class="col-md-12">
                	           <div class="col-md-4">
                                  <div class="white-box">
                           	        	To Complete Your Profile We Need Following Things Form you<hr/>
                                        <ul>
                                            <li>Verified Proof of address</li>
                                            <li>Brief synopsis</li>
                                            <li>Verified DBA Document</li>
                                            <li>Public liability insurance</li>
                                            <li>Pass Rate</li>
                                            <li>Date Qualified</li>
                                            <li>Car Insurance</li>
                                            <li>Driving License</li>  
                                        </ul><hr/>
                                         <p> <strong>Supported Formats are:</strong> (pdf,doc,docx,xlsx,jpg,csv,png) </p> <hr/>
                                        <h3>Your account will not live until this information will approved or checked by Administrator.</h3><hr/>
                                        <p>After collecting this information we will inform you soon if any information will missing.<br/> If the provided information will corect or incorrect then you will recieve an email notification from us.</p>
                                    </div>
                                 </div>
                                 <div class="col-md-8">
                                     <div class="white-box">
                                        <?php if(isset($_GET['info'])){
                                            if($_GET['info']==1)
                                                echo '<div class="alert alert-success">The Information has successfully Submitted</div>';
                                            else if ($_GET['info']==0)
                                                echo '<div class="alert alert-warning">Error in submitting the information</div>';
                                            else if($_GET['info']==2)
                                                echo '<div class="alert alert-warning">You have already submmitted Documents</div>';
                                        }
                                        ?>
                                          <form action="actions/insert.php" enctype='multipart/form-data' method='post'>
                                              
                                            <div class="form-group">
                                                <label>Upload Proof of Address OR CNIC Snip</label>
                                                 <input name="upload1[]" class="form-control" type="file" multiple="multiple" />

                                            </div>
                                            <input type="hidden" name="instructorID" value="<?php echo $instructorID ;?>">
                                            <div class="form-group">
                                                <label>Brief synopsis (Description About You)</label>
                                                <textarea class="form-control" name="description" rows="5" maxlength="500" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                 <label>Upload Verified DBA Document</label>
                                                 <input name="upload2[]" class="form-control" type="file" multiple="multiple" />
                                            </div>

                                            <div class="form-group">
                                                <label>Upload Public Liability Insurance Document</label>
                                                <input type="file" name="upload3[]" class="form-control" multiple="multiple">
                                            </div>

                                            <div class="form-group">
                                                <label>Enter the Pass Rate Scores</label>
                                                <input type="number" name="passrate" class="form-control" min="0" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Enter Date Qualified</label>
                                                <input type="date" name="qualifiedDate" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                 <label>Car Insurance Status</label>
                                                 <select class="form-control" name="carinsuranceStatus">
                                                     <option value="yes">Yes</option>
                                                     <option value="no">No</option>
                                                 </select>                   
                                            </div>

                                            <div class="form-group">
                                                <label>Upload Car License Document</label>
                                                 <input type="file" name="upload4[]" class="form-control" multiple="multiple" >
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" name="legalDoc" class="btn btn-success">Submit</button>
                                            </div>

                                          </form>  
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
   
</body>

</html>