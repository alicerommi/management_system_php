<?php
    include 'includes/header.php';
    include 'includes/left_nav.php';
    // $query = mysqli_query($conn,"SELECT* FROM admin WHERE admin_email = '$admin_email'");
    // $adminRow = mysqli_fetch_array($query);
    // $admin_fullName = ucwords($adminRow['admin_name']);
    // $admin_image = $adminRow['admin_picture'];
?>
<style type="text/css">
    #keywordAction{
        width: 122px;
    }
</style>

          
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">View All Questions With Answers</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Questions</a></li>
                                    <li class="active">View All Questions</li>
                                </ol>
                            </div>
                        </div>


                          <a class="btn btn-default pull pull-left" href="add-question.php" style="margin-bottom: 20px;">
                                    <span class="glyphicon glyphicon-plus-sign"> </span>Add New Question
               
                         </a>
                    
                      <div class="row">
                                            <?php
                                                //shwo the feed back notification in case of deletion
                                                if(isset($_GET['deleteStatus'])){
                                                    if($_GET['deleteStatus']==1){
                                                        echo '<div class="alert alert-danger text-center"> The Question Has Been Successfully Deleted</div>';
                                                    }else if($_GET['deleteStatus']==0){
                                                        echo '<div class="alert alert-warning text-center"> Error in Deletion</div>';
                                                    }
                                                }
                                            ?>
                                           <div class="col-md-12">
                                        <div class="panel panel-default panel-fill">
                                            <div class="panel-heading"> 
                                                <h3 class="panel-title">All Questions & Answers</h3> 
                                            </div> 
                                            <div class="panel-body">
                                                    <div id="datatable-responsive_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table id="datatable" class="table table-striped table-bordered">
                                              <thead>
                                                        <tr>
                                                            <th id="">Question Category</th>
                                                            <th>Question</th>
                                                            <th>Answer</th>
                                                            <th id="keywordAction">Actions</th>
                                                           
                                                        </tr>
                                                </thead>
                                            <tbody>
                                                <?php
                                                //SELECT ques.*, ques_cat.* FROM dream_questions ques, questions_category ques_cat WHERE ques.question_cate_id = ques_cat.ques_cate_id
                                                    $query ="SELECT ques.*, ques_cat.* FROM dream_questions ques, questions_category ques_cat WHERE ques.question_cate_id = ques_cat.ques_cate_id";
                                                    $result = mysqli_query($conn,$query);
                                                    if(mysqli_num_rows($result)>0){
                                                        while($row= mysqli_fetch_array($result)){
                                                                //SELECT `ques_cate_id`, `ques_category_name`, `ques_category_recordDate` FROM `questions_category` WHERE 1
                                                                $dream_ques_id = $row['dream_ques_id'];
                                                                $dream_ques = $row['dream_ques'];
                                                                //$dream_ques_ans = $row['dream_ques_ans'];
                                                                $dream_ques_ans =substr($row['dream_ques_ans'],0,50);
                                                                $question_cate_id = $row['question_cate_id'];
                                                                $ques_category_name = $row['ques_category_name'];
                                                        echo'<tr>
                                                                    <td>'.$ques_category_name.'</td>
                                                                    <td>'.$dream_ques.'</td>
                                                                    <td>'.$dream_ques_ans.'</td>
                         <td>
                         <a  class="btn btn-default" href="edit-question.php?QuesID='.$dream_ques_id.'"><i class="fa fa-edit"></i></a>
                        
                        <a  class="btn btn-danger" href="actions/delete.php?QuesID='.$dream_ques_id.'"><i class="fa fa-trash"></i></a>
                            <a  class="btn btn-info" href="view-question.php?QuesID='.$dream_ques_id.'"><i class="fa fa-eye"></i></a>
                        </td>
                                                                    
                                                                </tr>';

                                                            }// end while loop here 
                                                        }   //end num rows conidtion


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
<?php
    include 'includes/footer.html';
?>
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#datatable').dataTable();
      });
</script>
