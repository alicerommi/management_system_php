<?php
    include 'includes/database_connection.php';
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }else{
        echo "Invalid Parameters";
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dream Website</title>
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
.cse-search-box .cse-counter ul li .active {
        background-color: #fff;
        color: #EA2027;
    }
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
       <?php 
        //shwo the messages here 
            if(isset($_GET['CommentStatus'])){
                    if($_GET['CommentStatus']==1){
                        echo '<div class="alert alert-success" style="color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    text-align: center;padding-bottom: 17px;
    padding-top: 18px;margin-top: -46px;">The Comment Has Been Submitted Successfully</div>';
                    }else if($_GET['CommentStatus']==0){
                        echo '<div class="alert alert-danger" style="color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;padding-bottom: 17px;
    padding-top: 18px;text-align: center;margin-top: -46px;">Error in Adding Comment</div>';
                    }
            }
       ?> 

    <!-- End: Pages Counter Section -->
    
    <!-- Start: Heading Section -->
    
    <div class="cse-heading">

        <div class="wrapper">
           <!--  <div class="heading">
                <h2>Interpretation of Dreams</h2>
            </div>
            <div class="paragraph">
                <p>Weird situations seen in sleep called transient death ... Why and how do we dream? It's a phenomenon. From the creation of the first human to this day philosophers, scientists have explained and thought in various forms, but they can not
                    pinpoint the dream. But it is worthwhile to know that the dream is a big, abstract world. At the same time, the dream is also related to our later life. Catching this relationship is only possible with clean emotion and soul cleansing.</p>
            </div>
            <div class="heading">
                <h2>Use of the Dictionary of Dream Translation</h2>
            </div>
            <div class="paragraph">
                <p>The dream expressions on our site are collected from many different old Turkish encyclopedia, so you can see the spelling and spelling mistakes in some expressions and you can see the same expression again. We are trying to revise them
                    with modern Turkish as much as possible.</p>
                <p>The most obvious objects in your dream that you need to do while looking at your dream expressions are to search through the search form on the left hand side and read all individually. It would be useful to associate them with each other
                    before a decision is made. I hope that your dream is a good reminder that we want to make a final reminder. All of your dreams may not give you a clue about the future, so the dream interpretation may not tell you about your situation.
                    You can also tell us what you can not find in the search results.</p>
            </div> -->
            <?php
            $query = mysqli_query($conn,"SELECT* FROM dream_table WHERE dream_keyword='$keyword'");
            $row = mysqli_fetch_array($query);
            $dream_para = $row['dream_para'];
           echo '
            <div class="heading">

                <h2>Dream interpretation for '.$keyword.'</h2>
            </div>
            <div class="paragraph">
                <p>'.$dream_para.'</p>
              
            </div>';
            ?>

        </div>
    </div>

      <!-- Start: Contact Email Section -->
    <div class="cse-form">
        <div class="wrapper">
            <div class="cse-body-panel">
                <div class="cse-panel">
                    <h3>You can send the Dream Tabi to your friend:</h3>
                    <form class="cse-mail" action="" method="POST">
                        <div class="input-group">
                            <label for=""></label>
                            <input class="input-form" type="email" name="email_1" id="" size="30" placeholder="Your E-mail Address">
                        </div>
                        <div class="input-group">
                            <label for=""></label>
                            <input class="input-form" type="email" name="email_2" id="" size="30" placeholder="Your friend's email address">
                        </div>
                        <div class="input-group">
                            <button class="btn" type="submit" id="">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="cse-panel">
                    <h3>Add a comment, ask a question:</h3>
                    <form action="actions/insert.php" method="POST">
                        <div class="input-group">
                            <!-- <label for="">Your Name or Nickname:</label> -->
                            <input class="input-form" type="text" name="name" id="name" size="30" placeholder="Your Name or Nickname">
                        </div>
                        <div class="input-group">
                            <!-- <label for="">Your Email Address (It will be strictly confidential):</label> -->
                            <input class="input-form" type="email" name="email" id="email" size="30" placeholder="Your E-mail Address">
                        </div>
                        <div class="input-group textarea">
                            <label for=""></label>
                            <textarea name="message" class="message-form" id="message" cols="30" rows="10" placeholder="You can write your ideas here."></textarea>
                        </div>

                        <input type="hidden" name="keyword" value="<?php echo $keyword; ?>">
                        <div class="input-group ">
                            <button class="btn" type="submit" name="commentFORM">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Contact Email Section -->
    <!-- End: Heading Section -->
    <hr class="line-seperator">
    <!-- Start: Footer Section -->
   <?php include 'asset/footer.php';?>
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