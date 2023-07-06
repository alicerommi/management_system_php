<?php 
include 'includes/session_check.php';
include 'includes/database_connection.php'; ?>
<?php 
if(isset($_GET['ins_id'])){
    $id = $_GET['ins_id'];
}
  //get the admin id 
  $query = mysqli_query($conn,"SELECT* FROM admin WHERE email='$admin_email'");
  $adminRow = mysqli_fetch_array($query);
  $adminID = $adminRow['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/header_links.php';?>
</head>
<body>
    <!-- Preloader -->
    <div id="wrapper">
        <!-- Navigation -->
           <?php include 'includes/navigation_header.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
            <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Instructor Legal Documents</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                             <li><a>Admin</a></li>
                            <li><a href="Instructors.php">Instructors</a></li>
                            <li class="active">View Legal Documents</li>
                        </ol>
                    </div>
                </div>
            <div class="white-box">
                <div class="box-title">View Attached Documents & Details of Instructor</div>
                <?php 
                    //showing the notification 
                        if(isset($_GET['info'])){
                            if($_GET['info']==1){
                                    echo '<div class="alert alert-success">The Information has been Updated.</div>';
                                } else if($_GET['info']==0){
                                echo '<div class="alert alert-warning">Error in updating Information</div>';
                            }
                        }
                        //updateinfo error point 
                        if(isset($_GET['updateinfo'])){
                            if($_GET['updateinfo']==1){
                              echo '<div class="alert alert-success">The Information Has been Updated</div>';
                            }else if($_GET['updateinfo']==0){
                              echo '<div class="alert alert-warning">Error in updating Information</div>';
                            }
                        }
                        $query = mysqli_query($conn,"SELECT* FROM instructor WHERE id=$id");
                        $row = mysqli_fetch_array($query);
                        $insName = $row['name'];
                        echo "<div class='title'>Legal Documents of ".ucwords($insName)."</div><hr/>";
                    ?>
                <div class="row">
                    <?php 
                    //$flag1=$flag2=$flag3=$flag4 =false;
                    $flag = false;
                    $query2 = mysqli_query($conn,"SELECT* FROM  instructor_documents WHERE ins_id=$id");
                   
                    
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
                    <div class="col-md-8 ">

                        <form method="post" id="form" action="actions/insert.php">
                            
                            <?php
                            // echo '';
                            echo '<input type="hidden" name="documentsID" value="'.$doc_id.'">';
                            echo '<input type="hidden" name="instructorID" value="'.$id.'">';
                            echo '<input type="hidden" name="adminID" value="'.$adminID.'">';
                            if($flag){
                              echo '<input type="hidden" value="'.$documentStatusID.'" name="documentsStatusID">';
                            }
                                //for cnicDocs files
                                    $cnicDocs = explode("&key123456789=",$cnic_doc);
                                    //print_r($cnicDocs);
                                    for($i=1;$i<sizeof($cnicDocs);$i++)
                                      { $link = $cnicDocs[$i];
                                         echo '<label><a href="./logalDocumentsUploads/'.$link.'" >View Image</a></label>';
                                      }
                                      if(!$flag){
                                         echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                            <input id="checkbox-1" name="checkbox-1" type="checkbox" value="1" >
                                            <label for="checkbox-10"> Approved </label>
                                        </div>';
                                        }else {
                                          if($doc1_status==1 && $flag){
                                                    echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right"  style="pointer-events:none; opacity:0.5">
                                                  <input id="checkbox-1" name="checkbox-1" type="checkbox" value="1" checked >
                                                  <label for="checkbox-10"> Approved </label>
                                              </div>';
                                          }else{
                                            if($doc1_status==0){
                                                   echo '<div class="checkbox checkbox-danger checkbox-circle pull pull-right"  style="pointer-events:none; opacity:0.5">
                                                  <input id="checkbox-1" name="checkbox-1" type="checkbox" value="1" checked >
                                                  <label for="checkbox-10"> Disapproved </label>
                                              </div>';
                                            }else
                                                    {
                                                      echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                <input id="checkbox-1" name="checkbox-1" type="checkbox" value="1" >
                                                <label for="checkbox-10"> Approved </label>
                                                </div>';
                                              }

                                          }
                                        }
                                   
                                      echo "<hr/>";
                                      //dba_doc files

                                    $dba_doc = explode("&key123456789=", $dba_doc);
                                    for($i=1;$i<sizeof($dba_doc);$i++)
                                      { $link = $dba_doc[$i];
                                        echo '<label><a href="./logalDocumentsUploads/'.$link.'" >View Document</a></label>';
                                      }
                                      if(!$flag){
                                          echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                                                    <input id="checkbox-2"  name="checkbox-2" type="checkbox" value="1">
                                                                                    <label for="checkbox-10"> Approved </label>
                                                                                </div>';
                                       }else{
                                         if($doc2_status==1 && $flag){
                                                    echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right" style="pointer-events:none; opacity:0.5">
                                                  <input id="checkbox-1" name="checkbox-2" type="checkbox" value="1" checked >
                                                  <label for="checkbox-10"> Approved </label>
                                              </div>';
                                          }else{
                                                     if($doc2_status==0){
                                                         echo '<div class="checkbox checkbox-danger checkbox-circle pull pull-right"  style="pointer-events:none; opacity:0.5">
                                                        <input id="checkbox-1" name="checkbox-2" type="checkbox" value="1" checked >
                                                        <label for="checkbox-10"> Disapproved </label>
                                                    </div>';
                                                  }else
                                                   { echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                                                               <input id="checkbox-1" name="checkbox-2" type="checkbox" value="1" >
                                                                                               <label for="checkbox-10"> Approved </label>
                                                                                              </div>';
                                                    }
                                          }

                                       }                                         
                                      echo "<hr/>";

                                     // insurance_doc files
                                       $insurance_doc = explode("&key123456789=", $insurance_doc);
                                    for($i=1;$i<sizeof($insurance_doc);$i++)
                                      { $link = $insurance_doc[$i];
                                        echo '<label><a href="./logalDocumentsUploads/'.$link.'" >View Document</a></label>';
                                      }

                                            if(!$flag)
                                            { echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                                                  <input id="checkbox-3"  name="checkbox-3" type="checkbox" value="1">
                                                                                  <label for="checkbox-10"> Approved </label>
                                                                              </div>';
                                              }else {
                                                   if($doc3_status==1 && $flag){
                                                      echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right" style="pointer-events:none; opacity:0.5">
                                                    <input id="checkbox-1" name="checkbox-3" type="checkbox" value="1" checked >
                                                    <label for="checkbox-10"> Approved </label>
                                                </div>';
                                                }else{
                                                         if($doc3_status==0){
                                                         echo '<div class="checkbox checkbox-danger checkbox-circle pull pull-right"  style="pointer-events:none; opacity:0.5">
                                                        <input id="checkbox-1" name="checkbox-3" type="checkbox" value="1" checked >
                                                        <label for="checkbox-10"> Disapproved </label>
                                                    </div>';
                                                      }else{

                                                            echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                        <input id="checkbox-1" name="checkbox-3" type="checkbox" value="1" >
                                                        <label for="checkbox-10"> Approved </label>
                                                       </div>';
                                                      }
                                                }

                                              }                         
                                      echo "<hr/>";

                                      // $ins_lecense_doc files
                                         $ins_lecense_doc = explode("&key123456789=", $ins_lecense_doc);
                                    for($i=1;$i<sizeof($ins_lecense_doc);$i++)
                                      { 
                                        $link = $ins_lecense_doc[$i];
                                        echo '<label><a href="./logalDocumentsUploads/'.$link.'" >View Document</a></label>';
                                      } 
                                   
                                    if(!$flag){
                                              echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                    <input id="checkbox-4" type="checkbox"  name="checkbox-4" value="1">
                                                    <label for="checkbox-10"> Approved </label>
                                                    </div>';
                                     }else{
                                      if($doc4_status==1 && $flag)
                                      {
                                        echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right" style="pointer-events:none; opacity:0.5">
                                                  <input id="checkbox-1" name="checkbox-4" type="checkbox" value="1" checked >
                                                  <label for="checkbox-10"> Approved </label>
                                              </div>';   
                                      }
                                        else{

                                             if($doc4_status==0){
                                                   echo '<div class="checkbox checkbox-danger checkbox-circle pull pull-right"  style="pointer-events:none; opacity:0.5">
                                                  <input id="checkbox-1" name="checkbox-4" type="checkbox" value="1" checked >
                                                  <label for="checkbox-10"> Disapproved </label>
                                              </div>';
                                            }else{
                                                      echo '<div class="checkbox checkbox-success checkbox-circle pull pull-right">
                                                  <input id="checkbox-1" name="checkbox-4" type="checkbox" value="1" >
                                                  <label for="checkbox-10"> Approved </label>
                                                 </div>';
                                               }

                                      }
                                     }               
                                          ?>
                            <hr/>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-4 b-r">
                            <label>Insurance Status:</label><hr/>
                           <label>Pass Rate</label><hr/>
                           <label>Date Qualified</label><hr/>  
                           <label>Document Uploading Date</label><hr/>
                           <label>Description</label><hr/>
                        </div>  
                        <div class="col-md-8">
                            <?php
                                echo "<label>".ucwords($insuranceStatus)."</label><hr/>";
                                echo "<label>".$ins_passrate."</label><hr/>";
                                echo "<label>".date("d-m-Y",strtotime($ins_dataQualified))."</label><hr/>";
                                echo "<label>".$recordTimeDate."</label><hr/>";
                                echo "<label>".$ins_description."</label><hr/>";
                            ?>
                        </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="white-box">
                           <div class=" box-title">Send Message to Instructor</div>
                                <!--    <div class="form-group">
                                       <label>Subject Line</label>
                                        <input type="text" name="subject" maxlength="50" class="form-control" required>
                                   </div> -->
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea type="text" name="message" rows="5" maxlength="500" class="form-control" required></textarea> 
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit" name="send">Send</button>
                                    </div>

                              </form>                                    
                    </div>
                </div>
            </div>
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
