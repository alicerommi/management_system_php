<?php 
    include 'includes/database_connection.php';
        if(isset($_GET['qID'])){
            $q_id = intval($_GET['qID']);
        }else{
            echo "Invalid Paramters";
            die;
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Rüyada Elma Görmek</title>
    <!-- Style Css -->
    <link rel="stylesheet" href="asset/css/style.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700,900" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
    /* .counter {
        position: absolute;
        z-index: 2;
        margin-top: -20px;
        margin-left: -20px;
        -webkit-border-radius: 10em;
        border-radius: 10em;
        padding: 4px 7px;
        background-color: #fe1212;
        font-size: 11px;
        color: #fff;
    } */
</style>

<body>
    <!-- Start: Header Section -->
    <div class="header">
        <div class="wrapper">
            <div class="brand-logo">
                <a href="index.php"><span>Dream</span> Logo</a>
            </div>
            <div class="social-list ">
                <ul class="social">
                    <li>
                        <a href="#"><i class=" fa fa-google-plus"></i></a>
                        <!-- <span id="facebook-span" class="counter">12k</span> -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <!-- <span id="facebook-span" class="counter">1k</span> -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-thumbs-o-up"></i></a>
                        <!-- <span id="facebook-span" class="counter">10k</span> -->
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End: Header Section -->
    <!-- Start: Pages Counter Section -->
    <div class="cse-search-box">
        <div class="wrapper">
            <div class="cse-title">
                <h2>SEARCH</h2>
                <p>You look for the most obvious objects you see in your dream.</p>
            </div>
            <div class="cse-search">
                <div id="search">
                    <span class="ac ac-hidden"></span>
                    <input type="text" placeholder="Enter the Keywords">
                    <button id="emoji">Search</button>
                </div>
            </div>
            <div class="cse-counter">
                <ul>
                     <?php
                    // foreach (range('A', 'Z') as $char) {
                    //         echo 
                    //         "<li>
                    //              <a href=listing.php?alphabet=".strtolower($char)."&page=1>".$char."</a>
                    //         </li>";
                    //     }

                     //get all the alphabets from database
                     $query = mysqli_query($conn,"SELECT* FROM alphabets_table");
                     if(mysqli_num_rows($query)>0){
                        while($row = mysqli_fetch_array($query))
                                            {   
                                                $alphabet_id = $row['alphabet_id'];
                                                $alphabet = $row['alphabet'];
                                                echo 
                                                    "<li>
                                                         <a href=listing.php?alphabet=".strtolower($alphabet)."&page=1>".strtoupper($alphabet)."</a>
                                                    </li>";
                                            }
                     }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- End: Pages Counter Section -->
    <!-- Start: Heading Section -->
    <div class="cse-heading">
        <div class="wrapper">
            <div class="heading">
                <h2><?php 
                 $query = mysqli_query($conn,"SELECT dream_ques.*,ques_cat.* FROM `dream_questions` dream_ques, questions_category ques_cat where dream_ques.question_cate_id = ques_cat.ques_cate_id AND dream_ques.dream_ques_id=$q_id");
      if(mysqli_num_rows($query)>0){
        $quesRow = mysqli_fetch_array($query);
        $dream_ques = $quesRow['dream_ques'];
        $dream_ques_ans = $quesRow['dream_ques_ans'];
        $question_cate_id = $quesRow['question_cate_id'];
        $ques_category_name = $quesRow['ques_category_name'];
      }
        echo $dream_ques;
                ?></h2>
            </div>
            <div class="paragraph">
                <p>
                    <?php echo $dream_ques_ans;?>
                </p>
                  
            </div>
        </div>
    </div>
    <!-- End: Heading Section -->
    <hr class="line-seperator">
  
    <!-- Start: Comment Section -->
    <!-- <div class="cse-comment">
        <div class="wrapper">
            <div class="comment-box">
                <div class="comment-block">
                    <h4>0 Comments</h4>
                    <div class="comment-btn">
                        <span>Short by</span>
                        <select name="" id="">
                                    <option value="">Newest</option>
                                    <option value="">Oldest</option>
                                </select>
                    </div>
                </div>
                <hr>
                <div class="comment-message">
                    <div class="image-post">
                        <img src="asset/img/profile.jpg" alt="Profile">
                    </div>
                    <form action="" method="POST">
                        <label for=""></label>
                        <textarea name="message-cmnt" id="" cols="30" rows="10" placeholder="Add a comment"></textarea>
                    </form>
                    <div class="comment-rd">
                        <div>
                            <input type="checkbox" id="check1" />
                            <label for="check1">
                                              <div><i class="fa fa-check"></i></div> Also post on facebook
                                            </label>
                        </div>
                        <div class="post-btn">
                            <button class="post">Post</button>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="recieve-msg">
                <h4>FUAT <span>5 Minutes Ago</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos blanditiis debitis repellat obcaecati. Dicta tenetur amet ipsam quam minima quia est libero fugit, aliquam reiciendis voluptatem recusandae. Recusandae, ducimus veritatis.</p>
                <p class="timepicker">27.06.2013 10:30:42</p>
                <div class="reply">
                    <a href="#" class="comment-reply-link">Post Reply</a>
                </div>
            </div>
            <hr>
            <div class="reply-msg">
                <h4>HAMZA <small>(reply)</small> <span>1 Minute Ago</span></h4>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati nemo eum laborum, libero expedita earum, ab ipsam mollitia sed dolor reiciendis perspiciatis quod! Dignissimos iusto ullam perspiciatis repellat! Repellat, maxime?</p>
                <p class="timepicker">27.06.2013 10:30:42</p>
            </div>

        </div>
    </div> -->
    <!-- End: Comment Section -->
    <!-- Start: Footer Section -->
        <?php include 'asset/footer.php' ;?>
    <!-- End: Footer Section -->

    <!-- jQuery JS 3.1.0 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        function searchReady() {
            var input = $('#search input');
            // input.focus();

            input.keyup(function() {

                var inputVal = $(this).val(),
                    strBank = 'directions to the nearest bank',
                    strPizza = 'directions to make the best pizza';

                if (
                    inputVal.indexOf("directions to the n") >= 0 &&
                    strBank.indexOf(inputVal) >= 0
                ) {
                    $('.ac').text(strBank).removeClass('ac-hidden');
                    $('button').addClass('emoji emoji-bank');

                } else if (
                    inputVal.indexOf("directions to make the b") >= 0 &&
                    strPizza.indexOf(inputVal) >= 0
                ) {
                    $('.ac').text(strPizza).removeClass('ac-hidden');
                    $('button').addClass('emoji emoji-pizza');

                } else {
                    $('.ac').addClass('ac-hidden').delay(300).text('');
                    $('button').removeClass();

                }
            });
        }

        $(document).ready(searchReady);

        $(".twitter").hover(function() {
            $("#social-section").toggleClass("color-twitter")
        });

        $(".facebook").hover(function() {
            $("#social-section").toggleClass("color-facebook")
        });

        $(".google-plus").hover(function() {
            $("#social-section").toggleClass("color-googleplus")
        });
    </script>
</body>

</html>