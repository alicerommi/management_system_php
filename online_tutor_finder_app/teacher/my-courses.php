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
                                    <li class="active">Add Courses</li>
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
                                    if(isset($_GET['addedCOurse'])){
                                      if($_GET['addedCOurse']==1){
                                        echo '<div class="alert alert-success">The Course Has Been Added Successfully</div>';
                                      }else if($_GET['addedCOurse']==0){
                                         echo '<div class="alert alert-warning">Error In Adding Course</div>';
                                      }
                                    }

                                     if(isset($_GET['editedCourse'])){
                                      if($_GET['editedCourse']==1){
                                        echo '<div class="alert alert-success">The Course Has Been Updated Successfully</div>';
                                      }else if($_GET['editedCourse']==0){
                                         echo '<div class="alert alert-warning">Error In Updating Course</div>';
                                      }
                                    }

                                    ?>
                                    <div class="panel panel-default">
                                            <h4 class="panel-heading">Add Subjects </h4>
                                            <div class="panel-body">
                                                <form action="actions/insert.php" method="post">
                                                    
                                                    <?php if(isset($_GET['subject_id']))
                                                      {
                                                          $subject_id = intval($_GET['subject_id']);
                                                            $query = mysqli_query($conn,"SELECT subject_name,subject_class from subjects where subject_id=$subject_id");

                                                       $row = mysqli_fetch_array($query);
                                                       $subjectname = $row['subject_name'];
                                                         $subjectclas = $row['subject_class'];
                                                         echo' <div class="form-group">
                                                            <label>Add Subject:</label>
                                                            <input type="text" name="subjectname" maxlength="40" class="form-control" required value="'.$subjectname.'">

                                                    </div>
                                                     <div class="form-group">
                                                            <label>Add Subject Class:</label>
                                                            <input type="text" name="subjectclass" maxlength="40" class="form-control" required value="'.$subjectclas.'">

                                                    </div>';

                                                           echo '<input type="hidden" value="'.$_GET['subject_id'].'" name="subjectID">';
                                                        }else{
                                                    ?>
                                                    <div class="form-group">
                                                            <label>Add Subject:</label>
                                                            <input type="text" name="subjectname" maxlength="40" class="form-control" required>

                                                    </div>
                                                     <div class="form-group">
                                                            <label>Add Subject Class:</label>
                                                            <input type="text" name="subjectclass" maxlength="40" class="form-control" required>

                                                    </div>
                                                  <?php } ?>

                                                    <input type="hidden" name="TID" id="TID" value="<?php echo $TID;  ?>">
                                                  <?php if(isset($_GET['subject_id']))
                                                      {
                                                           echo '<div class="form-group">
                                                            <button class="btn btn-info" name="updateSub" type="submit">Update</button>
                                                            </div>';
                                                      }else{
                                                      ?>
                                                       <div class="form-group">
                                                            <button class="btn btn-primary" name="addSub" type="submit">Save</button>
                                                    </div>
                                                  <?php } ?>

                                                </form>

                                            </div>

                                    </div>

                                </div>



                                 <div class="col-md-6">  
                                 <?php
                                 if(isset($_GET['deleteSubject'])){
                                    if($_GET['deleteSubject']=1){
                                        echo '<div class="alert alert-danger">The Subject Has Been Successfully Deleted</div>';
                                    }else if($_GET['deleteSubject']=0){
                                        echo '<div class="alert alert-warning">Error In Deletion</div>';
                                    }
                                 }
                                 ?>                                  
                                    <div class="panel panel-default">
                                            <h4 class="panel-heading">My Subjects</h4>
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                           <th>Subject Name</th>
                                                                 <th>Subject Class</th>
                                                              <th>Added Date</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                </thead>

                                                <tbody>
                                                    
                                                    <?php
                                                            

                                                                 $query2 = mysqli_query($conn,"SELECT * FROM `subjects` WHERE teacher_id=$TID");
                                                                 //SELECT `subject_id`, `teacher_id`, `subject_name`, `subject_class`, `subject_recordDate` FROM `subjects` WHERE 1
                                                                 if(mysqli_num_rows($query2)>0){
                                                                    while($row2 = mysqli_fetch_array($query2)){
                                                                        $subject_id = $row2['subject_id'];
                                                                        $subject_name = $row2['subject_name'];
                                                                        $subject_class = $row2['subject_class'];
                                                                        $subject_recordDate = date("d-m-Y",strtotime($row2['subject_recordDate']));
                                                                        echo '<tr>';
                                                                        echo '<td>'.ucwords($subject_name).'</td>';
                                                                         echo '<td>'.ucwords($subject_class).'</td>';
                                                                         echo '<td>'.$subject_recordDate.'</td>';
                                                                          echo '<td><a href="actions/delete.php?subject_id='.$subject_id.'" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                                          <a class="btn btn-info edit" href="my-courses.php?subject_id='.$subject_id.'"><i class="fa fa-pencil"></i></a>
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


