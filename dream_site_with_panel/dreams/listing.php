<?php
    include 'includes/database_connection.php';
    if(isset($_GET['alphabet'])){
        $alphabet = $_GET['alphabet'];
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
                                
                    //     if(strtolower($char)===$alphabet){
                    //                echo 
                    //         "<li >
                    //                 <a class='active' href=listing.php?alphabet=".strtolower($char)."&page=1>".$char."</a>
                    //         </li>";
                    //     }else{
                    //              echo 
                    //         "<li>
                    //                 <a href=listing.php?alphabet=".strtolower($char)."&page=1>".$char."</a>
                    //         </li>";
                    //     }
                            
                        
                    //     }

                        $query = mysqli_query($conn,"SELECT* FROM alphabets_table");
                     if(mysqli_num_rows($query)>0){
                            while($row = mysqli_fetch_array($query))
                            {   
                                                $alphabet_id = $row['alphabet_id'];
                                                $alphabetDB = $row['alphabet'];
                                                if($alphabet == $alphabetDB){
                                                echo 
                                                        "<li >
                                                                <a class='active' href=listing.php?alphabet=".strtolower($alphabetDB)."&page=1>".strtoupper($alphabetDB)."</a>
                                                        </li>";
                                                }
                                                    else
                                                
                                              {  echo 
                                                                                                  "<li>
                                                                                                       <a href=listing.php?alphabet=".strtolower($alphabetDB)."&page=1>".strtoupper($alphabetDB)."</a>
                                                                                                  </li>";
                                            }
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
                <?php
                echo '<h2>Dream Translation "'.strtoupper($alphabet).'" Letter Dream Tutorial</h2>';
                ?>

            </div>
            <div class="paragraph">
              <?php echo "<p>You are currently looking at the explanatory dream-style dictionary of objects, signs and  symbols in the letter ".strtoupper($alphabet)." in the world's largest * dream expression site.</p>";?>
              <?php
              $getAlphaDescription = mysqli_query($conn,"SELECT alpha_tab.*,alpha_des.* from alphabets_table alpha_tab, alphabets_description alpha_des where alpha_tab.alphabet_id=alpha_des.alphabet_id and alpha_tab.alphabet='$alphabet'");
              if(mysqli_num_rows($getAlphaDescription)>0){  
                          $Record = mysqli_fetch_array($getAlphaDescription);
                          $alpha_des = $Record['alphabet_description'];
                                echo '<p>'.$alpha_des.'</p>';
                }else{
                          echo '<h2 style="color:red"> Description of '.strtoupper($alphabet).' Has Not Added Yet</h2>';
                }
              ?>

<!-- 
                <p>Please select the appropriate one (s) from the list of words below and look at the comments. The list is arranged in alphabetical order and can consist of more than one page.</p>

                <p>Dreams give us clues about the unknowns in our lives. Please read the comments carefully to understand the meaning of the signs and symbols in your dreams. If you have seen more than one sign and symbol, it will be useful for you to look
                    at it one by one, and to interpret it when you are good.</p>

                <p>Our site is the product of a long and meticulous work that we prepare for publication by scanning all reliable sources in the literature.</p>

                <p>* Islamic dream expressions are the greatest resources created by scanning resources and encyclopedias.</p>

                <p>** To increase the number of phrases, do not use sites that have inventive interpretations that refer to them as religion, religious or Islamic dream expressions.</p> -->




            </div>
        </div>
    </div>
    <!-- End: Heading Section -->
    <hr class="line-seperator">
    <!-- Start: List Link -->
    <div class="cse-link">
        <div class="wrapper">
            <div class="links">
                <ul>
                <?php
                    //show all the keywords which starts with chosen alphabet
                $alpha = strtoupper($alphabet[0]); 
                $limit = 104; //num of records in pagination case
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                     $numOfRecords = $limit*$page;
                    $start  =  $numOfRecords-$limit;
                    $end = $numOfRecords+$limit;
                }else{
                    $page = 1;
                    //$offset = 0;
                    $start = 0;
                    $numOfRecords = $limit*$page;
                    $end = $numOfRecords;
                }
               
        $sql ="SELECT dream_keyword FROM `dream_table` WHERE `dream_keyword` LIKE '$alpha%' LIMIT $start,$end";
        $query = mysqli_query($conn,$sql);

                        while($row = mysqli_fetch_array($query))
                        {
                                $dream_keyword = $row['dream_keyword'];
                                //$dream_keyword_id  = $row['dream_keyword_id'];
                                echo '
                                     <li>
                                        <a href="dream_description.php?keyword='.$dream_keyword.'">'.ucwords($dream_keyword).'</a>
                                    </li>';
                        }
                ?>
                </ul>
                  <!--   <li>
                        <a href="#">Leg Cutting</a>
                    </li>
                    <li>
                        <a href="#">Leg Shank</a>
                    </li> -->
            </div>
        </div>
    </div>
    <!-- End: List Link -->
    <!-- Start: Pagination Section -->
    <!-- Source: ClinicalTrials.gov prototype  https://federalist-proxy.app.cloud.gov/preview/18f/clinical-trials-prototype/clean/search-results/ -->
    <nav class="pagination" role="navigation" aria-label="Pagination">
        <ol>
            <?php
            $totalRows =mysqli_query($conn,"SELECT dream_keyword FROM `dream_table` WHERE `dream_keyword` LIKE '$alpha%'");
            $rows = mysqli_num_rows($totalRows);
              $val = ceil($rows/$limit);
              $pageNum = 0;
              $flag = true;
              $pageP = $page-1;
              if($page>1){
                            echo '
                            <li class="pagination-page">
                                  <a href="listing.php?alphabet='.$alphabet.'&page='.$pageP.'">
                                       <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                                   </a>
                          </li>';
                      }
                      
                      $counter=0;
              for($i=$page;$i<=$val;$i++){
                                        $counter++;
                                        if(isset($_GET['page'])){
                                                $pageNum = $_GET['page'];
                                            }
                                       

                                        if($i==$pageNum){
                                             echo '<li> 
                                                         <a class="is-active" href="listing.php?alphabet='.$alphabet.'&page='.$i.'" aria-label="Page '.$i.'">'.$i.'</a>
                                                    </li>';
                                                       
                                                        $j=$i+1;
                                                      if($j<$val){
                                                      echo '<li> 
                                                         <a  href="listing.php?alphabet='.$alphabet.'&page='.$j.'" aria-label="Page '.$j.'">'.$j.'</a>
                                                    </li>';
                                                     $k=$i+2;
                                                    echo '<li> 
                                                         <a href="listing.php?alphabet='.$alphabet.'&page='.$k.'" aria-label="Page '.$k.'">'.$k.'</a>
                                                    </li>';

                                                }
                                        }else{
                                                
                                           
                                            if($i==$val){
                                                 echo '<li aria-hidden="true">…</li>';
                                                 echo '<li>
                                                         <a href="listing.php?alphabet='.$alphabet.'&page='.$i.'" aria-label="Page '.$i.'">'.$i.'</a>
                                                    </li>';

                                                      $l  = $page+1;
                                                    echo '<li>
                <a href="listing.php?alphabet='.$alphabet.'&page='.$l.'" aria-label="Next Page"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li> ';
                                                   


                                            }
                                        }
              }  
            ?>
           <!--  <li class="pagination-page">
                <a class="is-active" href="#0" aria-label="Page 1, Current Page" tabindex="-1">1</a>
            </li>
            <li>
                <a href="#0" aria-label="Page 2">2</a>
            </li>
            <li>
                <a href="#0" aria-label="Page 3">3</a>
            </li>
            <li>
                <a href="#0" aria-label="Page 4">4</a>
            </li>
            <li>
                <a href="#0" aria-label="Page 5">5</a>
            </li>
            <li>
                <a href="#0" aria-label="Page 6">6</a>
            </li>
            <li aria-hidden="true">…</li>
            <li>
                <a href="#0" aria-label="Page 71">71</a>
            </li>
            <li>
                <a href="#0" aria-label="Next Page"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
            </li> -->
        </ol>
    </nav>
    <!-- End: Pagination Section -->
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