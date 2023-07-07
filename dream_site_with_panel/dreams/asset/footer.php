<?php
        include 'includes/database_connection.php';
?>
 <!-- Start: Footer Section -->
    <footer class="footer" id="social-section">
        <div class="wrapper">
            <div class="footer-links">

                        <?php
                        //for getting the footer questions we are going to set it dynamically
                        $footerQues1 = mysqli_query($conn,"SELECT dream_ques.*,ques_cat.* FROM `dream_questions` dream_ques, questions_category ques_cat where ques_cat.ques_cate_priority=1 and ques_cat.ques_cate_id=dream_ques.question_cate_id");
                            if(mysqli_num_rows($footerQues1)>0){
                                $count1 = 0;

                                while($rowQ1 = mysqli_fetch_array($footerQues1)){
                                                $count1++;
                                                if($count1==1){
                                                    $ques_category_name   = $rowQ1['ques_category_name'];
                                                      echo '<div class="link1 links-list">
                                                         <h2>'.$ques_category_name.'</h2>';
                                                         echo '<ul>';
                                                }//end counter condition


                                                $dream_ques_id = $rowQ1['dream_ques_id'];
                                                // echo $dream_ques_id;
                                                // die;
                                                $dream_ques = $rowQ1['dream_ques'];
                                                    echo ' <li>
                                                    <a href="answers.php?qID='.$dream_ques_id.'">'.$dream_ques.'</a>
                                                </li>';



                                }//end while loop 
                              
                                echo '</ul></div>';
                            }//end num rows conidtin
                        ?>

                          <?php
                        //for getting the footer questions we are going to set it dynamically
                        $footerQues2 = mysqli_query($conn,"SELECT dream_ques.*,ques_cat.* FROM `dream_questions` dream_ques, questions_category ques_cat where ques_cat.ques_cate_priority=2 and ques_cat.ques_cate_id=dream_ques.question_cate_id");
                            if(mysqli_num_rows($footerQues2)>0){
                                $count2 = 0;

                                while($rowQ2 = mysqli_fetch_array($footerQues2)){
                                                $count2++;
                                                if($count2==1){
                                                    $ques_category_name   = $rowQ2['ques_category_name'];
                                                      echo '<div class="link1 links-list">
                                                         <h2>'.$ques_category_name.'</h2>';
                                                         echo '<ul>';
                                                }//end counter condition


                                                $dream_ques_id = $rowQ2['dream_ques_id'];
                                                // echo $dream_ques_id;
                                                // die;
                                                $dream_ques = $rowQ2['dream_ques'];
                                                    echo ' <li>
                                                    <a href="answers.php?qID='.$dream_ques_id.'">'.$dream_ques.'</a>
                                                </li>';



                                }//end while loop 
                              
                                echo '</ul></div>';
                               
                            }//end num rows conidtin
                        ?>

                        
            <hr>
            <div class="copyright">
                <p><a href="#">Interpretation of Dreams</a>&nbsp;2006-2018 © MAN</p>
            </div>
            <div class="social-list">
                <ul>
                    <!-- <li><a href="#"><i class="fa fa-"></i></a>
                </li> -->
                    <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- End: Footer Section -->