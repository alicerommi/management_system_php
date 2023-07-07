<?php
    if(isset($_GET['alphabetDesID'])){
          $alphabetDesID  = intval($_GET['alphabetDesID']);
    //gett he dream details using dream_keyword_id 
    }else{
        echo "Invalid Parameters";
        die;
    } 
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT * FROM `alphabets_description` WHERE alphabet_des_id=$alphabetDesID");
      if(mysqli_num_rows($query)>0){
        $Row = mysqli_fetch_array($query);
        $alphabet_description = $Row['alphabet_description'];
        $alphabet_id = $Row['alphabet_id'];
        $queryAlpha = mysqli_query($conn,"SELECT* FROM alphabets_table where alphabet_id=$alphabet_id");
         $Row2 = mysqli_fetch_array($queryAlpha);
         $alphabet= $Row2['alphabet'];
        // $dream_keyword_id = $Row['dream_keyword_id'];
        // $dream_keyword = $Row['dream_keyword'];
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
                                    echo "View Details of Alphabet ". ucwords($alphabet);
                                ?></h4>
                                <ol class="breadcrumb pull-right">
                                   <li><a href="#">Dream</a></li>
                                    <li><a href="#">Alphabets Description</a></li>
                                    <li class="active"> View Specific Alphabets Description</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <a class="btn btn-default pull pull-right" href="view-alphabetDescription.php" style="margin-bottom: 23px;">
                                    <i class="md md-keyboard-arrow-left"> </i>Back to Alphabets Description Lists
                         </a>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Alphabet Description</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            //$firstAlpha = $dream_para[0];
                                            echo '<p style="text-align: justify;font-size: 18px;">'.$alphabet_description.'</p>';
                                        ?>
                                        <!-- <p><span class="dropcap text-primary">D</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. Ea, ipsa, in, laboriosam, dignissimos nobis quaerat vitae a facere esse neque laudantium nisi atque quos assumenda magni quae architecto fugiat libero.</p> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'includes/footer.html'; ?>