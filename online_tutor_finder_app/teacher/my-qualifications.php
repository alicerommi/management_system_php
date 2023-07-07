<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
?>
                    
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12" style=" margin-top: -11px;">
                               
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">My Profile</a></li>
                                    <li class="active">Add Qualifications</li>
                                </ol>
                            </div>
                        </div>
                        <?php
                                                              $teacher_email = $_SESSION['teacher_email'];
                                                             $query = mysqli_query($conn,"SELECT * FROM `teacher` where teacher_email='$teacher_email'");
                                                                $row=mysqli_fetch_array($query);
                                                                 $TID= $row['teacher_id'];
                        ?>
                        <!-- Start Widget -->
                      <div class="row">
                            <div class="col-md-12">
                                
                                <div class="col-md-6">
                                    <?php
                                    if(isset($_GET['added'])){
                                      if($_GET['added']==1){
                                        echo '<div class="alert alert-success">The Qualfication Has Been Added Successfully</div>';
                                      }else if($_GET['added']==0){
                                         echo '<div class="alert alert-warning">Error In Adding Qualfication</div>';
                                      }
                                    }

                                     if(isset($_GET['edited'])){
                                      if($_GET['edited']==1){
                                        echo '<div class="alert alert-success">The Qualfication Has Been Updated Successfully</div>';
                                      }else if($_GET['edited']==0){
                                         echo '<div class="alert alert-warning">Error In Updating Qualfication</div>';
                                      }
                                    }

                                    ?>
                                    <div class="panel panel-default">
                                            <h4 class="panel-heading">Add Qualifications</h4>
                                            <div class="panel-body">
                                                <form action="actions/insert.php" method="post">
                                                    
                                                    <?php if(isset($_GET['qual_id']))
                                                      {
                                                          $qid = intval($_GET['qual_id']);
                                                            $query = mysqli_query($conn,"SELECT qual_name from qualifications where qual_id=$qid");
                                                       $row = mysqli_fetch_array($query);
                                                       $qname = $row['qual_name'];
                                                          echo '<div class="form-group">
                                                            <label>Add Qualification:</label>
                                                            <input type="text" name="qualification" maxlength="40" class="form-control" required value="'.$qname.'">

                                                           </div>';

                                                           echo '<input type="hidden" value="'.$_GET['qual_id'].'" name="qualID">';
                                                        }else{
                                                    ?>
                                                    <div class="form-group">
                                                            <label>Add Qualification:</label>
                                                            <input type="text" name="qualification" maxlength="40" class="form-control" required>

                                                    </div>
                                                  <?php } ?>

                                                    <input type="hidden" name="TID" id="TID" value="<?php echo $TID;  ?>">
                                                  <?php if(isset($_GET['qual_id']))
                                                      {
                                                           echo '<div class="form-group">
                                                            <button class="btn btn-info" name="updateQual" type="submit">Update</button>
                                                            </div>';
                                                      }else{
                                                      ?>
                                                       <div class="form-group">
                                                            <button class="btn btn-primary" name="addQual" type="submit">Save</button>
                                                    </div>
                                                  <?php } ?>

                                                </form>

                                            </div>

                                    </div>

                                </div>



                                 <div class="col-md-6">  

                                 <?php
                                 
                                   if(isset($_GET['deleteQual'])){
                                    if($_GET['deleteQual']=1){
                                        echo '<div class="alert alert-danger">The Qualfication Has Been Successfully Deleted</div>';
                                    }else if($_GET['deleteQual']=0){
                                        echo '<div class="alert alert-warning">Error In Deletion</div>';
                                    }
                                 }

                                 ?>                                  
                                    <div class="panel panel-default">
                                            <h4 class="panel-heading">My Qualfications</h4>
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                           <th>Qualification Name</th>
                                                              <th>Added Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                </thead>

                                                <tbody>
                                                    
                                                    <?php
                                                            

                                                                 $query2 = mysqli_query($conn,"SELECT* FROM qualifications WHERE teacher_id=$TID");
                                                                 if(mysqli_num_rows($query2)>0){
                                                                    while($row2 = mysqli_fetch_array($query2)){
                                                                        $qual_id = $row2['qual_id'];
                                                                        $qual_name = $row2['qual_name'];
                                                                        $qual_recordDate = date("d-m-Y",strtotime($row2['qual_recordDate']));
                                                                        echo '<tr>';
                                                                        echo '<td>'.ucwords($qual_name).'</td>';
                                                                         echo '<td>'.$qual_recordDate.'</td>';
                                                                          echo '<td><a href="actions/delete.php?qual_id='.$qual_id.'" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                                          <a class="btn btn-info edit" href="my-qualifications.php?qual_id='.$qual_id.'"><i class="fa fa-pencil"></i></a>
                                                                          </td>';
                                                                          echo '</tr>';
                                                                    }
                                                                 }
                                                    ?>

                                                </tbody>

                                            </table>
                                        </div>

                                            </div>
                                     </div>


                            </div>
                          
                      </div>

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
<?php
    include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>


