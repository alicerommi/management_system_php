<?php
        include 'includes/database_connection.php';
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
            </div>
            <div class="heading">
                <h2>Dream interpretation</h2>
            </div>
            <div class="paragraph">
                <p>With the dream, very subtle facts will be discovered and will continue to be discovered forever. Allan Rechtschaffen from the University of Chicago sleep research has found that sleep has no function. Despite the reduced fatigue of the
                    muscles, he said that he did not need sleep to rest his body. Because the cells in our body have the ability to repair themselves. According to the findings of the researchers, there is no need to be away from the activity or to be
                    in rest or sleep. The studies on EEG records taken during sleep did not show any inefficiency in the brain. England National Physics Laboratory Psychologist researcher in the department of computer science. According to Evans, the
                    only reason for sleep is to prepare the ground for us to dream. According to Dr.William Dument, Stanford Medical Center Sleep Clinic doctor; It is extremely important to dream. Realization of physical balance is achieved.</p>
                <p><b>Humans spend about a third of their lives asleep, which means a 60-year life span of 20 years.</b></p>
            </div>
        </div>
    </div>
    <!-- End: Heading Section -->
    <hr class="line-seperator">
   


   <?php include 'asset/footer.php' ;?>

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