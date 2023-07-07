<?php
    if(isset($_GET['QuesID'])){
          $question_id  = intval($_GET['QuesID']);
    //gett he dream details using dream_keyword_id 
    }else{
        echo "INvalid Parameters";
        die;
    } 
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT dream_ques.*,ques_cat.* FROM `dream_questions` dream_ques, questions_category ques_cat where dream_ques.question_cate_id = ques_cat.ques_cate_id AND dream_ques.dream_ques_id=$question_id");
      if(mysqli_num_rows($query)>0){
        $quesRow = mysqli_fetch_array($query);
        $dream_ques = $quesRow['dream_ques'];
        $dream_ques_ans = $quesRow['dream_ques_ans'];
        $question_cate_id = $quesRow['question_cate_id'];

        $ques_category_name = $quesRow['ques_category_name'];

      }else{
            echo "No data for this ID";
            die;
      }
?>
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                       
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title"><?php 
                                    echo "View Details of Question";
                                ?></h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Questions</a></li>
                                    <li class="active">View Question Details</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <a class="btn btn-default pull pull-right" href="all-questions.php" style="margin-bottom: 23px;">
                                    <i class="md md-keyboard-arrow-left"> </i>Back to All Question Lists
                         </a>

                          <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Question Line</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            //$firstAlpha = $dream_para[0];
                                            echo '<strong style="text-align: justify;font-size: 18px;">'.$dream_ques.'</strong>';
                                        ?>
                                        <!-- <p><span class="dropcap text-primary">D</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. Ea, ipsa, in, laboriosam, dignissimos nobis quaerat vitae a facere esse neque laudantium nisi atque quos assumenda magni quae architecto fugiat libero.</p> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Question Category Name</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            //$firstAlpha = $dream_para[0];
                                            echo '<strong style="text-align: justify;font-size: 18px;">'.$ques_category_name.'</strong>';
                                        ?>
                                        <!-- <p><span class="dropcap text-primary">D</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. Ea, ipsa, in, laboriosam, dignissimos nobis quaerat vitae a facere esse neque laudantium nisi atque quos assumenda magni quae architecto fugiat libero.</p> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Question Answer</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            //$firstAlpha = $dream_para[0];
                                            echo '<p style="text-align: justify;font-size: 18px;">'.$dream_ques_ans.'</p>';
                                        ?>
                                        <!-- <p><span class="dropcap text-primary">D</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. Ea, ipsa, in, laboriosam, dignissimos nobis quaerat vitae a facere esse neque laudantium nisi atque quos assumenda magni quae architecto fugiat libero.</p> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'includes/footer.html'; ?>