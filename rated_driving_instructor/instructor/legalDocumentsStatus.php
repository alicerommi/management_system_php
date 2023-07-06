<?php include 'includes/session_check.php'; ?>
<?php include 'includes/database_connection.php'; 
    $query = mysqli_query($conn,"SELECT* FROM instructor WHERE email='$ins_email'");
    $row = mysqli_fetch_array($query);
    $ins_id = $row['id'];
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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">My Legal Documents Status
                     </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="index.php">Instructor</a></li>
                            <li class="active">Documents Status</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
               
                <div class="white-box">
                    <div class="row">



                      <?php 
                    //$flag1=$flag2=$flag3=$flag4 =false;
                    $flag = false;
                    $query2 = mysqli_query($conn,"SELECT* FROM  instructor_documents WHERE ins_id=$ins_id");
                   
                    
                    if(mysqli_num_rows($query2)>0){
                             $rowDocuments = mysqli_fetch_array($query2);
                             //getting data from the instructor_documents table
                            $doc_id = $rowDocuments['documents_id'];
                            $cnic_doc  = $rowDocuments['cnic_doc'];
                            $ins_description = $rowDocuments['ins_description'];
                            $dba_doc = $rowDocuments['dba_doc'];
                            $insurance_doc = $rowDocuments['insurance_doc'];
                            $ins_passrate = $rowDocuments['ins_passrate'];
                            $ins_dataQualified = $rowDocuments['ins_dataQualified'];
                            $insuranceStatus = $rowDocuments['insuranceStatus'];
                            $ins_lecense_doc = $rowDocuments['ins_lecense_doc'];
                            $recordTimeDate = $rowDocuments['recordTimeDate'];  

                            $query3 =  mysqli_query($conn,"SELECT* FROM  instructor_documents_status WHERE documents_id=$doc_id");
                        //check point for checking whether the admin has done any action on it before 
                                if(mysqli_num_rows($query3)>0){
                                  $flag = true;
                                   $rowDocuments = mysqli_fetch_array($query3);
                                        $doc1_status = $rowDocuments['doc1_status'];
                                        $doc2_status = $rowDocuments['doc2_status'];
                                        $doc3_status = $rowDocuments['doc3_status'];
                                        $doc4_status = $rowDocuments['doc4_status'];
                                        $documentStatusID  = $rowDocuments['id'];//unique identifier of table instructor_documents_status 
                                }
                    }
                    ?>
                               


                          <div class="col-md-4 b-r">
                               <label> CNIC Document:</label><hr/>
                               <label> DBA Document:</label> <hr/>
                               <label> Public Liability Insurance Document:</label><hr/>
                               <label> Car License Document:</label><hr/>
                          </div>
                          <div class="col-md-8">
                             <form method="post">
                                <?php
                                    if(!$flag){
                                      for($i=0;$i<4;$i++){ //if the admin has not approved any document so that instructor can see the status of his documents & details
                                        echo '<label>Not View By Adminstrator Yet</label><hr/>';
                                      }
                                    }//end flag condition 
                                    if($sum>0){
                                        if($doc1_status==1){ /// if this document is marked verified by the admin then the status will show to the instructor 
                                         echo '<label> Approved By Adminstrator </label><hr/>';
                                        }
                                        else if($doc1_status==0){
                                           echo '<label>Disapproved By Administrator</label><hr/>';
                                           // <div class="pull pull-right">
                                           // <input name="upload1[]" class="form-control" type="file" multiple="multiple" />
                                           // </div>
                                           // <hr/>;
                                        }

                                        if($doc2_status==1){ /// if this document is marked verified by the admin then the status will show to the instructor 
                                         echo '<label> Approved By Adminstrator </label><hr/>';
                                        }
                                        else if($doc2_status==0){
                                           echo '<label>Disapproved By Administrator</label><hr/>';
                                           // <div class="pull pull-right">
                                           // <input name="upload2[]" class="form-control" type="file" multiple="multiple" />
                                           // </div>
                                           // <hr/>';
                                        }

                                        if($doc3_status==1){ /// if this document is marked verified by the admin then the status will show to the instructor 
                                         echo '<label> Approved By Adminstrator </label><hr/>';
                                        }
                                        else if($doc3_status==0){
                                           echo '<label>Disapproved By Administrator</label><hr/>';
                                           // <div class="pull pull-right">
                                           // <input name="upload3[]" class="form-control" type="file" multiple="multiple" />
                                           // </div>
                                           //  <hr/>;
                                        }

                                        if($doc4_status==1){ /// if this document is marked verified by the admin then the status will show to the instructor 
                                         echo '<label> Approved By Adminstrator </label><hr/>';
                                        }

                                        else if($doc4_status==0){
                                          // echo $doc4_status;
                                           echo '<label>Disapproved By Administrator</label><hr/>';
                                           // <div class="pull pull-right">
                                           // <input name="upload4[]" class="form-control" type="file" multiple="multiple" />
                                           // </div>
                                           // <hr/>';
                                        }
                                    }//end sum condition here
                                ?>
                              </form>
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
   
</body>

</html>