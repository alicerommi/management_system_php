<?php
    if(isset($_GET['keyID'])){
          $dream_keyword_id  = intval($_GET['keyID']);
    //gett he dream details using dream_keyword_id 
    }else{
        echo "INvalid Parameters";
        die;
    } 
    include 'includes/header.php';
    include 'includes/left_nav.php';
     $query = mysqli_query($conn,"SELECT* FROM dream_table WHERE dream_keyword_id=$dream_keyword_id");
      if(mysqli_num_rows($query)>0){
        $dreamRow = mysqli_fetch_array($query);
        $dream_para = $dreamRow['dream_para'];
        $dream_keyword_id = $dreamRow['dream_keyword_id'];
        $dream_keyword = $dreamRow['dream_keyword'];
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
                                    echo "View Details of Dream with Keyword ". $dream_keyword;
                                ?></h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Dream</a></li>
                                    <li class="active">View Dream Details</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <a class="btn btn-default pull pull-right" href="all-dreamLists.php" style="margin-bottom: 23px;">
                                    <i class="md md-keyboard-arrow-left"> </i>Back to Dream List
                         </a>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Dream Description</h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                            //$firstAlpha = $dream_para[0];
                                            echo '<p style="text-align: justify;font-size: 18px;">'.$dream_para.'</p>';
                                        ?>
                                        <!-- <p><span class="dropcap text-primary">D</span>orem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. Ea, ipsa, in, laboriosam, dignissimos nobis quaerat vitae a facere esse neque laudantium nisi atque quos assumenda magni quae architecto fugiat libero.</p> -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php include 'includes/footer.html'; ?>