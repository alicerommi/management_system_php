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
                    <!-- .col -->
                    <?php 
                    //write query for fetching the instrctor details
                    $query = "SELECT* FROM `instructor` WHERE `emailVeriStatus`=1";
                    $result  = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($result)){
                      $name = $row['name'];
                      $image = $row['image'];
                      $id =  $row['id'];
                    ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">


                                <div class="col-md-4 col-sm-4 text-center">
                                    <?php     
                                             echo '<a href="instructor-profile.php?ins_id='.$id.'">';
                                        if(strlen($image)>0){
                                               echo '<img src="images/'.$image.'" alt="user" class="img-circle img-responsive"> ';
                                           }else{
                                               echo ' <img src="images/default.png" alt="user" class="img-circle img-responsive">';  
                                          }
                                           echo "</a>";
                                     ?>  
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0"><?php echo ucwords($name);?></h3>

                                    <?php //check this instructor has uploaded the documents or not..
                                           $queryCheck = mysqli_query($conn,"SELECT* FROM `instructor_documents` WHERE ins_id=$id");
                                           if(mysqli_num_rows($queryCheck)>0)
                                             { echo '<a href="viewDocuments.php?ins_id='.$id.'">View Legal Documents</a>';}
                                  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /.col -->
                   
                <!--/row -->
                <!-- .row -->
              
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