<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
?>
<style type="text/css">
    #dreamKeyword{
        width: 130.01px;
    }
     #keywordAction{
        width: 122px;
    }
</style>
 <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                              <h4 class="pull-left page-title">View All the Camera Lists</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Camera</a></li>
                                    <li class="active">All Camera Lists</li>
                                </ol>
                            </div>
                        </div>

                        <a class="btn btn-default pull pull-left" href="upload-file.php">
                                    <span class="glyphicon glyphicon-plus-sign"> </span>Upload a File
               
                         </a>
                                                   


                                        <div class="row">

                                		   <div class="col-md-12" style="    margin-top: 20px;">
                                    	<div class="panel panel-default panel-fill">
                                             <?php
                                                if(isset($_GET['deleteStatus'])){
                                                        if($_GET['deleteStatus']==1){
                                                            echo '<div class="alert alert-success">The Dream Record Has been Successfully Deleted</div>';
                                                        }else if($_GET['deleteStatus']==0){
                                                                  echo '<div class="alert alert-danger">Error in Deletion Record</div>';
                                                        }   
                                                }
                                            ?>
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Camera Lists</h3> 
                                                
                                            </div> 
                                            <div class="panel-body">
                                            		<div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th style="width:118.01px"> Camera Number</th>
                                                            <th>Type</th>
                                                            <th>Room Section</th>
                                                              <th>VINSET</th>
                                                              <th>Record Added Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                </thead>
                                            <tbody >
                                               <?php 
                                                $query = mysqli_query($conn,"SELECT * FROM `table_rows`");
                                                if(mysqli_num_rows($query)>0){
                                                  while($row=mysqli_fetch_array($query)){
                                                    $row_id= $row['row_id'];
                                                    $row_cameraNum = $row['row_cameraNum'];
                                                    $col_type = $row['col_type'];
                                                    $col_roomsection = $row['col_roomsection'];
                                                    $col_vinset = $row['col_vinset'];
                                                    $row_recordDate = date("d-m-Y",strtotime($row['row_recordDate']));
                                                      echo '<tr>
                                                      <td>'.$row_cameraNum.'</td>
                                                        <td>'.$col_type.'</td>
                                                        <td>'.$col_roomsection.'</td>
                                                         <td>'.$col_vinset.'</td>
                                                         <td>'.$row_recordDate.'</td>
                                                        <td>
                                                        <a  class="btn btn-default" href="edit-info.php?RID='.$row_id.'"><i class="fa fa-edit"></i></a>
            
            <a  class="btn btn-danger" href="actions/delete.php?RID='.$row_id.'"><i class="fa fa-trash"></i></a>
            <a  class="btn btn-info" href="view-moreInfo.php?RID='.$row_id.'"><i class="fa fa-eye"></i></a>

                                                        </td>
                                                        </tr>';
                                                  }
                                                }
                                               ?> 
                                             
                                              



                                             </tbody>


                                             </table>   
                                         </div>
                                         </div>
                                         </div>
                                         </div>
<?php
        include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>


