<?php
    if(isset($_GET['QuesID'])){
        $ques_id= intval($_GET['QuesID']);
    }else{
        echo "Invalid Paremeters";
        die;
    }

    include 'includes/header.php';
    include 'includes/left_nav.php';
?>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
        <link href="assets/plugins/summernote/dist/summernote.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">

          
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
                                <h4 class="pull-left page-title">Edit Questions & Answer</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Questions</a></li>
                                    <li class="active">Edit Question</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <?php
                            //for showing the php feedback messages on the submission of form
                            if(isset($_GET['editQuesStatus'])){
                                    if($_GET['editQuesStatus']==1){
                                        echo '<div class="alert alert-success">The Question & Answer Details Has been Updated</div>';
                                    }else if($_GET['editQuesStatus']==0){
                                         echo '<div class="alert alert-warning">Error in Updating Question & Answer Details</div>';
                                    }
                            }
                           ?> 
                            <div class="col-sm-12">
                                <a class="btn btn-default pull pull-right" href="all-questions.php" style="margin-bottom: 23px;">
                                             <i class="md md-keyboard-arrow-left"> </i>View All The Added Questions
                                     </a>
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Question & Answer</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" method="post" action="actions/update.php" >
                                                <?php
                                                    $query = mysqli_query($conn,"SELECT * FROM dream_questions where dream_ques_id = $ques_id");
                                                    if(mysqli_num_rows($query)>0){
                                                        $row = mysqli_fetch_array($query);
                                                        //SELECT `dream_ques_id`, `dream_ques`, `dream_ques_ans`, `question_cate_id`, `recordDate` FROM `dream_questions` WHERE 1
                                                        $dream_ques = $row['dream_ques'];
                                                        $dream_ques_ans = $row['dream_ques_ans'];
                                                        $question_cate_idEdit = $row['question_cate_id'];
                                                    }else{
                                                           // echo "No data";
                                                    }
                                                    echo '<input type="hidden" name="questionID" value='.$ques_id.'>';
                                                ?>

                                                <div class="form-group">
                                                    <label for="cname" class="control-label">Enter the Question</label>
                                                   
                                                        <input class="form-control"  name="question" value="<?php echo $dream_ques;?>" type="text" required maxlength="70">
                                                   
                                                </div>

                                                <div class="form-group">
                                                        <label>Choose Question Category</label>
                                                        <select class="form-control" name="questionCategory" required>
                                                                    <option disabled selected>Nothing Selected</option> 
                                                                    <?php
                                                                        $query = mysqli_query($conn,"SELECT* FROM questions_category");
                                                                        if(mysqli_num_rows($query)>0){
                                                                            while ($row= mysqli_fetch_array($query)) {
                                                                                $ques_category_name = $row['ques_category_name'];
                                                                                $ques_cate_id = $row['ques_cate_id'];
                                                                                if($question_cate_idEdit==$ques_cate_id){
                                                                                    echo '<option value='.$ques_cate_id.' selected>'.$ques_category_name.'</option>'; 
                                                                                }else
                                                                                echo '<option value='.$ques_cate_id.'>'.$ques_category_name.'</option>'; 
                                                                            }
                                                                        }
                                                                    ?>  
                                                        </select>
                                                        <a href="questions-category.php">Add New Question Category</a>   
                                                </div>

                                                <div class="form-group">
                                                    <label>Enter the Question's Answer</label>
                                                    <textarea class="wysihtml5 form-control" rows="9" name="questionAnswer" maxlength="4000" required><?php 
                                                        echo $dream_ques_ans;
                                                    ?></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" name="Editquestion">Save</button>
                                                       <!--  <button class="btn btn-default waves-effect" type="button">Cancel</button> -->
                                                   
                                                </div>
                                            </form>




                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div>
                          

                
                    </div> <!-- container -->
                               
                </div> <!-- content -->
<?php
    include 'includes/footer.html';
?>
 <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
        <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
        <script>
            jQuery(document).ready(function(){
                $('.wysihtml5').wysihtml5();
            });
        </script>

       